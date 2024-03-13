<?php

include 'inc/decon/connect.php';
include 'inc/decon/librerias.php';



/* Datos */

/*$front_banner_principal1 = $id_portal;
$front_banner_secundario1 = $id_portal;
$front_banner_secundario2 = $id_portal;
$front_seo = $id_portal;
$cod_mod = 5;

$front_id = $id_portal;

$fondo=mostrarFondo($db,$p,$front_id);

$modulo2="noticias";
$rsModulo2=$db->$modulo2()
    ->select("{$modulo2}.id,{$modulo2}.titulo,{$modulo2}.fecha_usuario,{$modulo2}.imagen,{$modulo2}.resumen")
    ->where(array("{$modulo2}.estado"=>1,"{$modulo2}.perfil"=>$p))->order("{$modulo2}.fecha_usuario desc,{$modulo2}.prioridad asc")->limit(4);

$modulo1="contenidos";
$rsModulo1=$db->$modulo1()->select("{$modulo1}.id,{$modulo1}.url,{$modulo1}.titulo_contenido")
    ->where(array("{$modulo1}.id_seccion"=>1,"{$modulo1}.estado"=>1,"{$modulo1}.visible"=>1,"{$modulo1}.perfil"=>$p,"{$modulo1}.url"=>"{$modulo2}.php"))->fetch();

$url_modulo1 = $urlSeo->crearUrlSeo($p, 1,array("seccion" => $modulo2,"id" => $rsModulo1["id"]));

$modulo3 = "tiendas";
$rsModulo3 = $db->$modulo3()->select("titulo,imagen")->where(array("estado"=>1,"perfil" => $p));*/




/* Seo */

//include 'inc/front/datos_seo.php';

?>