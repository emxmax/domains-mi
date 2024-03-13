<?php
session_start();
//header("content-type: iso-8859-1");
require_once("../core/config/main.php");
require_once("../core/include/admin/logon.php");
require_once("../core/include/admin/module_request.php");
require_once("../core/controller/UI_AdmPage.php");

if(!isset($moduleID)) $moduleID=0;

$LIGHTBOXVIEW=true;
$MODULE=new UI_AdmPage($moduleID, $FormView, $Command);
$MODULE->Page=$Page;
$MODULE->OrderBy=$OrderBy;

$file_model="../core/module/admin/".$MODULE->moduleForm.".php";
if(file_exists($file_model))
	include($file_model);
else
	$MODULE->addError("No se puede localizar el archivo: ".$file_model);

include("../core/templates/admin/lightbox_template.php");
?>