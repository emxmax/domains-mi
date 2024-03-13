<?php
$oItem = new eShopModel();

$oItem->modelID		=$kID;
$oItem->categoryID	=(isset($_REQUEST["categoryID"])) ? $_REQUEST["categoryID"] : null;
$oItem->modelCode	=(isset($_REQUEST["modelCode"])) ? $_REQUEST["modelCode"] : null;
$oItem->modelName	=(isset($_REQUEST["modelName"])) ? $_REQUEST["modelName"] : null;
$oItem->description	=(isset($_REQUEST["description"])) ? $_REQUEST["description"] : null;
$oItem->price		=(isset($_REQUEST["price"])) ? $_REQUEST["price"] : null;
$oItem->imgIcon		=(isset($_REQUEST["imgIcon"])) ? $_REQUEST["imgIcon"] : null;
$oItem->imgPreview	=(isset($_REQUEST["imgPreview"])) ? $_REQUEST["imgPreview"] : null;
$oItem->imgZoom		=(isset($_REQUEST["imgZoom"])) ? $_REQUEST["imgZoom"] : null;
$oItem->active		=(isset($_REQUEST["active"])) ? $_REQUEST["active"] : null;

$MODULE->processFormAction(new ShopModel(), $oItem);

if($MODULE->FormView=="edit"){
	$oModel=ShopModel::getItem($kID);

	if($oModel!=null){
		if (!isset($oItem->categoryID))		$oItem->categoryID=$oModel->categoryID;
		if (!isset($oItem->modelCode))		$oItem->modelCode=$oModel->modelCode;
		if (!isset($oItem->modelName)) 		$oItem->modelName=$oModel->modelName;
		if (!isset($oItem->description)) 	$oItem->description=$oModel->description;
		if (!isset($oItem->price)) 			$oItem->price=$oModel->price;
		if (!isset($oItem->imgIcon))		$oItem->imgIcon=$oModel->imgIcon;
		if (!isset($oItem->imgPreview))		$oItem->imgPreview=$oModel->imgPreview;
		if (!isset($oItem->imgZoom))		$oItem->imgZoom=$oModel->imgZoom;
		if (!isset($oItem->active)) 		$oItem->active=$oModel->active;
	}
	else
		$MODULE->addError(ShopModel::getErrorMsg());
}
elseif($MODULE->FormView=="add"){
	//Default Values
	if(!isset($_REQUEST['active'])) $oItem->active=1;
}

$MODULE->ItemTitle=$oItem->modelName;
$MODULE->ItemType="Modelo";
?>