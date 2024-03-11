<?php
	include '../../util/conexion.php';
	$cn = db_connect();
	
	$no_id = $_GET['no_id'];

	$sql = "DELETE FROM noticia 
			WHERE no_id =  $no_id";

	if(mysql_query($sql, $cn)){
		header("Location:http://karlmaslo.pe/admin/");
	}
?>