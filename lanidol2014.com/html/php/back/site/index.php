<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
if(isset($WEBSITE["MINISITE"]) && $WEBSITE["MINISITE"]!=""){
	require_once("../core/include/$WEBSITE[MINISITE]/page_request.php");
	require_once("../core/include/$WEBSITE[MINISITE]/module_request.php");
	require_once("../core/include/$WEBSITE[MINISITE]/array_termino.php");
}
else{
	require_once("../core/include/website/page_request.php");
	require_once("../core/include/website/module_request.php");
	require_once("../core/include/website/array_termino.php");
}

require_once("../core/controller/UI_WebSite.php");

//echo "$furl, $contentID, $sectionID, $langID, $minisiteID, $Command";
$PAGE=new UI_WebSite($furl, $contentID, $sectionID, $langID, $minisiteID, $Command);
$file_module ='../core/module/website/'.$PAGE->module.'.php' ;//Content

$URL_ROOT=SEO::get_URLRoot();
$URL_BASE=SEO::get_URLAssets();

if( file_exists( $file_module ) )
	include $file_module ;
else
	$PAGE->addError( 'No se puede localizar el archivo => ' . $file_module );

	
if(!WebLogin::isLogged())
	$WEB_TEMPLATE = "website/web_login.php";
else
{
	if($lightbox)
		$WEB_TEMPLATE = "website/web_lightbox.php";
}

include '../core/themes/' . $WEB_TEMPLATE;
?>