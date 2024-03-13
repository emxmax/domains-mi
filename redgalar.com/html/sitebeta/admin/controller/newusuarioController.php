<?php
if($_SESSION["ses_perfil"]=="Administrador"){
	
	if($_POST["acc"] == 1){
		require_once("model/usuarioModel.php");
		$prores = new Usuario();
		$pedidos = $prores->newusuario();
	}
	else{
		require_once("view/newusuario.php");
	}
}
else{
	require_once("view/error.php");
}
?>