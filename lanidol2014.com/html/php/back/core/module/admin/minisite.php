<?php
$oItem = new eCmsMinisite();

$oItem->minisiteID		=$kID;
$oItem->minisiteCode	=(isset($_REQUEST["minisiteCode"])) ? $_REQUEST["minisiteCode"] : null;
$oItem->minisiteName	=(isset($_REQUEST["minisiteName"])) ? $_REQUEST["minisiteName"] : null;
$oItem->domain			=(isset($_REQUEST["domain"])) ? $_REQUEST["domain"] : null;
$oItem->isDefault		=(isset($_REQUEST["isDefault"])) ? $_REQUEST["isDefault"] : null;
$oItem->active			=(isset($_REQUEST["active"])) ? $_REQUEST["active"] : null;

$MODULE->processFormAction(new CmsMinisite(), $oItem);

$DAO=$MODULE->StaticDAO;
if($MODULE->FormView=="edit"){
	$obj=$DAO::getItem($kID);
	if($obj!=null){
		if (!isset($oItem->minisiteCode)) 	$oItem->minisiteCode=$obj->minisiteCode;
		if (!isset($oItem->minisiteName)) 	$oItem->minisiteName=$obj->minisiteName;
		if (!isset($oItem->domain)) 		$oItem->domain=$obj->domain;
		if (!isset($oItem->isDefault)) 		$oItem->isDefault=$obj->isDefault;
		if (!isset($oItem->active)) 		$oItem->active=$obj->active;
		
		if($oItem->isDefault) $MODULE->addAlert("Este ítem está predeterminado, no puede ser modificado o eliminado.");
	}
	else
		$MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->minisiteName;
$MODULE->ItemType="Minisite";
?>
