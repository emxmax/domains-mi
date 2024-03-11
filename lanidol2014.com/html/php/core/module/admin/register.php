<?php
$oItem = new eCrmRegisterForm();

$oItem->registerID	=$kID;
$oItem->formID		=OWASP::RequestInt('formID');
$oItem->registerCode	=OWASP::RequestString('registerCode');
$oItem->name		=OWASP::RequestString('name');
$oItem->lastname	=OWASP::RequestString('lastname');
$oItem->surname		=OWASP::RequestString('surname');
$oItem->phone		=OWASP::RequestString('phone');
$oItem->countryID	=OWASP::RequestString('countryID');
$oItem->city		=OWASP::RequestString('city');
$oItem->address		=OWASP::RequestString('address');
$oItem->email		=OWASP::RequestString('email');
$oItem->contactID	=OWASP::RequestInt('contactID');
$oItem->comment		=OWASP::RequestString('comment');
$oItem->state		=OWASP::RequestString('state');
$oItem->registerDate	=OWASP::RequestString('registerDate');
$oItem->reviewDate	=OWASP::RequestString('reviewDate');

$txtsearch		=OWASP::RequestString('txtsearch');

$MODULE->processFormAction(new CrmRegisterForm(), $oItem);

$DAO=$MODULE->StaticDAO;
if($MODULE->FormView=="edit"){
    $obj=$DAO::getItem($kID);
    if($obj!=null){
        if (!isset($oItem->formID))         $oItem->formID          = $obj->formID;
        if (!isset($oItem->registerCode))   $oItem->registerCode    = $obj->registerCode;
        if (!isset($oItem->name))           $oItem->name            = $obj->name;
        if (!isset($oItem->lastname))       $oItem->lastname        = $obj->lastname;
        if (!isset($oItem->surname))        $oItem->surname         = $obj->surname;
        if (!isset($oItem->phone))          $oItem->phone           = $obj->phone;
        if (!isset($oItem->countryID))      $oItem->countryID       = $obj->countryID;
        if (!isset($oItem->city))           $oItem->city            = $obj->city;
        if (!isset($oItem->district))       $oItem->district        = $obj->district;
        if (!isset($oItem->address))        $oItem->address         = $obj->address;
        if (!isset($oItem->email))          $oItem->email           = $obj->email;
        if (!isset($oItem->contactID))      $oItem->contactID       = $obj->contactID;
        if (!isset($oItem->comment))        $oItem->comment         = $obj->comment;
        if (!isset($oItem->state))          $oItem->state           = $obj->state;
        if (!isset($oItem->registerDate))   $oItem->registerDate    = $obj->registerDate;
        if (!isset($oItem->reviewDate))     $oItem->reviewDate      = $obj->reviewDate;
    }
    else
        $MODULE->addError($DAO::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->name." ".$oItem->lastname;
$MODULE->ItemType="Registro";
?>
