<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio  |  Exsa</title>
  <link href="https://exsa.net/imagenes/fav-exsa.png" rel="shortcut icon">
  <link rel="apple-touch-icon" href="https://exsa.net/imagenes/fav-exsa.png"/>
  <!-- estilos bootsrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <!-- <link rel="stylesheet" href="https://exsa.mediaimpact.digital/css/estilos.css"> -->
  <link rel="stylesheet" href="../css/estilos.css">
  
  <!-- Fuentes -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

   <meta name="csrf-token" content="">
    <meta name="_token" content="YvnTGlEjuU7l6wxhY0MxsJwrN56kMe4FhDvIZvZA"/>
  <!-- Slick Slider -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
<!-- Slider HERO -->
<link rel="stylesheet" type="text/css" href="https://exsa.mediaimpact.digital/css/hero-slider.css">
<script src="https://exsa.mediaimpact.digital/js/modernizr.js"></script>

<link rel="stylesheet" href="https://exsa.mediaimpact.digital/css/home.css">
  <!-- Font awesome -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113501992-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-69938576-1');
		</script>
</head>

<body>
<section style="background-color: #FEC52E;padding: 0px 15px;">
  <p style="color: blacK;text-align: center;font-family: 'Eurostile';
    font-style: normal;
    font-weight: 400;padding: 5px;margin-bottom: 0px">
    <span>Estimados proveedores, nos encontramos actualizando la web por lo que podría generar algunos inconvenientes. Pedimos las disculpas respectivas.</span>
 <!-- Pedimos las disculpas respectivas.<br></span>
    <a target="_blank" href="noticias/Comunicado Cierre Documentario - EXSA.pdf" style="color: black;text-decoration: none">ANUNCIO IMPORTANTE PARA NUESTROS PROVEEDORES</a> -->
  </p>
</section>  
<?php
  include 'header.php';
