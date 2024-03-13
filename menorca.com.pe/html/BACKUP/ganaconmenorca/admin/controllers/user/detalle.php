<?php 
session_start();
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../models/usuario.php');

/*
	traer la informacion desde JSON
*/
$arrjson 		= "";
$valJson 		= json_decode(file_get_contents('php://input'), true);
$codigo 		= $valJson['cod'];
$objUser 		= new Usuario();
$consulta 		= $objUser->InfoUser($codigo);
$data 			= $consulta[0];

$arrjson['name'] 	= $consulta[0]['first_name']; 	
$arrjson['lastname'] 	= $consulta[0]['last_name'];
$arrjson['email'] 	= $consulta[0]['email'];
$arrjson['phone'] 	= $consulta[0]['phone'];
$arrjson['movil'] 	= $consulta[0]['movil'];
$arrjson['pass'] 	= $consulta[0]['password']; 	
$arrjson['myuser'] 	= $consulta[0]['username'];
echo json_encode($arrjson);
?>