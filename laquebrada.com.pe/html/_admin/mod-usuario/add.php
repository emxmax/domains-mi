<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$user_name = $_POST["user_name"];
	$user_nick = $_POST["user_nick"];
	$user_pass = $_POST["user_pass"];
	$nivel_id = $_POST["nivel_id"];

	if($user_name == "" || $user_nick == "" || $user_pass == ""){
		header("Location:nuevo.php?sw=3");
	}else{

		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO usuario (user_name,user_nick,user_pass,nivel_id)
				VALUES('$user_name','$user_nick','$user_pass','$nivel_id')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>