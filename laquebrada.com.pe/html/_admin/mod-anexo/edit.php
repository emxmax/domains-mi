<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$anex_id = $_POST["anex_id"]; 
	$anex_name = $_POST["anex_name"];
	$anex_titulo = $_POST["anex_titulo"];
	$anex_arch = $_POST["anex_arch"];
	$anex_arch_n = $_POST["fArch"];
	$tarch_id = $_POST["tarch_id"];
	$doc_id = $_POST["doc_id"];
	
	if($_FILES["fArch"]["name"] !== ""){
		// Capturando la imagen
		$tmp_name_file = $_FILES["fArch"]["tmp_name"];
		$name_file_arch = $_FILES["fArch"]["name"];
		$anex_arch = $name_file_arch;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"archivo/$name_file_arch");
	}
	
	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE anexo SET 
				anex_name = '$anex_name',
				anex_titulo = '$anex_titulo',
				anex_arch = '$anex_arch',
				tarch_id = '$tarch_id'				
			WHERE anex_id = $anex_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?anex_id=" . $anex_id . "&sw=1");
	}else{
		header("Location:editar.php?anex_id=". $anex_id . "&sw=2");
	}
	
?>