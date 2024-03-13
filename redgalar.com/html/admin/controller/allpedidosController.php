<?php 
if($_SESSION["ses_perfil"]){
	require_once("model/pedidosModel.php");
	if($_SESSION["ses_perfil"]=="Administrador"){
		$prores = new Pedidos();
		$pedidos = $prores->allpedidos();
		
		require_once("view/allpedidos.php");
	}
	else{
		$prores = new Pedidos();
		$pedidos = $prores->allpedidos();
		require_once("view/cpedidos.php");
	}
}
else{
	require_once("view/error.php");
}
?>