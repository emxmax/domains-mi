<?php

include "conexion.php";
$cn = db_connect();

$sqlNoticiaAdmin = "SELECT no.no_id, no.no_titulo, no.no_fecha, no.no_desc, no.no_img, no.no_url, cat.cat_des FROM noticia no INNER JOIN categoria cat ON no.cat_id=cat.cat_id";
$rsNoticiaAdmin = mysql_query($sqlNoticiaAdmin);
$nNoticiaAdmin = mysql_num_rows($rsNoticiaAdmin);

$sqlCategoriaAdmin = "SELECT * FROM categoria";
$rsCategoriaAdmin = mysql_query($sqlCategoriaAdmin);
$nCategoriaAdmin = mysql_num_rows($rsCategoriaAdmin);

$sqlBiografiaAdmin = "SELECT * FROM biografia";
$rsBiografiaAdmin = mysql_query($sqlCategoriaAdmin);
$nBiografiaAdmin = mysql_num_rows($rsCategoriaAdmin);
?>