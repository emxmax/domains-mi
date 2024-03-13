<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $pro_id=$_GET['pro_id'];
  $en_id=$_GET['en_id'];
  $me_id=$_GET['me_id'];
  $fo_id=$_GET['fo_id'];

  $sqlProducto = "SELECT * FROM producto WHERE pro_id='$pro_id'";
  $rsProducto = mysql_query($sqlProducto);

  $pro_id = mysql_result($rsProducto,0,"pro_id");
  $pro_name = mysql_result($rsProducto,0,"pro_name");
  $pro_precio_n = mysql_result($rsProducto,0,"pro_precio_n");
  $pro_precio_o = mysql_result($rsProducto,0,"pro_precio_o");
  $pro_detalles = mysql_result($rsProducto,0,"pro_detalles");
  $pro_img = mysql_result($rsProducto,0,"pro_img");
  $pro_envio = mysql_result($rsProducto,0,"pro_envio");

  $sqlEnvio = "SELECT * FROM envio WHERE en_id='$en_id'";
  $rsEnvio = mysql_query($sqlEnvio);

  $en_distrito = mysql_result($rsEnvio,0,"en_distrito");
  $en_direccion = mysql_result($rsEnvio,0,"en_direccion");
  $en_referencia = mysql_result($rsEnvio,0,"en_referencia");
  $en_persona_c = mysql_result($rsEnvio,0,"en_persona_c");
  $en_telf = mysql_result($rsEnvio,0,"en_telf");
  $en_horario = mysql_result($rsEnvio,0,"en_horario");
  $en_comentario = mysql_result($rsEnvio,0,"en_comentario");

  $sqlUsuario ="SELECT * FROM usuario WHERE user_email='".$_SESSION['email']."'";
  $rsUsuario = mysql_query($sqlUsuario);

  $user_id = mysql_result($rsUsuario,0,"user_id");
  $user_name = mysql_result($rsUsuario,0,"user_name");
  $user_email = mysql_result($rsUsuario,0,"user_email");

  if(!isset($_SESSION['email'])){
    header("Location:" . $url . "logout.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/responsive-tabs.css" />
  <script src="https://checkout.culqi.com/v2"></script>
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <section class="col-lg-9 col-sm-8" id="comprar" data-precio="<?php echo $pro_precio_n;?>">
          <div class="row">
            <div class="col-lg-7 col-lg-offset-3">
              <div class="col-lg-12">
                <div class="row">
                  <h3>Producto Seleccionado</h3>
                  <div class="producto-select">
                    <div class="col-lg-4">
                      <div class="img-producto">
                        <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <h4 id="name_producto"><?php echo utf8_encode($pro_name);?></h4>
                      <span>S/ <?php echo $pro_precio_o;?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-12">
                    <h3>RESUMEN DEL PEDIDO</h3>
                    <input type="hidden" id="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" id="pro_id" value="<?php echo $pro_id; ?>">
                    <input type="hidden" id="en_id" value="<?php echo $en_id; ?>">
                    <input type="hidden" id="me_id" value="<?php echo $me_id; ?>">
                    <input type="hidden" id="fo_id" value="<?php echo $fo_id; ?>">
                  </div>
                  <div class="col-lg-6">
                    <label><b>Distrito:</b> <?php echo $en_distrito; ?></label><br>
                    <label><b>Dirección:</b> <?php echo $en_direccion; ?></label><br>
                    <label><b>Referencia:</b> <?php echo $en_referencia; ?></label><br>
                    <label><b>Persona de contacto:</b> <?php echo $en_persona_c; ?></label><br>
                    <label><b>Teléfono:</b> <?php echo $en_telf; ?></label><br>
                    <label><b>Horario:</b> <?php echo $en_horario; ?></label><br>
                    <label><b>Comentario:</b> <?php echo $en_comentario; ?></label>
                  </div>
                  <div class="col-lg-6">
                    <label><b>Comprador:</b> <?php echo $user_name; ?></label><br>
                    <label><b>Email:</b> <?php echo $user_email; ?></label><br>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 text-center">
                <div class="row">
                  <a id="miBoton">PAGAR</a>
                  <div id="exito">Compra Satisfactoria</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>  
  </div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  $(document).ready(function() {

    $('#miBoton').on('click', function(e) {
      // Abre el formulario con las opciones de Culqi.configurar
      Culqi.open();
    });

  });
  </script>
  <script>  
    Culqi.publicKey = 'pk_test_hmXVnJC4esDWFV9p';

    var precio = $("#comprar").attr("data-precio"); 
    var nombre_producto =  $("#name_producto").html();

    var user_id = $("#user_id").val();
    var pro_id = $("#pro_id").val();
    var en_id = $("#en_id").val();
    var me_id = $("#me_id").val();
    var fo_id = $("#fo_id").val();

    Culqi.settings({  
            title: 'Redgalar.com',
            currency: 'PEN',
            description: nombre_producto,
            amount: precio,
            guardar: true
    });
    // Recibimos Token del Culqi.js
    function culqi() {

      if(Culqi.error){
         // Mostramos JSON de objeto error en consola
         console.log(Culqi.error);

      }else{
         $.post("tarjeta.php", {token: Culqi.token.id, amount: precio, description: nombre_producto, email: Culqi.token.email, user_id: user_id, pro_id: pro_id, en_id: en_id, me_id: me_id, fo_id: fo_id}, function(data, status){
              if(data=="ok"){
                $("#miBoton").hide();
                $("#exito").show();
              }else{
                $("#exito").hide();
              }
          });
      }

    };
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
</body>
</html>