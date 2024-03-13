<?php
class Propietario extends Conexion{
	function InsertReferido($idpropietario, $direccion,$nombre,$telefono,$email){
		$direccion = $this->limpiacadena($direccion);
		$nombre = $this->limpiacadena($nombre);

		$sql = "Insert into referido (propietario_id,name,direccion,email,phone) ";
		$sql.= "Values ($idpropietario,'$nombre','$direccion','$email','$telefono')";
		return $this->insert_newid_sql($sql);
	}
	function InsertPropietario($propietario,$telefono,$dni){
		$propietario = $this->limpiacadena($propietario);
		$date = date("Y-m-d H:m:s");
		$sql = "Insert into propietario (name,telefono,dni,fecha_registro) ";
		$sql.= "Values ('$propietario','$telefono','$dni','$date')";
		return $this->insert_newid_sql($sql);
	}
	function listar($inicio=NULL, $tamano=NULL){
		if ($inicio==$tamano){
			$sql = "select * ";
			$sql.= "From propietario ";
		}else{
			$sql = "select * ";
			$sql.= "From propietario ";
		}
		
		return $this->Sqlfetch_assoc($sql);	
	}
	function detalle($id=NULL){
		$sql = "select * ";
		$sql.= "From propietario ";
		$sql.= "Where id = $id ";
		return $this->Sqlfetch_assoc($sql);
	}
	function listarreferido($id=NULL, $inicio=NULL, $tamano=NULL){
		if ($inicio==$tamano){
			$sql = "select * , (Select name From propietario Where id = propietario_id) as propietario ";
			$sql.= "From referido ";
			$sql.= "Where propietario_id = $id ";
		}else{
			$sql = "select * , (Select name From propietario Where id = propietario_id) as propietario ";
			$sql.= "From referido ";
			$sql.= "Where propietario_id = $id ";	
		}
		return $this->Sqlfetch_assoc($sql);
	}
	function listarreferidoAll(){
		$sql = "select *, (Select name From propietario Where id = propietario_id) as propietario ";
		$sql.= "From referido ";
		return $this->Sqlfetch_assoc($sql);
	}
}
?>