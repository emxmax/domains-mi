<?php
$oItem = new eShopModel();

$oItem->modelID		=$kID;
$oItem->categoryID	=OWASP::RequestInt('categoryID');
$oItem->modelCode	=OWASP::RequestString('modelCode');
$oItem->modelName	=OWASP::RequestString('modelName');
$oItem->description	=OWASP::RequestString('description');
$oItem->price		=OWASP::RequestString('price');
$oItem->imgIcon		=OWASP::RequestString('imgIcon');
$oItem->imgPreview	=OWASP::RequestString('imgPreview');
$oItem->imgZoom		=OWASP::RequestString('imgZoom');
$oItem->active		=OWASP::RequestBoolean('active');

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
    if(OWASP::RequestBoolean('active')) $oItem->active=1;
}

$MODULE->ItemTitle=$oItem->modelName;
$MODULE->ItemType="Modelo";
?>