<?php
$oContentLang=NULL;
$oSectionLang=NULL;

$usrSession     =WebLogin::getUserSession();
$nombreUsuario	=$usrSession["nombres"];
$nombreCompleto	=$usrSession["nombreCompleto"];

//Registro de Logs
$oEmpleadoLog=new eCrmEmpleadoLog();
$oEmpleadoLog->personaID	=$usrSession["personaID"];
$oEmpleadoLog->moduleID		=21;
$oEmpleadoLog->contentID	=0;
$oEmpleadoLog->observacion	="URL: ".$_SERVER['REQUEST_URI'];
CrmEmpleadoLog::AddNew($oEmpleadoLog);
?>