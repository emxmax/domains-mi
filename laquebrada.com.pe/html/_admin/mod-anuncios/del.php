<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$anun_id = $_GET['anun_id'];

	$sql = "DELETE FROM anuncio 
			WHERE anun_id =  $anun_id";

	if(mysql_query($sql, $cn)){
		header("Location:../index.php");
	}
?>