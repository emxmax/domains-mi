<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$anun_titulo = $_POST["anun_titulo"];
	$anun_desc = $_POST["anun_desc"];
	$anun_img = $_POST["anun_img"];
	$nivel_id = $_POST["nivel_id"];

	if($anun_titulo == "" || $anun_desc == ""){
		header("Location:nuevo.php?sw=3");
	}else{
		// Capturando la imagen
		$tmp_name_file = $_FILES["anun_img"]["tmp_name"];
		$name_file_img = $_FILES["anun_img"]["name"];
		$name_file_img = $name_file_img;
		
		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
		
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO anuncio (anun_titulo,anun_desc,anun_img,nivel_id)
				VALUES('$anun_titulo','$anun_desc','$name_file_img','$nivel_id')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>