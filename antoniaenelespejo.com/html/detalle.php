<?php
define("_URL_", "http://antoniaenelespejo.com/");

include('./config/conexion.php');
include('./modelo/funciones.php');
include('./modelo/noticia.php');

$url = $_GET['not_url'];
$url_post = $url;
$objfunc  = new misFunciones();

$objnot   = new Noticia();
$codigo   = $objnot->dameCodigo($url);

$objnot   = new Noticia();
$datanot  = $objnot->dameDetalle($codigo);

$data       = $datanot[0];
$codigo   = $data['art_id'];
$fecha_publicacion = $objfunc->postFecha($data['art_fechapublicacion']);
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
$art_video    = $data['art_video'];



$objnot   = new Noticia();

$datanot  = $objnot->dameDestacado();

$item     = count($datanot) - 1;
$objfunc  = new misFunciones();
$des_html = "";
for($i=0; $i<=$item; $i++){
  $data             = $datanot[$i];
  $des_id               = $data['art_id'];
  $des_titulo           = $data['art_nombre'];
  $des_seo              = _URL_."noticias/".$data['seo_url'];
  $des_order            = $data['art_order'];
  $des_descrip_corta    = $objfunc->convertir_html($data['art_descripsuperior']);
  $des_descripcion      = $objfunc->convertir_html($data['art_descripinferior']);
  $des_frase            = $data['art_frase'];
  $des_imgportada       = $data['art_imgportada'];
  $des_tipomultimedia   = $data['art_tipomultimedia'];
  $des_categoria        = $data['tca_cat_id'];
  $des_namecategoria    = $data['namecategoria'];
  $des_imggrande        = $data['art_imggrande'];
  $des_video            = $data['art_video'];
  $des_f_publicacion    = $data['art_fechapublicacion'];
  $des_estado           = $data['art_estado'];
  $des_destacado        = $data['art_destacado'];


  $des_html.="<div class='inner-owl'>";
  $des_html.="<div class='overflow-item'><a href='".$des_seo ."' class='owl-descripcion'>";
  $des_html.="<figure><img src='"._URL_."adminanto/resources/assets/image/noticias/".$des_imgportada."' alt=''></figure></a>";
  $des_html.="<p>".$des_titulo."</p>";
  $des_html.="</div>";
  $des_html.="</div>";
}

$url_cat="";

if($des_categoria==1){
  $url_cat="tu-mejor-version";
}else{
  if($des_categoria==2){
    $url_cat="mujeres-que-inspiran";
  }else{
    if($des_categoria==3){
      $url_cat="nuestra-casa";
    }else{
      $url_cat="";
    }
  }  
}

$objnot   = new Noticia();

$datanot  = $objnot->damenotCategoria($page,"",0,1000,$categoria);

$item     = count($datanot) - 1;
$objfunc  = new misFunciones();
$ultnot_html = "";
for($i=0; $i<=$item; $i++){
  $data                 = $datanot[$i];
  $ultnot_id               = $data['art_id'];
  $ultnot_titulo           = $data['art_nombre'];
  $ultnot_order            = $data['art_order'];
  $ultnot_seo              = _URL_."noticias/".$data['seo_url'];
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

  $ultnot_html.= "<div class='inner-owl'>";
  $ultnot_html.= "<div class='overflow-item'><a href='".$ultnot_seo."' class='owl-descripcion'>".$ultnot_titulo."</a></div>";
  $ultnot_html.= "</div>";

}

