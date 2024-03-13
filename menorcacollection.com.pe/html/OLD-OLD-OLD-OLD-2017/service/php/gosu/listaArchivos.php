<?php
	require_once("version.php");
function getDirectorio($sitio){
	$directorio = opendir($sitio);
	$dato = new stdClass();
	$dato->arrayDirectorios = array();
	$dato->arrayArchivos = array();
	while ($archivo = readdir($directorio))
	{
		$pos = strpos($archivo,".");
		$link = $sitio.$archivo;
		
		if($pos === 0){
			continue;
		}
	    if ($pos === false && is_dir($link))
	    {

	    	$carpeta = getDirectorio($sitio.$archivo."/");
	    	$carpeta->nombre = $archivo;
	    	$dato->arrayDirectorios[] = $carpeta;
	    }
	    else
	    {
	    	$datoArchivo = new stdClass();
	    	$datoArchivo->nombre = $archivo;
	    	$datoArchivo->link = $link;
	    	$dato->arrayArchivos[] = $datoArchivo;       
	    }
	}
	return $dato;
}
$resultado = getDirectorio("../services/");
echo json_encode($resultado);
?>