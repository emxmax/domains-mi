<?php
@$nombre = addslashes($_POST['txtNombre']);
@$correo = addslashes($_POST['txtCorreo']);
@$telefono = addslashes($_POST['txtTelefono']);
@$descripcion = addslashes($_POST['txtDescripcion']);
if(isset($telefono)){
	$mensaje="<html><head><title>$asunto</title></head><body><p>$descripcion</p>Mi teléfono es: $telefono</html>";
}else{
	$mensaje="<html><head><title>$asunto</title></head><body><p>$descripcion</p></html>";
}
require "phpMailer/class.phpmailer.php";
$mail=new PHPMailer;
$mail->Host="www.mineriasegura.net";
$mail->From=$correo;
$mail->FromName=$nombre;
$mail->Subject='Contacto';
$mail->addAddress('mineriasegurablog@gmail.com','Destinatario');
$mail->MsgHTML($mensaje);
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
 if($mail->Send()){
 	$msj2="Su mensaje ha sido enviado correctamente";
	header("Location: index.php?sec=contacto&m=".$msj2);
 }else{
 	$msj2="Su mensaje ha sido enviado";
	header("Location: index.php?sec=contacto&m=".$msj2);
 }
?>