<?php
$oItem = new eCrmEmpleadoLog();

$oItem->registroID		=$kID;
$oItem->fechaRegistro	=(isset($_REQUEST["fechaRegistro"]))? $_REQUEST["fechaRegistro"] : NULL;
$oItem->personaID		=(isset($_REQUEST["personaID"])) ? $_REQUEST["personaID"] : NULL;
$oItem->moduleID		=(isset($_REQUEST["moduleID"]))? $_REQUEST["moduleID"] : NULL;
$oItem->contentID		=(isset($_REQUEST["contentID"])) 	? $_REQUEST["contentID"] : NULL;
$oItem->observacion		=(isset($_REQUEST["observacion"])) 	? $_REQUEST["observacion"] : NULL;

$oItem->gerencia		=(isset($_REQUEST["gerencia"])) 	? $_REQUEST["gerencia"] : NULL;

$MODULE->OrderBy=($OrderBy!="") ? $OrderBy : "pageViews DESC";
$MODULE->processFormAction(new CrmEmpleadoLog(), $oItem);
?>
