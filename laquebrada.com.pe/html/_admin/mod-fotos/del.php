<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$fot_id = $_GET['fot_id'];

	$sql = "DELETE FROM foto 
			WHERE fot_id =  $fot_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>