<?php
session_start();
//header("content-type: text/html; charset=utf-8");
require_once("../core/config/main.php");
require_once("../core/controller/UI_AdmPage.php");
require_once("../core/include/admin/module_request.php");

$moduleID = 1; //Solo para logoff
$FormView = '';
$Command = 'logoff';

$MODULE=new UI_AdmPage($moduleID, $FormView, $Command);

if(AdmLogin::isLogged())
    $MODULE->registerLog("El usuario sali&oacute; del sistema");

AdmLogin::UnregisterUser();
/*
$arrSessions=$_SESSION; 
session_destroy(); 
foreach ($arrSessions as $session_name => $session_value) { 
        unset($session_name); 
} 
unset($arrSessions); 
*/
header("location: index.php");
exit;
?>
