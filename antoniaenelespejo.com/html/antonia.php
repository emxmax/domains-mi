<?php

include('./config/conexion.php');
include('./modelo/funciones.php');
include('./modelo/noticia.php');

$objfunc  = new misFunciones();
$objnot   = new Noticia();
$datanot  = $objnot->dameDetalleAntonia(7);

$data       = $datanot[0];
$codigo   = $data['art_id'];
$titulo   = $objfunc->convertir_html($data['art_nombre']);
$order      = $data['art_order'];
$url_seo    = $data['nameurl_seo'];
$descrip_superior = $objfunc->convertir_html($data['art_descripsuperior']);
$descrip_inferior = $objfunc->convertir_html($data['art_descripinferior']);
$sumilla      = $objfunc->convertir_html($data['art_frase']);
//$img_portada']   = $data['art_imgportada'];
$act_img_portada  = $data['art_imgportada'];
if (empty($data['art_imgportada']))
  $act_img_portada  = "blanco.jpg";
$categoria     = $data['tca_cat_id'];
$namecategoria   = $data['namecategoria'];

$art_imggrande    = $data['art_imggrande'];



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
    <link rel="manifest" href="./resources/assets/image/favicon/manifest.json"><meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="./bower_components/HTML5-Reset/assets/css/reset.css">
    <link rel="stylesheet" href="./bower_components/HTML5-Reset/assets/css/style.css">
    <link href="./bower_components/flickerplate/css/flickerplate.css" rel="stylesheet">
    <link href="./bower_components/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./resources/assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="./resources/assets/css/lightslider.css">
  </head>
  <body>
    <?php include('page/header.php'); ?>
    <div ng-controller="bannerantoniaCrtl" id="banner" class="antonia">
      <div class="flicker-example">
        <ul>
          <li class="banner1">
            <!-- <img src="./resources/assets/image/soy_antonia.jpg"> -->
            <div class="flick-title center">
              <hgroup>
                <h1>HOLA,</h1>
                <h1>soy Antonia</h1>
                <div class="separadorBanner"></div>
              </hgroup>
            </div>
          </li>
        </ul>
      </div>
      <div class="noticia">
        <div class="container">
          <div class="inner-noticias">
            <div class="row caja-noticia">
              <h1><?php echo $titulo; ?></h1>
              <div class="bordertitulo"></div>
              <?php echo $descrip_inferior; ?>
              <div class="inner-redessociales">
                <h2>¿Te animas a mirarte?</h2>
                <div class="inner-mirarte">
                  <div class="row">
                    <ul>
                      <li><a href="https://www.facebook.com/antoniaenelespejo" target="_blank"><i class="icon-facebook"></i></a></li>
                      <li><a href="https://twitter.com/antoenelespejo" target="_blank"><i class="icon-twitter"></i></a></li>
                      <li><a href="https://www.instagram.com/antoniaenelespejo/" target="_blank"><i class="icon-instagram"></i></a></li>
                      <li><a href="https://www.pinterest.es/antoniaenelespejo/" target="_blank"><i class="icon-pinterest"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="videos">
                <h1>VIDEOS</h1>
                <h4>MI RUTINA DE CUIDADO DE LA PIEL EN LA NOCHE</h4>
                <p>
                  <iframe width="640" height="360" src="https://www.youtube.com/embed/jQBt2SoXTbU" frameborder="0" allowfullscreen></iframe>
                  <!-- <iframe src="https://player.vimeo.com/video/204049948?color=FFF1EA&amp;title=0&amp;byline=0&amp;portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
                </p>
                <div class="todo-videos"><a href="videos">VER TODOS</a></div>
              </div>
              <div class="libros">
                <h1>LIBROS RECOMENDADOS</h1>
                <div ng-controller="banner10Crtl" class="inner-slider">
                  <div id="carosel10" class="owl-carousel">
                    <div class="inner-owl">
                      <div class="overflow-item">
                        <p>LA LECCIÓN DE AUGUST - RAQUEL J. PALACIO</p><a href="" class="owl-descripcion">
                          <figure><img src="./resources/assets/image/leccion-de-august.jpg" alt=""></figure></a>
                      </div>
                    </div>
                    <div class="inner-owl">
                      <div class="overflow-item">
                        <p>FACE PAINT - LISA ELDRIGE</p><a href="" class="owl-descripcion">
                          <figure><img src="./resources/assets/image/face-paint.jpg" alt=""></figure></a>
                      </div>
                    </div>
                    <div class="inner-owl">
                      <div class="overflow-item">
                        <p>RAMÓN PREOCUPÓN - ANTHONY BROWNE</p><a href="" class="owl-descripcion">
                          <figure><img src="./resources/assets/image/ramon.jpg" alt=""></figure></a>
                      </div>
                    </div>
                    <!-- <div class="inner-owl">
                      <div class="overflow-item">
                        <p>ISABEL ALLENDE  l  EL AMANTE JAPONÉS</p><a href="" class="owl-descripcion">
                          <figure><img src="./resources/assets/image/libro1.jpg" alt=""></figure></a>
                      </div>
                    </div>
                    <div class="inner-owl">
                      <div class="overflow-item">
                        <p>ISABEL ALLENDE  l  EL AMANTE JAPONÉS</p><a href="" class="owl-descripcion">
                          <figure><img src="./resources/assets/image/libro1.jpg" alt=""></figure></a>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row asidebar">
              <div class="inner-antonia">
                <div class="row tituloSide">
                  <h1>¡No perdamos el contacto!</h1>
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
              <!-- <div class="inner-antonia publicidad">
                <div id="owl-demo1" class="owl-carousel owl-theme">
                  <div class="item">
                    <img src="./resources/assets/image/publicidad-1.jpg"></div>
                  <div class="item">
                    <img src="./resources/assets/image/publicidad-2.jpg"></div>
                  <div class="item">
                    <img src="./resources/assets/image/publicidad-3.jpg"></div>
                </div>
              </div> -->
              <div class="inner-antonia inner-auspiciadores">
                <div class="row tituloSide">
                  <h1>Nuestros Auspiciadores</h1>
                </div>
                <div class="inner-logos">
                  <!-- <div class="row"><img src="./resources/assets/image/tous.jpg" alt=""></div> -->
                  <!-- <div class="row"><img src="./resources/assets/image/logo-opi.jpg" alt="" class="separacion-logos"></div> -->
                  <div class="row"><img src="./resources/assets/image/logo-casaideas.jpg" alt=""></div>
                </div>
              </div>
              <div class="inner-antonia inner-tag" style="display:none">
                <div class="row">
                  <h1>Tag</h1>
                </div>
                <div class="row tags">
                  <div class="nombreTag"><a href="javascript:void(0)">TU MEJOR VERSIÓN</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">TU MEJOR VERSIÓN</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">MUJERES QUE INSPIRAN</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">NUESTRA CASA</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">VIDEOS</a></div>
                  <div class="nombreTag"><a href="javascript:void(0)">LIBROS</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!--       <section class="instagram">
        <div class="container">
          <h4>@ANTONIAENELESPEJO I INSTAGRAM</h4>
          <div class="inner-instagram">
            <div style="position: relative; height: 100%; width: 100%;"><iframe src="//widgets-code.websta.me/w/36febeea5647?ck=MjAxNy0wNS0xOFQyMDoyNzoxMy4wMDBa" class="websta-widgets" allowtransparency="true" frameborder="0" scrolling="no" style=" top: 0; left: 0; width: 100%;"></iframe></div>
          </div>
        </div>
      </section> -->
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
  <script src="./resources/assets/js/lightslider.min.js"></script>
  <script src="./resources/assets/js/menu4.js"></script>
  <script src="./resources/assets/js/lightslider.js"></script>
  <script src="./resources/assets/js/init.js"></script>
  <script src="./resources/assets/js/controller/controller.js"></script>
  <script src="./bower_components/flickerplate/js/flickerplate.js"></script>
  <!-- <script>  
    $(document).ready(function() {
   
    $("#owl-demo1").owlCarousel({
   
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay: 3000
        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
    });
   
  });
  </script> -->
</html>