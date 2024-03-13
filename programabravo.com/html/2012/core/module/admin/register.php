<?php
$oItem = new eCrmRegisterForm();

$oItem->registerID	=$kID;
$oItem->formID		=(isset($_REQUEST["formID"]))		? $_REQUEST["formID"] : NULL;
$oItem->clientID	=(isset($_REQUEST["clientID"])) 	? $_REQUEST["clientID"] : NULL;
$oItem->registerCode	=(isset($_REQUEST["registerCode"]))     ? $_REQUEST["registerCode"] : NULL;
$oItem->name		=(isset($_REQUEST["name"])) 		? $_REQUEST["name"] : NULL;
$oItem->lastname	=(isset($_REQUEST["lastname"])) 	? $_REQUEST["lastname"] : NULL;
$oItem->surname		=(isset($_REQUEST["surname"])) 		? $_REQUEST["surname"] : NULL;
$oItem->phone		=(isset($_REQUEST["phone"])) 		? $_REQUEST["phone"] : NULL;
$oItem->countryID	=(isset($_REQUEST["countryID"])) 	? $_REQUEST["countryID"] : NULL;
$oItem->city		=(isset($_REQUEST["city"])) 		? $_REQUEST["city"] : NULL;
$oItem->address		=(isset($_REQUEST["address"])) 		? $_REQUEST["address"] : NULL;
$oItem->email		=(isset($_REQUEST["email"])) 		? $_REQUEST["email"] : NULL;
$oItem->contactID	=(isset($_REQUEST["contactID"])) 	? $_REQUEST["contactID"] : NULL;
$oItem->comment		=(isset($_REQUEST["comment"])) 		? $_REQUEST["comment"] : NULL;
$oItem->state		=(isset($_REQUEST["state"])) 		? $_REQUEST["state"] : NULL;
$oItem->registerDate	=(isset($_REQUEST["registerDate"]))     ? $_REQUEST["registerDate"] : NULL;
$oItem->reviewDate	=(isset($_REQUEST["reviewDate"])) 	? $_REQUEST["reviewDate"] : NULL;

$txtsearch		=(isset($_REQUEST["txtsearch"])) 	? $_REQUEST["txtsearch"] : NULL;

$MODULE->processFormAction(new CrmRegisterForm(), $oItem);

$DAO=$MODULE->StaticDAO;
if($MODULE->FormView=="edit"){
    $obj=$DAO::getItem($kID);
    if($obj!=null){
        if (!isset($oItem->formID))		$oItem->formID 		= $obj->formID;
        if (!isset($oItem->clientID))	$oItem->clientID 	= $obj->clientID;
        if (!isset($oItem->registerCode))	$oItem->registerCode 	= $obj->registerCode;
        if (!isset($oItem->name))		$oItem->name 		= $obj->name;
        if (!isset($oItem->lastname))	$oItem->lastname 	= $obj->lastname;
        if (!isset($oItem->surname))	$oItem->surname 	= $obj->surname;
        if (!isset($oItem->phone))		$oItem->phone 		= $obj->phone;
        if (!isset($oItem->countryID))	$oItem->countryID 	= $obj->countryID;
        if (!isset($oItem->city))		$oItem->city 		= $obj->city;
        if (!isset($oItem->district))	$oItem->district 	= $obj->district;
        if (!isset($oItem->address))	$oItem->address 	= $obj->address;
        if (!isset($oItem->email))		$oItem->email 		= $obj->email;
        if (!isset($oItem->contactID))	$oItem->contactID 	= $obj->contactID;
        if (!isset($oItem->comment))	$oItem->comment 	= $obj->comment;
        if (!isset($oItem->state))		$oItem->state 		= $obj->state;
        if (!isset($oItem->registerDate))	$oItem->registerDate 	= $obj->registerDate;
        if (!isset($oItem->reviewDate))	$oItem->reviewDate 	= $obj->reviewDate;
    }
    else
        $MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->name." ".$oItem->lastname;
$MODULE->ItemType="Registro";
?>
