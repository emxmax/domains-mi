<?php
class Boletin extends Conexion{
	function SaveForm($email){
		$date = date("Y-m-d H:m:s");
		$sql = "Insert into boletin (email,date_created) ";
		$sql.= "Values ('$email','$date')";
		//echo "<br />".$sql;
		return $this->insert_newid_sql($sql);
	}
	function listado(){
		$sql = "Select * From boletin";
		return $this->Sqlfetch_assoc($sql);
	}
}
?>