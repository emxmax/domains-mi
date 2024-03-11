<?php
$userName =OWASP::RequestString('userName');
$password =OWASP::RequestString('password');

if($MODULE->Command=='login'){
    $oAdmUser=AdmLogin::Logon($userName, $password);
    if ($oAdmUser!=NULL){
        $MODULE->loadSessionUser();
        $MODULE->registerLog("El usuario ingres&oacute; al sistema");
        header("location: index.php");
    }else{
        $MODULE->addError(AdmLogin::GetErrorMsg());
    }
}
?>
