<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $cn = db_connect();
  $cate_url=$_GET['cate_url'];

  $sqlCate = "SELECT * FROM categoria WHERE cate_url='$cate_url'";
  $rsCate = mysql_query($sqlCate);

  $cate_id = mysql_result($rsCate,0,"cate_id");
  $cate_name = mysql_result($rsCate,0,"cate_name");

  $sqlProducto = "SELECT * FROM producto WHERE cate_id=$cate_id AND pro_estado=1 ORDER BY pro_orden ASC";
  $rsProducto = mysql_query($sqlProducto);
  $nProducto = mysql_num_rows($rsProducto);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com - Regalos personalizados en un click</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
</head>
<body>

  <?php include "header.php";?>

    <div class="container">
      <div class="row">
        <?php include('aside.php'); ?>

        <section class="col-lg-9 col-sm-8" id="listado-categoria">
          <div class="row">
            <div class="col-lg-12">
              <h2><?php echo $cate_name; ?></h2>
            </div>
            <div class="col-lg-4">
              <span><?php echo $nProducto; ?> Resultados</span>
            </div>
            <!--div class="col-lg-4 text-center">
              <span>Ordenar por:</span>
              <select>
                <option value="">popularidad</option>
              </select>
            </div>
            <div class="col-lg-4 text-center">
              <span>Marcas:</span>
              <select>
                <option value="">Que Detallazo</option>
              </select>
            </div-->
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <?php
                for($i=0;$i<$nProducto;$i++){ 
                  $pro_id = mysql_result($rsProducto,$i,"pro_id");
                  $pro_name = mysql_result($rsProducto,$i,"pro_name");
                  $pro_url = mysql_result($rsProducto,$i,"pro_url");
                  $pro_img = mysql_result($rsProducto,$i,"pro_img");
                  $pro_img_name = mysql_result($rsProducto,$i,"pro_img_name");
                  $pro_detalles = mysql_result($rsProducto,$i,"pro_detalles");
                  $pro_precio_o = mysql_result($rsProducto,$i,"pro_precio_o");
              ?>
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                  <div class="publi-categoria">
                    <div class="col-lg-3 col-md-4 col-sm-5">
                      <div class="row">
                        <a href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">
                          <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="<?php echo $pro_img_name; ?>">
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-7">
                      <a href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">
                        <h3><?php echo utf8_encode($pro_name);?></h3>
                      </a>
                      <span>S/ <?php echo $pro_precio_o;?></span>
                      <p><?php echo utf8_encode($pro_detalles);?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="row">
                        <div class="col-lg-6 col-sm-6">
                          <div class="detalle">
                            <!--h4>Valoraciones</h4>
                            <h4>inc. envío</h4>-->
                            <h4>Recomendado!</h4>
                          </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-md-12">
                          <a class="btn-cate" href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">Comprar ya!</a>
                        </div>
                        <div class="col-lg-6">
                          <div class="detalle">
                            <!--h4>Vendedor</h4-->
                            <!--h4>Personalizable</h4-->
                          </div>
                          <!--a href="" class="btn-blanco">Añadir a mi lista</a-->
                        </div>
                        <div class="col-lg-12">
                          <!--a href="" class="btn-blanco">Añadir a mi lista pública</a-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </section>
        <?php include('mas-seguras.php'); ?> 
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
  });
  </script>
</body>
</html>