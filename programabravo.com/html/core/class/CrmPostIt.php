<?php
require_once("base/Database.php");

class CrmPostIt extends Database
{

    public static function  getItem($postitID){
            $query = "SELECT p.*, t.typeName, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, d.unidadOrganizativa AS mundo
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                            ON d.personaID=p.destinoID
                    LEFT JOIN crm_postit_type AS t
                            ON t.typeID=p.typeID
                    WHERE 
                            p.postitID='$postitID'";
            return parent::GetObject(parent::GetResult($query));
    }

    public static function  getArray_Stats($filtro_mes, $filtro_anio){
            $stats=array("area"=>'', "area_total"=>'0', "destino"=>'', "destino_total"=>'', "origen"=>'', "origen_total"=>'0', "nota_mensaje"=>'', "nota_categoria"=>'', "nota_origen"=>'', "nota_destino"=>'', "nota_total"=>'0', );

            //Area con mas ingresos
            $query = "SELECT e.unidadOrganizativa as area, COUNT(l.personaID) AS total
            FROM crm_empleado AS e
            INNER JOIN crm_empleado_log AS l
                    ON e.personaID=l.personaID
            WHERE
                YEAR(l.fechaRegistro)='$filtro_anio' ".($filtro_mes!=''? "AND MONTH(l.fechaRegistro)='$filtro_mes'":'')."
            GROUP BY area ORDER BY total DESC
            LIMIT 0,1";
            if($rs=parent::fetchArray(parent::GetResult($query))){
                    $stats["area"]= $rs["area"];
                    $stats["area_total"]=$rs["total"];
            }

            //Usuario con mas notas enviadas
            $query = "SELECT CONCAT(e.nombres, ' ', e.apellido1, ' ', e.apellido2) AS origen, COUNT(p.postitID) AS total
            FROM crm_postit AS p
            INNER JOIN crm_empleado AS e
                    ON e.personaID=p.origenID
            WHERE
                YEAR(p.fechaRegistro)='$filtro_anio' ".($filtro_mes!=''? "AND MONTH(p.fechaRegistro)='$filtro_mes'":'')."
            GROUP BY origen ORDER BY total DESC
            LIMIT 0,1";
            if($rs=parent::fetchArray(parent::GetResult($query))){
                    $stats["origen"]= $rs["origen"];
                    $stats["origen_total"]= $rs["total"];
            }

            //Usuario con mas notas recibidas
            $query = "SELECT CONCAT(e.nombres, ' ', e.apellido1, ' ', e.apellido2) AS destino, COUNT(p.postitID) AS total
            FROM crm_postit AS p
            INNER JOIN crm_empleado AS e
                    ON e.personaID=p.destinoID
            WHERE
                YEAR(p.fechaRegistro)='$filtro_anio' ".($filtro_mes!=''? "AND MONTH(p.fechaRegistro)='$filtro_mes'":'')."
            GROUP BY destino ORDER BY total DESC
            LIMIT 0,1";
            if($rs=parent::fetchArray(parent::GetResult($query))){
                    $stats["destino"]= $rs["destino"];
                    $stats["destino_total"]= $rs["total"];
            }

            //Nota mas valorada
            $query = "SELECT CONCAT(o.nombres, ' ', o.apellido1, ' ', o.apellido2) AS origen,
            CONCAT(d.nombres, ' ', d.apellido1, ' ', d.apellido2) AS destino,
            p.mensaje, t.typeName AS categoria,
            p.votos AS total
            FROM crm_postit AS p
            INNER JOIN crm_empleado AS d
                    ON d.personaID=p.destinoID
            INNER JOIN crm_empleado AS o
                    ON o.personaID=p.origenID
            LEFT JOIN crm_postit_type AS t
                    ON t.typeID=p.typeID
            WHERE
                YEAR(p.fechaRegistro)='$filtro_anio' ".($filtro_mes!=''? "AND MONTH(p.fechaRegistro)='$filtro_mes'":'')."
            GROUP BY origen, destino, mensaje, categoria, total ORDER BY total DESC
            LIMIT 0,1";
            if($rs=parent::fetchArray(parent::GetResult($query))){
                $stats["nota_origen"]= $rs["origen"];
                $stats["nota_destino"]= $rs["destino"];
                $stats["nota_mensaje"]= $rs["mensaje"];
                $stats["nota_categoria"]= $rs["categoria"];
                $stats["nota_total"]= $rs["total"];
            }

            return $stats;
    }

