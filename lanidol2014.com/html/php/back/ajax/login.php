<?php
session_start();
header("content-type: utf-8");
require("../core/config/main.php");

$cmd=isset($_REQUEST['cmd'])? $_REQUEST['cmd']: NULL;
//Common Fields
$userName	=isset($_REQUEST['user'])? $_REQUEST['user']: NULL;
$password	=isset($_REQUEST['pwd'])? $_REQUEST['pwd']: NULL;

if($cmd=='login'){
	Login($userName, $password);
}

function Login($userName, $password){
	
	if(!WebLogin::Logon($userName, $password)){
		RaiseError('Usuario o password incorrecto!');
		return;
	}
	
	Response('Ingresando al sistema...');
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