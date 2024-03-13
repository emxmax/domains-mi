<?php
$oItem = new eCmsParameterLang();

$groupID	=(isset($_REQUEST["groupID"]))? $_REQUEST["groupID"]: null;
$langID		=(isset($_REQUEST["langID"]))? $_REQUEST["langID"]: 1;

$oItem->parameterID		=$kID;
$oItem->groupID			=(isset($_REQUEST["groupID"])) ? $_REQUEST["groupID"] : $groupID;
$oItem->langID			=(isset($_REQUEST["langID"])) ? $_REQUEST["langID"] : $langID;
$oItem->parameterName	=(isset($_REQUEST["parameterName"]))? $_REQUEST["parameterName"]: null;
$oItem->description		=(isset($_REQUEST["description"])) ? $_REQUEST["description"] : null;
$oItem->attribute		=(isset($_REQUEST["attribute"])) ? $_REQUEST["attribute"] : null;
$oItem->active			=(isset($_REQUEST["active"]))? $_REQUEST["active"]: null;

$MODULE->processFormAction('CmsParameterLang', $oItem);

if($MODULE->FormView=="edit"){
	$obj=CmsParameterLang::getItem($kID, $langID);
	if($obj!=null){
		if (!isset($oItem->groupID)) 		$oItem->groupID=$obj->groupID;
		if (!isset($oItem->langID)) 		$oItem->langID=$obj->langID;
		if (!isset($oItem->parameterName))	$oItem->parameterName=$obj->parameterName;
		if (!isset($oItem->description)) 	$oItem->description=$obj->description;
		if (!isset($oItem->attribute)) 		$oItem->attribute=XMLParser::getArray_Parameter($obj->attribute);
		if (!isset($oItem->active)) 		$oItem->active=$obj->active;

		if($obj->nullValue==1)
			$MODULE->addAlert("No se ha registrado información para esta versión de idioma, por favor edite el contenido.");
	}
	else
		$MODULE->addError(CmsParameterLang::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->parameterName;
$MODULE->ItemType="Parámetro";
?>
