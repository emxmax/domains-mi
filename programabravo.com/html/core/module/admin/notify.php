<?php
$oItem = new eCrmFormNotify();

$oItem->userID		=$kID;
$oItem->formID		=(isset($_REQUEST["formID"])) ? $_REQUEST["formID"] : NULL;
$oItem->contactID	=(isset($_REQUEST["contactID"])) ? $_REQUEST["contactID"] : NULL;
$oItem->recipients	=(isset($_REQUEST["recipients"])) ? preg_replace(array("/;/", "/\n\r/", "/\r\n/", "/\t/"), ",", $_REQUEST["recipients"] ) : NULL;
$oItem->active		=(isset($_REQUEST["active"])) ? $_REQUEST["active"] : NULL;

$MODULE->processFormAction(new CrmFormNotify(), $oItem);

$userAdmin	=AdmLogin::getUserSession();
$DAO=$MODULE->StaticDAO;
if($MODULE->FormView=="edit"){
    $obj=$DAO::getItem($oItem->formID, $kID, $oItem->contactID);
    if($obj!=null){
        if (!isset($oItem->recipients)) $oItem->recipients  =$obj->recipients;
        if (!isset($oItem->active))     $oItem->active      =$obj->active;

        $oItem->firstName   =$obj->firstName;
        $oItem->lastName    =$obj->lastName;
        $oItem->email       =$obj->email;
    }
    else
        $MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Notificaci&oacute;n";
?>
