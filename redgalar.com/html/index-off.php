<?php 
  ob_start("ob_gzhandler");
  session_start();
  include("util/query.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta https-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com - Regalos personalizados en un click</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link rel="apple-touch-icon" href="<?php echo $url; ?>img/ico.png"/>
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <!--link rel="stylesheet" href="css/jquery.bxslider.css"-->
  <style>
    .rosado{
      background: rgba(245,158,167,1);
background: -moz-linear-gradient(left, rgba(245,158,167,1) 0%, rgba(225,144,153,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(245,158,167,1)), color-stop(100%, rgba(225,144,153,1)));
background: -webkit-linear-gradient(left, rgba(245,158,167,1) 0%, rgba(225,144,153,1) 100%);
background: -o-linear-gradient(left, rgba(245,158,167,1) 0%, rgba(225,144,153,1) 100%);
background: -ms-linear-gradient(left, rgba(245,158,167,1) 0%, rgba(225,144,153,1) 100%);
background: linear-gradient(to right, rgba(245,158,167,1) 0%, rgba(225,144,153,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f59ea7', endColorstr='#e19099', GradientType=1 );
    }
    
  </style>
</head>
<body>

  <div class="container-fluid visible-lg visible-md" id="lanzamiento">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h4>
              <span>MES DE</span> <br>
              OFERTAS
            </h4>
          </div>
          <div class="col-md-5">
            <h3>             
               - Conoce aquí nuestras ofertas únicas - <br>
                sorpréndel@ con un regalo personalizado. 
            </h3>
          </div>
          <div class="col-md-3">
            <img src="img/oferta.png" alt="">
            <a href="https://www.redgalar.com/categorias/regalos-personalizados">VER <i class="fa fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="row">        
      <ul class="bxslider">
        <li class="bg-slider-1" style="background-color: #AE8251" >
          <div class="container">
            <div class="row">
              <!-- <a href="php echo $url; categorias/regalos-novedosos"> -->
              <a href="https://www.redgalar.com/categorias/antojitos">
                <img src="img/Banner-cake.jpg" alt="Qué Detallazo! Regalos Personalizados" class="slider-img"/>
              </a>
            </div>            
          </div>
        </li>
        <li class="bg-slider-3" style="background-color: #88b7c9" >
          <div class="container">
            <div class="row">                
                  <a href="https://www.redgalar.com/socios/fitgo">
                <img src="img/Banner-fitgo.png" alt="Bienvenidos FITGO" class="slider-img"/>
              </a>
            </div>            
          </div>
        </li>
        <li class="bg-slider-3" style="background-color: #96c0be">
          <div class="container">
            <div class="row">                
                  <a href="https://www.redgalar.com/socios/veggiemania">
                <img src="img/Banner-veggiemania.jpg" alt="Bienvenidos FITGO" class="slider-img"/>
              </a>
            </div>            
          </div>
        </li>
        <li class="bg-slider-3 rosado"><!--#f49da6-->
          <div class="container">
            <div class="row">
              <!-- <a href="php echo $url; socios/fitgo"> -->                
                  <a href="https://www.redgalar.com/socios/que-detallazo">
                <img src="img/banner_que_detallazo.jpg" alt="Bienvenidos FITGO" class="slider-img"/>
              </a>
            </div>            
          </div>
        </li>
      </ul>        
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row">   

        <div class="col-un-quinto hidden-xs hidden-sm">
          <div class="row aside">
            <div class="col-lg-12">
              <div class="menu-categoria"><img src="img/star-white.png" alt=""> Categorías <img src="img/star-white.png" alt=""></div>
            </div>
            <div class="col-lg-12">
              <ol>
                <li><a href="<?php echo $url;?>categorias/regalos-personalizados"><img src="<?php echo $url;?>img/regalos-personalizados.png" alt="Regalos personalizados"> Regalos personalizados</a></li>
                <li><a href="https://www.redgalar.com/categorias/regalos-novedosos"><img src="<?php echo $url;?>img/regalos-novedosos.png" alt="Regalos Novedosos"> Regalos novedosos</a></li>
                <li><a href="https://www.redgalar.com/socios/veggiemania"><img src="<?php echo $url;?>img/logo-rojo.png" alt="Cuidado personal"> Comida vegana</a></li>
                <li><a href="<?php echo $url;?>categorias/desayunos"><img src="<?php echo $url;?>img/desayunos.png" alt="Desayunos"> Desayunos</a></li>
                <li><a href=""><img src="<?php echo $url;?>img/flores.png" alt=""> Flores</a></li>
                <li><a href="https://www.redgalar.com/socios/fitgo"><img src="<?php echo $url;?>img/productos-ecologicos.png" alt="Productos Veganos"> Comidas saludables</a></li>
                <!--li><a href=""><img src="<?php//echo $url;?>img/articulos-deportivos.png" alt="Artículos deportivos"> Articulos deportivos</a></li-->
                <li><a href=""><img src="<?php echo $url;?>img/articulos-deportivos.png" alt=""> Parrilla</a></li>
                <li><a href="<?php echo $url;?>categorias/antojitos"><img src="<?php echo $url;?>img/Antojitos.png" alt="Antojitos"> Antojitos</a></li>
              </ol>
            </div>
            <div class="col-lg-12">
              <div class="menu-categoria"><img src="img/star-white.png" alt=""> OFERTAS <img src="img/star-white.png" alt=""></div>
            </div>
          </div>
        </div>

        <section class="col-cuatro-quinto hidden-xs" id="listado-productos"> 
          <div class="col-lg-12">        
          <div class="row">            
              <div id="same-products" class="stretch">
                <?php
                  include('lista-productos.php')
                ?>
              </div>         
          </div>
          </div>
        </section>

        <section class="col-cuatro-quinto visible-xs" id="listado-productos"> 
          <div class="col-lg-12">        
          <div class="row">            
              <div id="same-products" class="stretch">
              <div class="bxslider2">
                <?php
                  include('lista-productos.php')
                ?>
              </div>    
              </div>         
          </div>
          </div>
        </section>
        <div class="row" >
          <div class="col-lg-12 col-xs-12" >
            <div class="col-lg-12 col-xs-12" id="pasos" >
              <div class="row" >
                <div class="col-sm-12 col-md-4 padd"  >
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <h3 class="visible-sm">- COMPRA EN <span>4 PASOS</span> -</h3>
                      <h3 class="visible-xs">COMPRA EN <span>4 PASOS</span></h3>
                        <h3 class="hidden-xs hidden-sm">COMPRA EN <br><span>4 PASOS</span></h3>
                    </div>
                  </div>                         
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="row pasos">
                    <div class="col-lg-3 col-xs-3 col-sm-3"><img src="img/paso-1.png" alt="Escoge"></div>
                    <div class="col-lg-3 col-xs-3 col-sm-3"><img src="img/paso-2.png" alt="Personaliza"></div>
                    <div class="col-lg-3 col-xs-3 col-sm-3"><img src="img/paso-3.png" alt="Paga con tarjeta o crédito"></div>
                    <div class="col-lg-3 col-xs-3 col-sm-3"><img src="img/paso-4.png" alt="Envía"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row hidden-xs">
            <div class="col-lg-12">
              <div id="categorias-home" class="stretch">
                <div class="col-lg-quinto red">
                  <h3><span>CAT</span><span>EGO</span><span>RÍAS</span></h3>
                </div>
                    <div class="col-lg-quinto cat cat1">
                      <a href="https://www.redgalar.com/categorias/regalos-personalizados">
                        <img src="img/oncat-1.jpg">
                        <p>Regalos personalizados</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-1.jpg" alt="">
                    </div>
                                        <div class="col-lg-quinto cat cat2">
                      <a href="https://www.redgalar.com/categorias/antojitos">
                        <img src="img/oncat-2.jpg">
                        <p>Antojitos</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-2.jpg" alt="">
                    </div>
                                        <div class="col-lg-quinto cat cat3">
                      <a href="https://www.redgalar.com/categorias/desayunos">
                        <img src="img/oncat-3.jpg">
                        <p>Desayunos personalizados</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-3.jpg" alt="">
                    </div>
                                        <div class="col-lg-quinto cat cat4">
                      <a href="https://www.redgalar.com/categorias/comida-saludables">
                        <img src="img/oncat-4.jpg">
                        <p>Comida saludables</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-4.jpg" alt="">
                    </div>
                                    <div class="col-lg-quinto ofertas hidden-xs">
                  <img src="img/star.png" alt="Redgalar Ofertas">
                  <h4>OFERTAS</h4>
                  <img src="img/star.png" alt="Redgalar Ofertas">
                </div>
              </div>   
            </div>      
        </div>

          <div class="row visible-xs" >
            <div class="col-lg-12">
              <div id="categorias-home" class="stretch">
                <div class="col-lg-quinto red">
                  <h3><span>CAT</span><span>EGO</span><span>RÍAS</span></h3>
                </div>
                 <ul class="bxslider">
                                        <li>
                    <div class="col-lg-quinto cat cat1">
                      <a href="https://www.redgalar.com/categorias/regalos-personalizados">
                        <br>
                        <img src="img/oncat-1.jpg">
                        <p>Regalos personalizados</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-1.jpg" alt="">
                    </div>
                    </li>
                                        <li>
                    <div class="col-lg-quinto cat cat2">
                      <a href="https://www.redgalar.com/categorias/antojitos">
                        <br>
                        <img src="img/oncat-2.jpg">
                        <p>Antojitos</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-2.jpg" alt="">
                    </div>
                    </li>
                                        <li>
                    <div class="col-lg-quinto cat cat3">
                      <a href="https://www.redgalar.com/categorias/desayunos">
                        <br>
                        <img src="img/oncat-3.jpg">
                        <p>Desayunos personalizados</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-3.jpg" alt="">
                    </div>
                    </li>
                                        <li>
                    <div class="col-lg-quinto cat cat4">
                      <a href="https://www.redgalar.com/categorias/comida-saludables">
                        <br>
                        <img src="img/oncat-4.jpg">
                        <p>Comida saludables</p> 
                      </a>               
                    </div>
                    <div class="col-lg-quinto">
                      <img src="img/imgcat-4.jpg" alt="">
                    </div>
                    </li>

                </ul>
                <div class="col-lg-quinto ofertas hidden-xs">
                  <img src="img/star.png" alt="Redgalar">
                  <h4>OFERTAS</h4>
                  <img src="img/star.png" alt="Redgalar">
                </div>
              </div>    
            </div>      
          </div>
         <?php include('mas-seguras.php'); ?>


        <div class="row" >
          <div class="col-lg-12"  >
            <section id="modos-de-pago">
              <div><img src="img/seguro.png" alt="Redgalar Pagos Seguros"></div>
              <div><img src="img/visa.png" alt="Redgalar Visa"></div>
              <div><img src="img/mastercard.png" alt="Redgalar Mastercard"></div>
              <div><img src="img/dinerclub.png" alt="Redgalar Diners Club"></div>
              <div><img src="img/american.png" alt="Redgalar American Express"></div>
              <div><img src="img/efectivo.png" alt="Redgalar Efectivo Pago con depósito Safety Pay"></div>
            </section>      
          </div>
        </div>

      </div>
    </div>  
  </div>
<style>
/*  .bx-pager{
    text-align: center;
  }
  .bx-pager-item{
    display: inline-block;
  }  
  .bx-pager-link{
    text-indent: -999999999px;
    overflow: hidden;
    display: block;
    width: 10px;
    height: 10px;
    border: 1px solid #d3145a;
    border-radius: 50%;
    margin: 1px;
  }*/
  .bx-controls-direction{
    display: flex;
    justify-content: space-between;
  }

  .bx-wrapper{
    position: relative;
  }
  .bx-prev{
    background-image: url(img/flecha-izquierda.png);
    text-indent: -999999999px;
    overflow: hidden;
    display: block;
    width: 60px;
    height: 60px;
    /*border: 0.5px solid black;*/
    border-radius: 50%;
    margin: 1px;
    background-size: cover;
    position: absolute;
    top: 40%;
    z-index: 99;
  }
  
  .bx-next{
    background-image: url("img/flecha-derecha.png");
    text-indent: -999999999px;
    overflow: hidden;
    display: block;
    width: 60px;
    height: 60px;
    /*border: 0.5px solid black;*/
    border-radius: 50%;
    margin: 1px;
    background-size: cover;
    position: absolute;
    right: 0%;
    top: 40%;
    z-index: 99;
  }

  @media (min-width: 0px) and (max-width: 767px){
    .bx-prev,.bx-next{
      top: 39%;
      width: 40px;
      height: 40px;
    }
    .bx-prev{
      margin-left: -8px;
    }
    .bx-next{
      margin-right: -8px;
    }
  }
  .bx-pager-link.active{
    background-color: #d3145a;
  }
</style>
  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <script>
  $('.bxslider').bxSlider({
    mode: 'fade',
    captions: true,
    controls:true,
    auto:true,
    pager:false
  });

 $('.bxslider2').bxSlider({
    minSlides: 2,
    maxSlides: 4,
    slideWidth: 170,
    slideMargin: 0,
    pager:false,
    controls:false,
    auto:true
  });

  </script>
  <script>
  $(document).ready(function() {
      $('#btn-category').click(function(){
        var estado = $('header ol').css('display');
        if(estado=='none'){
          $('header ol').css('display','table');
        }else{
          $('header ol').css('display','none');
        }        
      });
  });
  </script>

<script>
  $( "#closer" ).click(function() {
      $( ".search" ).fadeOut( "slow", function() {
      });
  });
  $( "#open" ).click(function() {
      $( ".search" ).fadeIn( "slow", function() {
      });
  });
</script>
<script>
  $(document).ready(function(){
    $("#submenu").click(function(){
      $("#submenu > ul").toggle();
    });
  });
</script>
</body>
</html>