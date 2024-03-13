<?php
	session_start();
	include "util/url.php";
	include "util/query.php";
	include "util/funciones.php";
	$cn = db_connect();
	$user_id = $_POST["id_usuario"];
	// $user_name = $_POST["nnombres"];
	// $user_apellido = $_POST["napellidos"];
	// $user_celular = $_POST["ncelular"];
	// $user_tlfijo = $_POST["nfijo"];
	// $user_email = $_POST["nemail"];
	// $user_direccion = $_POST["ndireccion"];
	// $user_referencia = $_POST["nreferencia"];
	
	// $date = DateTime::createFromFormat('d/m/Y', $_POST["ncumpleanos"]);
	// $user_fnacimiento = $date->format('Y-m-d');

	// $sql= "update usuario set user_name='$user_name' , user_apellido='$user_apellido', user_celular='$user_celular', user_tlfijo='$user_tlfijo', user_email='$user_email', user_direccion='$user_direccion', user_referencia='$user_referencia', user_fnacimiento='$user_fnacimiento' where user_id=$user_id";

	// $resultado = mysql_query($sql);

	// if(isset($resultado)){
		// echo "exito";
	// }
	// else{
		// echo "error";
	// }
	
	
	if($_FILES["fperfil"]["name"]!=""){
		// Capturando el archivo
		$tmp_name_file1 = $_FILES["fperfil"]["tmp_name"];
		$pe_fo_1 = generarCodigo(15).".jpg";
			
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file1,"fotos/$pe_fo_1");
		
		$sql= "update usuario set user_foto='$pe_fo_1', user_provider='1' where user_id=$user_id";
		$resultado = mysql_query($sql);

		if(isset($resultado)){
			echo "exito";
		}
		else{
			echo "error";
		}
	}else{
		echo  "error";
	}
?>