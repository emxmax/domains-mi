<?php

include '../adm/decon/connect.php';
require_once("../adm/class/clConsultas.php"); 
require_once("../adm/class/clLog.php");  
include '../lib/funciones.php';
include('../lib/class.phpmailer.php');
  

if((isset($_POST['id_nombre']))) $nombre= $_POST['id_nombre']; 
if((isset($_POST['id_paterno']))) $paterno= $_POST['id_paterno']; 
if((isset($_POST['id_materno']))) $materno= $_POST['id_materno']; 
if((isset($_POST['id_sexo']))) $sexo= $_POST['id_sexo']; 
if((isset($_POST['id_email']))) $email= $_POST['id_email']; 
if((isset($_POST['id_contrasena']))) $contrasena= $_POST['id_contrasena']; 
if((isset($_POST['paises']))) $pais= $_POST['paises'];
if((isset($_POST['estados']))) $ciudad= $_POST['estados'];
if((isset($_POST['id_direccion']))) $direccion= $_POST['id_direccion'];
if((isset($_POST['id_telefono']))) $telefono= $_POST['id_telefono'];
if((isset($_POST['id_documento']))) $documento= $_POST['id_documento'];
if((isset($_POST['p']))) $p= $_POST['p'];


$usuario = recogerDatos(sprintf("SELECT email
					  FROM usuarios
					  WHERE email = '%s' limit 1",$email));

if($usuario==false){

   date_default_timezone_set('America/Lima');
   $fecha = date("Y-m-d g:ia");
   
   $rc=new Consultas();
   $rc->consulta("INSERT INTO usuarios (nombre,
					   paterno,
					   materno,
					   sexo, 
					   email,
					   fecharegistro,
					   password,
					   pais,
					   ciudad,
					   direccion,
					   telefono, 
					   documento )
   
					  VALUES  ('".$nombre."',
						   '".$paterno."',
						   '".$materno."',
						   '".$sexo."',  
						   '".$email."',
						   '".$fecha."',
						   '".$contrasena."',
						   '".$pais."',
						   '".$ciudad."',
						   '".$direccion."',
						   '".$telefono."',
						   '".$documento."')");
						   
   $rc->ejecutar();
   
   
   $id_registro=md5($rc->devolverID());
   
   
   $mail             = new PHPMailer(); 
   
   ob_start();
   require 'html/registrate_html.php';
   $salida = ob_get_clean();
   
   //$body = eregi_replace("[\]",'',limpiarCaracteres($salida));
   
   $body =limpiarCaracteres($salida);
   
   //$mail->AddReplyTo("name@yourdomain.com","First Last");
   
   $mail->SetFrom("ajgarrido@gmail.com","Registro - Walon");
   
   $mail->AddCC("ajgarrido@gmail.com","Administrador"); 
   
   $mail->AddAddress($email,"Usuario");
   
   $mail->Subject    = "Registro - Walon";
   
   $mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTML!";
   
   //$mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTMLTo view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
   
   $mail->MsgHTML($body);
   
   if(!$mail->Send()) {
      echo "Error de Envio: " . $mail->ErrorInfo;
   }

}else{
   
   echo 'Encontrado';
   
}

?>