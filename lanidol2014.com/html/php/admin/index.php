<?php
session_start();
//header("content-type: text/html; charset=utf-8");
require_once("../core/config/main.php");
require_once("../core/controller/UI_AdmPage.php");
require_once("../core/include/admin/module_request.php");
require_once("../core/include/admin/logon.php");

$MODULE=new UI_AdmPage($moduleID, $FormView, $Command);
$MODULE->Page=$Page;
$MODULE->OrderBy=$OrderBy;

$file_module="../core/module/admin/".$MODULE->moduleForm.".php";
if(file_exists($file_module))
    include($file_module); //Required module
else
    $MODULE->addError("No se puede localizar el archivo: ".$file_module);

if($callback){
    $file_view="../core/view/admin/".$MODULE->getFormView();
    if(file_exists($file_view)){
        require_once("../core/include/admin/header_ajax.php");
        include($file_view);
    }
    else
        $MODULE->addError("No se puede localizar el archivo: ".$file_view);
}
else
    include("../core/themes/".$ADM_TEMPLATE);

?>