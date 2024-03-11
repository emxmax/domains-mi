<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$anex_id = $_GET['anex_id'];

	$sql = "DELETE FROM anexo 
			WHERE anex_id =  $anex_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>