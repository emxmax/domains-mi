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
  $cate_id = mysql_result($rsProducto,0,"cate_id");

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

  
  $sqlTipoCategoria = "SELECT * FROM producto WHERE producto.cate_id = $cate_id AND pro_estado = 1";
  $rsTipoCategoria = mysql_query($sqlTipoCategoria);
  $nTipoCategoria = mysql_num_rows($rsTipoCategoria);

  
    $em = $_SESSION["email"];
  $sqlIdUsuario = "SELECT user_id FROM usuario WHERE usuario.user_email = '$em'";
  $rsIdUsuario = mysql_query($sqlIdUsuario);
  $user_id = mysql_result($rsIdUsuario, 0 , 'user_id');
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
  <style>
    .joan_c {
      margin-top: 2em;
      margin-bottom: 2em;
      min-width: 190px;
      padding: .5em;
      font-family: "GothamRnd";
      font-size: 14px;
      font-style: normal;
      font-weight: 500;
      border: 1px solid #e32a34;
      background-color: #e32a34;
      color: white;
      width: 12em;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 2px;
    }
    .joan_c > ul { display: none; list-style: none;}
    .joan_c:hover > ul {display: block; background: #f9f9f9; border: 1px solid #e32a34;}
    .joan_c:hover > ul > li { padding: 5px; border-bottom: 1px solid #6bb99c;}
    .joan_c:hover > ul > li:hover { background: white;}
    .joan_c:hover > ul > li:hover > a { color: red; }
  </style>
</head>
<body data-producto="<?php echo $pro_url; ?>">

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <!-- ABAJO DEL FINAL DEL SECTION-->
        <?php
          // $posicion = 0 ;
          $arregloCategoria = array();
          $arregloUrl = array();

          for ($i=0; $i < $nTipoCategoria ; $i++) {
            $arregloCategoria[$i] = mysql_result($rsTipoCategoria,$i,"cate_id");
            $arregloUrl[$i] = mysql_result($rsTipoCategoria,$i,"pro_url");
          }
          for ($i=0; $i < count($arregloCategoria); $i++) {
            if ($arregloUrl[$i] == $_GET['pro_url']) {
              $posicion = $i;
            }
          }          
          // echo $arregloUrl[$posicion+1];
        ?>
        <div id="flechas">
          <div class="flecha"> <!--Aqui est3a-->
            <span class="joan-<?php echo $arregloUrl[$posicion+1];?>"></span>
            <span class="joan-<?php echo $arregloUrl[$posicion-1];?>"></span>
            <?php
              if(($posicion-1)>=0){
                echo "<a href='https://www.redgalar.com/productos/" . $arregloUrl[$posicion-1] ."'>";
              }else{
                echo "<a class='opaco'>";
              }
            ?>
              <img src="../img/flecha-izquierda-p.png" alt="" class="flecha_anterior" data-toggle='tooltip' data-placement='left' title='Anterior'>
            </a>
          </div>
          <div class="flecha flecha_siguiente"> <!--Aqui esta-->
             <?php
              if(($posicion+1)<count($arregloUrl)){
                echo "<a href='https://www.redgalar.com/productos/" . $arregloUrl[$posicion+1] ."'>";
              }else{
                echo "<a class='opaco'>";
              }
            ?>
               <img src="../img/flecha-derecha-p.png" alt="" class="flecha_siguiente" data-toggle='tooltip' data-placement='left' title='Siguiente'>
             </a>
          </div>          
        </div>

        <section class="col-lg-9 col-sm-8" id="producto">
          <div class="row">
            <div class="row">
              <div class="col-lg-12">
                <br>
              </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-11 col-xs-12">
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
            <div> 
              <img src="<?php echo $url; ?>img-productos/<?php echo $img_url; ?>" alt="<?php echo $img_name; ?>" class="img_z_<?php echo $rr;?>">
            </div>
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
            <div class="col-lg-7 col-md-7 col-sm-11">
              <h2><?php echo utf8_encode($pro_name);?></h2>
              <ul>
                <li>Precio normal:<br> <b class="precio">S/ <?php echo $pro_precio_n;?></b></li>
                <li>Oferta: <br><b class="oferta">S/ <?php echo $pro_precio_o;?></b></li>
                <p><?php echo utf8_encode($pro_desc); ?></p>
              </ul>
              <!--<?php echo $url;?>comprar.php?pro_id=<?php echo $pro_id;?>-->
              <h5>* Imagen referencial</h5>
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
              <!-- <div class="col-lg-12 col-sm-6 col-md-12 joan_c text-center"> -->
                <!-- <label class="lista_deseo_text" style="cursor: pointer;"> -->
                <?php                
                
                // $sqlListaDeseo = "SELECT lista_estado 
                //                   from lista_deseo AS ld 
                //                   WHERE ld.pro_id = $pro_id 
                //                   AND ld.user_id = $user_id";

                // $rsListaDeseo = mysql_query($sqlListaDeseo);

                // $nListaDeseo = mysql_num_rows($rsListaDeseo);

                //   if ($nListaDeseo!=0) {
                //     $lista_estado = mysql_result($rsListaDeseo,0,'lista_estado');
                //   }else{
                //     $lista_estado = "nulo";
                //   }

                //   if(isset($_SESSION['email'])){

                //   if($lista_estado == 'pr'){
                //     echo "<span>Privada</span> <i class='fa fa-check' aria-hidden='true'></i></label><br>
                //   <ul>
                //     <li><a href='#' class='lista_publica' data-producto = " . $pro_id ." >Pública</a></li>
                //   </ul>";
                //   }else if ($lista_estado == 'pu') {
                //     echo "<span>Pública</span> <i class='fa fa-check' aria-hidden='true'></i></label><br>
                //     <ul>
                //       <li><a href='#' class='lista_privada' data-producto = " . $pro_id ." >Privada</a></li>
                //     </ul>"; 
                //   }else{
                //     echo "<span>Agregar a mi lista</span> </label><br>
                //   <ul>
                //     <li><a href='#' class='lista_publica' data-producto = " . $pro_id ." >Pública</a></li>
                //     <li><a href='#' class='lista_privada' data-producto = " . $pro_id ." >Privada</a></li>
                //   </ul>";
                //   }
                  
                ?>
                <?php                
                  // }else{
                  //   echo "<span class='lista_deseo' data-toggle='modal' data-target='#myModal'>Agregar a mi lista</span></label>";
                  //   $_lista_modelo_ = true; // Variable usada para validar si se va a redireccionar o si se cargara la pagina (en el jquery)
                  // }
                  
                ?>
              <!-- </div><br><br><br> -->
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
    <label for="email">e-mail</label>
    <input type="email" name="email" id="nomuser">
    <label for="email">Contraseña</label>
    <input type="password" name="password" id="passuser">
    <?php
      if ($_lista_modelo_) {
        echo "<a id='btn-enviar2' class='send red'>Ingresar</a>";
      }else{
        echo "<a id='btn-enviar' class='send red'>Ingresar</a>";
      }      
    ?>
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


  <script type="text/javascript">
    /* Iniciando jQuery*/
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
      function gLogin(){
        url_producto = $("body").data("producto");
        $.post("../query-valida.php",{
          "user" : $('#nomuser').val(),
          "pass" : $('#passuser').val(),
        },
          function (data){
            if(data==1){
              setTimeout("window.location= window.location", 990);
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
      $("#btn-enviar2").on("click",function(){
        gLogin();        
      })

    })()
  </script>

  <script>
  $(document).ready(function ($) {
    $('#responsiveTabsDemo').responsiveTabs({
      startCollapsed: 'accordion'
    });

    // Agregado 01-12-17
    var ventana_ancho = $(window).width();
    if (ventana_ancho <= '768') {
        $("#producto .img-producto img").removeClass('img-zoom-redgalar');
        console.log("elimina");
      }

    $(window).resize(function() {
      var ventana_ancho = $(window).width();
      console.log(ventana_ancho);
      if (ventana_ancho <= '768') {
        $("#producto .img-producto img").removeClass('img-zoom-redgalar');
        console.log("elimina");
      } else{
        $("#producto .img-producto img").addClass('img-zoom-redgalar');
// Agregado 01-12-17        
        console.log("agrega");
        setTimeout(function(){
            $(".img-zoom-redgalar").elevateZoom();
          }, 1000);
      }
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
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true
  });
  </script>

<script>
    $(document).ready(function() {
      $('.lista_publica').click(function(e){
        e.preventDefault();
        
        var id = $(this).attr("data-producto");

        var data = {"id": id, "acc": 'agregar_listadeseospu'} //pe_codigo
        
        $.confirm({
          title: 'REDGALAR',
          theme : 'jconfirm-ty-theme',
          content: '¿Desea agregar a lista de deseos pública?',
          closeIcon : true,
          buttons: {
            confirmar: function () {
              text: "Confirmar",
              $.ajax({
                data: data,
                url:'../agregar-listadeseos.php',
                type:'POST',                
                beforeSend: function(){                  
                },
                success: function (response) {
                  var res = response;
                  if(res == 'exito'){
                     
                    // $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-success">El producto ha sido agregado al carrito de compras,accede al pedido entrando al carrito de compras</div>');
                    // setTimeout("window.location= 'https://www.redgalar.com/carrito'", 800);
                  }
                  else{
                    // $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no agregado al carro de compras</div>');
                  }
                }
              });
              setTimeout("window.location= window.location", 1000);
              $.alert('Confirmado!');
            },
            cancelar: function(){
              //sin ninguna acción
            }
          }
        });       
      });

      $('.lista_privada').click(function(e){
        e.preventDefault();
        var id = $(this).attr("data-producto");
        var data = {"id": id, "acc": 'agregar_listadeseospr'} //pe_codigo
        $.confirm({
          title: 'REDGALAR',
          theme : 'jconfirm-ty-theme',
          content: '¿Desea agregar a lista de deseos privada?',
          closeIcon : true,
          buttons: {
            confirmar: function () {
              text: "Confirmar",
              $.ajax({
                data: data,
                url:'../agregar-listadeseos.php',
                type:'POST',            
                beforeSend: function(){              
                },
                success: function (response) {
                  var res = response;
                  if(res == 'exito'){
                    setTimeout("window.location= 'http://localhost:8080/redgalar/categorias/regalos-personalizados'", 800);
                  }
                  else{
                    // $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no agregado al carro de compras</div>');
                  }
                }
              });              
              setTimeout("window.location= window.location", 1000);
              $.alert('Confirmado!');
            },
            cancelar: function () {
              //sin ninguna accion
            }
          }
        });
      });
    });
  </script>


  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
    
  <!-- Poner opaco la flechita -->
  <script>
    $(document).ready(function(){
      $("#flechas a.opaco img").css('opacity', '0.2');
    });
  </script>





  <style>
  .slick-prev{
    background-image: url(../img/flecha-izquierda.png);
    background-color: #F8F8F8;
    text-indent: -999999999px;
    overflow: hidden;
    display: block;
    width: 30px;
    height: 30px;
    /* border: 0.5px solid black; */
    border-radius: 50%;
    margin: 1px;
    background-size: cover;
    position: absolute;
    left: -5%;
    top: 40%;
    z-index: 99;    
  }

  .slick-next{
    background-image: url(../img/flecha-derecha.png);
    background-color: #F8F8F8;
    text-indent: -999999999px;
    overflow: hidden;
    display: block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: 1px;
    background-size: cover;
    position: absolute;
    right: -5%;
    top: 40%;
    z-index: 99;
  }
  </style>
</body>
</html>