<?php
header('Content-Type: application/json; charset=UTF-8');
date_default_timezone_set('America/Lima');//-->definimos la zona horaria
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/usuario.php');
include('../../modelo/noticia.php');

$objfunc 	= new misFunciones();

$arrjson = "";

$arrjson['codigo'] 				= $objfunc->verificarDataPost('codigo');
$arrjson['titulo'] 				= $objfunc->verificarDataPost('titulo');
$arrjson['descrip_inferior'] 	= $objfunc->verificarDataPost('descrip_inferior');
$arrjson['categoria']      		= 5; // categoria = bibliografia


$arrjson['estado'] 			= 1;

/***Procesar Imagenes****/
$objfunc 	= new misFunciones();

$objnot 	= new Noticia();
$bool_sql = false;
if ($arrjson['codigo'] > 0){
	/***Actualizamos dado que ya existe la noticia***/
	$bool_sql 	= $objnot->actualizarBibliografia($arrjson);
	$arrjson['xxxx'] = $bool_sql;
	$mensaje = "Se ha actualizado correctamente";
	$arrjson['cambiar_url'] = false;
}

if ($bool_sql){	
	$arrjson['message'] 	= $mensaje;
	$arrjson['success'] 	= true;
	$arrjson['class_mess']  = "exito";
}else{
	$arrjson['message'] 	= "No se ha podido, vuelva a intentarlo más tarde";
	$arrjson['success'] 	= false;
	$arrjson['class_mess']  = "error";
}


echo json_encode($arrjson);
?>