<?php 

date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../config/conexion.php');
include('../models/usuario.php');

$objuser = new Usuario();
/*
	traer la informacion desde JSON
*/
$arrjson = "";
$data = json_decode(file_get_contents('php://input'), true);
$user = $data['username'];
$pass = $data['password'];
$datauser = $objuser->BuscarUsuario($user, $pass);

//if (1 == 1) {
if (count($datauser) == 1) {
	$arrjson['message'] = "Tus datos son correctos";
	$arrjson['success'] = true;
	$arrjson['usercod'] = $datauser[0]['id'];
	$arrjson['nameuser'] = $datauser[0]['first_name']." ".$datauser[0]['last_name'];
	$arrjson['firstname'] = $datauser[0]['first_name'];
	$arrjson['codperfil'] = $datauser[0]['id_profile'];
	if ($datauser[0]['id_profile'] == 1)
		$arrjson['miperfil'] = "Administrador";
}else{
	$arrjson['message'] = "Datos no son correctos";
	$arrjson['success'] = false;
	$arrjson['usercod'] = -1;
	$arrjson['nameuser'] = "";
}
echo json_encode($arrjson);
?>