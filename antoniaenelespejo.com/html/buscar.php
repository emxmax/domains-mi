<?php
include('config/conexion.php');
include('modelo/funciones.php');
include('modelo/noticia.php');

// Imprimimos las noticias destacadas

if (isset($_GET['e']))
  $filtro = $_GET['e'];
else
  $filtro = ''; 
$cat = 0;
// Imprimimos las últimas noticias ingresadas máximo 12
//Limito la busqueda
$TAMANO_PAGINA = 4;
if (!isset($_GET['pagina'])) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($_GET['pagina'] - 1) * $TAMANO_PAGINA;
   $pagina = $_GET['pagina'];
}

$objnot   = new Noticia();
$datanot  = $objnot->damenotCategoria($page,$filtro,0,0,$cat);
$num_total_registros = count($datanot);


//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

if ($total_paginas > 3)
  $total_paginas = 3;


$paginado_html = "";

if ($total_paginas > 1){
  $paginado_html.= "<div class='paginado'>";
  $paginado_html.= "<ul>";
  for ($i = 0; $i <= ($total_paginas - 1); $i++ ){
    $paginado_html.= "<li>";
    $paginado_html.= "<a href='index.php?pagina=".($i + 1)."'>".($i + 1);
    if ($i != ($total_paginas - 1))
      $paginado_html.= "-";
    $paginado_html.= "</a>";
    $paginado_html.= "</li>";
  }
  $paginado_html.= "</ul>";
  $paginado_html.= "</div>";
}

$objnot   = new Noticia();

$datanot  = $objnot->damenotCategoria($page,$filtro,0,0,$cat);

$item     = count($datanot) - 1;
$objfunc  = new misFunciones();
$ultnot_html = "";
for($i=0; $i<=$item; $i++){
  $data                 = $datanot[$i];
  $ultnot_id               = $data['art_id'];
  $ultnot_titulo           = $data['art_nombre'];
  $ultnot_order            = $data['art_order'];
  $ultnot_seo              = "noticias/".$data['seo_url'];
  $ultnot_descrip_corta    = $objfunc->convertir_html($data['art_descripsuperior']);
  $ultnot_descripcion      = $objfunc->convertir_html($data['art_descripinferior']);
  $ultnot_frase            = $data['art_frase'];
  $ultnot_imgportada       = $data['art_imgportada'];
  $ultnot_tipomultimedia   = $data['art_tipomultimedia'];
  $ultnot_categoria        = $data['tca_cat_id'];
  $ultnot_namecategoria    = $data['namecategoria'];
  $ultnot_imggrande        = $data['art_imggrande'];
  $ultnot_video            = $data['art_video'];
  $ultnot_f_publicacion    = $objfunc->postFecha($data['art_fechapublicacion']);
  $ultnot_estado           = $data['art_estado'];
  $ultnot_destacado        = $data['art_destacado'];


  $ultnot_html.= "<div ng-mouseover='hoverBuscar(".$ultnot_id .")' ng-mouseleave='quitarHoverBuscar()' class='row' style='position:relative;width:349px'>";
  $ultnot_html.= "<a href='".$ultnot_seo."'><figure><img src='./adminanto/resources/assets/image/noticias/".$ultnot_imgportada."' alt='' style='height:248px;width:349px'></figure>";
  $ultnot_html.= "<p>".$ultnot_titulo."</p></a>";
  $ultnot_html.= "<div id='b-".$ultnot_id ."' class='hoverBuscar' style='top:0'>";
  $ultnot_html.= "<div class='row'><a href='".$ultnot_seo."'>VER PUBLICACIÓN</a></div>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "</div>";

}

?>
<!DOCTYPE html>
<html lang="es" ng-app="Antonia">
  <head>
    <title>Antonia en el Espejo |  Antonia del Solar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Antonia en el espejo">
    <meta name="description" content="Antonia en el espejo">
    <meta name="keywords" content="Antonia en el espejo">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="public/image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./bower_components/HTML5-Reset/assets/css/reset.css">
    <link rel="stylesheet" href="./bower_components/HTML5-Reset/assets/css/style.css">
    <link href="./bower_components/flickerplate/css/flickerplate.css" rel="stylesheet">
    <link href="./bower_components/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./resources/assets/css/app.css" rel="stylesheet">
  </head>
  <body>
    <?php include('page/header.php'); ?>
    <div ng-controller="bannerCrtl" id="banner" class="buscar">
      <!-- <div class="inner-titulo">
        <div class="row">
          <h2>TU</h2>
          <div class="separador"></div>
          <h1>MEJOR VERSIÓN</h1>
          <div class="separador"></div>
        </div>
      </div> -->
      <section class="resultados">
        <div class="container">
          <h1><?php echo $num_total_registros; ?> resultados de búsqueda para <?php echo $filtro; ?></h1>
          <div class="inner-buscador">
            <?php echo $ultnot_html; ?>
          </div>
        </div>
      </section>
      <section class="instagram">
        <div class="container">
          <h4>@ANTONIAENELESPEJO I INSTAGRAM</h4>
          <div class="inner-instagram">
            <div style="position: relative; height: 100%; width: 100%;"><iframe src="//widgets-code.websta.me/w/36febeea5647?ck=MjAxNy0wNS0xOFQyMDoyNzoxMy4wMDBa" class="websta-widgets" allowtransparency="true" frameborder="0" scrolling="no" style=" top: 0; left: 0; width: 100%;"></iframe> <!-- WEBSTA WIDGETS - widgets.websta.me --></div>
          </div>
        </div>
      </section>
    </div>
    <?php include('page/footer.php'); ?>
  </body>
  <!--script-->
  <script src="./bower_components/jquery/dist/jquery.min.js"></script>
  <script src="./bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="./bower_components/angular/angular.min.js"></script>
  <script src="./bower_components/jquery-validation/dist/jquery.validate.js"></script>
  <script src="./bower_components/angular-sanitize/angular-sanitize.js"></script>
  <script src="./resources/assets/js/jquery.easing.1.3.js"></script>
  <script src="./resources/assets/js/init.js"></script>
  <script src="./resources/assets/js/controller/controller.js"></script>
  <script src="./bower_components/flickerplate/js/flickerplate.js"></script>
</html>