<?php
$oItem = new eCmsParameterLang();

$groupID    =OWASP::RequestInt('groupID');
$langID     =OWASP::RequestInt('langID');
if(!isset($langID)) $langID=1;

$oItem->parameterID     =$kID;
$oItem->groupID         =OWASP::RequestString('groupID');
$oItem->langID          =OWASP::RequestString('langID');
$oItem->parameterName   =OWASP::RequestString('parameterName');
$oItem->description     =OWASP::RequestHTML('description');
$oItem->attribute       =OWASP::RequestString('attribute');
$oItem->active          =OWASP::RequestBoolean('active');

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
            $MODULE->addAlert("No se ha registrado informaci&oacute;n para esta versi�n de idioma, por favor edite el contenido.");
    }
    else
        $MODULE->addError(CmsParameterLang::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->parameterName;
$MODULE->ItemType="Par�metro";
?>
