<?php
$oItem = new eCrmEmpleado();

$oItem->personaID			=$kID;
$oItem->nombres				=(isset($_REQUEST["nombres"])) ? $_REQUEST["nombres"] : NULL;
$oItem->apellido1			=(isset($_REQUEST["apellido1"])) 	? $_REQUEST["apellido1"] : NULL;
$oItem->apellido2			=(isset($_REQUEST["apellido2"])) 	? $_REQUEST["apellido2"] : NULL;
$oItem->dni					=(isset($_REQUEST["dni"])) 	? $_REQUEST["dni"] : NULL;
$oItem->clave				=(isset($_REQUEST["clave"])) 	? $_REQUEST["clave"] : NULL;
$oItem->fechaNacimiento		=(isset($_REQUEST["fechaNacimiento"])) 	? $_REQUEST["fechaNacimiento"] : NULL;
$oItem->posicion			=(isset($_REQUEST["posicion"])) 		? $_REQUEST["posicion"] : NULL;
$oItem->unidadOrganizativa	=(isset($_REQUEST["unidadOrganizativa"])) 		? $_REQUEST["unidadOrganizativa"] : NULL;
$oItem->superiorID			=(isset($_REQUEST["superiorID"])) 	? $_REQUEST["superiorID"] : NULL;
$oItem->superiorNombre		=(isset($_REQUEST["superiorNombre"])) 		? $_REQUEST["superiorNombre"] : NULL;
$oItem->gerencia			=(isset($_REQUEST["gerencia"])) 			? $_REQUEST["gerencia"] : NULL;
$oItem->email				=(isset($_REQUEST["email"])) 		? $_REQUEST["email"] : NULL;
$oItem->estado				=(isset($_REQUEST["estado"])) 		? $_REQUEST["estado"] : NULL;

$criterio	=(isset($_REQUEST["criterio"])) 	? $_REQUEST["criterio"] : NULL;

$MODULE->processFormAction(new CrmEmpleado(), $oItem);
?>
