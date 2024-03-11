<?php
$varLang = "es";

$titlelang = "Karl Maslo - CEO regional de EXSA S.A.";
$metadescripcion = "Quiero compartir con ustedes mis opiniones y conocimientos sobre la industria Petroquímica, la industria del gas, la innovación y el sector minero en nuestro país.";
$metakey = "Petroquímica en el Perú,Desarrollo de la innovación,Industria del gas en el perú";
include('../config/conexion.php');
include('../modelo/funciones.php');
include('../modelo/noticia.php');
include('../modelo/globales.php');
include('../modelo/variables.php');

$objfunc 	= new misFunciones();
/***Obtenemos la informacion de bibliorafia***/
$objbiblio 	= new Noticia();
$databiblio = $objbiblio->detalleBibliografia();
$descriptionBilio = $objfunc->convertir_html($databiblio[0]['art_descripsuperior']);
$codigo = $objfunc->convertir_html($databiblio[0]['art_id']);
$imgportada	= $databiblio[0]['art_imgportada'];
?>
	
<?php include('../view/header.php');?>
<?php include('../view/inicio.php');?>
<?php include('../view/footer.php'); ?>