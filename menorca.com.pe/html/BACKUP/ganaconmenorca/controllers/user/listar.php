<?php 
session_start();
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../models/propietario.php');

/*
	traer la informacion desde JSON
*/
$arrjson 		= "";
$data 			= json_decode(file_get_contents('php://input'), true);
$TAMANO_PAGINA 	= 1;
$pagina = 1;
$inicio = $pagina * $TAMANO_PAGINA;
$objPro = new Propietario();
$consulta = $objPro->listar($inicio,$TAMANO_PAGINA);
$item = count($consulta) - 1;
$cont = 1;
for ($i=0;$i<=$item;$i++){
	$data 		= $consulta[$i];
	$arrjson[$i]['id']			= $data['id'];
	$arrjson[$i]['item']		= $cont;
	$arrjson[$i]['name']		= $data['name'];
	$arrjson[$i]['phone']		= $data['telefono'];
	$arrjson[$i]['dni']			= $data['dni'];
	$arrjson[$i]['datecreate']	= $data['fecha_registro'];
	$cont++;
}
echo json_encode($arrjson);
?>