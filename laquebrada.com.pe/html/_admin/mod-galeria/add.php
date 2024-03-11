<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$gal_titulo = $_POST["gal_titulo"];
	$gal_desc = $_POST["gal_desc"];
	$gal_img = $_POST["gal_img"];

	if($gal_titulo == "" || $gal_desc == ""){
		header("Location:nuevo.php?sw=3");
	}else{
		// Capturando la imagen
		$tmp_name_file = $_FILES["gal_img"]["tmp_name"];
		$name_file_img = $_FILES["gal_img"]["name"];
		$name_file_img = $name_file_img;
		
		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
		
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO galeria (gal_titulo,gal_desc,gal_img)
				VALUES('$gal_titulo','$gal_desc','$name_file_img')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>