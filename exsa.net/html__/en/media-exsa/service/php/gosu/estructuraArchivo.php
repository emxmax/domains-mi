<?php 
	require_once("version.php");
	$link = $_GET["link"];
	$nombre = $_GET["nombre"];
	require_once('../config.php');
	require_once($link);
	$metodos_clase = get_class_methods($nombre);
	$array = array();
	if($metodos_clase == null){
		$metodos_clase = array();
	}
	foreach ($metodos_clase as $nombre_metodo) {
	    if(strpos($nombre_metodo,"_") === 0){
	    	continue;
	    }
	    $r = new ReflectionMethod($nombre, $nombre_metodo);

		$params = $r->getParameters();
		$metodo = new stdClass();
		$metodo->nombre = $nombre_metodo;
		$metodo->parametros = array();
		foreach ($params as $param) {
		    $metodo->parametros[] = $param->getName();
		}
		$array[] = $metodo;
	}
	echo json_encode($array);
 ?>