<?php
session_start();
header("content-type: utf-8");
require("../core/config/main.php");

$cmd=OWASP::RequestString('cmd');
//Common Fields
$userName	=OWASP::RequestString('user');
$password	=OWASP::RequestString('pwd');

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
    echo filter_input(INPUT_GET, 'callback', FILTER_CALLBACK, array("options"=>"validateXSS")).
    "({
        \"retval\": 1,
        \"message\": \"".$msg."\"
    })";
exit;
return;
}

function RaiseError($err){
    echo filter_input(INPUT_GET, 'callback', FILTER_CALLBACK, array("options"=>"validateXSS")).
    "({
        \"retval\": 0,
        \"message\": \"".$err."\"
    })";
exit;
return;
}

function validateXSS($string){
    return preg_replace('|[^_$a-zA-Z0-9]*|','', $string);
}
?>