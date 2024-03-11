<?php
$userAdmin	=AdmLogin::getUserSession();

$oItem = new eAdmProfile();
$oItem->profileID   =$kID;
$oItem->profileName =OWASP::RequestString('profileName');
$oItem->isDefault   =OWASP::RequestBoolean('isDefault');
$oItem->events      =OWASP::RequestString('events');

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
