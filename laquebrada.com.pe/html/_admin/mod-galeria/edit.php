<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$gal_id = $_POST["gal_id"]; 
	$gal_titulo = $_POST["gal_titulo"];
	$gal_desc = $_POST["gal_desc"];
	$gal_img = $_POST["gal_img"];

	
	if($gal_img != ""){
		// Capturando la imagen
		$tmp_name_file = $_FILES["fImg"]["tmp_name"];
		$name_file_img = $_FILES["fImg"]["name"];
		$name_file_img = $name_file_img;
		$name_file_img = $gal_img;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
	}
	
	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE galeria SET 
				gal_titulo = '$gal_titulo',
				gal_desc = '$gal_desc',
				gal_img = '$gal_img' 				
			WHERE gal_id = $gal_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?gal_id=" . $gal_id . "&sw=1");
	}else{
		header("Location:editar.php?gal_id=". $gal_id . "&sw=2");
	}
	
?>