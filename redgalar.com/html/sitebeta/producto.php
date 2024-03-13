<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $pro_url=$_GET['pro_url'];

  $sqlProducto = "SELECT * FROM producto WHERE pro_url='$pro_url'";
  $rsProducto = mysql_query($sqlProducto);

  $pro_id = mysql_result($rsProducto,0,"pro_id");
  $pro_name = mysql_result($rsProducto,0,"pro_name");
  $pro_url = mysql_result($rsProducto,0,"pro_url");
  $pro_precio_n = mysql_result($rsProducto,0,"pro_precio_n");
  $pro_precio_o = mysql_result($rsProducto,0,"pro_precio_o");
  $pro_detalles = mysql_result($rsProducto,0,"pro_detalles");
  $pro_desc = mysql_result($rsProducto,0,"pro_desc");
  $pro_img = mysql_result($rsProducto,0,"pro_img");
  $pro_img_name = mysql_result($rsProducto,0,"pro_img_name");
  $pro_envio = mysql_result($rsProducto,0,"pro_envio");

  require_once "fbsdk4-5.1.2/src/Facebook/autoload.php";
  require_once "credentials.php";

  $fb = new Facebook\Facebook([
    'app_id' => $app_id, // Replace {app-id} with your app id
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.2'
    ]);

  $helper = $fb->getRedirectLoginHelper();

  $login_url = "https://www.redgalar.com/callback2.php?pro_url=".$pro_url;

  $permissions = ['email']; // permisos
  $loginUrl = $helper->getLoginUrl($login_url, $permissions);

  $sqlImagen = "SELECT * FROM imagen WHERE pro_id='$pro_id'";
  $rsImagen = mysql_query($sqlImagen);
  $nImagen = mysql_num_rows($rsImagen);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | <?php echo utf8_encode($pro_name);?></title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/responsive-tabs.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzy0CShzBoU83-HLZs9mJa8GbeqlpmDU"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body data-producto="<?php echo $pro_url; ?>">

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <section class="col-lg-9 col-sm-8" id="producto">
          <div class="row">
            <div class="row">
              <div class="col-lg-12">
                <br>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="img-producto">              

        <div class="slider-for">
            <div> <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="<?php echo $pro_img_name; ?>" class="img-zoom-redgalar img_z_1"></div>
            <?php
			$rr=2;
                for($i=0;$i<$nImagen;$i++){ 
                  $img_id = mysql_result($rsImagen,$i,"img_id");
                  $img_name = mysql_result($rsImagen,$i,"img_name");
                  $img_url = mysql_result($rsImagen,$i,"img_url");
            ?>
            <div> <img src="<?php echo $url; ?>img-productos/<?php echo $img_url; ?>" alt="<?php echo $img_name; ?>" class="img_z_<?php echo $rr;?>"></div>
            <?php $rr= $rr+1;} ?>
        </div>

        <div class="slider-nav img-redg">
            <div> <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="" data-img-z="1"></div>
            <?php
			$rr=2;
                for($i=0;$i<$nImagen;$i++){ 
                  $img_id = mysql_result($rsImagen,$i,"img_id");
                  $img_name = mysql_result($rsImagen,$i,"img_name");
                  $img_url = mysql_result($rsImagen,$i,"img_url");
            ?>
            <div> <img src="<?php echo $url; ?>img-productos/<?php echo $img_url; ?>" alt="<?php echo $img_name; ?>" data-img-z="<?php echo $rr;?>"></div>
            <?php $rr=$rr+1;} ?>
        </div>
              </div>
            </div>
            <div class="col-lg-7">
              <h2><?php echo utf8_encode($pro_name);?></h2>
              <ul>
                <li>Precio normal:<br> <b class="precio">S/ <?php echo $pro_precio_n;?></b></li>
                <li>Oferta: <br><b class="oferta">S/ <?php echo $pro_precio_o;?></b></li>
                <p><?php echo utf8_encode($pro_desc); ?></p>
                <!--li>
                  Cantidad: 
                  <span class="p-quantity-modified">
                    <i class="fa fa-minus menos" aria-hidden="true"></i>
                    <input value="1" maxlength="5" autocomplete="off" type="text">
                    <i class="fa fa-plus mas" aria-hidden="true"></i>
                  </span>
                </li-->
              </ul>
              <!--<?php echo $url;?>comprar.php?pro_id=<?php echo $pro_id;?>-->
              <a class="btn comprar" 
        <?php 
                    if(isset($_SESSION['email'])){
                    echo "href='../producto2.php?pro_url=$pro_url'";
                    }else{
                      echo "data-toggle='modal' data-target='#myModal'";
                    }
                ?>
              >Comprar ahora</a><br>
              <!--a class="btn cesta" href="">Añadir a mi carrito</a-->
              <h5>* Imagen referencial</h5>
            </div>
          </div>
        </section>
      </div>
    </div>  
  </div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>    
      <div class="row">
        <div class="col-xs-12">
          <h3>Iniciar sesión</h3>
        </div>
      </div>  
    <!--div class="first-button">
      <div class="row">
        <div class="col-sm-6">
          <a href="#">Iniciar Sesión</a>
        </div>
        <div class="col-sm-6">
          <a href="#">Registrarme</a>
        </div>
      </div>      
    </div-->
    <label for="email">e-mail</label>
    <input type="email" name="email" id="nomuser">
    <label for="email">Contraseña</label>
    <input type="password" name="password" id="passuser">
    <!--p><a href="#">Olvidé mi contraseña</a></p-->
    <a id="btn-enviar" class="send red">Ingresar</a>
    <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="send blue">Ingresar con FACEBOOK</a>
    <div id="result"></div>
    </div>

  </div>
</div>


  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  
  <script src="<?php echo $url; ?>js/jquery.elevatezoom.js"></script>
  <script src="<?php echo $url; ?>js/jquery.responsiveTabs.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript">

    /* Iniciando jQuery */
    (function(){
      function fLogin(){

        url_producto = $("body").data("producto");

        $.post("../query-valida.php",{
          "user" : $('#nomuser').val(),
          "pass" : $('#passuser').val(),
        },
          function (data){
            if(data==1){
              var url = '../producto2.php?pro_url='+url_producto;
              $(location).attr('href',url);
            }else{
              $('#result').fadeIn(500);//.fadeOut(6000)
              $('#result').html(data)
            }
          }
        )
      }

      $("#btn-enviar").on("click",function(){
        fLogin();
      })
    })()

  </script>
  <script>
  $(document).ready(function ($) {
    $('#responsiveTabsDemo').responsiveTabs({
      startCollapsed: 'accordion'
    });
	
	$(".img-zoom-redgalar").elevateZoom();
	$(".img-redg img").click(function(){
		var i = $(this).attr("data-img-z");
		console.log(i);
		$(".img-zoom-redgalar").removeClass("img-zoom-redgalar");
		$(".img_z_"+i).addClass("img-zoom-redgalar");
		setTimeout(function(){
			$(".img-zoom-redgalar").elevateZoom();
		}, 1000);
	});
	
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
     $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true
  });
  </script>
</body>
</html>