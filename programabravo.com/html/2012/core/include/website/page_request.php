<?php
require_once("../core/class/util/inputfilter/class.inputfilter.php");

$ifilter 	=new InputFilter();
$_REQUEST 	=$ifilter->process($_REQUEST);
$_POST 		=$ifilter->process($_POST);

$furl		=isset($_REQUEST["furl"]) ? $_REQUEST["furl"]	:NULL; //URL amigable parametro
$lightbox	=isset($_REQUEST["lightbox"]) ? $_REQUEST["lightbox"]	:FALSE; //Flag para validar la carga de lightbox

$FormView	=(isset($_REQUEST["view"])) ? $_REQUEST["view"] : NULL;
$Command	=(isset($_REQUEST["cmd"])) ? $_REQUEST["cmd"] : NULL;
$URLReturn	=(isset($_REQUEST["url"])) ? $_REQUEST["url"] : NULL;

$URL_ROOT=SEO::get_URLRoot();
$URL_BASE=SEO::get_URLRoot()."site/"; //SEO::get_URLAssets();
?>