<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$vid_id = $_GET['vid_id'];

	$sql = "DELETE FROM video 
			WHERE vid_id =  $vid_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>