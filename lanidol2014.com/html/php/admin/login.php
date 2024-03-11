<?php
session_start();
//header("content-type: text/html; charset=utf-8");
require_once("../core/config/main.php");
require_once("../core/controller/UI_AdmPage.php");
require_once("../core/include/admin/module_request.php");

$moduleID = 1; //Solo para login
$MODULE=new UI_AdmPage($moduleID, $FormView, $Command);
$MODULE->Page=$Page;
$MODULE->OrderBy=$OrderBy;

$file_module="../core/module/admin/login.php";
if(file_exists($file_module))
    include($file_module); //Required module
else
    $MODULE->addError("No se puede localizar el archivo: ".$file_module);

include("../core/themes/admin/login_template.php");
?>