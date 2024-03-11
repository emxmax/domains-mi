<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$gal_id = $_GET['gal_id'];

	$sql = "DELETE FROM galeria 
			WHERE gal_id =  $gal_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>