?>  
<style>
.modal {
display: none;
    overflow: auto;
    overflow-y: scroll;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 9999;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    width: 100%;
    height: 100%;
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/*    display: none;
    overflow: auto;
    overflow-y: scroll;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 9999;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    width: 100%;
    height: 100%;*/

/* Modal Content/Box */
.modal-content {

/*    background-color: #fefefe;*/
margin: 2% auto; /* 15% from the top and centered */
padding: 25px;
padding-bottom: 0px !important;
border: 1px solid #888;
width: 40%; /* Could be more or less, depending on screen size */
height: auto;
padding-bottom: 70px;
background-image: url("https://www.mediaimpact.pe/demo/popup/img/fondo.jpg");
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
font-style: "EurostileBold";
font-family: 'IBM Plex Sans', sans-serif;
color: #FFFFFF;
font-size: 25px;
}

/* The Close Button */

.close {
color: #aaa;
float: right;
font-size: 28px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: black;
text-decoration: none;
cursor: pointer;
}
</style>
<section id="nosotros">
  <div class="slider single-itemP">
    <div class="contenido">
      <div style="background-image: url(https://exsa.mediaimpact.digital/image/banner-home.jpg);background-size: cover;background-position: 0px 0px" class="contenido-principal">
        <div class="container">
          <div class="row texto text-lg-center">
            <div class="offset-md-2 col-md-9 offset-lg-2 col-lg-9 col-sm-12">
              <p style="text-align: center"><span class="grande">Soluciones exactas</span> en hoooho </p>
              <p><span class="grande">fragmentación de roca</span> para las industrias de </p>
              <p style="text-align: center"><span class="grande">minería e infraestructura</span></p>
            </div>
          </div>
          <div class="row nosotros btn-amarillo">
            <div class="col-md-12 col-lg-12 text-center">
              
              <a href="https://exsa.net/nosotros/">Conoce más de nosotros</a>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</section>
<!-- PRUEBA -->
  <section class="cd-hero" id="home-productos">
    <ul class="cd-hero-slider autoplay"> 
      <li class="selected">
        <div class="cd-full-width container-fluid">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 col-12 imagen-producto order-2 order-lg-1 order-md-1">
                <img src="https://exsa.mediaimpact.digital/image/SISTEMA_DE_INICIACION.png" alt="">
              </div>              
              <div class="col-lg-6 col-md-6 col-12 order-1 order-lg-2 order-md-2">
                <h3>Sistemas de iniciación</h3>
                <p>EXSA cuenta con la planta más moderna del mundo, 100% automatizada con los más altos estándares de seguridad en la producción, tecnología amigable con el medio ambiente y un completo portafolio customizado en atender las necesidades de los clientes.</p>
                <div class="col-md-10 col-lg-12 col-12 btn-amarillo text-right">
                  <a href="https://exsa.net/productos/detonador-ensamblado.php">Ver productos</a>
                </div>                
              </div>
            </div>
          </div>
        </div>
      </li>

      <li>
        <div class="cd-full-width container-fluid">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 col-12 imagen-producto order-2 order-lg-1 order-md-1">
                <img src="https://exsa.mediaimpact.digital/image/QUANTEX.png" alt="">
              </div>              
              <div class="col-lg-6 col-md-6 col-12 order-1 order-lg-2 order-md-2">
                <h3>Tecnología Quantex<sup>®</sup></h3>
                <p>Innovadora tecnología dirigida principalmente a la minería de tajo abierto. Con ahorros comprobados en la adquisición, aplicación y a lo largo de toda la cadena operativa. Brinda mayor energía, amplio rango de densidades, alta resistencia al agua y es amigable con el medio ambiente.</p>
              <div class="col-md-10 col-lg-12 col-12 btn-amarillo text-right">
                <a href="https://exsa.net/productos/quantex-73.php">Ver productos</a>
              </div>
              </div>
            </div>
          </div>              
        </div>
      </li>
      
      <li>
        <div class="cd-full-width container-fluid">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 col-12 imagen-producto order-2 order-lg-1 order-md-1">
                <img src="https://exsa.mediaimpact.digital/image/ENCARTUCHADOS.png" alt="">
              </div>              
              <div class="col-lg-6 col-md-6 col-12 order-1 order-lg-2 order-md-2">
                <h3>Encartuchados</h3>
                <p>El portafolio más completo de dinamitas y emulsiones encartuchadas apropiadas para diferentes condiciones de terreno.</p>
                <div class="col-md-10 col-lg-12 col-12 btn-amarillo text-right">
                  <a href="https://exsa.net/productos/exsablock.php">Ver productos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>

      <li>
        <div class="cd-full-width container-fluid">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 col-12 imagen-producto order-2 order-lg-1 order-md-1">
                <img src="https://exsa.mediaimpact.digital/image/EMULSION_GRANEL.png" alt="">
              </div>              
              <div class="col-lg-6 col-md-6 col-12 order-1 order-lg-2 order-md-2">
                <h3>Emulsión a granel</h3>
                <p>Emulsión oxidante inerte no detonable que se sensibiliza en el lugar de la aplicación para formar un agente de voladura. Ideal para la reducción de riesgos de manipulación y operación.</p>
                <div class="col-md-10 col-lg-12 col-12 btn-amarillo text-right">
                  <a href="https://exsa.net/productos/slurrex-bs.php">Ver productos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>     

      <li>
        <div class="cd-full-width container-fluid">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 col-12 imagen-producto order-2 order-lg-1 order-md-1">
                <img src="https://exsa.mediaimpact.digital/image/ANFO.png" alt="">
              </div>              
              <div class="col-lg-6 col-md-6 col-12 order-1 order-lg-2 order-md-2">
                <h3>ANFO</h3>
                <p>Agente de voladura de gran versatilidad y alta potencia compuesto por una mezcla de nitrato de amonio y petróleo debidamente balanceada en oxígeno.</p>
                <div class="col-md-10 col-lg-12 col-12 btn-amarillo text-right">
                  <a href="https://exsa.net/productos/examon-p.php">Ver productos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>

      <li>
        <div class="cd-full-width container-fluid">
          <div class="container">
            <div class="row align-items-center">

              <div class="col-lg-6 col-md-6 col-12 imagen-producto order-2 order-lg-1 order-md-1">
                <img src="https://exsa.mediaimpact.digital/image/SEMIELABORADOS.png" alt="">
              </div>              
              <div class="col-lg-6 col-md-6 col-12 order-1 order-lg-2 order-md-2">
                <h3>Semielaborados</h3>
                <p>Materias primas utilizadas en la producción de diversos productos para minería e infraestructura.</p>
                <div class="col-md-10 col-lg-12 col-12 btn-amarillo text-right">
                  <a href="https://exsa.net/productos/nitrato_amonio_poroso.php">Ver productos</a>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </li>
    </ul>
    <!-- navegador -->
    <div class="cd-slider-nav">
      <nav>
        <span class="cd-marker item-1"></span>
        <ul>
          <li id="uno" class="selected">
            
            <a href="#0" class="text">Sistemas de iniciación</a>
            <a href=""><i class="fas fa-circle"></i></a>
          </li>
          <li id="dos">
            
            <a href="#0" class="text">Tecnología Quantex®</a>
            <a href=""><i class="fas fa-circle"></i></a>
          </li>
          <li id="tres">
            
            <a href="#0" class="text">Encartuchados</a>
            <a href=""><i class="fas fa-circle"></i></a>
          </li>

          <li id="cuatro">
            
            <a href="#0" class="text">Emulsión a granel</a>
            <a href=""><i class="fas fa-circle"></i></a>
          </li>

          <li id="cinco">
            
            <a href="#0" class="text">ANFO</a>
            <a href=""><i class="fas fa-circle"></i></a>
          </li>
          <li id="seis">
            
            <a href="#0" class="text">Semielaborados</a>
            <a href=""><i class="fas fa-circle"></i></a>
          </li>
        </ul>
      </nav>
      <div class="flecha-izquierda">
        <i class="fas fa-angle-left"></i>
      </div>
      <div class="flecha-derecha">
        <i class="fas fa-angle-right"></i>
      </div>
    </div>
  </section>  
<!-- FIN PRUEBA -->
<!-- overflow: hidden;overflow-y: auto; -->
<section id="home-servicios" class="container-fluid" style="background-image: url(https://exsa.mediaimpact.digital/image/home-servicios-fondo2.jpg);background-size: cover;background-position: 0;position: relative;z-index: 999">
  <div class="container">
    <div class="row">
      <div class="col-md-11 col-lg-8 col-12">
        <div class="row home-servicios-texto">
          <div class="offset-md-1 col-md-12 offset-lg-1 col-lg-12 offset-0 col-12">
            <p class="text-left">Garantizamos la <span class="grande">continuidad</span></p>
            <p style="padding-left: 10%;">de las <span class="grande">operaciones</span></p>
            <p style="padding-left: 12%">gracias a nuestros servicios</p>
          </div>
        </div>
      </div>        
    </div>
    <div class="row">
      <div class="col-md-9 col-lg-8 col-9 text-center">
        <ul class="iconos-servicios" style="padding-left: 0px;">
          <li>
            <a href="https://exsa.net/servicios/servicio-sive.php" target="_blank">
              <img src="https://exsa.mediaimpact.digital/image/servicio-icono-3.png" alt="">
              <p class="icono-servicios">Servicio Integral de Voladura EXSA (SIVE)</p>
            </a>
          </li>
          <li>
            <a href="https://exsa.net/servicios/servicio-ctve.php" target="_blank">
              <img src="https://exsa.mediaimpact.digital/image/servicio-icono-5.png" alt="">
              <p class="icono-servicios">Centro Tecnológico de Voladura EXSA (CTVE)</p>
            </a>
          </li>
          <li>
            <a href="https://exsa.net/servicios/servicio-tajoa.php" target="_blank">
              <img src="https://exsa.mediaimpact.digital/image/servicio-icono-2.png" alt="">
              <p class="icono-servicios">Asistencia técnica para minería de cielo abierto</p>
            </a>
          </li>
          <li>
            <a href="https://exsa.net/servicios/servicio-mezc-voladura.php" target="_blank">
              <img src="https://exsa.mediaimpact.digital/image/servicio-icono-4.png" alt="">
              <p class="icono-servicios">Servicio de mezclado de agentes de voladura para minería de cielo abierto</p>
            </a>
          </li>               
          <li>
            <a href="https://exsa.net/servicios/servicio-subterranea.php" target="_blank">
              <img src="https://exsa.mediaimpact.digital/image/servicio-icono-1.png" alt="">
              <p class="icono-servicios">Asistencia técnica para Minería subterránea.</p>
            </a>
          </li>
        </ul>
      </div>

      <div class="col-md-4 col-lg-5 col-5 img-hombre" style="position: absolute;bottom: 0%;right: 0%;padding: 0px">
        <img src="https://exsa.mediaimpact.digital/image/home-servicios-hombre.png" alt="">   
      </div>
    </div>
  </div>
</section>

<!-- overflow: hidden;overflow-y: auto; -->
<section id="home-noticias" class="container-fluid" style="background-image: url(https://exsa.mediaimpact.digital/image/home-noticias.jpg);background-size: cover;background-position: 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 home-texto-noticias">
        <p>Últimas <span class="grande">NOTICIAS</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="slider-noticias">
              <div class="slider single-item">
                <div class="contenido">
                  <img src="https://exsa.mediaimpact.digital/image/noticias/noticia-1.jpg" alt="">
                  <div class="v-caption">
                    <a target="_blank" href="http://www.exsasoluciones.pe/mincetur-mineria-nos-coloca-en-1-lugar/"
                    >
                    <p style="text-align:center;">Mincetur: Minería nos coloca en 1° lugar</p>
                    
                    </a>
                  </div>                  
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4 img-centrar">
            <a href="https://exsa.net/PROGRAMA_DE_CURSOS_CTVE_2018-Actualizado.pdf" target="_blank">
              <img src="https://exsa.mediaimpact.digital/image/noticias-ctve.jpg" alt="">
            </a>              
          </div>
        </div>          
      </div>        
    </div>
  </div>
</section>


<!--   <div id="myModal" class="modal" style="display: block;">
    <div class="modal-content" style="min-width: 300px;">
      <span class="close" style="background-color: #efcc20;color: #aaa;float: right;
    font-size: 28px;
    font-weight: bold;
    border-radius: 50%;
    height: 30px;
    width: 30px;
    text-align: center;
    /*position: relative;*/
    position: absolute;
    /*bottom: 30px;*/
    top: 0px;
    right: 0px;
    /*left: 30px;*/
    line-height: 23px;
    opacity: 1">&times;</span>

    <a href="https://exsa.net/" target="_blank" style="width: 80%; position: relative;left: -25px; position: relative;top: -25px;"><img src="https://www.mediaimpact.pe/demo/popup/img/logo.png" alt="" style="margin-bottom: 0px;width: 180px;"></a>
    <p style="font-family: 'IBM Plex Sans', sans-serif; font-size: 12px; color: #FFFFFF; padding-right: 10px; padding-left: 10px; margin-top: -5px; padding-bottom: 5px;font-size: 20px;">
    
EXSA &uacute;nica empresa modelo de innovaci&oacute;n en patentes del Per&uacute;. 
<br>
Gracias INDECOPI por este reconocimiento!.

    </p>
    <video id="video" width="100%" src="https://www.mediaimpact.pe/demo/popup/img/exsa.mp4" controls loop autoplay>
      Tu navegador no implementa el elemento <code>video</code>.
    </video>

    <a href="https://www.indecopi.gob.pe/web/invenciones-y-nuevas-tecnologias/videos-experiencias-de-exito" target="_blank" >
      <img style="float: right; width: 130px;padding-bottom: 20px;margin-bottom: 30px;margin-top: 20px" src="https://www.mediaimpact.pe/demo/popup/img/ver-mas.png">
    </a>
    </div>
  </div> -->

  <?php
    include 'footer.php';
  ?>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- BOOTSRAP -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
    if ($("nav.menu > ul > li").hasClass('activar')) {
      $("nav.menu > ul > li.activar").removeClass('activar');
    }
  });
  </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="https://exsa.mediaimpact.digital/js/main.js"></script>
  <script src="https://exsa.mediaimpact.digital/js/home-productos-slider.js"></script>
  <script src="https://exsa.mediaimpact.digital/js/home-submenu.js"></script>
  <script type="text/javascript">
  // Get the modal
  var modal = document.getElementById('myModal');
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
      modal.style.display = "none";
      $("#video").each(function () { this.pause() });
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
          $("#video").each(function () { this.pause() });
      }
  }
  </script>
  <script>
    $(document).ready(function() {
      var wh = $(window).height();
      var wd = $(window).width();
      if (wd>=975) {
        $("#nosotros .contenido .contenido-principal").css('height', wh);
        $("#home-productos").css('height', wh);
        $("#home-productos > ul").css('height', wh);
        $("#home-servicios").css('height', wh);
        $("#home-noticias").css('height', wh);
      }else{
        $("header .clase-fondo").css('background', 'rgba(0,0,0,0.2)');
        // $("header .clase-fondo").css('position', 'fixed');
      }
      $(window).resize(function(){
        var wd = $(window).width();
        var wh = $(window).height();
        console.log("\n\n\n");
        console.log("ancho: "+ wd);
        var a = $("#nosotros .contenido .contenido-principal").height();
        console.log("alto: "+a);        
        if (wd >= 975) {
          console.log(" wd > 992");
          $("#nosotros .contenido .contenido-principal").css('height', wh);
          $("#home-productos").css('height', wh);
          $("#home-productos > ul").css('height', wh);
          $("#home-servicios").css('height', wh);
          $("#home-noticias").css('height', wh);
          $("header .clase-fondo").css('background', 'unset');
        }else{
          console.log("wd < 992");
          $("#nosotros .contenido .contenido-principal").css('height', 'auto');
          $("#home-productos").css('height', 'auto');
          // $("#home-productos > ul").css('height', 'auto');
          $("#home-servicios").css('height', 'auto');
          $("#home-noticias").css('height', 'auto');

          $("header .clase-fondo").css('background', 'rgba(0,0,0,0.2)');
          // $("header .clase-fondo").css('position', 'fixed');
        }
      });     
    });
  </script>
  <script>
    $(document).ready(function(){
      $('.single-item').slick({
        // dots: true,
        // autoplay: true,
        infinite: true,
        speed: 850,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='https://exsa.mediaimpact.digital/image/arrow-left.png'>",
        nextArrow:"<img class='a-right control-c next slick-next' src='https://exsa.mediaimpact.digital/image/arrow-right.png'>"

        // slick-next: true
      });
      $('.single-itemP').slick({
        dots: true,
        // autoplay: true,
        infinite: true,
        speed: 850
        // slick-next: true
      }); 
      $(".menu-mas").click(function(){
        //$('nav').show('fade');
        $(".menu").css({"width":"100%"});
                $(".menu").css({"opacity":"1"});
      });
      $(".menuclose").click(function(){
        $(".menu").css({"width":"0px"});
                $(".menu").css({"opacity":"0"});
      });
    });
  </script>
  
  <script>
    $(document).ready(function(){
      var $ancho_pantalla = $(window).width();

      // if ($ancho_pantalla>=343 && $ancho_pantalla<=352) {
      //  $("ul.iconos-servicios li:nth-of-type(1) a p").append("<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(3) a p").append("<br>&nbsp;");
      // }
      // if ($ancho_pantalla>=370 && $ancho_pantalla<=575) {
      //  $("ul.iconos-servicios li:nth-of-type(3) a p").append("<br>&nbsp;");
      // }
      // if ($ancho_pantalla>=1200) {
      //  $("ul.iconos-servicios li:nth-of-type(1) a p").append("<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(2) a p").append("<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(3) a p").append("<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(5) a p").append("<br>&nbsp;");
      // }
      // if ($ancho_pantalla >=992 && $ancho_pantalla<=1199) {
      //  $("ul.iconos-servicios li:nth-of-type(1) a p").append("<br>&nbsp;<br>&nbsp;<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(2) a p").append("<br>&nbsp;<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(3) a p").append("<br>&nbsp;<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(5) a p").append("<br>&nbsp;<br>&nbsp;");
      // }
      // if ($ancho_pantalla>=360 && $ancho_pantalla<=369) {
      //  $("ul.iconos-servicios li:nth-of-type(3) a p").append("<br>&nbsp;");
      // }
      // if ($ancho_pantalla>=576 && $ancho_pantalla<=767) {
      //  $("ul.iconos-servicios li:nth-of-type(1) a p").append("<br>&nbsp;<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(2) a p").append("<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(3) a p").append("<br>&nbsp;<br>&nbsp;");
      //  $("ul.iconos-servicios li:nth-of-type(5) a p").append("<br>&nbsp;<br>&nbsp;");
      // }
    });
  </script>


  <script>
        
  </script>

  <style>
    .slick-next, .slick-prev{
      /*background-color: red;*/
      bottom: 10%;
      top: unset;
      z-index: 9999;
      /*height: 20px;*/
    }
    .slick-prev{
      left: 0px;
    }
    .slick-next{
      right: 19px;
    }
    .slick-next:before, .slick-prev:before{
      font-size: 40px;
    }
    .slick-dots li.slick-active button:before{
      top: 30px !important;
    }
    .slick-dots li button:before{
      top: 30px !important;
    }
#home-noticias .slider .v-caption p:nth-child(1) {
  padding-top: 10px !important;
  padding-bottom: 10px !important;
}    
  </style>
</body>
</html>