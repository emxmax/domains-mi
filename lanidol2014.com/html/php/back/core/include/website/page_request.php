<?php
require_once("../core/class/util/inputfilter/class.inputfilter.php");

$ifilter 	=new InputFilter();
$_REQUEST 	=$ifilter->process($_REQUEST);
$_POST 		=$ifilter->process($_POST);

$contentID	=isset($_REQUEST["pID"]) ? intval($_REQUEST["pID"]) : NULL; //Not Page
$langID		=isset($_REQUEST["lID"]) ? intval($_REQUEST["lID"]) : ((isset($_SESSION["lID"])) ? $_SESSION["lID"] : 1); //ESP
$minisiteID	=isset($_REQUEST["mID"]) ? intval($_REQUEST["mID"]) : 0; //Default Website
$sectionID	=isset($_REQUEST["sID"]) ? intval($_REQUEST["sID"]) : 1; //Home Page
$furl		=isset($_REQUEST["furl"]) ? $_REQUEST["furl"]	:NULL; //URL amigable parametro
$lightbox	=isset($_REQUEST["lightbox"]) ? $_REQUEST["lightbox"]	:FALSE; //Flag para validar la carga de lightbox

$Command	=(isset($_REQUEST["cmd"])) ? $_REQUEST["cmd"] : NULL;
$URLReturn	=(isset($_REQUEST["url"])) ? $_REQUEST["url"] : NULL;
$OrderID	=(isset($_REQUEST["order"])) ? $_REQUEST["order"] : NULL;

$_SESSION["lID"]=$langID;
?>