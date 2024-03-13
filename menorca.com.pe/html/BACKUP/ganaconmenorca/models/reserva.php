<?php
class Reserva extends Conexion{
	function SaveForm($nombre ,$email,$telefono,$tipousuario,$mensaje,$fecha){
		$date = date("Y-m-d H:m:s");
		$sql = "Insert into reserva (nombre,email,telefono,fecha,invitado,mensaje,date_created) ";
		$sql.= "Values ('$nombre','$email','$telefono','$fecha',$tipousuario,'$mensaje','$date')";
		echo "<br />".$sql;
		return $this->insert_newid_sql($sql);
	}
	function listado(){
		$sql = "Select * From reserva Order By fecha ASC";
		return $this->Sqlfetch_assoc($sql);
	}
}
?>