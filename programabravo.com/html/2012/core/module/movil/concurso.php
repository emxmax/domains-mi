<?php

$nombreUsuario	=$PAGE->UsrSession["nombres"];
$nombreCompleto	=$PAGE->UsrSession["nombreCompleto"];

//Registro de Logs
$oEmpleadoLog=new eCrmEmpleadoLog();
$oEmpleadoLog->personaID	=$PAGE->UsrSession["personaID"];
$oEmpleadoLog->moduleID		=26;
$oEmpleadoLog->contentID	=0;
$oEmpleadoLog->observacion	="URL: ".$_SERVER['REQUEST_URI'];
CrmEmpleadoLog::AddNew($oEmpleadoLog);

//$WEB_TEMPLATE="movil/web_concurso.php";
?>
