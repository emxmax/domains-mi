<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$fot_name = $_POST["fot_name"];
	$fot_img = $_POST["fot_img"];

	if($fot_name == ""){
		header("Location:nuevo.php?sw=3");
	}else{
		// Capturando la imagen
		$tmp_name_file = $_FILES["fot_img"]["tmp_name"];
		$name_file_img = $_FILES["fot_img"]["name"];
		$name_file_img = $name_file_img;
		
		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
		
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO foto (fot_name,fot_img)
				VALUES('$fot_name','$name_file_img')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>