<?php
$oItem = new eCrmUser();

$oItem->userID			=$kID;
$oItem->clientID		=(isset($_REQUEST["clientID"])) ? $_REQUEST["clientID"] : null;
$oItem->firstName		=(isset($_REQUEST["firstName"]))? $_REQUEST["firstName"]: null;
$oItem->lastName		=(isset($_REQUEST["lastName"])) ? $_REQUEST["lastName"] : null;
$oItem->userName		=(isset($_REQUEST["userName"])) ? $_REQUEST["userName"] : null;
$oItem->password		=(isset($_REQUEST["password"])) ? $_REQUEST["password"] : null;
$oItem->email			=(isset($_REQUEST["email"])) 	? $_REQUEST["email"] 	: null;
$oItem->state			=(isset($_REQUEST["state"])) ? $_REQUEST["state"] : null;

$MODULE->processFormAction(new CrmUser(), $oItem);

if($MODULE->FormView=="edit"){
	$obj=CrmUser::getItem($kID);
	if($obj!=null){
		if (!isset($oItem->clientID)) 	$oItem->clientID	=$obj->clientID;
		if (!isset($oItem->firstName)) 	$oItem->firstName	=$obj->firstName;
		if (!isset($oItem->lastName)) 	$oItem->lastName	=$obj->lastName;
		if (!isset($oItem->userName)) 	$oItem->userName	=$obj->userName;
		if (!isset($oItem->password)) 	$oItem->password	=$obj->password;
		if (!isset($oItem->email)) 		$oItem->email		=$obj->email;
		if (!isset($oItem->state)) 		$oItem->state		=$obj->state;
	}
	else
		$MODULE->addError(CrmUser::GetErrorMsg());
		
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Usuario";
?>
