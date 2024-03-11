<?php
$oItem = new eCmsTerminoLang();

$groupID    =OWASP::RequestInt('groupID');
$langID     =OWASP::RequestInt('langID');
if(!isset($langID)) $langID=1;

$oItem->terminoID   =$kID;
$oItem->groupID     =OWASP::RequestInt('groupID');
$oItem->langID      =OWASP::RequestInt('langID');
$oItem->alias       =OWASP::RequestString('alias');
$oItem->terminoName =OWASP::RequestString('terminoName');
$oItem->varName     =OWASP::RequestString('varName');
$oItem->inputType   =OWASP::RequestString('inputType');

$MODULE->processFormAction('CmsTerminoLang', $oItem);

if($MODULE->FormView=="edit"){
    $obj=CmsTerminoLang::getItem($kID, $langID);
    if($obj!=null){
        if (!isset($oItem->groupID))        $oItem->groupID=$obj->groupID;
        if (!isset($oItem->langID))         $oItem->langID=$obj->langID;
        if (!isset($oItem->alias))          $oItem->alias=$obj->alias;
        if (!isset($oItem->terminoName))    $oItem->terminoName=$obj->terminoName;
        if (!isset($oItem->varName))        $oItem->description=$obj->varName;
        if (!isset($oItem->inputType))      $oItem->inputType=$obj->inputType;

        if($obj->nullValue==1)
            $MODULE->addAlert("No se ha registrado informaci&oacute;n para esta versi&oacute;n de idioma, por favor edite el contenido.");
    }
    else
        $MODULE->addError(CmsTerminoLang::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->alias;
$MODULE->ItemType="T&eacute;rmino";
?>
