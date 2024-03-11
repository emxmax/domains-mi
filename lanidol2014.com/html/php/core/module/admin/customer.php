<?php
$oItem = new eShopCustomer();

$oItem->customerID	=$kID;
$oItem->customerCode	=OWASP::RequestString('customerCode');
$oItem->firstName	=OWASP::RequestString('firstName');
$oItem->lastName	=OWASP::RequestString('lastName');
$oItem->userName	=OWASP::RequestString('userName');
$oItem->password	=OWASP::RequestString('password');
$oItem->postalCode	=OWASP::RequestString('postalCode');
$oItem->countryID	=OWASP::RequestString('countryID');
$oItem->stateID		=OWASP::RequestString('stateID');
$oItem->address		=OWASP::RequestString('address');
$oItem->birthdate	=OWASP::RequestString('birthdate');
$oItem->phone		=OWASP::RequestString('phone');
$oItem->fax		=OWASP::RequestString('fax');
$oItem->email		=OWASP::RequestString('email');

$txtsearch		=OWASP::RequestString('txtsearch');

$MODULE->processFormAction(new ShopCustomer(), $oItem);

if($MODULE->FormView=="edit"){
    $result=ShopCustomer::getItem($kID);
    if($rs=ShopCustomer::fetchArray($result)){
        if (!isset($customerCode))  $customerCode   =$rs["customerCode"];
        if (!isset($firstName))     $firstName      =$rs["firstName"];
        if (!isset($lastName))      $lastName       =$rs["lastName"];
        if (!isset($userName))      $userName       =$rs["userName"];
        if (!isset($password))      $password       =$rs["password"];
        if (!isset($postalCode))    $postalCode     =$rs["postalCode"];
        if (!isset($stateID))       $stateID        =$rs["stateID"];
        if (!isset($city))          $city           =$rs["city"];
        if (!isset($address))       $address        =$rs["address"];
        if (!isset($birthdate))     $birthdate      =$rs["birthdate"];
        if (!isset($phone))         $phone          =$rs["phone"];
        if (!isset($fax))           $fax            =$rs["fax"];
        if (!isset($email))         $email          =$rs["email"];
        if (!isset($state))         $state          =$rs["state"];
    }
    else
        $MODULE->addError(ShopCustomer::GetErrorMsg());
}

$MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
$MODULE->ItemType="Cliente";
?>
