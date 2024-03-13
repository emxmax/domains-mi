<?php

#menu header principal
$rsSeccion0=$db->contenidos()->select("contenidos.id, contenidos.url, contenidos.titulo, contenidos.tipo_contenido, contenidos.ventana, contenidos.padre, contenidos.nivel, contenidos.elemento_cod_mod")->where(array("id_seccion"=>0,"nivel"=>1,"estado"=>1,"visible"=>1,"perfil"=>$p))->order("contenidos.id");

#aliados
$rsSeccion1=$db->contenidos()->select("contenidos.id, contenidos.url, contenidos.titulo, contenidos.tipo_contenido, contenidos.ventana, contenidos.padre, contenidos.nivel, contenidos.elemento_cod_mod")->where(array("id_seccion"=>1,"nivel"=>1,"estado"=>1,"visible"=>1,"perfil"=>$p))->order("contenidos.id");

#menu footer
$rsSeccion2=$db->contenidos()->select("contenidos.id, contenidos.url, contenidos.titulo, contenidos.tipo_contenido, contenidos.ventana, contenidos.padre, contenidos.nivel, contenidos.elemento_cod_mod")->where(array("id_seccion"=>2,"nivel"=>1,"estado"=>1,"visible"=>1,"perfil"=>$p))->order("contenidos.id");

#mapa del sitio + contactenos
$rsSeccion3=$db->contenidos()->select("contenidos.id, contenidos.url, contenidos.titulo, contenidos.tipo_contenido, contenidos.ventana, contenidos.padre, contenidos.nivel, contenidos.elemento_cod_mod")->where(array("id_seccion"=>3,"nivel"=>1,"estado"=>1,"visible"=>1,"perfil"=>$p))->order("contenidos.id");

#menu footer
$rsSeccion2_1=$db->contenidos()->select("contenidos.id, contenidos.url, contenidos.titulo, contenidos.tipo_contenido, contenidos.ventana, contenidos.padre, contenidos.nivel, contenidos.elemento_cod_mod")->where(array("id_seccion"=>2,"nivel"=>1,"estado"=>1,"visible"=>1,"perfil"=>$p,"url"=>"busqueda.php"))->order("contenidos.id");

#menu perfiles
$rsPerfiles=$db->perfiles()->select("perfiles.id, perfiles.titulo")->where(array("estado"=>1))->order("perfiles.id");


//$resultadoCatalogo=$db->categorias()->select("id")->where(array("id_seccion"=>1,"nivel"=>0,"estado"=>1,"perfil"=>$p))->fetch();
//$rsCatalogo = $db->categorias[array("id_seccion"=>0,"nivel"=>0,"estado"=>1,"perfil"=>$p)]["id"];


?>