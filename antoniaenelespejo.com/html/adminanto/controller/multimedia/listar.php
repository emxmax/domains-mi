<?php
define("_URL_", "http://antoniaenelespejo.com/adminanto/");
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/usuario.php');
include('../../modelo/multimedia.php');

$arrjson = false;
$data = json_decode(file_get_contents('php://input'), true);
$page 		= $data['page'];
$filtro 	= $data['filtro'];

$objnot 	= new Multimedia();
$datanot 	= $objnot->dameListado($page,$filtro,0,0);
$num_total_registros = count($datanot);
$arrjson['paginado']['num_total_registros'] = $num_total_registros;
//Limito la busqueda
$TAMANO_PAGINA = 25;
$arrjson['paginado']['TAMANO_PAGINA'] = $TAMANO_PAGINA;

$pagina = $page;

if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
$arrjson['paginado']['pagina'] = $pagina;
$arrjson['paginado']['inicio'] = $inicio;


//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

$arrjson['paginado']['total_paginas'] = $total_paginas;


// Imprimimos
$objnot 	= new Multimedia();
$datanot 	= $objnot->dameListado($page,$filtro,$inicio,$TAMANO_PAGINA);

$item 		= count($datanot) - 1;
$contItem   = $inicio; 
$objfunc 	= new misFunciones();
for($i=0; $i<=$item; $i++){
	$contItem++;
	$data 	= $datanot[$i];
	$arrjson['listado'][$i]['items'] 	= $contItem;
	$arrjson['listado'][$i]['id'] 		= $data['tmu_id'];
	$arrjson['listado'][$i]['imagen'] 	= $data['tmu_archivo'];
	$arrjson['listado'][$i]['url'] 		= _URL_."resources/assets/image/multimedia/".$data['tmu_archivo'];
	$arrjson['listado'][$i]['f_creacion'] 		= $data['tmu_fechacreacion'];
	$arrjson['listado'][$i]['f_modificacion'] 	= $data['tmu_fechamodificacion'];
}
echo json_encode($arrjson);
?>