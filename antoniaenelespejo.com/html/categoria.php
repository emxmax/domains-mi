<?php
include('config/conexion.php');
include('modelo/funciones.php');
include('modelo/noticia.php');
include('modelo/menu.php');

$catcod = $_GET['id'];

$objcat   = new Menu();

$datacat  = $objcat->dameNombre($catcod);
$nombrecat    = $datacat[0]['men_nombre'];
$codCatNot    = $datacat[0]['tca_categoria_cat_id'];
$cat_titulo1  = $datacat[0]['men_titulo1'];
$cat_titulo2  = $datacat[0]['men_titulo2'];

// Imprimimos las noticias de está categoria
$TAMANO_PAGINA = 6;
if (!isset($_GET['pagina'])) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($_GET['pagina'] - 1) * $TAMANO_PAGINA;
   $pagina = $_GET['pagina'];
}

$objnot   = new Noticia();
$datanot  = $objnot->dameListadoNotCat(0,0,$codCatNot);
$num_total_registros = count($datanot);
//Limito la busqueda


//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

$paginado_html = "";

if ($total_paginas > 1){
  $paginado_html.= "<div class='paginado'>";
  $paginado_html.= "<ul>";
  for ($i = 0; $i <= ($total_paginas - 1); $i++ ){
    $paginado_html.= "<li>";
    $paginado_html.= "<a href='categoria.php?id=".$catcod."&pagina=".($i + 1)."'>".($i + 1);
    if ($i != ($total_paginas - 1))
      $paginado_html.= "-";
    $paginado_html.= "</a>";
    $paginado_html.= "</li>";
  }
  $paginado_html.= "</ul>";
  $paginado_html.= "</div>";
}

$objnot   = new Noticia();

$datanot  = $objnot->dameListadoNotCat($inicio,$TAMANO_PAGINA,$codCatNot);

$item     = count($datanot) - 1;
$objfunc  = new misFunciones();
$lisnot_html = "";
for($i=0; $i<=$item; $i++){
  $data                 = $datanot[$i];
  $lisnot_id               = $data['art_id'];
  $lisnot_titulo           = $data['art_nombre'];
  $lisnot_order            = $data['art_order'];
  $lisnot_descrip_corta    = $objfunc->convertir_html($data['art_descripsuperior']);
  $lisnot_descripcion      = $objfunc->convertir_html($data['art_descripinferior']);
  $lisnot_frase            = $data['art_frase'];
  $lisnot_imgportada       = $data['art_imgportada'];
  $lisnot_tipomultimedia   = $data['art_tipomultimedia'];
  $lisnot_categoria        = $data['tca_cat_id'];
  $lisnot_namecategoria    = $data['namecategoria'];
  $lisnot_imggrande        = $data['art_imggrande'];
  $lisnot_video            = $data['art_video'];
  $lisnot_f_publicacion    = $objfunc->postFecha($data['art_fechapublicacion']);
  $lisnot_estado           = $data['art_estado'];
  $lisnot_destacado        = $data['art_destacado'];

  $lisnot_html.= "<div class='inner-noticia'>";
  $lisnot_html.= "<div class='row'>";
  $lisnot_html.= "<a href='detalle.php?codigo=".$lisnot_id."'>";
  $lisnot_html.= "<figure><img src='adminanto/resources/assets/image/noticias/".$lisnot_imgportada."' alt=''></figure>";
  $lisnot_html.= "</a>";
  $lisnot_html.= "<p class='categoria'>".$lisnot_namecategoria."</p>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "<div class='row inner-descripcion'>";
  $lisnot_html.= "<div class='column'>";
  
  $lisnot_html.= "<a href='detalle.php?codigo=".$lisnot_id."'>";
  $lisnot_html.= $lisnot_titulo;
  $lisnot_html.= "</a>";

  $lisnot_html.= "<p>".$lisnot_descrip_corta."</p>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "<div class='column'>";
  $lisnot_html.= "<div class='inner-footer-descripcion'>";
  $lisnot_html.= "<div class='row'>";
  $lisnot_html.= "<p class='fecha'>".$lisnot_f_publicacion."</p>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "<div class='row compartir'>";
  $lisnot_html.= "<div class='row'>";
  $lisnot_html.= "<p class='share'>Comparte:</p>";
  $lisnot_html.= "<ul>";
  $lisnot_html.= "<li><a href='javascript:void(0)'><i class='icon-facebook'></i></a></li>";
  $lisnot_html.= "<li><a href='javascript:void(0)'><i class='icon-twitter'></i></a></li>";
  $lisnot_html.= "<li><a href='javascript:void(0)'><i class='icon-instagram'></i></a></li>";
  $lisnot_html.= "</ul>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "</div>";
  $lisnot_html.= "</div>";

}


