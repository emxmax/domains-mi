<?php 
	//error_reporting(E_WARNING );
	require_once("version.php");
	$link = $_GET["link"];
	$nombre = $_GET["nombre"];
	$funcion = $_GET["funcion"];
	$parametros = $_GET["parametros"];
	$parametros = str_replace('\\"', '"', $parametros);
	$parametros = json_decode($parametros);
	require_once('../config.php');
	require_once($link);
	$conexion = new $nombre;
	$res = call_user_func_array( array($conexion, $funcion),$parametros);
	$res = json_encode($res);
	echo $res;
 ?>