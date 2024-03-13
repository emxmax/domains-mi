<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../admin/config/conexion.php');
include('../../admin/models/propietario.php');
include('../../models/mail.php');
/*
	traer la informacion desde JSON
*/
$arrjson 			= "";
$data 				= json_decode(file_get_contents('php://input'), true);

$arrjson['propietario'] = $data['data']['nombre'];
$arrjson['telefono'] 	= $data['data']['telefono'];
$arrjson['dni'] 		= $data['data']['dni'];
/*
	guardamos primero al propietario
*/
$objpro = new Propietario();

$idpropietario = $objpro->InsertPropietario($data['data']['nombre'],$data['data']['telefono'],$data['data']['dni']);

/*
	procedemos a añadir referido
*/

$item 				= count($data['data']['referido']) - 1;
$arrjson['COUNT'] = $item;
$arrjson['id'] = $item;
for ($i=0; $i <= $item ; $i++){
	$form 		= $data['data']['referido'];
	$direccion 	= $form[$i]['direccion'];
	$nombre 	= $form[$i]['nombre'];
	$telefono 	= $form[$i]['telefono'];
	$email 		= $form[$i]['email'];
	$objpro = new Propietario();
	$idreferido = $objpro->InsertReferido($idpropietario,$direccion,$nombre,$telefono,$email);
	$arrjson['id'].= ">>>".$idreferido;
}

/*
	fin de procesar data
*/

/***
	Enviamos la informacion por email
***/
$mailto = new Mailto();
$mailto->Cuerpo($nombre,$direccion,$telefono,$email);
$arremail = 'Lescobedo@menorca.com.pe,amonge@menorca.com.pe,fangeles@menorca.com.pe,ce@mediaimpact.pe';
$arrjson['mensajeenvio'] = $mailto->EnviarMail($arremail);
$arrjson['m_envio'] = $mailto->DameMensajeEnvio();
$arrjson['b_envio'] = $mailto->DameBoolEnvio();

echo json_encode($arrjson);
?>