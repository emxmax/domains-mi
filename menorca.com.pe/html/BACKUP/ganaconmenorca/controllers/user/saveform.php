<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../models/diagnostico.php');
/*
	traer la informacion desde JSON
*/
$arrjson 			= "";
$sql 				= "";
$arrjson['sql'] 	= "";
$data 				= json_decode(file_get_contents('php://input'), true);
$formId 			= $data['formId']; ## indicamos en que formulario estamos
$arrjson['nextForm']= $data['nextForm']; 
$user 				= $data['user'];
$item 				= count($data['data']) - 1;
$arrjson['link']    = $data['link'];
for ($i=0; $i <= $item ; $i++){
	$form 		= $data['data'];
	$rsta 		= $form[$i]['model'];
	$pregId 	= $form[$i]['id'];
	$pregTipo 	= $form[$i]['tipo'];
	$diag = new Diagnostico();
	$arrjson['sql'].= $diag->SaveForm($user,$pregId,$rsta,$pregTipo);
}
/*
	fin de procesar data
*/
echo json_encode($arrjson);
?>