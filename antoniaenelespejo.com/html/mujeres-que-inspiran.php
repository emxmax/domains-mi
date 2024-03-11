<?php
include('config/conexion.php');
include('modelo/funciones.php');
include('modelo/noticia.php');

// Imprimimos las noticias destacadas

$cat = 2;
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

$paginado_html = "";

if ($total_paginas > 1){
  $paginado_html.= "<div class='paginado'>";
  $paginado_html.= "<ul>";
  for ($i = 0; $i <= ($total_paginas - 1); $i++ ){
    $paginado_html.= "<li>";
    $paginado_html.= "<a href='mujeres-que-inspiran?pagina=".($i + 1)."'>".($i + 1);
    if ($i != ($total_paginas - 1))
      $paginado_html.= "-";
    $paginado_html.= "</a>";
    $paginado_html.= "</li>";
  }
  $paginado_html.= "</ul>";
  $paginado_html.= "</div>";
}

$objnot   = new Noticia();

$datanot  = $objnot->damenotCategoria($page,"",$inicio,$TAMANO_PAGINA,$cat);

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

  $ultnot_html.= "<div class='inner-noticia'>";
  $ultnot_html.= "<div class='row inner-imagen'>";
  $ultnot_html.= "<a href='".$ultnot_seo."'>";
  $ultnot_html.= "<figure><img src='adminanto/resources/assets/image/noticias/".$ultnot_imgportada."' alt=''></figure>";
  $ultnot_html.= "</a>";
  $ultnot_html.= "<p class='categoria'>".$ultnot_namecategoria."</p>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "<div class='row inner-descripcion'>";
  $ultnot_html.= "<div class='column'>";
  
  $ultnot_html.= "<a href='".$ultnot_seo."'>";
  $ultnot_html.= $ultnot_titulo;
  $ultnot_html.= "</a>";

  $ultnot_html.= "<p>".$ultnot_descrip_corta."</p>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "<div class='column'>";
  $ultnot_html.= "<div class='inner-footer-descripcion'>";
  $ultnot_html.= "<div class='row'>";
  $ultnot_html.= "<p class='fecha'>".$ultnot_f_publicacion."</p>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "<div class='row compartir'>";
  $ultnot_html.= "<div class='row'>";
  $ultnot_html.= "<p class='share'>¿Te gustó? !Compártelo!:</p>";
  $ultnot_html.= "<ul class='rrssb-buttons'>";
  $ultnot_html.= "<li class='rrssb-facebook'><a class='popup' href='https://www.facebook.com/sharer/sharer.php?u=http://antoniaenelespejo.com/".$ultnot_seo."'><i class='icon-facebook'></i></a></li>";
  $ultnot_html.= "<li class='rrssb-twitter'><a class='popup' href='https://twitter.com/intent/tweet?text=http://antoniaenelespejo.com/".$ultnot_seo."&amp;via=AntoenelEspejo'><i class='icon-twitter'></i></a></li>";
  $ultnot_html.= "</ul>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "</div>";
  $ultnot_html.= "</div>";

}

?>
<!DOCTYPE html>
<html lang="es" ng-app="Antonia">
  <head>
    <title>Antonia en el Espejo |  MUJERES QUE INSPIRAN</title>
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
    <link rel="stylesheet" href="./resources/assets/css/lightslider.css">
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
          <h2>MUJERES</h2>
          <div class="separador"></div>
          <h1>QUE INSPIRAN</h1>
          <div class="separador"></div>
        </div>
      </div>
      <section class="noticia-version">
        <div class="container">
          <div class="breadcrumb"><a href="./">Inicio</a>
            <p>
               
              MUJERES QUE INSPIRAN
            </p>
          </div>
          <h1>MUJERES QUE INSPIRAN</h1>
          <div class="inner-noticias">
            <div class="row caja-noticia">
              <?php echo $ultnot_html; ?>
              <?php echo $paginado_html;?>
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
                <div class="row"><a href="antonia" class="boton">Conóceme</a></div>
              </div>
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
              <div class="inner-antonia inner-tag" style="display:none">
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
                  <div class="inner-img"><a href="javascript:void(0)" style="cursor:default">
                      <figure><img src="./resources/assets/image/clairsonic.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)" style="cursor:default">Masajeador Clinique</a>
                    <p>Para potenciar tus serums</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="javascript:void(0)" style="cursor:default">
                      <figure><img src="./resources/assets/image/jugo.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)" style="cursor:default">SOMA Jugo Gourmet</a>
                    <p>Un shot de vitaminas</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="javascript:void(0)" style="cursor:default">
                      <figure><img src="./resources/assets/image/reloj.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)" style="cursor:default">Reloj TOUS</a>
                    <p>Clásico y femenino</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="javascript:void(0)" style="cursor:default">
                      <figure><img src="./resources/assets/image/weleda.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)" style="cursor:default">Aceite de Lavanda (foto Weleda)</a>
                    <p>Para relajarse antes de dormir</p>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img"><a href="javascript:void(0)" style="cursor:default">
                      <figure><img src="./resources/assets/image/zapatillas.jpg" alt=""></figure></a></div>
                  <div class="inner-carrusel"><a href="javascript:void(0)" style="cursor:default">Zapatillas Cole Haan</a>
                    <p>Cómodas y ligeras ... van bien con todo!</p>
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
                    <iframe width="90%" height="180" src="https://www.youtube.com/embed/Tp9eXUl2RAc" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img">
                    <iframe width="90%" height="180" src="https://www.youtube.com/embed/etdGEg22-fw" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class="inner-owl">
                <div class="overflow-item">
                  <div class="inner-img">
                    <iframe width="90%" height="180" src="https://www.youtube.com/embed/ixpNtVzsjps" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
  <script src="./resources/assets/js/lightslider.js"></script>
  <script src="./bower_components/rrssb/js/rrssb.min.js"></script>
  <script src="./resources/assets/js/init.js"></script>
  <script src="./resources/assets/js/controller/controller.js"></script>
  <script src="./bower_components/flickerplate/js/flickerplate.js"></script>
  <script src="./resources/assets/js/menu2.js"></script>
  <!-- <script type="text/javascript">
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