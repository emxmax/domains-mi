<?php
@session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");

$dni        = OWASP::RequestString('dni');
$clave      = OWASP::RequestString('clave');
$msg_error  =NULL;

if(isset($dni) && isset($clave)){
    if (WebLogin::Logon($dni, $clave)){
        header("location: http://programabravo.com/site/");
        exit();
        //echo "sss";
    }
    else{
        header("location: http://programabravo.com/site/login.html");
    }
}
?>