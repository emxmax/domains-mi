<?php 
  ob_start("ob_gzhandler");
  session_start();
  include("util/query.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com - Regalos personalizados en un click</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link rel="apple-touch-icon" href="<?php echo $url; ?>img/ico.png"/>
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <section class="col-lg-9 col-sm-8" id="listado-productos">
          <div class="row" id="links-body">
            <div class="col-lg-12">
              <ul>
                <li><a href="<?php echo $url; ?>categorias/regalos-personalizados">/ OFERTA DEL MES</a></li>
                <!--li><a href="">/ MARCAS DESTACADAS</a></li>
                <li><a href="">/ NUESTROS FAVORITOS</a></li-->
              </ul>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-12">
              <ul class="bxslider">
                <li><img src="img/slider-1.jpg" /></li>
                <li><img src="img/slider-2.jpg" /></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h3>LOS MÁS COMPRADOS</h3>
            </div>
          </div>

          <div class="row" id="mas-comprados">
             <div class="col-lg-12">
               <div class="row">
                <?php 
                  for($i=0;$i<$nProducto;$i++){ 
                    $pro_id = mysql_result($rsProducto,$i,"pro_id");
                    $pro_name = mysql_result($rsProducto,$i,"pro_name");
                    $pro_url = mysql_result($rsProducto,$i,"pro_url");
                    $pro_img = mysql_result($rsProducto,$i,"pro_img");
                    $pro_precio_o = mysql_result($rsProducto,$i,"pro_precio_o");
                  ?>
                <div class="col-lg-3 col-sm-6 col-md-4">
                  <a class="mas-comprados-producto" href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">
                    <img src="img/<?php echo $pro_img;?>">
                    <h5><?php echo utf8_encode($pro_name);?></h5>
                    <span>s/ <?php echo $pro_precio_o;?></span>
                  </a>
                </div>
                <?php } ?>
               </div>
             </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h3>CATEGORÍAS</h3>
            </div>
          </div>

          <div class="row" id="galeria-home">
             <div class="col-lg-12">
               <div class="row">
                <?php 
                  for($i=0;$i<$nCategoria;$i++){ 
                    $cate_id = mysql_result($rsCategoria,$i,"cate_id");
                    $cate_name = mysql_result($rsCategoria,$i,"cate_name");
                    $cate_url = mysql_result($rsCategoria,$i,"cate_url");
                    $cate_img = mysql_result($rsCategoria,$i,"cate_img");
                  ?>
                <div class="col-lg-3 col-sm-6 col-md-4">
                  <a class="galeria-producto" href="<?php echo $url; ?>categorias/<?php echo $cate_url;?>">
                    <img src="img/<?php echo $cate_img;?>">
                    <h5><?php echo $cate_name;?></h5>
                  </a>
                </div>
                <?php } ?>
               </div>
             </div>
          </div>

          <?php include('mas-seguras.php'); ?>
          
        </section>
      </div>
    </div>  
  </div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <script>
  $('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
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
</body>
</html>