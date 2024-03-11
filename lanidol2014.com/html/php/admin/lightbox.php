<?php
@set_time_limit(600);
@ini_set('display_errors', 0);
@ini_set('output_buffering','on');
@ini_set('zlib.output_compression', 0);
ob_implicit_flush();

session_start();

require_once("../core/config/main.php");
require_once("../core/controller/UI_AdmPage.php");
require_once("../core/include/admin/module_request.php");
require_once("../core/include/admin/logon.php");

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

include("../core/themes/admin/lightbox_template.php");

?>