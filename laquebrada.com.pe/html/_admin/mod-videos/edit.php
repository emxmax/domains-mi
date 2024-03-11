<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$vid_id = $_POST["vid_id"]; 
	$vid_name = $_POST["vid_name"];
	$vid_url = $_POST["vid_url"];

	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE video SET 
				vid_name = '$vid_name',
				vid_url = '$vid_url' 				
			WHERE vid_id = $vid_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?vid_id=" . $vid_id . "&sw=1");
	}else{
		header("Location:editar.php?vid_id=". $vid_id . "&sw=2");
	}
	
?>