?>
<!DOCTYPE html>
<html lang="es" ng-app="Antonia">
  <head>
    <title>Antonia en el Espejo |  <?php echo $nombrecat; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Antonia en el espejo">
    <meta name="description" content="Antonia en el espejo">
    <meta name="keywords" content="Antonia en el espejo">
    <meta name="robots" content="index, follow">
    <link rel="apple-touch-icon" sizes="57x57" href="./resources/assets/image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./resources/assets/image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./resources/assets/image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./resources/assets/image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./resources/assets/image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./resources/assets/image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./resources/assets/image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./resources/assets/image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./resources/assets/image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./resources/assets/image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./resources/assets/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./resources/assets/image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./resources/assets/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="./resources/assets/image/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./resources/assets/image/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="./bower_components/HTML5-Reset/assets/css/reset.css">
    <link rel="stylesheet" href="./bower_components/HTML5-Reset/assets/css/style.css">
    <link href="./bower_components/flickerplate/css/flickerplate.css" rel="stylesheet">
    <link href="./bower_components/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./resources/assets/css/app.css" rel="stylesheet">
  </head>
  <body>
    <?php include('page/header.php'); ?>
    <div ng-controller="bannerCrtl" id="banner" class="version">
      <div class="inner-titulo">
        <div class="row">
          <h2><?php echo $cat_titulo1; ?></h2>
          <div class="separador"></div>
          <h1><?php echo $cat_titulo2; ?></h1>
          <div class="separador"></div>
        </div>
      </div>
      <section class="noticia-version">
        <div class="container">
          <div class="breadcrumb"><a href="index.html">Inicio</a>
            <p>
               
              <?php echo $nombrecat; ?>
            </p>
          </div>
          <h1><?php echo $nombrecat; ?></h1>
          <div class="inner-noticias">
            <div class="row caja-noticia">
              <?php echo $lisnot_html; ?>
              <?php echo $paginado_html; ?>
            </div>
            <div class="row asidebar">
              <div class="inner-antonia">
                <div class="row">
                  <figure><img src="./resources/assets/image/antonia.png" alt=""></figure>
                </div>
                <div class="row">
                  <h1>Hola, soy Antonia</h1>
                  <p>Me encanta la idea de compartir experiencias con una comunidad de mujeres donde todas nos podamos sentir reflejadas.</p>
                </div>
                <div class="row">
                  <p>Sígueme:</p>
                  <ul>
                    <li><a href="https://www.facebook.com/antoniaenelespejo" target="_blank"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/antoenelespejo" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/antoniaenelespejo/" target="_blank"><i class="icon-instagram"></i></a></li>
                    <li><a href="https://www.pinterest.es/antoniaenelespejo/" target="_blank"><i class="icon-pinterest"></i></a></li>
                  </ul>
                </div>
                <div class="row"><a href="antonia.html" class="boton">Conóceme</a></div>
              </div>
              <div class="inner-antonia">
                <div class="row tituloSide">
                  <h1>Conversemos, se parte juntas</h1>
                </div>
                <div class="row">
                  <form id="formSusc2" ng-controller="subscribirseInternoCrtl">
                    <div class="rowform msje">
                      <div class="alert alert-danger">
                        <h3>Su mensaje se ha enviado correctamente</h3>
                      </div>
                    </div>
                    <div class="rowform">
                      <input type="text" name="nombre" id="nombre" ng-model="form.nombre" placeholder="Nombre">
                    </div>
                    <div class="rowform">
                      <input type="email" name="correo" id="correo" ng-model="form.correo" placeholder="Correo">
                    </div>
                    <div class="row">
                      <button ng-click="enviarDatos(form)">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="inner-antonia inner-auspiciadores">
                <div class="row tituloSide">
                  <h1>Nuestros Auspiciadores</h1>
                </div>
                <div class="inner-logos">
                  <div class="row"><img src="./resources/assets/image/logo-casaideas.jpg" alt=""></div>
                  <!-- <div class="row"><img src="./resources/assets/image/tous.jpg" alt="" class="separacion-logos"></div> -->
                  <div class="row"><img src="./resources/assets/image/logo-opi.jpg" alt=""></div>
                </div>
              </div>
              <!-- <div class="inner-antonia publicidad">
                <figure><img src="./resources/assets/image/publicidad.jpg" alt=""></figure>
              </div> -->
              <div class="inner-antonia inner-tag">
                <div class="row">
                  <h1>Tag</h1>
                </div>
                <div class="row tags">
                  <div class="nombreTag"><a href="javascript:void(0)">TU MEJOR VERSIÓN</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">TU MEJOR VERSIÓN</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">TU MEJOR VERSIÓN</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">NUESTRA CASA</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">VIDEOS</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">LIBROS</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section ng-controller="banner2Crtl" class="favoritos">
        <div class="container">
          <div class="inner-destacado">
            <div class="row">
              <h2>FAVORITOS</h2>
            </div>
          </div>
          <div class="inner-slider">
            <div id="carosel2" class="owl-carousel">
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="detalle.html">
                      <figure><img src="./resources/assets/image/favorito1.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)">Bourjois Healthy</a>
                    <p>Una de mis fundaciones    de maquillaje favoritas.</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="detalle.html">
                      <figure><img src="./resources/assets/image/favorito1.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)">Bourjois Healthy</a>
                    <p>Una de mis fundaciones    de maquillaje favoritas.</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="detalle.html">
                      <figure><img src="./resources/assets/image/favorito1.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)">Bourjois Healthy</a>
                    <p>Una de mis fundaciones    de maquillaje favoritas.</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="detalle.html">
                      <figure><img src="./resources/assets/image/favorito1.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)">Bourjois Healthy</a>
                    <p>Una de mis fundaciones    de maquillaje favoritas.</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="detalle.html">
                      <figure><img src="./resources/assets/image/favorito1.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)">Bourjois Healthy</a>
                    <p>Una de mis fundaciones    de maquillaje favoritas.</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="detalle.html">
                      <figure><img src="./resources/assets/image/favorito1.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)">Bourjois Healthy</a>
                    <p>Una de mis fundaciones    de maquillaje favoritas.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section ng-controller="banner3Crtl" class="youtube">
        <div class="container">
          <div class="inner-destacado">
            <div class="row">
              <h4>@ANTONIAENELESPEJO I YOUTUBE</h4>
            </div>
          </div>
          <div class="inner-slider">
            <div id="carosel3" class="owl-carousel">
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img">
                    <figure><img src="./resources/assets/image/video1.jpg" alt=""></figure>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <figure><img src="./resources/assets/image/video2.jpg" alt=""></figure>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <figure><img src="./resources/assets/image/video3.jpg" alt=""></figure>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <figure></figure><img src="./resources/assets/image/video1.jpg" alt="">
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <figure><img src="./resources/assets/image/video2.jpg" alt=""></figure>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <figure><img src="./resources/assets/image/video3.jpg" alt=""></figure>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="instagram">
        <h4>@ANTONIAENELESPEJO I INSTAGRAM</h4>
        <div class="inner-instagram">
          <div class="row box-insta"><a href="https://www.instagram.com/p/BSwHSgIAb6o/" target="_blank">
              <figure><img src="./resources/assets/image/instagram/5.jpg" alt=""></figure></a>
            <div class="hoverInstagram">
              <div class="row"><a href="https://www.instagram.com/p/BSwHSgIAb6o/" target="_blank">INSTAGRAM</a></div>
            </div>
          </div>
          <div class="row box-insta"><a href="https://www.instagram.com/p/BSjVPg4gCv4/?taken-by=antoniaenelespejo" target="_blank">
              <figure><img src="./resources/assets/image/instagram/6.jpg" alt=""></figure></a>
            <div class="hoverInstagram">
              <div class="row"><a href="https://www.instagram.com/p/BSjVPg4gCv4/?taken-by=antoniaenelespejo" target="_blank">INSTAGRAM</a></div>
            </div>
          </div>
          <div class="row box-insta"><a href="https://www.instagram.com/p/BSi47rbAU7P/?taken-by=antoniaenelespejo" target="_blank">
              <figure><img src="./resources/assets/image/instagram/7.jpg" alt=""></figure></a>
            <div class="hoverInstagram">
              <div class="row"><a href="https://www.instagram.com/p/BSi47rbAU7P/?taken-by=antoniaenelespejo" target="_blank">INSTAGRAM</a></div>
            </div>
          </div>
          <div class="row box-insta"><a href="https://www.instagram.com/p/BSeDxkTA6Ug/?taken-by=antoniaenelespejo" target="_blank">
              <figure><img src="./resources/assets/image/instagram/8.jpg" alt=""></figure></a>
            <div class="hoverInstagram">
              <div class="row"><a href="https://www.instagram.com/p/BSeDxkTA6Ug/?taken-by=antoniaenelespejo" target="_blank">INSTAGRAM</a></div>
            </div>
          </div>
          <div class="row box-insta"><a href="https://www.instagram.com/p/BSZ5YowgDo5/?taken-by=antoniaenelespejo" target="_blank">
              <figure><img src="./resources/assets/image/instagram/9.jpg" alt=""></figure></a>
            <div class="hoverInstagram">
              <div class="row"><a href="https://www.instagram.com/p/BSZ5YowgDo5/?taken-by=antoniaenelespejo" target="_blank">INSTAGRAM</a></div>
            </div>
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