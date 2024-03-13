<?php
if($_SESSION["ses_perfil"]){
	require_once("model/productoModel.php");
	
	if($_POST["acc"] == 1){
		$prores = new Producto();
		$producto = $prores->newproducto();
	}
	else{
		require_once("model/usuarioModel.php");
		$prores = new Usuario();
		$empresa = $prores->listusuario();
		
		$prores = new Producto();
		$catg = $prores->listcategorias();
		
		require_once("view/newproducto.php");
	}
}
else{
	require_once("view/error.php");
}
?>