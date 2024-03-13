<?php 
  ob_start("ob_gzhandler");
  session_start();
  include("util/query.php");
  include("util/url.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Ayuda</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <h2>Ayuda</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="ayuda">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <h3>Temas populares</h3>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row panel-temas">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
                  <a data-toggle='modal' data-target='#myModal1'>
                  	<img src="img/como-comprar.png" alt="">
                  	<h5>¿Cómo comprar?</h5>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
                  <a data-toggle='modal' data-target='#myModal2'>
	                <img src="img/como-uso-mi-cupon.png" alt="">
	                <h5>¿Cómo uso mi cupón?</h5>
	               </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
               	  <a data-toggle='modal' data-target='#myModal3'>
	                <img src="img/como-puedo-pagar.png" alt="">
	                <h5>¿Cómo puedo pagar?</h5>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
                   <a data-toggle='modal' data-target='#myModal4'>
	                <img src="img/cual-es-el-costo-y-tiempo.png" alt="">
	                <h5>¿Cúal es el costo y tiempo de entrega?</h5>
	               </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
                  <a data-toggle='modal' data-target='#myModal5'>
	                <img src="img/cual-es-el-status-de-mi-pedido.png" alt="">
	                <h5>¿Cúal es el estatus de mi pedido?</h5>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
				  <a data-toggle='modal' data-target='#myModal6'>
	                <img src="img/como-devuelvo-un-producto.png" alt="">
	                <h5>¿Cómo devuelvo un producto?</h5>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
                  <a data-toggle='modal' data-target='#myModal7'>
	                <img src="img/cuando-recibo-mi-reembolso.png" alt="">
	                <h5>¿Cúando recibo mi reembolso?</h5>
                  </a>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-6">
                  <a data-toggle='modal' data-target='#myModal8'>
	                <img src="img/tienes-problema-con-tu-pedido.png" alt="">
	                <h5>¿Tienes problema con tu pedido?</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-7 col-sm-7">
              <div class="row">
                <h3>Nuestros proveedores:</h3>
                <ul class="temas">
                  <li><p>Cada socio que se vende a través de Redgalar.com es cuidadosamente seleccionado para garantizar las mejores experiencias de nuestros clientes.</p></li>
                  <!--li><a href="">Mis pedidos</a></li>
                  <li><a href="">Mis cupones</a></li>
                  <li><a href="">Lista de deseos pública</a></li>
                  <li><a href="">Favoritos</a></li>
                  <li><a href="">Reseñas</a></li-->
                </ul>
                <ul class="temas">
                  <!--li><a href="">Mi perﬁl</a></li>
                  <li><a href="">Mis pedidos</a></li>
                  <li><a href="">Mis cupones</a></li>
                  <li><a href="">Lista de deseos pública</a></li>
                  <li><a href="">Favoritos</a></li>
                  <li><a href="">Reseñas</a></li-->
                </ul>
              </div>
            </div>
            
            <div class="col-lg-5 col-sm-5" id="publi-wa">
              <a href="https://www.redgalar.com/categorias/regalos-personalizados" target="_blank">
                <img src="img/banner-ayuda.jpg" alt=""></a>
              <a href="https://www.redgalar.com/redgalar/categorias/antojitos" target="_blank">
                <img src="img/lets-cake-1.png" alt=""></a>
              <a href="https://www.redgalar.com/categorias/comida-saludables" target="_blank">
                <img src="img/LOGO-FITGO.png" alt=""></a>
              <a href="https://www.redgalar.com/categorias/regalos-personalizados" target="_blank">
                <img src="img/LOGO-VEGGIEMANIA.png" alt=""></a>
            </div>

          </div>
          <div class="row">
            <div class="col-lg-12 col-xs-12 mt">
              <div class="row">
                <h3>Contáctanos</h3>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="row">
                <input type="text" placeholder="Tu nombre">
                <input type="text" placeholder="e-mail">
                <input type="text" placeholder="Asunto">                
              </div>
            </div>
            <div class="col-lg-5 col-md-5">
              <div class="row">
                <textarea rows="3" placeholder="Escribe aquí tu mensaje"></textarea>
                <div class="text-right">
                  <button>Enviar</button>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12 mt">
              <p>Escríbenos y nos contactarmos contigo en breve.</p>
              <p>info@redgalar.com<br>c. 997 677 965</p>
              <p>Horario:<br>L-V de 9am  a 6pm</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal 1-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qa.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 2-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qb.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 3-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qc.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 4-->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qd.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 5-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qe.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 6-->
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qf.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 7-->
<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qj.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal 8-->
<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/qk.jpg" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
    $(function(){
      var num_hijos = $("#publi-wa a").length;
      if(num_hijos!==1){
        $('#publi-wa a:gt(0)').hide();
        setInterval(function(){
          $('#publi-wa a:first-child').fadeOut(0).next('a').fadeIn(0).end().appendTo('#publi-wa');
        }, 3000);
      }
    });
  </script>
</body>
</html>