<?php
if($_SESSION["ses_perfil"]){

	require_once("model/productoModel.php");
	
	if(isset($_POST["acc"]) and $_POST["acc"]== 3){
		$prores = new Producto();
		$d = $prores->deleteproducto();
	}
	else if(isset($_POST["acc"]) and $_POST["acc"]== 2){
		$prores = new Producto();
		$u = $prores->updateproducto();
	}
	else if(isset($_POST["acc"]) and $_POST["acc"]== 4){
		$prores = new Producto();
		$u = $prores->editproducto();
	}
	else if(isset($_GET["id"]) and !isset($_POST["acc"])){
		require_once("model/usuarioModel.php");
		$prores = new Usuario();
		$empresa = $prores->listusuario();
		
		$prores = new Producto();
		$catg = $prores->listcategorias();
		
		$prores = new Producto();
		//cundo es administrador
		if($_SESSION["ses_perfil"]=="Administrador"){
			$producto = $prores->idproducto();
		}
		else if($_SESSION["ses_perfil"]=="Cliente"){
			$producto = $prores->idproductoId();
		}
		if($producto != ""){
			require_once("view/verproducto.php");
		}
		else{
			require_once("view/error.php");
		}
	}
	else{
		$prores = new Producto();
		if($_SESSION["ses_perfil"]=="Administrador"){
			$productos = $prores->listproductos();
		}
		else{
			$productos = $prores->listproductosId();
		}
		require_once("view/productos.php");
	}
}
else{
	require_once("view/error.php");
}
?>