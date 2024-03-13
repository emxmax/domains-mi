<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $pro_id=$_GET['pro_id'];
  $en_id=$_GET['en_id'];

  $sqlProducto = "SELECT * FROM producto WHERE pro_id='$pro_id'";
  $rsProducto = mysql_query($sqlProducto);

  $pro_id = mysql_result($rsProducto,0,"pro_id");
  $pro_name = mysql_result($rsProducto,0,"pro_name");
  $pro_precio_n = mysql_result($rsProducto,0,"pro_precio_n");
  $pro_precio_o = mysql_result($rsProducto,0,"pro_precio_o");
  $pro_detalles = mysql_result($rsProducto,0,"pro_detalles");
  $pro_img = mysql_result($rsProducto,0,"pro_img");
  $pro_envio = mysql_result($rsProducto,0,"pro_envio");

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
  <title>Redgalar.com - Regalos personalizados en un click</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <section class="col-lg-9 col-sm-8" id="comprar" data-precio="<?php echo $pro_precio_n;?>">
          <div class="row">
            <div class="col-lg-5 col-lg-offset-2 col-md-6">
              <form action="agregar-detalle.php" method="POST" enctype="multipart/form-data">
                <div class="col-lg-12">
                  <div class="row">
                    <h3>Escribe los mensajes</h3>
                    <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>">
                    <input type="hidden" name="en_id" value="<?php echo $en_id; ?>">
                    <label>De:</label>
                    <input type="text" name="me_de" title="En caso se deje vació este campo, se enviará como anónimo.">
                    <label>Para:</label>
                    <input type="text" name="me_para" required>
                    <label>Dedicatoria:</label>
                    <textarea rows="3" name="me_desc" required></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <h3>¡Sube tus fotos!</h3>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <figure> 
                        <input type="file" id="file_url1" name="fo_1" data-var="1" class="file">
                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino1">  
                      </figure>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <figure> 
                        <input type="file" id="file_url2" name="fo_2" data-var="2" class="file">
                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino2">  
                      </figure>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <figure> 
                        <input type="file" id="file_url3" name="fo_3" data-var="3" class="file">
                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino3">  
                      </figure>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <figure> 
                        <input type="file" id="file_url4" name="fo_4" data-var="4" class="file">
                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino4">  
                      </figure>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <figure> 
                        <input type="file" id="file_url5" name="fo_5" data-var="5" class="file">
                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino5">  
                      </figure>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                      <figure> 
                        <input type="file" id="file_url6" name="fo_6" data-var="6" class="file">
                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino6">  
                      </figure>
                    </div>
                    <div class="text-center">
                      <button>SIGUIENTE</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-5 col-md-6">
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
                      <h4><?php echo utf8_encode($pro_name);?></h4>
                      <span>S/ <?php echo $pro_precio_o;?></span>
                    </div>
                  </div>
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
      $('#btn-category').click(function(){
        var estado = $('header ol').css('display');
        if(estado=='none'){
          $('header ol').css('display','table');
        }else{
          $('header ol').css('display','none');
        }
        
      });

      function mostrarImagen(input,variable) {
       if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
         $('#img_destino'+variable).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
       }
      }
       
      $(".file").change(function(){
        var variable = $(this).attr('data-var');
       mostrarImagen(this,variable);
      });
  });
  </script>
</body>
</html>