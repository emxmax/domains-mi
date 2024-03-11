<?php
	
	include "../incdes/fns_db.php";
	$cn = db_connect();

	$anex_name = $_POST["anex_name"];
	$anex_titulo = $_POST["anex_titulo"];
	$anex_arch = $_POST["anex_arch"];
	$tarch_id = $_POST["tarch_id"];
	$doc_id = $_POST["doc_id"];

	if($anex_name == "" || $anex_titulo == ""){
		header("Location:nuevo.php?sw=3");
	}else{

		// Capturando el archivo
		$tmp_name_file2 = $_FILES["anex_arch"]["tmp_name"];
		$name_file_arch = $_FILES["anex_arch"]["name"];
		$name_file_arch = $name_file_arch;
		
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file2,"archivo/$name_file_arch");
		
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");

		// Registrar datos a la tabla
		$sql = "INSERT INTO anexo (anex_name,anex_titulo,anex_arch,tarch_id,doc_id)
				VALUES('$anex_name','$anex_titulo','$name_file_arch','$tarch_id', '$doc_id')";

		if(mysql_query($sql,$cn)){
			header("Location:nuevo.php?sw=1");
		}else{
			header("Location:nuevo.php?sw=2");
		}
	}
?>