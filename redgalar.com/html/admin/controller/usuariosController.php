<?php
if($_SESSION["ses_perfil"]=="Administrador"){

	require_once("model/usuarioModel.php");
	
	if(isset($_POST["acc"]) and $_POST["acc"]== 3){
		$prores = new Usuario();
		$d = $prores->deleteusuario();
	}
	else if(isset($_POST["acc"]) and $_POST["acc"]== 2){
		$prores = new Usuario();
		$u = $prores->updateusuario();
	}
	else if(isset($_GET["id"]) and !isset($_POST["acc"])){
		$prores = new Usuario();
		$usuario = $prores->idusuario();
		require_once("view/verusuario.php");
	}
	else{
		$prores = new Usuario();
		$usuarios = $prores->listusuario();
		require_once("view/usuarios.php");
	}
}
else{
	require_once("view/error.php");
}
?>