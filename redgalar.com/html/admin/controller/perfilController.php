<?php
if(isset($_SESSION["ses_perfil"])){

	require_once("model/usuarioModel.php");
	
	if(isset($_POST["acc"]) and $_POST["acc"]== 2){
		$prores = new Usuario();
		$u = $prores->updateperfil();
	}
	else{
		$prores = new Usuario();
		$usuario = $prores->idperfil();
		require_once("view/perfil.php");
	}
}
else{
	require_once("view/error.php");
}
?>