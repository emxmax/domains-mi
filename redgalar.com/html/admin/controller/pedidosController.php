<?php
if($_SESSION["ses_id"]){
	require_once("model/pedidosModel.php");
	if($_SESSION["ses_perfil"]=="Administrador"){
		if(isset($_POST["acc"]) and $_POST["acc"]== 4){
			$prores = new Pedidos();
			$estados = $prores->estados();
			require_once("view/modalestado.php");
		}
		else if(isset($_POST["acc"]) and $_POST["acc"]== 3){
			$prores = new Pedidos();
			$pedido = $prores->updatepepedido();
			//envio de mensajes
			if($_POST["e"] == 4){
				//$pedido = $prores->enviarMensaje();
				require_once("../emaildepositoc.php");
			}
		}
		else if(isset($_GET["id"]) and !isset($_POST["acc"])){
			$prores = new Pedidos();
			$pedido = $prores->idpepedido();
			$prores2 = new Pedidos();
			$datospedidos = $prores2->datospedidos($pedido["id_codigo"], $pedido["id_empresa"]);
			$prores3 = new Pedidos();
			$detalle = $prores3->detallepedido($pedido["id_codigo"]);
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
			$pedido = $prores->getpepedido();
			$prores2 = new Pedidos();
			$datospedidos = $prores2->datospedidos($pedido["id_codigo"], $pedido["id_empresa"]);
			$prores3 = new Pedidos();
			$detalle = $prores3->detallepedido($pedido["id_codigo"]);
			
			if($pedido != ""){
				require_once("view/verpedido.php");
			}
			else{
				require_once("view/error.php");
			}
		}
		else{
			
			$prores = new Pedidos();
			$pedidos = $prores->mispedidos();
			require_once("view/pedidos.php");
		}
	}
}
else{
	require_once("view/error.php");
}
?>