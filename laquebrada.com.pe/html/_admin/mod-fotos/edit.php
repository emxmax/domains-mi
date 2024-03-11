<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$fot_id = $_POST["fot_id"]; 
	$fot_name = $_POST["fot_name"];
	$fot_img = $_POST["fot_img"];

	
	if($fot_img != ""){
		// Capturando la imagen
		$tmp_name_file = $_FILES["fImg"]["tmp_name"];
		$name_file_img = $_FILES["fImg"]["name"];
		$name_file_img = $name_file_img;
		$name_file_img = $fot_img;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
	}

	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE foto SET 
				fot_name = '$fot_name',
				fot_img = '$fot_img' 				
			WHERE fot_id = $fot_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?fot_id=" . $fot_id . "&sw=1");
	}else{
		header("Location:editar.php?fot_id=". $fot_id . "&sw=2");
	}
	
?>