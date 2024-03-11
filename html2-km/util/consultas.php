<?php

include 'conexion.php';

$cn = db_connect();

$sqlNoticia = "SELECT * from noticia ORDER BY no_fecha DESC";
$rsNoticia = mysql_query($sqlNoticia);
$nNoticia = mysql_num_rows($rsNoticia);

$sqlInno = "SELECT * from noticia WHERE cat_id = 1 ORDER BY no_fecha DESC LIMIT 0,3";
$rsInno = mysql_query($sqlInno);
$nInno = mysql_num_rows($rsInno);

$sqlIndus = "SELECT * from noticia WHERE cat_id = 2 ORDER BY no_fecha DESC LIMIT 0,3";
$rsIndus = mysql_query($sqlIndus);
$nIndus = mysql_num_rows($rsIndus);

$sqlServ = "SELECT * from noticia WHERE cat_id = 3 ORDER BY no_fecha DESC LIMIT 0,3";
$rsServ = mysql_query($sqlServ);
$nServ = mysql_num_rows($rsServ);

$sqlNoticias = "SELECT * from noticia Where cat_id = 1 ORDER BY no_fecha DESC";
$rsNoticias = mysql_query($sqlNoticias);
$nNoticias = mysql_num_rows($rsNoticias);

$sqlNoticia2 = "SELECT * from noticia Where cat_id = 2 ORDER BY no_fecha DESC";
$rsNoticia2 = mysql_query($sqlNoticia2);
$nNoticia2 = mysql_num_rows($rsNoticia2);

$sqlNoticia3 = "SELECT * from noticia Where cat_id = 3 ORDER BY no_fecha DESC";
$rsNoticia3 = mysql_query($sqlNoticia3);
$nNoticia3 = mysql_num_rows($rsNoticia3);
?>

