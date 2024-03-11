<?php
include('../../config/conexion.php');
include('../../modelo/categoria.php');
include('../../modelo/funciones.php');
include('../../modelo/globales.php');

$arrjson = false;
$data = json_decode(file_get_contents('php://input'), true);
$page 		= $data['page'];
$filtro 	= $data['filtro'];
$codcategoria 	= $data['codcategoria'];
$gIdioma 	= $data['gIdioma'];


$objnot 	= new Categoria();
$datanot 	= $objnot->dameListado($page,$filtro,0,0,$codcategoria,$gIdioma);
$num_total_registros = count($datanot);
$arrjson['paginado']['num_total_registros'] = $num_total_registros;
//Limito la busqueda
$TAMANO_PAGINA = 8;
$cantidadCte = 8;
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
// setearon que todo empieze desde  0
$inicio = 8;
$TAMANO_PAGINA = $pagina * $cantidadCte;
$arrjson['paginado']['TAMANO_PAGINA'] = $TAMANO_PAGINA;
//**************************************************************
//*************************Imprimimos***************************
$objnot 	= new Categoria();
$datanot 	= $objnot->dameListado($page,$filtro,$inicio,$TAMANO_PAGINA,$codcategoria,$gIdioma);

$item 		= count($datanot) - 1;
$contItem   = $inicio; 
$objfunc 	= new misFunciones();
$classrow = "";
$itemrow = 1;
for($i=0; $i<=$item; $i++){
	$contItem++;
	$data 	= $datanot[$i];
	$arrjson['listado'][$i]['items'] 		= $contItem;
	$arrjson['listado'][$i]['id'] 		= $data['art_id'];
	$arrjson['listado'][$i]['nameurl_seo'] 	= $data['nameurl_seo'];
	if($gIdioma == "es"){
		$arrjson['listado'][$i]['titulo'] 	= $data['art_nombre'];
		$data['art_descripsuperior'] = $objfunc->convertir_html($data['art_descripsuperior']);
		$arrjson['listado'][$i]['descripsuperior'] = $data['art_descripsuperior'];
		$arrjson['listado'][$i]['descripinferior'] = $data['art_descripinferior'];
		$arrjson['listado'][$i]['frase'] 			= $data['art_frase'];
		$arrjson['listado'][$i]['namecategoria'] 	= $data['namecategoria'];
	}
	else{
		$arrjson['listado'][$i]['titulo'] 	= $data['art_nombre_en'];
		$data['art_descripsuperior_en'] = $objfunc->convertir_html($data['art_descripsuperior_en']);
		$arrjson['listado'][$i]['descripsuperior'] = $data['art_descripsuperior_en'];
		$arrjson['listado'][$i]['descripinferior'] = $data['art_descripinferior_en'];
		$arrjson['listado'][$i]['frase'] 			= $data['art_frase_en'];
		$arrjson['listado'][$i]['namecategoria'] 	= $data['namecategoria_en'];
	}
	
	if(strlen($arrjson['listado'][$i]['titulo']) > 72){
		$arrjson['listado'][$i]['titulo'] = substr($arrjson['listado'][$i]['titulo'], 0 , 72)."...";
	}
	$arrjson['listado'][$i]['descripsuperior'] = strip_tags($arrjson['listado'][$i]['descripsuperior']);
	if(strlen($arrjson['listado'][$i]['descripsuperior']) > 150){
		$arrjson['listado'][$i]['descripsuperior'] = substr($arrjson['listado'][$i]['descripsuperior'], 0 , 150)."...";
	}
	
	$arrjson['listado'][$i]['imgportada'] 		= $data['art_imgportada'];
	$arrjson['listado'][$i]['tipomultimedia'] 	= $data['art_tipomultimedia'];
	$arrjson['listado'][$i]['categoria'] 		= $data['tca_cat_id'];
	$arrjson['listado'][$i]['imggrande'] 		= $data['art_imggrande'];
	$arrjson['listado'][$i]['video'] 			= $data['art_video'];
	$arrjson['listado'][$i]['f_publicacion'] 	= $data['art_fechapublicacion'];
    $arrjson['listado'][$i]['for_f_publica']    = $objfunc->postFecha($data['art_fechapublicacion'],$gIdioma);
	$arrjson['listado'][$i]['estado'] 	= $data['art_estado'];
	if ($itemrow > 2){
        $classrow = $classrow;
        $itemrow = 1;
        if ($classrow!="blanco"){
        	if($data['art_imgportada']){
            	$arrjson['listado'][$i]['backgroundimage'] = "background-image:url("._URL_."adminkarl/resources/assets/image/noticia/".$data['art_imgportada'];
        	}
        	else{
            	$arrjson['listado'][$i]['backgroundimage'] = "background-image:url("._URL_."adminkarl/resources/assets/image/noticia/".$data['art_imggrande'];
        	}
        }
    }else{
        if ($classrow == ""){
            $classrow = "blanco";
            $arrjson['listado'][$i]['backgroundimage'] = "";
        }else{
            $classrow = "";
            if($data['art_imgportada']){
            	$arrjson['listado'][$i]['backgroundimage'] = "background-image:url("._URL_."adminkarl/resources/assets/image/noticia/".$data['art_imgportada'];
        	}
        	else{
            	$arrjson['listado'][$i]['backgroundimage'] = "background-image:url("._URL_."adminkarl/resources/assets/image/noticia/".$data['art_imggrande'];
        	}
        }
    }
    $itemrow++;
	$arrjson['listado'][$i]['classrow'] 		= $classrow;
	if ($data['art_estado']==0){
		$arrjson['listado'][$i]['classestado'] 	= "icon-cross";
		$arrjson['listado'][$i]['estado'] = 1;
	}
	else{
		$arrjson['listado'][$i]['classestado'] 	= "icon-checkmark";
		$arrjson['listado'][$i]['estado'] = 0;
	}
	$arrjson['listado'][$i]['f_creacion'] 		= $data['art_fechacreacion'];
	$arrjson['listado'][$i]['f_modificacion'] 	= $data['art_fechamodificacion'];
}
echo json_encode($arrjson);
?>