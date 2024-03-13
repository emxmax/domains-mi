<?php 
  ob_start("ob_gzhandler");
  session_start();

  include("util/query.php");
  include("util/url.php");

   
  if(!isset($_SESSION['email'])){
    header("Location:" . $url . "logout.php");
  }else{
    header("Location: perfil ");
  }

  $user_email=$_SESSION['email'];

  $sqlUsuario = "SELECT * FROM usuario WHERE user_email='$user_email'";
  $rsUsuario = mysql_query($sqlUsuario);
  $user_id = mysql_result($rsUsuario,0,"user_id");
  
  $user_name = mysql_result($rsUsuario,0,"user_name");
  $user_provider = mysql_result($rsUsuario,0,"user_provider");
  $user_email = mysql_result($rsUsuario,0,"user_email");
  $user_pass = mysql_result($rsUsuario,0,"user_pass");
  $user_celular = mysql_result($rsUsuario,0,"user_celular");
  $user_foto = mysql_result($rsUsuario,0,"user_foto");

  $sqlPedidoPro = "SELECT pe.pe_fecha, pro.* FROM pedido pe INNER JOIN producto pro ON pe.pro_id=pro.pro_id WHERE pe.user_id='$user_id'";
  $rsPedidoPro = mysql_query($sqlPedidoPro);
  //$nPedidoPro = mysql_num_rows($rsPedidoPro);
  
  $sql ="SELECT *
	FROM
	detalle_pedido
	WHERE
	id_user = $user_id";
	$pedidos = mysql_query($sql);
	$nPedidoPro = mysql_num_rows($pedidos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Mi Perﬁl</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <ol>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Registro</a></li>
          <li class="active">Perﬁl</li>
        </ol>
        <h2>Perﬁl</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="perfil">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-5">
          <div class="cuadro hola">
            <h3>Hola <?php echo $user_name; ?></h3>
            <ul>
              <li><a href=""><i class="fa fa-user" aria-hidden="true"></i> Mi perﬁl</a></li>
              <!--li><a href=""><i class="fa fa-archive" aria-hidden="true"></i> Mis pedidos</a></li>
              <li><a href=""><i class="fa fa-ticket" aria-hidden="true"></i> Mis cupones</a></li>
              <li><a href=""><i class="fa fa-list" aria-hidden="true"></i> Lista de deseos pública</a></li>
              <li><a href=""><i class="fa fa-star-o" aria-hidden="true"></i> Favoritos</a></li>
              <li><a href=""><i class="fa fa-comments-o" aria-hidden="true"></i> Reseñas</a></li-->
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-5">
          <div class="cuadro historial">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <?php if($user_provider=="facebook"){ ?>
                  <img src="<?php echo $user_foto; ?>" alt="">
                <?}else{?>
                  <img src="<?php echo $url; ?>img/<?php echo $user_foto; ?>" alt="">
                <?}?>
                <a href="" class="link"> </a>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h4><?php echo $user_name; ?></h4>
                <a href="" class="link"> </a>
              </div>
              <div class="col-lg-12">
                <ul>
                  <li><a href="">Pedidos <b>(<?php echo $nPedidoPro; ?>)</b></a></li>
                  <!--li><a href="">Puntos <b>(1)</b></a></li>
                  <li><a href="">Mensajes <b>(1)</b></a></li>
                  <li><a href="">Cupones <b>(1)</b></a></li>
                  <li><a href="">Pendientes de pago <b>(1)</b></a></li>
                  <li><a href="">Pendientes de envío <b>(1)</b></a></li>
                  <li><a href="">Pendientes de conﬁrmación <b>(1)</b></a></li-->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-4">
          <h2>Mis pedidos (<?php echo $nPedidoPro; ?>)</h2>
          <div class="row panel-pedidos">
			<?php
			while ($pedido = mysql_fetch_array($pedidos)){
				?>
				<div class="col-lg-12">
				  <a href="verpedido.php?cod=<?php echo $pedido['pe_codigo']?>">
					<h5>Pedido: <?php echo $pedido['pe_codigo']; ?></h5>
					<div><i class="fa fa-calendar"></i> <?php echo $pedido['pe_fecha']; ?></div>
					<span><i class="fa fa-credit-card"></i> S/. <?php echo $pedido['total']; ?></span>
				  </a>
				</div>
				<?php
			}
			?>
          </div>
        </div>
        <div class="col-lg-5 col-sm-4">
          <h2>Vistos recientemente</h2>
          <div class="row">
              <div class="col-lg-6">
                <div class="mas-comprados-producto">
                  <img src="<?php echo $url; ?>img/LMC1.jpg"/>
                  <h5>Cubeta Detallazo</h5>  
                  <span>s/ 100</span>  
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <h2>Recomendados</h2>
          <div class="row">
			<?php
				$sql ="SELECT *
				FROM
				producto
				WHERE
				pro_destacado = 1";
				$destacados = mysql_query($sql);
				while ($fila = mysql_fetch_array($destacados)){
					?>
					<div class="col-lg-6">
						<a class="mas-comprados-producto" href="./productos/<?php echo $fila['pro_url'];?>">
						  <img src="<?php echo $url; ?>img/<?php echo $fila['pro_img'];?>">
						  <h5><?php echo utf8_encode($fila['pro_name']);?></h5>
						  <span>s/ <?php echo $fila['pro_precio_o'];?></span>
						</a>
					</div>
					<?php
				}
			?>
          </div>
        </div>
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
  });
  </script>
</body>
</html>