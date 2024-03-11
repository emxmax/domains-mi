<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$anun_id = $_POST["anun_id"]; 
	$anun_titulo = $_POST["anun_titulo"];
	$anun_desc = $_POST["anun_desc"];
	$anun_img = $_POST["anun_img"];
	$nivel_id = $_POST["nivel_id"];

	
	if($anun_img != ""){
		// Capturando la imagen
		$tmp_name_file = $_FILES["fImg"]["tmp_name"];
		$name_file_img = $_FILES["fImg"]["name"];
		$name_file_img = $name_file_img;
		$name_file_img = $anun_img;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
	}
	
	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE anuncio SET 
				anun_titulo = '$anun_titulo',
				anun_desc = '$anun_desc',
				anun_img = '$anun_img',
				nivel_id = '$nivel_id'				
			WHERE anun_id = $anun_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?anun_id=" . $anun_id . "&sw=1");
	}else{
		header("Location:editar.php?anun_id=". $anun_id . "&sw=2");
	}
	
?>