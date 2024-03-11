<?php 
error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Cache-Control: no-cache, must-revalidate");
require_once('php/config.php');
require_once("php/services/Service.php");


$service = new Service();

$texto = $_GET["data"];
$datos = $_POST["datos"];


$datos = str_replace("\\", "", $datos);
$ndato = json_encode($datos);
$ndato=json_decode($ndato);




$texto = str_replace("\\", "", $texto);
$dato = json_decode($texto);
$funcion = $dato->f;





	$ar[0] = json_encode($ndato);
	$res = call_user_func_array(array($service,$funcion),$ar);
	$texto = json_encode($res);
	
	echo $texto;	


	
?>