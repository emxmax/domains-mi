<?php
$userAdmin  =AdmLogin::getUserSession();
$arrKey     =explode(',', $kID);
        
$oItem = new eAdmLog();
$oItem->logDate     =count($arrKey)>0? $arrKey[0]: NULL;
$oItem->eventID     =count($arrKey)>1? $arrKey[1]: NULL;
$oItem->userID      =count($arrKey)>2? $arrKey[2]: NULL;

$MODULE->processFormAction(new AdmLog(), $oItem);

if($MODULE->FormView=="view"){
    $DAO=$MODULE->StaticDAO;
    $obj=$DAO::getItem($oItem->logDate, $oItem->eventID, $oItem->userID);
    if($obj!=null){
        $oItem->comment	=$obj->comment;
        $oItem->object	=$obj->object;
        $oItem->userName=$obj->userName;
        $oItem->eventName=$obj->eventName;
    }
    else
        $MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->logDate;
$MODULE->ItemType="Fecha";
?>
