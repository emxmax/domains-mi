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
$TAMANO_PAGINA 	= 1;
$pagina = 1;
$inicio = $pagina * $TAMANO_PAGINA;
$objPro = new Propietario();
$consulta = $objPro->listarreferido($codigo,$inicio,$TAMANO_PAGINA);
$item = count($consulta) - 1;
$cont = 1;
for ($i=0;$i<=$item;$i++){
	$data 		= $consulta[$i];
	$arrjson[$i]['id']		= $data['id'];
	$arrjson[$i]['item']	= $cont;
	$arrjson[$i]['name']	= $data['name'];
	$arrjson[$i]['address']	= $data['direccion'];
	$arrjson[$i]['email']	= $data['email'];
	$arrjson[$i]['phone']	= $data['phone'];
	$cont++;
}
echo json_encode($arrjson);
?>