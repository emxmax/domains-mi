<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$user_id = $_GET['user_id'];

	$sql = "DELETE FROM usuario 
			WHERE user_id =  $user_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>