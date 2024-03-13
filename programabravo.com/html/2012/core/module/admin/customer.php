<?php
$oItem = new eShopCustomer();

$oItem->customerID		=$kID;
$oItem->customerCode	=(isset($_REQUEST["customerCode"])) ? $_REQUEST["customerCode"] : null;
$oItem->firstName		=(isset($_REQUEST["firstName"])) 	? $_REQUEST["firstName"] : null;
$oItem->lastName		=(isset($_REQUEST["lastName"])) 	? $_REQUEST["lastName"] : null;
$oItem->userName		=(isset($_REQUEST["userName"])) 	? $_REQUEST["userName"] : null;
$oItem->password		=(isset($_REQUEST["password"])) 	? $_REQUEST["password"] : null;
$oItem->postalCode		=(isset($_REQUEST["postalCode"])) 	? $_REQUEST["postalCode"] : null;
$oItem->countryID		=(isset($_REQUEST["countryID"])) 	? $_REQUEST["countryID"] : null;
$oItem->stateID			=(isset($_REQUEST["stateID"])) 		? $_REQUEST["stateID"] : null;
$oItem->address			=(isset($_REQUEST["address"])) 		? $_REQUEST["address"] : null;
$oItem->birthdate		=(isset($_REQUEST["birthdate"])) 	? $_REQUEST["birthdate"] : null;
$oItem->phone			=(isset($_REQUEST["phone"])) 		? $_REQUEST["phone"] : null;
$oItem->fax				=(isset($_REQUEST["fax"])) 			? $_REQUEST["fax"] : null;
$oItem->email			=(isset($_REQUEST["email"])) 		? $_REQUEST["email"] : null;

$txtsearch		=(isset($_REQUEST["txtsearch"])) 	? $_REQUEST["txtsearch"] : null;

$MODULE->processFormAction(new ShopCustomer(), $oItem);

if($MODULE->FormView=="edit"){
	$result=ShopCustomer::getItem($kID);
	if($rs=ShopCustomer::fetchArray($result)){
		if (!isset($customerCode))	$customerCode	=$rs["customerCode"];
		if (!isset($firstName))		$firstName		=$rs["firstName"];
		if (!isset($lastName))		$lastName		=$rs["lastName"];
		if (!isset($userName))		$userName		=$rs["userName"];
		if (!isset($password))		$password		=$rs["password"];
		if (!isset($postalCode))	$postalCode		=$rs["postalCode"];
		if (!isset($stateID))		$stateID		=$rs["stateID"];
		if (!isset($city))			$city			=$rs["city"];
		if (!isset($address))		$address		=$rs["address"];
		if (!isset($birthdate))		$birthdate		=$rs["birthdate"];
		if (!isset($phone))			$phone			=$rs["phone"];
		if (!isset($fax))			$fax			=$rs["fax"];
		if (!isset($email))			$email			=$rs["email"];
		if (!isset($state))			$state			=$rs["state"];
	}
	else
		$MODULE->addError(ShopCustomer::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Cliente";
?>
