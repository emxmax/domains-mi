<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$fgal_id = $_GET['fgal_id'];

	$sql = "DELETE FROM foto_galeria 
			WHERE fgal_id =  $fgal_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>