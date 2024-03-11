<?php
$oItem = new eCrmUser();

$oItem->userID      =$kID;
$oItem->firstName   =OWASP::RequestString('firstName');
$oItem->lastName    =OWASP::RequestString('lastName');
$oItem->userName    =OWASP::RequestString('userName');
$oItem->password    =OWASP::RequestString('password');
$oItem->email       =OWASP::RequestString('email');
$oItem->state       =OWASP::RequestString('state');

$MODULE->processFormAction(new CrmUser(), $oItem);

if($MODULE->FormView=="edit"){
    $obj=CrmUser::getItem($kID);
    if($obj!=null){
        if (!isset($oItem->firstName)) 	$oItem->firstName   =$obj->firstName;
        if (!isset($oItem->lastName)) 	$oItem->lastName    =$obj->lastName;
        if (!isset($oItem->userName)) 	$oItem->userName    =$obj->userName;
        if (!isset($oItem->password)) 	$oItem->password    =$obj->password;
        if (!isset($oItem->email))      $oItem->email       =$obj->email;
        if (!isset($oItem->state))      $oItem->state       =$obj->state;
    }
    else
        $MODULE->addError(CrmUser::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Usuario";
?>
