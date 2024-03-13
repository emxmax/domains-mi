<?php

include 'inc/decon/connect.php';
include 'inc/decon/librerias.php';


/* Tablas */

$tbl1 = "noticias";


/***************************************/

/* Principal */

$tblPrincipal = "contenidos";
$rsPrincipal = $db->$tblPrincipal()
					->select("{$tblPrincipal}.id,{$tblPrincipal}.titulo_contenido,{$tblPrincipal}.contenido,{$tblPrincipal}.padre,{$tblPrincipal}.cod_mod,{$tblPrincipal}.url,{$tblPrincipal}.elemento_cod_mod")
					->where(array("{$tblPrincipal}.id_seccion"=>1,"{$tblPrincipal}.id"=>$c,"{$tblPrincipal}.estado"=>1,"{$tblPrincipal}.perfil"=>$p))
					->fetch();


$principal_titulo = $rsPrincipal['titulo_contenido'];
$principal_id = $rsPrincipal['id'];
$principal_contenido = $rsPrincipal['contenido'];
//$principal_elemento_cod_mod = $rsPrincipal['elemento_cod_mod'];

//$principal_extra = $db->{$tblPrincipal}[array("id"=>$principal_padre)]["elemento_cod_mod"];


/***************************************/

/* Resultados */

$rsModulo1 = $db->$tbl1()
					->where(array("{$tbl1}.estado"=>1,"{$tbl1}.perfil"=>$p))->order("{$tbl1}.fecha_usuario desc");

$modulo1_id = $rsModulo1["id"];
$modulo1_titulo = $rsModulo1["titulo"];					


/***************************************/

/* Modulo */

//$cod_mod_principal = $db->modulos[array("info_tabla"=>$tbl1)]['cod_mod'];
$modulo_url = "noticias";


/***************************************/

/* Fondo */

$front_id = $principal_id;
$fondo=mostrarFondo($db,$p,$front_id);


/***************************************/

/* Paginador */

$modulo_paginacion = "noticias";

$porPagina = por_pagina;
$pagina = isset($_GET['d'])? $_GET['d'] : 0;
$resultadoPaginacion = $rsModulo1;

include 'inc/front/paginacion.php';


/***************************************/

/* Menu Vertical */

/*$menuNivel = new Nivel($db,0,1);
$menuNivel->ejecutar($principal_id);
$menuVertical = $menuNivel->obtenerId();*/


/* Opcion seleccionado del menu vertical*/

/*$menuTitulo = $db->categorias[array("id"=>$menuVertical)]["titulo"];
$menuId = $c;*/


/* Navegacion */

$navegacion = new Navegacion($db,site,1,$p,0);
$navegacion->ejecutar($principal_id);
$menuNavegacion = $navegacion->obtenerNavegacion();

$titulo_navegacion = $principal_titulo;
$titulo_principal = $principal_titulo;
krsort($menuNavegacion);

/***************************************/

/*$rsCategorias6 = $db->categorias()->where(array("id"=>$menuVertical))->fetch();
$url_titulo = $urlSeo->tipoContenido($rsCategorias6["tipo_contenido"],$rsCategorias6["url"],$rsCategorias6["titulo"],$rsCategorias6["id"],$rsCategorias6["padre"],$rsCategorias6["nivel"],$p);*/


/* Datos */

$front_banner_principal1 = $principal_id;
$front_banner_secundario1 = $principal_id;
$front_seo = $principal_id;
$cod_mod = (isset($cod_mod_principal))? $cod_mod_principal: 5;


/* Seo */

include 'inc/front/datos_seo.php';

?>