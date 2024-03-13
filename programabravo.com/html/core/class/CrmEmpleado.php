<?php
require_once("base/Database.php");

class CrmEmpleado extends Database
{

    public static function  getWebItem($personaID){
        $query = "
            SELECT *
                FROM crm_empleado
                WHERE personaID='$personaID'";

        return parent::GetObject(parent::GetResult($query));
    }

    public static function  Buscar($criterio){
        $query = "
            SELECT *
                FROM crm_empleado
                WHERE CONCAT(nombres,' ',apellido1, ' ', apellido2) LIKE '%".str_replace(" ", "%", $criterio)."%'
                LIMIT 0, 20";

        return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getItem_Login($dni, $clave){
        $query = "
            SELECT *
                FROM crm_empleado
                WHERE dni='$dni' AND clave='$clave' AND estado=1 ";

        return parent::GetObject(parent::GetResult($query));
    }

    public static function  getList($criterio){
        $query = "SELECT * FROM crm_empleado";
        if($criterio!=""){
                $criterio = str_replace(" ", "%", $criterio);
                $query .= " WHERE nombres LIKE '%$criterio%' OR apellido1 LIKE '%$criterio%' OR dni LIKE '%$criterio%'";
        }

        return parent::GetCollection(parent::GetResult($query));
    }

    public static function  getList_Paging($criterio){
        $query = "SELECT * FROM crm_empleado";
        if($criterio!=""){
                $criterio = str_replace(" ", "%", $criterio);
                $query .= " WHERE CONCAT(nombres, ' ', apellido1, ' ', apellido2) LIKE '%$criterio%' OR dni LIKE '%$criterio%'";
        }

        return parent::GetCollection(parent::GetResultPaging($query));
    }

    public static function  getList_ReporteUsuario($criterio, $gerencia, $filtro_tipo, $filtro_anio, $filtro_mes, $export=false){
        if($filtro_mes==""){
            $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio));
            $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio+1));
        }
        else{
            $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes, 1, $filtro_anio));
            $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes+1, 1, $filtro_anio));
        }
        $filtro_tipo=($filtro_tipo!=NULL)? "AND typeID='$filtro_tipo'": '';

        $query = "
            SELECT e.personaID, e.dni, e.apellido1, e.apellido2, e.nombres, e.gerencia, 
                (SELECT COUNT(origenID) FROM crm_postit WHERE origenID=e.personaID AND fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin' $filtro_tipo) AS enviados, 
                (SELECT COUNT(destinoID) FROM crm_postit WHERE destinoID=e.personaID AND fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin' $filtro_tipo) AS recibidos 
            FROM crm_empleado AS e 
            ";

        if($criterio!=""){
            $criterio = str_replace(" ", "%", $criterio);
            $query .= "
            WHERE CONCAT(e.nombres, ' ', e.apellido1, ' ', e.apellido2) LIKE '%$criterio%' OR e.dni LIKE '%$criterio%'
            ";
        }

        if($gerencia!=""){
            $query .= ($criterio!="") ? " AND ": " WHERE ";
            $query .= " e.gerencia ='$gerencia'
            ";
        }
        
        return parent::GetCollection($export? parent::GetResult($query): parent::GetResultPaging($query));
    }

    public static function  getList_ReporteArea($criterio, $filtro_tipo, $filtro_anio, $filtro_mes, $export=false){
        if($filtro_mes==""){
            $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio));
            $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, 1, 1, $filtro_anio+1));
        }
        else{
            $fecha_ini=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes, 1, $filtro_anio));
            $fecha_fin=  date('Y-m-d', mktime(0, 0, 0, $filtro_mes+1, 1, $filtro_anio));
        }
        $filtro_tipo=($filtro_tipo!=NULL)? "AND typeID='$filtro_tipo'": '';
        
        $query = "
            SELECT e.gerencia, SUM(IFNULL(o.enviados,0)) AS enviados, SUM(IFNULL(d.recibidos,0)) AS recibidos
            FROM crm_empleado AS e
            LEFT JOIN
            (SELECT origenID, COUNT(origenID) AS enviados FROM crm_postit
                WHERE fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin' $filtro_tipo
                GROUP BY origenID)  AS o ON e.personaID=o.origenID
            LEFT JOIN
            (SELECT destinoID, COUNT(destinoID) AS recibidos FROM crm_postit
                WHERE fechaRegistro BETWEEN '$fecha_ini' AND '$fecha_fin' $filtro_tipo
                GROUP BY destinoID) AS d ON e.personaID=d.destinoID
            ";
        if($criterio!=""){
            $criterio = str_replace(" ", "%", $criterio);
            $query .= "
                WHERE e.gerencia LIKE '%$criterio%'
                ";
        }
        $query.="
            GROUP BY
                    e.gerencia
            ";
        //echo $query;
        return parent::GetCollection($export? parent::GetResult($query): parent::GetResultPaging($query));
    }

    public static function  getItem($personaID){
        $query = "
            SELECT * FROM crm_empleado WHERE personaID='$personaID'
        ";

        return parent::GetObject(parent::GetResult($query));
    }

    public static function  getWebItem_dni($dni){
        $query = "SELECT *
                        FROM crm_empleado
                        WHERE dni='$dni'";

        return parent::GetObject(parent::GetResult($query));
    }

    public static function  getWebItem_email($email){
        $query = "SELECT *
                    FROM crm_empleado
                    WHERE 
                        email='$email' AND
                        estado=1";

        return parent::GetObject(parent::GetResult($query));
    }

    public static function  AddNew($oEmpleado){
        //Search the max Id
        $query = "SELECT MAX(personaID) FROM crm_empleado";
        $result = parent::GetResult($query);
        $oEmpleado->personaID = parent::fetchScalar($result)+1;
        //Insert data to table
        $query = "INSERT INTO crm_empleado(personaID, codigoBP, dni, clave, nombres, apellido1, apellido2, fechaNacimiento, posicion, unidadOrganizativa, gerencia, email, estado)
                        VALUES('$oEmpleado->personaID', '$oEmpleado->codigoBP', '$oEmpleado->dni', '$oEmpleado->clave', '$oEmpleado->nombres', '$oEmpleado->apellido1', '$oEmpleado->apellido2', '$oEmpleado->fechaNacimiento', '$oEmpleado->posicion', '$oEmpleado->unidadOrganizativa', '$oEmpleado->gerencia', '$oEmpleado->email', '$oEmpleado->estado')";

        return parent::Execute($query);
    }

    public static function  Update($oEmpleado){
        //Update data to table
        $query = "
            UPDATE crm_empleado SET 
                    dni                 ='$oEmpleado->dni',
                    codigoBP            ='$oEmpleado->codigoBP',
                    clave               ='$oEmpleado->clave',
                    nombres             ='$oEmpleado->nombres',
                    apellido1           ='$oEmpleado->apellido1',
                    apellido2           ='$oEmpleado->apellido2',
                    fechaNacimiento     ='$oEmpleado->fechaNacimiento',
                    posicion            ='$oEmpleado->posicion',
                    unidadOrganizativa  ='$oEmpleado->unidadOrganizativa',
                    gerencia            ='$oEmpleado->gerencia',
                    email               ='$oEmpleado->email',
                    estado              =$oEmpleado->estado
            WHERE personaID             ='$oEmpleado->personaID'";

        return parent::Execute($query);
    }

    public static function  Update_Clave($personaID, $clave){
        //Update data to table
        $query = "
            UPDATE crm_empleado SET 
                    clave    = '$clave'
            WHERE personaID  = '$personaID'";

        return parent::Execute($query);
    }

    public static function  Delete($oEmpleado){
        $query = "
            DELETE FROM crm_empleado WHERE personaID='$oEmpleado->personaID'
            ";

        parent::Execute($query);
    }

    public static function  DesactivarTodos(){
        $query = "
            UPDATE crm_empleado SET 
                estado = 0
            ";

        parent::Execute($query);
    }
    
    public static function  Activar($dni){
        $query = "
            UPDATE crm_empleado SET 
                    fechaRegistro=NOW(), 
                    estado = 1
            WHERE dni='$dni' AND estado = 2";

        if(parent::Execute($query))
            return (parent::AffecctedRows()>0);
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