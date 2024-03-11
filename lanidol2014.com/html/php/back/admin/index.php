<?php
session_start();
//header("content-type: iso-8859-1");
require_once("../core/config/main.php");
require_once("../core/include/admin/logon.php");
require_once("../core/include/admin/module_request.php");
require_once("../core/controller/UI_AdmPage.php");

if(!isset($moduleID)) $moduleID=0;

$callback=isset($_REQUEST["callback"]) ? $_REQUEST["callback"] : false;

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
}else{
	include("../core/themes/".(($MODULE->moduleForm=="login")?"admin/login_template.php":$ADM_TEMPLATE));
}
?>