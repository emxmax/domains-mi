<?php
header('Content-Type: application/json; charset=UTF-8');
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../modelo/mail.php');

/*
	traer la informacion desde JSON
*/
$arrjson 			= "";
$data 				= json_decode(file_get_contents('php://input'), true);

$arrjson['nombre'] 		= $data['dato']['nombre'];
$arrjson['email'] 		= $data['dato']['correo'];
/*
	guardamos primero al propietario

*/
$emailcliente = 'antoniaenelespejo@gmail.com,cc@mediaimpact.pe,mc@mediaimpact.pe';
$arrjson['nombreasunto'] = "Suscribete";

$mailto = new Mailto();
$mailto->CuerpoContacto($arrjson);
$mailto->EnviarMail($emailcliente);
$arrjson['m_envio'] = $mailto->DameMensajeEnvio();
$arrjson['b_envio'] = $mailto->DameBoolEnvio();
/*
	fin de procesar data
*/
echo json_encode($arrjson);
?>