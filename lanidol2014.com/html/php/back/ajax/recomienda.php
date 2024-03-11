<?php
session_start();
header("content-type: utf-8");
require("../core/config/main.php");

$send=isset($_REQUEST['send'])? $_REQUEST['send']: NULL;
//Common Fields
$name		=isset($_REQUEST['name'])? $_REQUEST['name']: NULL;
$name_to	=isset($_REQUEST['name_to'])? $_REQUEST['name_to']: NULL;
$mail_to	=isset($_REQUEST['mail_to'])? $_REQUEST['mail_to']: NULL;

if($send){
	//Submit Form
	Recomienda($name, $name_to, $mail_to);
}

function Recomienda($name, $name_to, $mail_to){
	
	if(!Email::Send_Recomienda($name, $name_to, $mail_to)){
		RaiseError('Ocurrio un error al enviar los datos!');
		return;
	}
	
	Response('Su mensaje ha sido enviado con \xE9xito.');
}

function Response($msg){
	echo $_GET['callback'].
	"({
		'retval': 1,
		'message': '".$msg."'
	})";
}

function RaiseError($err){
	echo $_GET['callback'].
	"({
		'retval': 0,
		'message': '".$err."'
	})";
}

?>