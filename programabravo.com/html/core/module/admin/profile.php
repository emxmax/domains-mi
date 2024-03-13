<?php
$userAdmin	=AdmLogin::getUserSession();

$oItem = new eAdmProfile();
$oItem->profileID		=$kID;
$oItem->clientID		=$userAdmin["clientID"];
$oItem->profileName		=(isset($_REQUEST["profileName"]))? $_REQUEST["profileName"]: null;
$oItem->isDefault		=(isset($_REQUEST["isDefault"])) ? $_REQUEST["isDefault"] : null;
$oItem->events			=(isset($_REQUEST["events"])) ? $_REQUEST["events"] : null;

$MODULE->processFormAction(new AdmProfile(), $oItem);

if($MODULE->FormView=="edit"){
	$DAO=$MODULE->StaticDAO;
	$obj=$DAO::getItem($kID);
	if($obj!=null){
		if (!isset($oItem->profileID)) 		$oItem->profileID	=$obj->profileID;
		if (!isset($oItem->profileName)) 	$oItem->profileName	=$obj->profileName;
	}
	else
		$MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->profileName;
$MODULE->ItemType="Perfil";
?>
