<?php
$oItem = new eAdmUser();

$oItem->userID			=$kID;
$oItem->clientID		=(isset($_REQUEST["clientID"])) ? $_REQUEST["clientID"] : null;
$oItem->firstName		=(isset($_REQUEST["firstName"]))? $_REQUEST["firstName"]: null;
$oItem->lastName		=(isset($_REQUEST["lastName"])) ? $_REQUEST["lastName"] : null;
$oItem->userName		=(isset($_REQUEST["userName"])) ? $_REQUEST["userName"] : null;
$oItem->password		=(isset($_REQUEST["password"])) ? $_REQUEST["password"] : null;
$oItem->email			=(isset($_REQUEST["email"])) 	? $_REQUEST["email"] 	: null;
$oItem->profileID		=(isset($_REQUEST["profileID"]))? $_REQUEST["profileID"]: null;
$oItem->state			=(isset($_REQUEST["state"])) ? $_REQUEST["state"] : null;

$MODULE->processFormAction(new AdmUser(), $oItem);

if($MODULE->FormView=="edit"){
	$obj=AdmUser::getItem($kID);
	if($obj!=null){
		if (!isset($oItem->clientID)) 	$oItem->clientID	=$obj->clientID;
		if (!isset($oItem->firstName)) 	$oItem->firstName	=$obj->firstName;
		if (!isset($oItem->lastName)) 	$oItem->lastName	=$obj->lastName;
		if (!isset($oItem->userName)) 	$oItem->userName	=$obj->userName;
		if (!isset($oItem->password)) 	$oItem->password	=$obj->password;
		if (!isset($oItem->email)) 		$oItem->email		=$obj->email;
		if (!isset($oItem->profileID))	$oItem->profileID	=$obj->profileID;
		if (!isset($oItem->state)) 		$oItem->state		=$obj->state;
	}
	else
		$MODULE->addError(AdmUser::GetErrorMsg());
		
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Usuario";

?>