    public static function  Search($criterio, $user=''){
            $query ="SELECT p.*, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                            ON d.personaID=p.destinoID
                    WHERE
                        p.estado='1' AND
                        CONCAT(d.nombres,' ',d.apellido1, ' ', d.apellido2) LIKE '%".str_replace(" ", "%", $criterio)."%'
                    ORDER BY p.fechaRegistro DESC";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getList_TopUsers($filtro_anio, $filtro_mes, $export=FALSE){
            if($filtro_mes==""){
                $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio));
                $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio+1));
            }
            else{
                $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes, 1, $filtro_anio));
                $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes+1, 1, $filtro_anio));
            }

            $query ="SELECT COUNT(*) as votos, p.destinoID, d.dni AS dniDestino,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS d
                            ON d.personaID=p.destinoID
                    WHERE
                        p.estado='1' AND
                        p.fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin'
                    GROUP BY destino, destinoID, dniDestino, mundoDestino
                    ORDER BY votos DESC
                    LIMIT 0, 10";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getWebList_TopUsers(){
            $query ="SELECT COUNT(*) as total, p.destinoID,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS d
                            ON d.personaID=p.destinoID
                    WHERE
                        p.estado='1' AND
                        p.fechaRegistro BETWEEN DATE_SUB(CURDATE(),INTERVAL DAY(CURDATE()-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)
                    GROUP BY destino, destinoID, mundoDestino
                    ORDER BY total DESC
                    LIMIT 0, 10";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getList_TopLikes($filtro_anio, $filtro_mes, $export=FALSE){
            if($filtro_mes==""){
                $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio));
                $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio+1));
            }
            else{
                $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes, 1, $filtro_anio));
                $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes+1, 1, $filtro_anio));
            }

            $query="SELECT p.*, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                            ON d.personaID=p.destinoID
                    WHERE
                        p.estado='1' AND
                        p.fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin'
                    ORDER BY p.votos DESC
                    LIMIT 0, 10";
            //echo $query;
             return parent::GetCollection(parent::GetResult($query));
   }
    
    public static function  getWebList_TopLikes(){
            $query="SELECT p.*, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                            ON d.personaID=p.destinoID
                    WHERE
                        p.estado='1' AND
                        p.fechaRegistro BETWEEN DATE_SUB(CURDATE(),INTERVAL DAY(CURDATE()-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)
                    ORDER BY p.votos DESC
                    LIMIT 0, 10";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getList_User($personaID, $filtro_anio, $filtro_mes, $export=FALSE){
            if($filtro_mes==""){
                $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio));
                $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio+1));
            }
            else{
                $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes, 1, $filtro_anio));
                $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes+1, 1, $filtro_anio));
            }
            $query="SELECT p.*, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                        ON d.personaID=p.destinoID
                    WHERE 
                        p.estado='1' AND
                        p.fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin' AND
                        p.destinoID='$personaID'
                    ORDER BY p.fechaRegistro DESC
                    ";
            //echo $query;
            return parent::GetCollection($export? parent::GetResult($query): parent::GetResultPaging($query));
    }
    
    public static function  getWebList_User($personaID, $mensual=FALSE){
            $query="SELECT p.*, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                        ON d.personaID=p.destinoID
                    WHERE 
                        p.estado='1' AND
                    ";
        if($mensual)
            $query.="p.fechaRegistro BETWEEN DATE_SUB(CURDATE(),INTERVAL DAY(CURDATE()-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND";

            $query.="
                    p.destinoID='$personaID'
                    ORDER BY p.fechaRegistro DESC
                    ";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getWebList_News(){
            $query="SELECT p.*, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen,
                    CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino
                    FROM crm_postit AS p
                    INNER JOIN crm_empleado AS o
                            ON o.personaID=p.origenID
                    INNER JOIN crm_empleado AS d
                    ON d.personaID=p.destinoID
                    WHERE 
                        p.estado='1'
                    ORDER BY p.fechaRegistro DESC
                    LIMIT 0, 50";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getList_Reporte($criterio, $filtro_tipo, $filtro_anio, $filtro_mes, $export=false){
        if($filtro_mes==""){
            $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio));
            $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio+1));
        }
        else{
            $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes, 1, $filtro_anio));
            $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes+1, 1, $filtro_anio));
        }

        $query="SELECT p.*, t.typeName, CONCAT(o.nombres,' ', o.apellido1, ' ',o.apellido2) AS origen, o.dni AS dniOrigen, d.dni AS dniDestino,
                CONCAT(d.nombres,' ', d.apellido1, ' ',d.apellido2) AS destino, o.unidadOrganizativa AS mundoOrigen, d.unidadOrganizativa AS mundoDestino,
                o.gerencia AS gerenciaOrigen, d.gerencia AS gerenciaDestino
                FROM crm_postit AS p
                INNER JOIN crm_empleado AS o
                        ON o.personaID=p.origenID
                INNER JOIN crm_empleado AS d
                        ON d.personaID=p.destinoID
                LEFT JOIN crm_postit_type AS t
                        ON t.typeID=p.typeID
                WHERE 
                    (
                        CONCAT(o.nombres,' ',o.apellido1, ' ', o.apellido2) LIKE '%".str_replace(" ", "%", $criterio)."%' OR
                        CONCAT(d.nombres,' ',d.apellido1, ' ', d.apellido2) LIKE '%".str_replace(" ", "%", $criterio)."%'
                     ) AND
                     p.fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin'
                ";
        if($filtro_tipo!=NULL) $query.=" AND p.typeID='$filtro_tipo' ";

        return parent::GetCollection($export? parent::GetResult($query): parent::GetResultPaging($query));
    }

    public static function  AddNew($oPostIt){
            //Search the max Id
            $query = "SELECT MAX(postitID) FROM crm_postit";
            $result = parent::GetResult($query);
            $oPostIt->postitID = parent::fetchScalar($result)+1;
            //Insert data to table
            $query = "INSERT INTO crm_postit(postitID, typeID, origenID, destinoID, mensaje, votos, estado, fechaRegistro)
                            VALUES('$oPostIt->postitID', '$oPostIt->typeID', '$oPostIt->origenID', '$oPostIt->destinoID', '$oPostIt->mensaje', '$oPostIt->votos', '$oPostIt->estado', NOW())";

            return parent::Execute($query);
    }

    public static function  Update($oPostIt){
            //Update data to table
            $query = "UPDATE crm_postit SET 
                            mensaje			='$oPostIt->mensaje', 
                            estado			=$oPostIt->estado
                    WHERE postitID		='$oPostIt->postitID'";
            return parent::Execute($query);
    }

    public static function  Delete($oPostIt){
            $query = "DELETE FROM crm_postit WHERE postitID='$oPostIt->postitID'";
            parent::Execute($query);
    }

    public static function Validar_AddLike($postitID, $personaID){
            $query = "SELECT COUNT(postitID) FROM crm_postit_likes
                                    WHERE postitID='$postitID' AND personaID='$personaID'";
            $result = parent::GetResult($query);

            return (parent::fetchScalar($result)==0);
    }
    public static function getTotalLikes($postitID){
            $query = "SELECT COUNT(postitID) FROM crm_postit_likes
                                    WHERE postitID='$postitID'";

            return parent::fetchScalar(parent::GetResult($query));
    }
    public static function AddLike($postitID, $personaID){
            $query = "INSERT INTO crm_postit_likes(postitID, personaID, fechaRegistro)
                            VALUES('$postitID', '$personaID', NOW())";

            if(parent::Execute($query)){
                    $query = "UPDATE crm_postit SET 
                                    votos			=".self::getTotalLikes($postitID)."
                            WHERE postitID		='$postitID'";
                    return parent::Execute($query);
            }
            else
                    return false;
    }

    public static function  getEstado($estado)
    {
        switch($estado){
            case 2:
                    return "Bloqueado"; break;
            case 1:
                    return "Activo"; break;
            case 0:
                    return "Inactivo"; break;
        }
    }
}

?>