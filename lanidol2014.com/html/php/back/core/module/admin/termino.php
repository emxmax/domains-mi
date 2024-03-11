<?php
$oItem = new eCmsTerminoLang();

$groupID	=(isset($_REQUEST["groupID"]))? $_REQUEST["groupID"]: null;
$langID		=(isset($_REQUEST["langID"]))? $_REQUEST["langID"]: 1;

$oItem->terminoID		=$kID;
$oItem->groupID			=(isset($_REQUEST["groupID"])) ? $_REQUEST["groupID"] : $groupID;
$oItem->langID			=(isset($_REQUEST["langID"])) ? $_REQUEST["langID"] : $langID;
$oItem->alias			=(isset($_REQUEST["alias"])) ? $_REQUEST["alias"] : null;
$oItem->terminoName		=(isset($_REQUEST["terminoName"]))? $_REQUEST["terminoName"]: null;
$oItem->varName			=(isset($_REQUEST["varName"])) ? $_REQUEST["varName"] : null;
$oItem->inputType		=(isset($_REQUEST["inputType"]))? $_REQUEST["inputType"]: null;

$MODULE->processFormAction('CmsTerminoLang', $oItem);

if($MODULE->FormView=="edit"){
	$obj=CmsTerminoLang::getItem($kID, $langID);
	if($obj!=null){
		if (!isset($oItem->groupID)) 		$oItem->groupID=$obj->groupID;
		if (!isset($oItem->langID)) 		$oItem->langID=$obj->langID;
		if (!isset($oItem->alias)) 			$oItem->alias=$obj->alias;
		if (!isset($oItem->terminoName))	$oItem->terminoName=$obj->terminoName;
		if (!isset($oItem->varName)) 		$oItem->description=$obj->varName;
		if (!isset($oItem->inputType)) 		$oItem->inputType=$obj->inputType;
		
		if($obj->nullValue==1)
			$MODULE->addAlert("No se ha registrado información para esta versión de idioma, por favor edite el contenido.");
	}
	else
		$MODULE->addError(CmsTerminoLang::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->alias;
$MODULE->ItemType="Término";
?>
