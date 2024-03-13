<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");

$ref        =(isset($_REQUEST["ref"])) ? $_REQUEST["ref"] : NULL;
$auth       =(isset($_REQUEST["auth"])) ? $_REQUEST["auth"] : NULL;

$key='login';
$personaID  = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($auth), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

$oEmpleado=  CrmEmpleado::getItem($personaID);
if($oEmpleado!=NULL){
    if (WebLogin::Logon($oEmpleado->dni, $oEmpleado->clave)){
        header("location: $ref");
        exit();
    }
    else{
        header("location: index.html");
    }
}
else{
    echo "Ruta de acceso no v&aacute;lida, haga <a href='index.html'>clic aqu&iacute;</a> para continuar...";
}
?>