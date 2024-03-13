<?php
	session_start();
	include "util/url.php";
	include "util/query.php";
	include "util/funciones.php";
	$cn = db_connect();
	$user_id = $_POST["id_usuario"];
	$user_name = $_POST["nnombres"];
	$user_apellido = $_POST["napellidos"];
	$user_celular = $_POST["ncelular"];
	$user_tlfijo = $_POST["nfijo"];
	$user_email = $_POST["nemail"];
	$user_direccion = $_POST["ndireccion"];
	$user_direccion1 = $_POST["ndireccion1"];
	$user_direccion2 = $_POST["ndireccion2"];
	$user_referencia = $_POST["nreferencia"];
	$user_fnacimiento = $_POST["ncumpleanos"];

	// echo $user_direccion;
	// echo $user_direccion1;
	// echo $user_direccion2;

	if ($user_fnacimiento!='') {
		$date = DateTime::createFromFormat('d/m/Y', $_POST["ncumpleanos"]);
		$user_fnacimiento = $date->format('Y-m-d');
	}else{
		$user_fnacimiento = '';
	}

	//echo utf8_encode($fila['pro_name']);

	// $date = DateTime::createFromFormat('d/m/Y', $_POST["ncumpleanos"]);
	// $user_fnacimiento = $date->format('Y-m-d');

	$sql= "update usuario set user_name='$user_name' , user_apellido='$user_apellido', user_celular='$user_celular', user_tlfijo='$user_tlfijo', user_email='$user_email', user_direccion='$user_direccion', user_direccion1 = '$user_direccion1', user_direccion2 = '$user_direccion2', user_referencia='$user_referencia', user_fnacimiento='$user_fnacimiento' where user_id=$user_id";

	$resultado = mysql_query($sql);
	if(isset($resultado)){echo "exito";}else{echo "error";}?>