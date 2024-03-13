<?php
if(!WebLogin::isLogged()){
    header('location: login.html');
    exit();
}

$usrSession     =WebLogin::getUserSession();
$personaID      =$usrSession["personaID"];
$nombreUsuario	=$usrSession["nombres"];
$nombreCompleto	=$usrSession["nombreCompleto"];
$mundoUsuario	=$usrSession["mundo"];

// Validar registro de logs
$oEmpleadoLog=new eCrmEmpleadoLog();
$oEmpleadoLog->personaID	=$usrSession["personaID"];
$oEmpleadoLog->moduleID		=21;
$oEmpleadoLog->contentID	=0;
$oEmpleadoLog->observacion	="URL: ".$_SERVER['REQUEST_URI'];
CrmEmpleadoLog::AddNew($oEmpleadoLog);
?>
