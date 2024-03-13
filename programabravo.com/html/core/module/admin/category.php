<?php
$oItem = new eShopCategory();

$oItem->categoryID		=$kID;
$oItem->lineID			=(isset($_REQUEST["lineID"])) ? $_REQUEST["lineID"] : null;
$oItem->categoryName	=(isset($_REQUEST["categoryName"])) ? $_REQUEST["categoryName"] : null;
$oItem->description		=(isset($_REQUEST["description"])) ? $_REQUEST["description"] : null;
$oItem->imgIcon			=(isset($_REQUEST["imgIcon"])) ? $_REQUEST["imgIcon"] : null;
$oItem->imgButtonOn		=(isset($_REQUEST["imgButtonOn"])) ? $_REQUEST["imgButtonOn"] : null;
$oItem->imgButtonOff	=(isset($_REQUEST["imgButtonOff"])) ? $_REQUEST["imgButtonOff"] : null;

$MODULE->processFormAction(new ShopCategory(), $oItem);

if($MODULE->FormView=="edit"){
	$DAO=$MODULE->StaticDAO;
	$obj=$DAO::getItem($kID);
	if($obj!=null){
		if (!isset($oItem->lineID)) 		$oItem->lineID=$obj->lineID;
		if (!isset($oItem->categoryName)) 	$oItem->categoryName=$obj->categoryName;
		if (!isset($oItem->description)) 	$oItem->description=$obj->description;
		if (!isset($oItem->imgIcon)) 		$oItem->imgIcon=$obj->imgIcon;
		if (!isset($oItem->imgButtonOn)) 	$oItem->imgButtonOn=$obj->imgButtonOn;
		if (!isset($oItem->imgButtonOff))	$oItem->imgButtonOff=$obj->imgButtonOff;
		if (!isset($oItem->active)) 		$oItem->active=$obj->active;
	}
	else
		$MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->categoryName;
$MODULE->ItemType="Categoría";
?>
