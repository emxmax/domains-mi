<?php

include '../adm/decon/connect.php';
require_once("../adm/class/clConsultas.php"); 
require_once("../adm/class/clLog.php");  
include '../lib/funciones.php';
include('../lib/class.phpmailer.php');
  
        
if(isset($_POST['id_comentario'])){
   if((isset($_POST['id_nombre']))) $nombre= $_POST['id_nombre']; 
   if((isset($_POST['id_correo']))) $correo= $_POST['id_correo']; 
   if((isset($_POST['id_web']))) $web= $_POST['id_web']; 
   if((isset($_POST['id_mensaje']))) $mensaje= $_POST['id_mensaje']; 
   if((isset($_POST['id_padre']))) $padre= $_POST['id_padre']; 
   if((isset($_POST['id_hijo']))) $hijo= $_POST['id_hijo']; 
   if((isset($_POST['perfil']))) $perfil= $_POST['perfil'];
   if((isset($_POST['nombre_tema_detalle']))) $nombre_tema_detalle= $_POST['nombre_tema_detalle']; 
}  

//date_default_timezone_set('America/Lima');
$fecha = date("Y-m-d g:ia");
//$fecha = dateZone("Y-m-d g:ia",-5);
$usuario = 'Usuario Externo -> '.$nombre;
$mod = 8; 
$mod_comentario = 12;

$rc=new Consultas();
$rc->consulta("INSERT INTO comentarios (nombre,
                                        email,
                                        web,
                                        comentario, 
                                        perfil,
                                        fecha,
                                        id_padre,
                                        id_hijo, 
                                        id_modulo )

                                       VALUES  ('".$nombre."',
                                                '".$correo."',
                                                '".$web."',
                                                '".$mensaje."',  
                                                '".$perfil."',
                                                '".$fecha."',
                                                '".$padre."',
                                                '".$hijo."',
                                                '".$mod_comentario."')");
                                                
$rc->ejecutar();


$log_id=$rc->devolverID();
$log_modulo=$mod;
$log_accion='grabar';
$log_usuario=$usuario;

$rc_log=new Log();   
$rc_log->insertar($log_usuario,$log_modulo,$log_id,$log_accion,$perfil);




$mail             = new PHPMailer(); 

ob_start();
require 'html/aviso_html.php';
$salida = ob_get_clean();

$body = eregi_replace("[\]",'',limpiarCaracteres($salida));

//$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->SetFrom("ajgarrido@gmail.com","Web - La medicina bamba mata");

//$mail->AddCC("ajgarrido@gmail.com","Administrador"); 

$mail->AddAddress("ajgarrido@gmail.com","Administrador");

$mail->Subject    = "Aviso - La medicina bamba mata";

$mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTML!";

//$mail->AltBody    = "Para ver el mensaje, por favor usa un correo compatible con HTMLTo view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
   echo "Error de Envio: " . $mail->ErrorInfo;
}


$rc=new Consultas();
$rc->consulta("INSERT INTO datos_usuarios (nombre,
                                        correo,
                                        web)

                                       VALUES  ('".$nombre."',
                                                '".$correo."',
                                                '".$web."')");
                                                
$rc->ejecutar();



?>