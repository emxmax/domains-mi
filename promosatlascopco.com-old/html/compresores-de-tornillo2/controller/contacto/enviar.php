<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../config/conexion.php');
include('../../modelo/mail.php');
include('../../modelo/registro.php');


/*
	traer la informacion desde JSON
*/
$arrjson 			= "";

$arrjson['nombre'] 		= $_POST['nombre'];
$arrjson['apellidos'] 	= $_POST['apellidos'];
$arrjson['telefono'] 	= $_POST['telefono'];
$arrjson['correo'] 		= $_POST['correo'];
$arrjson['empresa'] 	= $_POST['empresa'];
$arrjson['ciudad'] 		= $_POST['ciudad'];
$arrjson['autoriza'] 	= $_POST['autoriza'];

/*
	guardamos primero al propietario*/

$objregistro = new Registro();
$arrjson['idadd'] = $objregistro->agregar($arrjson);

//$emailcliente = 'info.construccion@pe.atlascopco.com';
$emailcliente = 'emxmax@hotmail.com';
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