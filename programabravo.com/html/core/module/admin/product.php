<?php
$oItem = new eShopProduct();

$oItem->productID		=$kID;
$oItem->categoryID		=(isset($_REQUEST["categoryID"])) 	? $_REQUEST["categoryID"] : null;
$oItem->modelID			=(isset($_REQUEST["modelID"])) 		? $_REQUEST["modelID"] : null;
$oItem->productName		=(isset($_REQUEST["productName"])) 	? $_REQUEST["productName"] : null;
$oItem->description		=(isset($_REQUEST["description"])) 	? $_REQUEST["description"] : null;
$oItem->productCode		=(isset($_REQUEST["productCode"])) 	? $_REQUEST["productCode"] : null;
$oItem->price			=(isset($_REQUEST["price"])) 		? $_REQUEST["price"] : null;
$oItem->stock			=(isset($_REQUEST["stock"])) 		? $_REQUEST["stock"] : null;
$oItem->pointValue		=(isset($_REQUEST["pointValue"])) 	? $_REQUEST["pointValue"] : null;
$oItem->information		=(isset($_REQUEST["information"])) 	? $_REQUEST["information"] : null;
$oItem->manual			=(isset($_REQUEST["manual"])) 		? $_REQUEST["manual"] : null;
$oItem->specifications	=(isset($_REQUEST["specifications"])) ? $_REQUEST["specifications"] : null;
$oItem->imgIcon			=(isset($_REQUEST["imgIcon"])) 		? $_REQUEST["imgIcon"] : null;
$oItem->imgPreview		=(isset($_REQUEST["imgPreview"])) 	? $_REQUEST["imgPreview"] : null;
$oItem->imgZoom			=(isset($_REQUEST["imgZoom"])) 		? $_REQUEST["imgZoom"] : null;
$oItem->state			=(isset($_REQUEST["state"])) 		? $_REQUEST["state"] : null;

$oItem->imageIDs		=(isset($_REQUEST["imageIDs"])) 	? $_REQUEST["imageIDs"] : null;
$oItem->parameterIDs	=(isset($_REQUEST["parameterIDs"])) ? $_REQUEST["parameterIDs"] : null;

$MODULE->processFormAction(new ShopProduct(), $oItem);

if($MODULE->FormView=="edit"){
	$oProduct=ShopProduct::getItem($kID);

	if($oProduct!=null){
		if (!isset($oItem->categoryID))		$oItem->categoryID		=$oProduct->categoryID;
		if (!isset($oItem->modelID))		$oItem->modelID			=$oProduct->modelID;
		if (!isset($oItem->productName)) 	$oItem->productName		=$oProduct->productName;
		if (!isset($oItem->description))	$oItem->description		=$oProduct->description;
		if (!isset($oItem->productCode))	$oItem->productCode		=$oProduct->productCode;
		if (!isset($oItem->price))			$oItem->price			=$oProduct->price;
		if (!isset($oItem->stock))			$oItem->stock			=$oProduct->stock;
		if (!isset($oItem->pointValue))		$oItem->pointValue		=$oProduct->pointValue;
		if (!isset($oItem->information))	$oItem->information		=$oProduct->information;
		if (!isset($oItem->manual))			$oItem->manual			=$oProduct->manual;
		if (!isset($oItem->specifications))	$oItem->specifications	=$oProduct->specifications;
		if (!isset($oItem->imgIcon))		$oItem->imgIcon			=$oProduct->imgIcon;
		if (!isset($oItem->imgPreview))		$oItem->imgPreview		=$oProduct->imgPreview;
		if (!isset($oItem->imgZoom))		$oItem->imgZoom			=$oProduct->imgZoom;
		if (!isset($oItem->state)) 			$oItem->state			=$oProduct->state;
	}else
		$MODULE->addError(ShopProduct::getErrorMsg());
}
elseif($MODULE->FormView=="add"){
	//Default Values
	//if(!isset($_REQUEST['state'])) $oItem->state=1;
}

$MODULE->ItemTitle=$oItem->productName;
$MODULE->ItemType="Producto";
?>