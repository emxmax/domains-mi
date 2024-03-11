<?php
$oItem = new eAdmUser();

$oItem->userID		=$kID;
//$oItem->userLDAP	=OWASP::RequestString('userLDAP');
$oItem->firstName	=OWASP::RequestString('firstName');
$oItem->lastName	=OWASP::RequestString('lastName');
$oItem->userName	=OWASP::RequestString('userName');
$oItem->password	=OWASP::RequestString('password');
$oItem->email		=OWASP::RequestString('email');
$oItem->profileID	=OWASP::RequestInt('profileID');
$oItem->state		=OWASP::RequestInt('state');

$MODULE->processFormAction(new AdmUser(), $oItem);

if($MODULE->FormView=="edit"){
    $obj=AdmUser::getItem($kID);
    if($obj!=null){
//        if (!isset($oItem->userLDAP)) 	$oItem->userLDAP    =$obj->userLDAP;
        if (!isset($oItem->firstName)) 	$oItem->firstName   =$obj->firstName;
        if (!isset($oItem->lastName)) 	$oItem->lastName    =$obj->lastName;
        if (!isset($oItem->userName)) 	$oItem->userName    =$obj->userName;
        if (!isset($oItem->password)) 	$oItem->password    =$obj->password;
        if (!isset($oItem->email)) 	$oItem->email       =$obj->email;
        if (!isset($oItem->profileID))	$oItem->profileID   =$obj->profileID;
        if (!isset($oItem->state)) 	$oItem->state       =$obj->state;
    }
    else
        $MODULE->addError(AdmUser::GetErrorMsg());
		
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Usuario";

?>
