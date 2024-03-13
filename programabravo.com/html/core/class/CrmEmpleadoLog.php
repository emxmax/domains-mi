<?php
require_once("base/Database.php");

class CrmEmpleadoLog extends Database
{

	public static function  getItem($registroID){
		$query = "SELECT * FROM crm_empleado_log WHERE registroID='$registroID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($fechaInicio, $fechaFin){
		$query = "SELECT * FROM crm_empleado_log";
		if($fechaInicio!="" && $fechaFin!=""){
			$query .= " WHERE fechaRegistro BETWEEN '$fechaInicio' AND '$fechaFin'";
		}
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Paging($fechaInicio, $fechaFin){
		$query = "SELECT * FROM crm_empleado_log";
		if($fechaInicio!="" && $fechaFin!=""){
			$query .= " WHERE fechaRegistro BETWEEN '$fechaInicio' AND '$fechaFin'";
		}
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getContentList_Paging($schemeID, $langID){
		$query = "SELECT cl.contentID, cl.title AS contentTitle, COUNT(l.contentID) AS pageViews
			FROM crm_empleado_log AS l 
			RIGHT JOIN crm_empleado AS e 
				ON e.personaID=l.personaID 
			RIGHT JOIN cms_content_lang AS cl 
				ON l.contentID=cl.contentID AND cl.langID='$langID'
			LEFT JOIN cms_content AS c 
				ON c.contentID=l.contentID AND c.schemeID 
				IN (SELECT schemeID FROM cms_scheme WHERE sectionID='$schemeID')
			GROUP BY cl.contentID, cl.title
			";
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getContentAreaList_Paging($gerencia, $schemeID, $langID){
		$query = "SELECT cl.contentID, cl.title AS contentTitle, COUNT(l.contentID) AS pageViews
			FROM crm_empleado_log AS l 
			INNER JOIN crm_empleado AS e 
				ON e.personaID=l.personaID 
			INNER JOIN cms_content AS c 
				ON c.contentID=l.contentID AND c.schemeID 
				IN (SELECT schemeID FROM cms_scheme WHERE sectionID='$schemeID')
			INNER JOIN cms_content_lang AS cl 
				ON l.contentID=cl.contentID AND cl.langID='$langID'
			WHERE 
				e.gerencia='$gerencia'
			GROUP BY cl.contentID, cl.title
			";
		return parent::GetCollection(parent::GetResultPaging($query));
	}


	public static function  getList_ReporteUsuario($criterio, $gerencia, $contentID){
		$query = "SELECT e.personaID, e.dni, CONCAT(e.apellido1, ' ', e.apellido2, ' ', e.nombres) AS empleado, e.gerencia, COUNT(l.personaID) AS pageViews
		FROM crm_empleado AS e
		INNER JOIN crm_empleado_log AS l
			ON e.personaID=l.personaID
		WHERE 
			e.gerencia ='$gerencia' AND
			l.contentID='$contentID'
		";
		if($criterio!=""){
			$criterio = str_replace(" ", "%", $criterio);
			$query .= "
			AND (e.nombres LIKE '%$criterio%' OR e.apellido1 LIKE '%$criterio%' 
			OR e.apellido2 LIKE '%$criterio%' OR e.dni LIKE '%$criterio%'
			)";
		}
		$query.="
		GROUP BY
			e.personaID, e.dni, CONCAT(e.apellido1, ' ', e.apellido2, ' ', e.nombres), e.gerencia
		";

		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getAreaList_Paging($schemeID, $langID){
		$query = "SELECT e.gerencia, COUNT(c.contentID) AS pageViews
			FROM crm_empleado_log AS l
			RIGHT JOIN  crm_empleado AS e
				ON e.personaID=l.personaID
			LEFT JOIN cms_content_lang AS cl 
				ON l.contentID=cl.contentID AND cl.langID='$langID'
			LEFT JOIN cms_content AS c 
				ON c.contentID=l.contentID AND c.schemeID IN (SELECT schemeID FROM cms_scheme WHERE sectionID='$schemeID')
			GROUP BY e.gerencia
			";
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getMundoList_Paging($contentID, $gerencia=NULL){
		$query = "SELECT e.gerencia, COUNT(l.registroID) as pageViews 
			FROM crm_empleado_log AS l
			INNER JOIN crm_empleado AS e
				ON l.personaID=e.PersonaID
			WHERE l.contentID ='$contentID'
			";
		if($gerencia!=NULL){
		$query .= "
			AND e.gerencia='$gerencia'
			";
		}
		$query .= "
			GROUP BY gerencia
			";
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getEmpleadoList_Paging($contentID, $gerencia){
		$query = "SELECT l.personaID, CONCAT(e.nombres,' ', e.apellido1,' ', e.apellido2) AS empleado, COUNT(l.registroID) as pageViews 
			FROM crm_empleado_log AS l
			INNER JOIN crm_empleado AS e
				ON l.personaID=e.PersonaID
			WHERE l.contentID ='$contentID'
			GROUP BY l.personaID, empleado
			";
			//echo $query;
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  AddNew($oEmpleadoLog){
		//Insert data to table
		$query = "INSERT INTO crm_empleado_log(fechaRegistro, personaID, moduleID, contentID, observacion)
				VALUES(NOW(), '$oEmpleadoLog->personaID', '$oEmpleadoLog->moduleID', '$oEmpleadoLog->contentID', '$oEmpleadoLog->observacion')";

		return parent::Execute($query);
	}

	public static function  Delete($oEmpleadoLog){
		$query = "DELETE FROM crm_empleado_log WHERE registroID='$oEmpleadoLog->registroID'";
		parent::Execute($query);
	}
}

?>