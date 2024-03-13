<?php

include '../adm/decon/connect.php';
require_once("../adm/class/clConsultas.php"); 
require_once("../adm/class/clLog.php");  
include '../lib/funciones.php';
include('../lib/class.phpmailer.php');
  

if((isset($_POST['id_email']))) $email= mysql_real_escape_string($_POST['id_email']); 

$rc=new Consultas();
$rc->consulta("SELECT nombre,paterno,password,email FROM usuarios WHERE email='".$email."'");
$datos=$rc->devolverDatos();



if($datos==false){
   
   echo "false";
   
}else{

   $mail= new PHPMailer(); 
   
   ob_start();
   require 'html/contrasena_html.php';
   $salida = ob_get_clean();
   
   //$body = preg_replace('\\','',limpiarCaracteres($salida));
   
   $body = limpiarCaracteres($salida);
   
   //$mail->AddReplyTo("name@yourdomain.com","First Last");
   
   $mail->SetFrom("ajgarrido@gmail.com","Recordar Contraseña - Walon");
   
   $mail->AddCC("ajgarrido@gmail.com","Administrador"); 
   
   $mail->AddAddress($email,"Usuario");
   
   $mail->Subject    = "Recordar Contraseña - Walon";
   
   $mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTML!";
   
   //$mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTMLTo view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
   
   $mail->MsgHTML($body);
   
   if(!$mail->Send()) {
      echo "Error de Envio: " . $mail->ErrorInfo;
   }
   
   echo "true";

}


?>