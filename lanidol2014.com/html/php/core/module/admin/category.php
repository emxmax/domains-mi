<?php
$oItem = new eShopCategory();

$oItem->categoryID	=$kID;
$oItem->lineID		=OWASP::RequestInt('lineID');
$oItem->categoryName	=OWASP::RequestString('categoryName');
$oItem->description	=OWASP::RequestString('description');
$oItem->imgIcon		=OWASP::RequestString('imgIcon');
$oItem->imgButtonOn	=OWASP::RequestString('imgButtonOn');
$oItem->imgButtonOff	=OWASP::RequestString('imgButtonOff');

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
$MODULE->ItemType="Categor&iacute;a";
?>
