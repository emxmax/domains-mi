<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../models/usuario.php');
/*
	traer la informacion desde JSON
*/
$arrjson 			= "";
$sql 				= "";
$arrjson['sql'] 	= "";
$data 				= json_decode(file_get_contents('php://input'), true);
$codigo 			= $data['cod'];
$form 		= $data['data'];
$name 		= $form['name'];
$lastname 	= $form['lastname'];
$email 		= $form['email'];
$phone 		= $form['phone'];
$movil 		= $form['movil'];
$pass 		= $form['pass'];
$objuser = new Usuario();
$arrjson['sql'] = $objuser->UpdateForm($codigo,$name,$lastname,$email,$phone,$movil,$pass);
/*
	fin de procesar data
*/
echo json_encode($arrjson);
?>