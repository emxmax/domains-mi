<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$fgal_img = $_POST["fgal_img"];
	$gal_id = $_POST["gal_id"];

	if($gal_id == ""){
		header("Location:nuevo.php?sw=3");
	}else{
		// Capturando la imagen
		$tmp_name_file = $_FILES["fgal_img"]["tmp_name"];
		$name_file_img = $_FILES["fgal_img"]["name"];
		$name_file_img = $name_file_img;
		
		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
		
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO foto_galeria (fgal_img,gal_id)
				VALUES('$name_file_img','$gal_id')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>