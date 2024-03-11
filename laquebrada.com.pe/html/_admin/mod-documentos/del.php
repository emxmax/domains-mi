<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$doc_id = $_GET['doc_id'];

	$sql = "DELETE FROM documento 
			WHERE doc_id =  $doc_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>