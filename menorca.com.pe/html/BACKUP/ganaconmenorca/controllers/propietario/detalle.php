<?php 
session_start();
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../models/propietario.php');

/*
	traer la informacion desde JSON
*/
$arrjson 		= "";
$valJson 		= json_decode(file_get_contents('php://input'), true);
$codigo 		= $valJson['cod'];
$objPro 		= new Propietario();
$consulta 		= $objPro->detalle($codigo);
$data 			= $consulta[0];
$arrjson['id']			= $data['id'];
$arrjson['name']		= $data['name'];
$arrjson['phone']		= $data['telefono'];
$arrjson['dni']			= $data['dni'];
$arrjson['datecreate']	= $data['fecha_registro'];
echo json_encode($arrjson);
?>