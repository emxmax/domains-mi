<?php
if($_SESSION["ses_id"]){
	require_once("model/precioModel.php");
	if($_SESSION["ses_perfil"]=="Administrador"){
		if(isset($_POST["acc"]) and $_POST["acc"]== 4){
			$prores = new Pedidos();
			$estados = $prores->estados();
			require_once("view/modalestado.php");
		}
		else if(isset($_POST["acc"]) and $_POST["acc"]== 3){
			$prores = new Pedidos();
			$pedido = $prores->updatepepedido();
		}
		else if(isset($_GET["id"]) and !isset($_POST["acc"])){
			$prores = new Pedidos();
			$pedido = $prores->idpepedido();
			require_once("view/verpedido.php");
		}
		else{
			$prores = new Pedidos();
			$pedidos = $prores->mispedidos();
			
			$esta = new Pedidos();
			$estados = $esta->estados();
			require_once("view/pedidos.php");
		}
	}
	else{
		if(isset($_POST["acc"]) and $_POST["acc"]== 4){
			$prores = new Precio();
			$data = $prores->udateprecio();
			//require_once("view/modalestado.php");
		}
		else if(isset($_POST["acc"]) and $_POST["acc"]== 3){
			$prores = new Precio();
			$pedido = $prores->deleteprecio();
		}
		else if(isset($_GET["id"]) and !isset($_POST["acc"])){
			$prores = new Precio();
			$distritos = $prores->distritos();
			
			$prores = new Precio();
			$precios = $prores->getprecio();
			if($precios != ""){
				require_once("view/verprecios.php");
			}
			else{
				require_once("view/error.php");
			}
		}
		else{
			$prores = new Precio();
			$distritos = $prores->distritos();
			
			$prores = new Precio();
			$listprecio = $prores->listprecios();
			require_once("view/precios.php");
		}
	}
}
else{
	require_once("view/error.php");
}
?>