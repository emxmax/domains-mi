<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$vid_name = $_POST["vid_name"];
	$vid_url = $_POST["vid_url"];

	if($vid_name == "" || $vid_url == ""){
		header("Location:nuevo.php?sw=3");
	}else{

		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO video (vid_name,vid_url)
				VALUES('$vid_name','$vid_url')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>