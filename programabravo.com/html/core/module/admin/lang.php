<?php
$oItem = new eCmsLang();

$oItem->langID			=$kID;
$oItem->langCode		=(isset($_REQUEST["langCode"])) ? $_REQUEST["langCode"] : null;
$oItem->langName		=(isset($_REQUEST["langName"])) ? $_REQUEST["langName"] : null;
$oItem->alias			=(isset($_REQUEST["alias"])) ? $_REQUEST["alias"] : null;
$oItem->isDefault		=(isset($_REQUEST["isDefault"])) ? $_REQUEST["isDefault"] : null;
$oItem->active			=(isset($_REQUEST["active"])) ? $_REQUEST["active"] : null;

$MODULE->processFormAction(new CmsLang(), $oItem);

$DAO=$MODULE->StaticDAO;
if($MODULE->FormView=="edit"){
	$obj=$DAO::getItem($kID);
	if($obj!=null){
		if (!isset($oItem->langCode)) 	$oItem->langCode=$obj->langCode;
		if (!isset($oItem->langName)) 	$oItem->langName=$obj->langName;
		if (!isset($oItem->alias)) 		$oItem->alias=$obj->alias;
		if (!isset($oItem->isDefault)) 	$oItem->isDefault=$obj->isDefault;
		if (!isset($oItem->active)) 	$oItem->active=$obj->active;

		if($oItem->isDefault) $MODULE->addAlert("Este ítem está predeterminado, no puede ser modificado o eliminado.");
	}
	else
		$MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->langName;
$MODULE->ItemType="Idioma";
?>
