<?php
class Registro extends Conexion{
	function agregar($data=NULL){
		$nombre 		= $this->limpiacadena($data['nombre']);
		$apellidos 		= $this->limpiacadena($data['apellidos']);
		$telefono 			= $this->limpiacadena($data['telefono']);
		$correo          = $this->limpiacadena($data['correo']);
		$empresa          = $this->limpiacadena($data['empresa']);
		$ciudad          = $this->limpiacadena($data['ciudad']);
		$autoriza          = $this->limpiacadena($data['autoriza']);
		
		$fecha = date("Y-m-d H:m:s");

		$sql = "Insert into registro ";
		$sql.= "(nombres,apellidos,telefono,email,empresa,ciudad) ";
		$sql.= "Values ";
		$sql.= "('$nombre','$apellidos','$telefono','$correo','$empresa','$ciudad') ";
		//return $sql;
		return $this->insert_id($sql);
	}
}
?>