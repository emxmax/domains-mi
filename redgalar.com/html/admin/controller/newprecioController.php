<?php
if($_SESSION["ses_perfil"]){
	require_once("model/precioModel.php");
	if($_POST["acc"] == 1){
		$prores = new Precio();
		$producto = $prores->newprecio();
	}
	else{
		//require_once("view/error.php");
		echo "precioo";
	print_r($_POST["acc"]);
	}
}
else{
	require_once("view/error.php");
}
?>