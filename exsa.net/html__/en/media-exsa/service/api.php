<?php 
error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-Type: text/javascript; charset=UTF-8");
header('P3P: CP="CAO PSA OUR"');
header("Cache-Control: no-cache, must-revalidate");
ini_set('max_execution_time', 0);


require_once('php/config.php');
require_once("php/services/Service.php");


$service = new Service();
$texto = $_GET["data"];


$texto = str_replace("\\", "", $texto);
$dato = json_decode($texto);

//echo  $dato;

$funcion = $dato->f;
$ar = $dato->a;
$obj = $dato->o;


//echo $texto;

if($ar!=""){
	$res = call_user_func_array(array($service,$funcion),$ar);
	$texto = json_encode($res);
	
	echo $texto;

}else if ($obj!=""){

	$ar[0] = json_encode($obj);
	$res = call_user_func_array(array($service,$funcion),$ar);
	$texto = json_encode($res);
	
	echo $texto;	
}

	


?>