<?php
session_start();
require '../core/config/main.php';

$Command=isset($_REQUEST['cmd'])? $_REQUEST['cmd']: NULL;
$contentID=isset($_REQUEST['pID'])? $_REQUEST['pID']: 0;
$langID=isset($_REQUEST['lID'])? $_REQUEST['lID']: 1;
$type=isset($_REQUEST['type'])? $_REQUEST['type']: 'documento';

$oItem=CmsContentLang::getItem($contentID, $langID);
if($oItem!=NULL){
	
	if($oItem->schemeID==36){
		$oParent=CmsContentLang::getItem($oItem->parentContentID, $langID);
		$oParent=CmsContentLang::getItem($oParent->parentContentID, $langID);
		$parameter=XMLParser::getArray_Parameter($oParent->parameter);
	}
	else
		$parameter=XMLParser::getArray_Parameter($oItem->parameter);

	$needLogin=isset($parameter["login"])? $parameter["login"]==1: false;
	
	if($needLogin && !WebLogin::isLogged()){
		echo "Ud. no se encuentra registrado.";
		exit;
	}
	
	$media=XMLParser::getArray_Media($oItem->media);
	if(isset($media[$type])){
		GetFile::Read( '../'.$media[$type]['Url'] );
		exit;
	}
}

echo "No se puede localizar el documento.";
exit;
?>