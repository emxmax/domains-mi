<?php
require_once("base/Database.php");

class CrmEmpleado extends Database
{

	public static function  getWebItem($personaID){
		$query = "SELECT *
				FROM crm_empleado
				WHERE personaID='$personaID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  Buscar($criterio){
		$query = "SELECT *
				FROM crm_empleado
				WHERE CONCAT(nombres,' ',apellido1, ' ', apellido2) LIKE '%".str_replace(" ", "%", $criterio)."%'
				LIMIT 0, 20";
		return parent::GetCollection(parent::GetResult($query));
	}
 
	public static function  getItem_Login($dni, $clave){
		$query = "SELECT *
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
			$query .= " WHERE nombres LIKE '%$criterio%' OR apellido1 LIKE '%$criterio%' OR apellido2 LIKE '%$criterio%' OR dni LIKE '%$criterio%'";
		}
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getList_ReporteUsuario($criterio, $gerencia){
		$query = "SELECT e.personaID, e.dni, e.apellido1, e.apellido2, e.nombres, e.gerencia, 
			(SELECT COUNT(origenID) FROM crm_postit WHERE origenID=e.personaID) AS enviados, 
			(SELECT COUNT(destinoID) FROM crm_postit WHERE destinoID=e.personaID) AS recibidos 
		FROM crm_empleado AS e 
		";
		if($criterio!=""){
			$criterio = str_replace(" ", "%", $criterio);
			$query .= "
			WHERE e.nombres LIKE '%$criterio%' OR e.apellido1 LIKE '%$criterio%' 
			OR e.apellido2 LIKE '%$criterio%' OR e.dni LIKE '%$criterio%'";
		}
		if($gerencia!=""){
			$query .= ($criterio!="") ? " AND ": " WHERE ";
			$query .= " e.gerencia ='$gerencia'
			";
		}
		
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getList_ReporteArea($criterio){
		$query = "	SELECT e.gerencia, SUM(IFNULL(o.enviados,0)) AS enviados, SUM(IFNULL(d.recibidos,0)) AS recibidos
				FROM crm_empleado AS e
				LEFT JOIN
				(SELECT origenID, COUNT(origenID) AS enviados FROM crm_postit GROUP BY origenID)  AS o
					ON e.personaID=o.origenID
				LEFT JOIN
				(SELECT destinoID, COUNT(destinoID) AS recibidos FROM crm_postit GROUP BY destinoID) AS d 
					ON e.personaID=d.destinoID
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
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getItem($personaID){
		$query = "SELECT * FROM crm_empleado WHERE personaID='$personaID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getWebItem_dni($dni){
		$query = "SELECT *
				FROM crm_empleado
				WHERE dni='$dni'";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oEmpleado){
		//Search the max Id
		$query = "SELECT MAX(personaID) FROM crm_empleado";
		$result = parent::GetResult($query);
		$oEmpleado->personaID = parent::fetchScalar($result)+1;
		//Insert data to table
		$query = "INSERT INTO crm_empleado(personaID, nombres, apellido1, apellido2, dni, clave, fechaNacimiento, posicion, unidadOrganizativa, gerencia, email, estado)
				VALUES('$oEmpleado->personaID', '$oEmpleado->nombres', '$oEmpleado->apellido1', '$oEmpleado->apellido2', '$oEmpleado->dni', '$oEmpleado->clave', '$oEmpleado->fechaNacimiento', '$oEmpleado->posicion', '$oEmpleado->unidadOrganizativa', '$oEmpleado->gerencia', '$oEmpleado->email', '$oEmpleado->estado')";

		return parent::Execute($query);
	}

	public static function  Update($oEmpleado){
		//Update data to table
		$query = "UPDATE crm_empleado SET 
				dni				='$oEmpleado->dni', 
				clave			='$oEmpleado->clave', 
				nombres			='$oEmpleado->nombres', 
				apellido1		='$oEmpleado->apellido1', 
				apellido2		='$oEmpleado->apellido2', 
				fechaNacimiento	='$oEmpleado->fechaNacimiento',
				posicion		='$oEmpleado->posicion',
				unidadOrganizativa		='$oEmpleado->unidadOrganizativa',
				gerencia		='$oEmpleado->gerencia',
				email			='$oEmpleado->email', 
				estado			=$oEmpleado->estado
			WHERE personaID		='$oEmpleado->personaID'";
		return parent::Execute($query);
	}
	
	public static function  Delete($oEmpleado){
		$query = "DELETE FROM crm_empleado WHERE personaID='$oEmpleado->personaID'";
		parent::Execute($query);
	}
	
	public static function  Activar($dni){
		$query = "UPDATE crm_empleado SET 
				fechaRegistro=NOW(), 
				estado		=1
			WHERE dni='$dni' AND estado=2";
		if(parent::Execute($query)){
			return (parent::AffecctedRows()>0);
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