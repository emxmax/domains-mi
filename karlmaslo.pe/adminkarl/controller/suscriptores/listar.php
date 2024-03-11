<?php
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/suscriptores.php');

$arrjson = false;
$data = json_decode(file_get_contents('php://input'), true);
$page 		= $data['page'];
$filtro 	= $data['filtro'];

$objnot 	= new Suscriptores();
$datanot 	= $objnot->dameListado($page,$filtro,0,0);
$num_total_registros = count($datanot);
$arrjson['paginado']['num_total_registros'] = $num_total_registros;
//Limito la busqueda
$TAMANO_PAGINA = 10;
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
$objnot 	= new Suscriptores();
$datanot 	= $objnot->dameListado($page,$filtro,$inicio,$TAMANO_PAGINA);
$arrjson['cc'] = $datanot; 
$item 		= count($datanot) - 1;
$contItem   = $inicio; 
$objfunc 	= new misFunciones();
for($i=0; $i<=$item; $i++){
	$contItem++;
	$data 	= $datanot[$i];
	$arrjson['suscriptores'][$i]['items'] 	= $contItem;
	$arrjson['suscriptores'][$i]['id'] 		= $data['id'];
	$arrjson['suscriptores'][$i]['email'] 	= $data['email'];
	$arrjson['suscriptores'][$i]['fecha'] 	= $data['fecha'];
}
echo json_encode($arrjson);
?>