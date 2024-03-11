<?php
error_reporting(E_ALL);
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, "es_PE");

function autoload_class($className) {
	$root=dirname(__FILE__).'/../class/';
	$possibilities = array(
		$root.$className.'.php',
		$root.'base/'.$className.'.php',
		$root.'entity/'.$className.'.php',
		$root.'util/'.$className.'.php'
	);     
			
	foreach ($possibilities as $file) {
		if (file_exists($file)) {
			require_once($file);
			return true;
		}
	}
	return false;
}

spl_autoload_register('autoload_class'); 

require_once("constant.php");
require_once("resources.php");
require_once("connection.php");


$detect = new Mobile_Detect;

$WEBSITE["DOMAIN"]		=$_SERVER['SERVER_NAME'];
$WEBSITE["ROOT"]		="/php/";// WebSite Root
$WEBSITE["MINISITE"]    =""; //$WEBSITE["MINISITE"]	=($detect->isMobile()) ? "movil/": "";// Detect Mobile Version

$WEBSITE["ADMIN"]		=$WEBSITE["ROOT"]."admin/"; // Management Root 
$WEBSITE["URL_HTTP"]	="http://".$WEBSITE["DOMAIN"].$WEBSITE["ROOT"]; //Public Web Site
$WEBSITE["URL_ADMIN"]	="http://".$WEBSITE["DOMAIN"].$WEBSITE["ADMIN"]; //Public Web Site
$WEBSITE["URL_HTTTPS"]	="https://".$WEBSITE["DOMAIN"].$WEBSITE["ROOT"]; //Secure Web Site
$WEBSITE["PAGE_ERROR"]	=$WEBSITE["ROOT"]."error.php";

$ADM_TEMPLATE			="admin/adm_template.php";
$WEB_TEMPLATE           =(isset($WEBSITE["MINISITE"]) && $WEBSITE["MINISITE"]!="")? $WEBSITE["MINISITE"]: "website/";
$WEB_TEMPLATE			.="web_template.php";

//Load config vars from DataBase!!
$list=Config::getWebList();
foreach($list as $obj){
	$WEBSITE[$obj->varName]	=$obj->value;
}

//print_r($WEBSITE);
?>