?>
<!DOCTYPE html>
<html lang="es" ng-app="Antonia">
  <head>
    <title>Antonia en el Espejo | <?php echo $titulo ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Antonia en el espejo">
    <meta name="description" content="Antonia en el espejo">
    <meta name="keywords" content="Antonia en el espejo">
    <meta name="robots" content="index, follow">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo _URL_?>resources/assets/image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _URL_?>resources/assets/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo _URL_?>resources/assets/image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _URL_?>resources/assets/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo _URL_?>resources/assets/image/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo _URL_?>resources/assets/image/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="<?php echo _URL_?>resources/assets/css/lightslider.css">
    <link rel="stylesheet" href="<?php echo _URL_?>bower_components/HTML5-Reset/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo _URL_?>bower_components/HTML5-Reset/assets/css/style.css">
    <link href="<?php echo _URL_?>bower_components/flickerplate/css/flickerplate.css" rel="stylesheet">
    <link href="<?php echo _URL_?>bower_components/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo _URL_?>resources/assets/css/app.css" rel="stylesheet">
  </head>
  <body>
    <?php include('page/header.php'); ?>
    <div class="detalle">
      <div class="inner-titulo">
        <div class="row">
          <h1><?php echo $namecategoria?></h1>
          <div class="separador"></div>
        </div>
      </div>
      <section class="noticia-version">
        <div class="container">
          <div class="breadcrumb"><a href="<?php echo _URL_?>">Inicio&nbsp;</a><a href="../<?php echo $url_cat; ?>">
               
               > <?php echo $namecategoria; ?></a>
            <p><?php echo $titulo; ?></p>
          </div>
          <div class="inner-noticias">
            <div class="row caja-noticia">
              <h1><?php echo $titulo; ?></h1>
              <p><?php echo $fecha_publicacion; ?></p>
              <div class="inner-redes-autor">
                <div class="row">
                  <ul>
                    <li><a href="javascript:void(0)"><i class="icon-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="icon-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="icon-instagram"></i></a></li>
                  </ul>
                </div>
                <div class="row">
                  <p>Por Antonia del Solar </p>
                </div>
              </div>

              <style>
              .video-responsive {
                  margin-top: 20px;
                  position: relative;
                  margin-bottom: 20px;
                  padding-top: 56.25%;
              }
              .video-responsive iframe {
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
              }
              </style>

              <div class="inner-detalle">
                <div class="row">

                  <?php
                    if($art_video != ''){

                  ?>
                    <div class="video-responsive">
                        <iframe src="//www.youtube.com/embed/<?php echo $art_video; ?>" frameborder="0" allowfullscreen width="560" height="315"></iframe>
                    </div>
                  <?php
                    }
                    if($art_imggrande != ''){
                  ?>
                  <figure><img src="<?php echo _URL_?>adminanto/resources/assets/image/noticias/<?php echo $art_imggrande; ?>" alt="" class="alto-detalle"></figure>
                  <?php
                  }
                  ?>
                </div>
                <div class="row">
                  <?php echo $descrip_inferior; ?>
                </div>
              </div>
              <div ng-controller="detalleCrtl" class="inner-slider">
                <!-- <div id="carosel5" class="owl-carousel">
                  <?php echo $ultnot_html; ?>
                </div> -->
                <div ng-controller="detalleCrtl2" class="inner-recomendacion">
                  <h1>TE RECOMIENDO</h1>
                  <div class="inner-slider">
                    <div id="carosel6" class="owl-carousel">
                      <?php echo $des_html; ?>
                    </div>
                  </div>
                  <div class="fb-comments" data-href="http://www.antoniaenelespejo.com/noticias/<?php echo $url_post?>" data-numposts="5" style="width:100%;"></div>
                </div>
              </div>
            </div>
            <div class="row asidebar">
              <div class="inner-antonia">
                <div class="row">
                  <figure><img src="<?php echo _URL_?>resources/assets/image/antonia.png" alt=""></figure>
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
                <div class="row"><a href="../antonia" class="boton">Conóceme</a></div>
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
                  <!-- <div class="row"><img src="<?php echo _URL_?>resources/assets/image/tous.jpg" alt=""></div> -->
                  <!-- <div class="row"><img src="<?php echo _URL_?>resources/assets/image/logo-opi.jpg" alt="" class="separacion-logos"></div> -->
                  <div class="row"><img src="<?php echo _URL_?>resources/assets/image/logo-casaideas.jpg" alt=""></div>
                </div>
              </div>
              <!-- <div class="inner-antonia publicidad">
                <div id="owl-demo1" class="owl-carousel owl-theme">
                  <div class="item">
                    <img src="<?php echo _URL_?>resources/assets/image/publicidad-1.jpg"></div>
                  <div class="item">
                    <img src="<?php echo _URL_?>resources/assets/image/publicidad-2.jpg"></div>
                  <div class="item">
                    <img src="<?php echo _URL_?>resources/assets/image/publicidad-3.jpg"></div>
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
<!--       <section class="instagram">
        <div class="container">
          <h4>@ANTONIAENELESPEJO I INSTAGRAM</h4>
          <div class="inner-instagram">
            <div style="position: relative; height: 100%; width: 100%;"><iframe src="//widgets-code.websta.me/w/36febeea5647?ck=MjAxNy0wNS0xOFQyMDoyNzoxMy4wMDBa" class="websta-widgets" allowtransparency="true" frameborder="0" scrolling="no" style=" top: 0; left: 0; width: 100%;"></iframe></div>
          </div>
        </div>
      </section> -->
      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    </div>
    <?php include('page/footer.php'); ?>
    <style>
      .inner-detalle p{
        font: 17px hk_groteskregular !important;
        margin-top: 30px !important;
        color: #183a24 !important;
        text-align: justify !important;
      }
      .inner-detalle p a{
        color: #296fb1 !important;
        font: 17px hk_groteskregular !important;
        margin-top: 30px !important;
        text-align: justify !important;
      }
    </style>
  </body>
  <!--script-->
  <script src="<?php echo _URL_?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo _URL_?>bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?php echo _URL_?>bower_components/angular/angular.min.js"></script>
  <script src="<?php echo _URL_?>bower_components/jquery-validation/dist/jquery.validate.js"></script>
  <script src="<?php echo _URL_?>bower_components/angular-sanitize/angular-sanitize.js"></script>
  <script src="<?php echo _URL_?>resources/assets/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo _URL_?>resources/assets/js/lightslider.min.js"></script>
  <script src="<?php echo _URL_?>resources/assets/js/lightslider.js"></script>
  <script src="<?php echo _URL_?>resources/assets/js/init.js"></script>
  <script src="<?php echo _URL_?>bower_components/flickerplate/js/flickerplate.js"></script>
  <script src="<?php echo _URL_?>resources/assets/js/controller/controller.js"></script>
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