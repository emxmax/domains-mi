<?php

include '../adm/decon/connect.php';
include '../lib/funciones.php';
include('../lib/class.phpmailer.php');
  

if((isset($_POST['id_nombre']))) $nombre= $_POST['id_nombre']; 
if((isset($_POST['id_email']))) $email= $_POST['id_email'];
if((isset($_POST['id_telefono']))) $telefono= $_POST['id_telefono'];
if((isset($_POST['id_consulta']))) $consulta= $_POST['id_consulta'];

   
$mail = new PHPMailer(); 

ob_start();
require 'html/contactenos_html.php';
$salida = ob_get_clean();

//$body = eregi_replace("[\]",'',limpiarCaracteres($salida));

$mail->IsSMTP();
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'pruebas.ajgarrido@gmail.com';
$mail->Password = 'pruebas123';

$body =limpiarCaracteres($salida);

//$mail->AddReplyTo("name@yourdomain.com","First Last");

//$mail->SetFrom("ajgarrido@gmail.com","Administrador");

//$mail->AddCC("ajgarrido@gmail.com","Administrador"); 

$mail->AddAddress("aa@magma.pe","Usuario");

$mail->AddAddress("ajgarrido@gmail.com","Usuario");

$mail->Subject    = "Consulta - Magma";

$mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTML!";

//$mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTMLTo view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
   echo "Error de Envio: " . $mail->ErrorInfo;
}else{
   echo "Consulta enviada correctamente";
}

?>