<?php
	include '../incdes/fns_db.php';
	$cn = db_connect();
	
	$doc_id = $_POST["doc_id"]; 
	$doc_name = $_POST["doc_name"];
	$doc_img = $_POST["doc_img"];
	$doc_arch = $_POST["doc_arch"];
	$nivel_id = $_POST["nivel_id"];

	
	if($doc_img != ""){
		// Capturando la imagen
		$tmp_name_file = $_FILES["fImg"]["tmp_name"];
		$name_file_img = $_FILES["fImg"]["name"];
		$name_file_img = $name_file_img;
		$name_file_img = $doc_img;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file,"img/$name_file_img");
	}

	if($doc_arch != ""){
		// Capturando la imagen
		$tmp_name_file2 = $_FILES["fArch"]["tmp_name"];
		$name_file_arch = $_FILES["fArch"]["name"];
		$name_file_arch = $name_file_arch;
		$name_file_arch = $doc_arch;

		// Moviendo la imagen a un directorio
		move_uploaded_file($tmp_name_file2,"archivo/$name_file_arch");
	}
	
	//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
	
	// ACTUALIZAR
	$sql = "UPDATE documento SET 
				doc_name = '$doc_name',
				doc_img = '$doc_img',
				doc_arch = '$doc_arch',
				nivel_id = '$nivel_id'				
			WHERE doc_id = $doc_id";

	if(mysql_query($sql, $cn)){
		header("Location:editar.php?doc_id=" . $doc_id . "&sw=1");
	}else{
		header("Location:editar.php?doc_id=". $doc_id . "&sw=2");
	}
	
?>