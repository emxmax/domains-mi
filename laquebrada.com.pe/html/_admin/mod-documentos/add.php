<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$doc_name = $_POST["doc_name"];
	$doc_img = $_POST["doc_img"];
	$doc_arch = $_POST["doc_arch"];
	$nivel_id = $_POST["nivel_id"];

	if($doc_name == ""){
		header("Location:nuevo.php?sw=3");
	}else{
		// Capturando la imagen
		$tmp_name_file = $_FILES["doc_img"]["tmp_name"];
		$name_file_img = $_FILES["doc_img"]["name"];
		$name_file_img = $name_file_img;
		
		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");

		// Capturando el archivo
		$tmp_name_file2 = $_FILES["doc_arch"]["tmp_name"];
		$name_file_arch = $_FILES["doc_arch"]["name"];
		$name_file_arch = $name_file_arch;
		
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file2,"archivo/$name_file_arch");
		
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO documento (doc_name,doc_img,doc_arch,nivel_id)
				VALUES('$doc_name','$name_file_img','$name_file_arch','$nivel_id')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>