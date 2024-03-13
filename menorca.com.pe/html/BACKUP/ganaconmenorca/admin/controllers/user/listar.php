<?php 
session_start();
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../models/usuario.php');

/*
	traer la informacion desde JSON
*/
$arrjson 		= "";
$data 			= json_decode(file_get_contents('php://input'), true);
$TAMANO_PAGINA 	= 1;
$pagina = 1;
$inicio = $pagina * $TAMANO_PAGINA;
$objUser = new Usuario();
$consulta = $objUser->listar($inicio,$TAMANO_PAGINA);
$item = count($consulta) - 1;
$cont = 1;
for ($i=0;$i<=$item;$i++){
	$data 		= $consulta[$i];
	$arrjson[$i]['id']			= $data['id'];
	$arrjson[$i]['item']		= $cont;
	$arrjson[$i]['name']		= $data['first_name'];
	$arrjson[$i]['lastname']	= $data['last_name'];
	$arrjson[$i]['username']	= $data['username'];
	$arrjson[$i]['active']		= $data['active'];
	$arrjson[$i]['movil']		= $data['movil'];
	$arrjson[$i]['email']		= $data['email'];
	$arrjson[$i]['datecreate']	= $data['creation_date'];
	$cont++;
}
echo json_encode($arrjson);
?>