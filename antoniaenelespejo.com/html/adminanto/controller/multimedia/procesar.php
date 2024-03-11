<?php
header('Content-Type: application/json; charset=UTF-8');
date_default_timezone_set('America/Lima');//-->definimos la zona horaria
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/usuario.php');
include('../../modelo/multimedia.php');

$objfunc 	= new misFunciones();

$arrjson = "";

$arrjson['codigo'] 				= $objfunc->verificarDataPost('codigo');

$arrjson['act_img_portada']     = $objfunc->verificarDataPost('act_img_portada');

/***Procesar Imagenes****/
$objfunc 	= new misFunciones();

$arrjson['ruta'] = "../../resources/assets/image/multimedia/";

$arrjson['file_portada'] = "";
if (isset($_FILES['file_portada']))
	if (!empty($_FILES['file_portada'])){
		//if ($arrjson['tmp_file_portada'] != $_FILES['file_portada']['name']){
		$arrjson['file_portada'] = $objfunc->subirFoto('file_portada',$arrjson['ruta']);
		$objfunc->eliminarFoto($arrjson['act_img_portada'],$arrjson['ruta']);		
		//}
	}

$objnot 	= new Multimedia();
$bool_sql = false;
if ($arrjson['codigo'] > 0){
	/***Actualizamos dado que ya existe la Multimedia***/
	$bool_sql 	= $objnot->hacerActualizacion($arrjson);
	$mensaje = "Se ha actualizado correctamente";
	$arrjson['cambiar_url'] = false;
}else{
	/***Agregamos una Multimedia***/
	$bool_sql = $objnot->prodeceAregar($arrjson);
	$arrjson['codigo'] = $bool_sql;
	$mensaje = "Se añadió correctamente";
	$arrjson['cambiar_url'] = true;
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