<?php
$dni    =(isset($_REQUEST["dni"])) ? $_REQUEST["dni"] : NULL;
$clave  =(isset($_REQUEST["clave"])) ? $_REQUEST["clave"] : NULL;

if(isset($dni) && isset($clave)){
    if (WebLogin::Logon($dni, $clave)){
        header("location: index.php?formView=home");
        exit();
    }
    else{
        $PAGE->addError("Tus datos de acceso no son v&aacute;lidos!");	
    }
}
?>
