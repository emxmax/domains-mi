<?php
class Multimedia extends Conexion{
	function dameListado($page=NULL,$filtro=NULL,$inicio=NULL,$TAMANO_PAGINA=NULL){
		$page = $this->limpiacadena($page);
		$filtro = $this->limpiacadena($filtro);

		$sql = "Select * ";
		$sql.= "From tmu_multimedia ";
		$sql.= "Where tmu_borrado = 1 ";
		$sql.= "Order by tmu_id DESC ";
		//$sql.= "Order by art_estado DESC, art_destacado DESC, art_order ASC, art_fechacreacion DESC ";
		if ($TAMANO_PAGINA > 0)
			$sql.= "LIMIT ".$inicio."," . $TAMANO_PAGINA;
		return $this->Sqlfetch_assoc($sql);	
	}
	function dameDetalle($codigo=NULL){
		$page = $this->limpiacadena($codigo);

		$sql = "Select * ";
		$sql.= "From tmu_multimedia ";
		$sql.= "Where tmu_id = ".$codigo;
		return $this->Sqlfetch_assoc($sql);	
	}
	function prodeceAregar($data=NULL){
		$loguedo    = $_SESSION['COD_USER'];
		$archivo 	= $this->limpiacadena($data['file_portada']);
		
		$fecha = date("Y-m-d H:m:s");

		$sql = "Insert into tmu_multimedia ";
		$sql.= "(tus_usu_id, tmu_archivo, tmu_borrado, ";
		$sql.= "tmu_fechacreacion, tmu_fechamodificacion ) ";
		$sql.= "Values ";
		$sql.= "('$loguedo','$archivo',1, ";
		$sql.= "'$fecha','$fecha' ) ";
		//return $sql;
		return $this->insert_id($sql);
	}
	function hacerActualizacion($data=NULL){
		$loguedo    = $_SESSION['COD_USER'];
		$codigo 	= $this->limpiacadena($data['codigo']);
		$archivo 	= $this->limpiacadena($data['file_portada']);

		$fecha = date("Y-m-d H:m:s");

		$sql = "UPDATE tmu_multimedia ";
		$sql.= "SET tus_usu_id = ".$loguedo.", ";
		if (!empty($archivo))
			$sql.= "tmu_archivo = '".$archivo."', ";

		$sql.= "tmu_fechamodificacion = '".$fecha."' ";
		$sql.= "WHERE tmu_id = ".$codigo ;
		return $this->update_sql($sql);
	}
	function eliminar($arrjson){
		$id = $this->limpiacadena($arrjson['codigo']);
		$fecha = date("Y-m-d H:m:s");
		$sql = "UPDATE tmu_multimedia ";
		$sql.= "SET tmu_borrado = 0, ";
		$sql.= "tmu_fechamodificacion = '".$fecha."' ";
		$sql.= "WHERE tmu_id = ".$id ;

		return $this->update_sql($sql);	
	}
	
}
?>