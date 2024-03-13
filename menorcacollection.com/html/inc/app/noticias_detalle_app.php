<?php

include 'inc/decon/connect.php';
include 'inc/decon/librerias.php';


/* Principal */

$tblPrincipal = "contenidos";
$rsPrincipal = $db->$tblPrincipal()
					->select("{$tblPrincipal}.id,{$tblPrincipal}.titulo_contenido,{$tblPrincipal}.contenido,{$tblPrincipal}.padre,{$tblPrincipal}.cod_mod,{$tblPrincipal}.url,{$tblPrincipal}.elemento_cod_mod")
					->where(array("{$tblPrincipal}.id_seccion"=>1,"{$tblPrincipal}.id"=>$c,"{$tblPrincipal}.estado"=>1,"{$tblPrincipal}.perfil"=>$p))
					->fetch();


$principal_titulo = $rsPrincipal['titulo_contenido'];
$principal_id = $rsPrincipal['id'];
$principal_contenido = $rsPrincipal['contenido'];
$principal_cod_mod = $rsPrincipal['cod_mod'];


/***************************************/

/* Tablas */

$tbl1 = "noticias";


/***************************************/

/* Resultados */

$rsModulo1 = $db->$tbl1()->select("{$tbl1}.id, {$tbl1}.contenido, {$tbl1}.titulo, {$tbl1}.comentable")
					->where(array("{$tbl1}.estado"=>1,"{$tbl1}.perfil"=>$p,"{$tbl1}.id"=>$d))
					->fetch();

$modulo1_id = $rsModulo1["id"];
$modulo1_titulo = $rsModulo1["titulo"];					
$modulo1_contenido = $rsModulo1["contenido"];	
$modulo1_comentable = $rsModulo1['comentable'];


/***************************************/

/* Modulo */

$cod_mod_principal = $db->modulos[array("info_tabla"=>$tbl1)]['cod_mod'];
$modulo_url = "noticias";


/***************************************/

/* Fondo */

$front_id = $principal_id;
$fondo=mostrarFondo($db,$p,$front_id);


/***************************************/

/* Menu Vertical */

/*$menuNivel = new Nivel($db,1,1);
$menuNivel->ejecutar($id_categorias1);
$menuVertical = $menuNivel->obtenerId();*/


/* Opcion seleccionado del menu vertical*/

/*$menuTitulo = $db->categorias[array("id"=>$menuVertical)]["titulo"];
$menuId = $c;*/


/* Navegacion */

$navegacion = new Navegacion($db,site,1,$p,0);
$navegacion->ejecutar($principal_id);
$navegacion->agregarDato($principal_id);
$menuNavegacion = $navegacion->obtenerNavegacion();

$titulo_navegacion = $modulo1_titulo;
$titulo_principal = $modulo1_titulo;
//krsort($menuNavegacion);

/***************************************/

/*$rsCategorias6 = $db->categorias()->where(array("id"=>$menuVertical))->fetch();
$url_titulo = $urlSeo->tipoContenido($rsCategorias6["tipo_contenido"],$rsCategorias6["url"],$rsCategorias6["titulo"],$rsCategorias6["id"],$rsCategorias6["padre"],$rsCategorias6["nivel"],$p);*/


/* Datos */

$front_banner_principal1 = $principal_id;
$front_banner_secundario1 = $principal_id;
$front_seo = $modulo1_id;
$cod_mod = (isset($cod_mod_principal))? $cod_mod_principal: 5;


/* Seo */

include 'inc/front/datos_seo.php';

?>