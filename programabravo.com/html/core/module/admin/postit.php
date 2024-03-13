<?php
$oItem = new eCrmPostIt();

$oItem->postitID        =$kID;
$oItem->origenID        =(isset($_REQUEST["origenID"])) ? $_REQUEST["origenID"] : NULL;
$oItem->destinoID       =(isset($_REQUEST["destinoID"]))? $_REQUEST["destinoID"] : NULL;
$oItem->origen          =(isset($_REQUEST["origen"])) 	? $_REQUEST["origen"] : NULL;
$oItem->destino         =(isset($_REQUEST["destino"])) 	? $_REQUEST["destino"] : NULL;
$oItem->mundo           =(isset($_REQUEST["mundo"])) 	? $_REQUEST["mundo"] : NULL;
$oItem->votos           =(isset($_REQUEST["votos"])) 	? $_REQUEST["votos"] : NULL;
$oItem->mensaje         =(isset($_REQUEST["mensaje"])) 	? $_REQUEST["mensaje"] : NULL;
$oItem->fechaRegistro   =(isset($_REQUEST["fechaRegistro"]))? $_REQUEST["fechaRegistro"] : NULL;
$oItem->estado          =(isset($_REQUEST["estado"])) 	? $_REQUEST["estado"] : NULL;

$filtro_tipo=(isset($_REQUEST["filtro_tipo"])) ? $_REQUEST["filtro_tipo"] : NULL;
$filtro_mes =(isset($_REQUEST["filtro_mes"])) ? $_REQUEST["filtro_mes"] : date('m');
$filtro_anio=(isset($_REQUEST["filtro_anio"])) ? $_REQUEST["filtro_anio"] : date('Y');
$criterio   =(isset($_REQUEST["criterio"])) ? $_REQUEST["criterio"] : NULL;

$MODULE->processFormAction(new CrmPostIt(), $oItem);
?>