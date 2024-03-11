<?php
	include '../../util/conexion.php';
	$cn = db_connect();
	
	$ka_id = $_POST["ka_id"]; 
	$ka_titulo = $_POST["ka_titulo"];
	$ka_img = $_POST["ka_img"];
	$ka_desc = $_POST["ka_desc"];
	
	if($_FILES['fgal_img']['tmp_name']!==""){
		// Capturando la imagen
		$tmp_name_file = $_FILES["fgal_img"]["tmp_name"];
		$name_file_img = $_FILES["fgal_img"]["name"];
		$ka_img = $name_file_img;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
	}
	
	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE biografia SET 
				ka_titulo = '$ka_titulo',
				ka_img = '$ka_img',
				ka_desc = '$ka_desc'  				
			WHERE ka_id = $ka_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php?sw=1");
	}else{
		header("Location:index.php?sw=2");
	}
	
?>