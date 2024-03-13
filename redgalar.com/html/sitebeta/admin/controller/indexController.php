<?php
if(isset($_SESSION["ses_perfil"])){
	//$menuperfil = "miperfil";
	require_once("view/index.php");
}
else{
	$_SESSION["ses_perfil"]=="Administrador";
	require_once("view/error.php");
}
?>