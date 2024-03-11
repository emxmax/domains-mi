<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$user_id = $_POST["user_id"]; 
	$user_name = $_POST["user_name"];
	$user_nick = $_POST["user_nick"];
	$user_pass = $_POST["user_pass"];
	$nivel_id = $_POST["nivel_id"];
	
	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE usuario SET 
				user_name = '$user_name',
				user_nick = '$user_nick',
				user_pass = '$user_pass',
				nivel_id = '$nivel_id' 			
			WHERE user_id = $user_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?user_id=" . $user_id . "&sw=1");
	}else{
		header("Location:editar.php?user_id=". $user_id . "&sw=2");
	}
	
?>