<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";
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
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzy0CShzBoU83-HLZs9mJa8GbeqlpmDU"></script>
</head>
	<body>

	  <?php include "header.php";?>

	  <div class="container-fluid">
		<div class="container">
		  <div class="row">

			<?php include "aside.php";?>

			<section class="col-lg-9 col-sm-8 text-center" id="gracias">
				<div class="col-col-12">
				 <a href="<?php echo $url; ?>" class="btn btn-complete">Inicio</a>
				 <a href="verpedido.php?cod=<?php $_GET['cod']?>" class="btn btn-rojo">Ver pedido</a>
				</div>
				<div class="col-col-12">
				 <h4>Pedido: <?php echo $_GET['cod']?></h4>
				</div>
				<img src="https://www.redgalar.com/img/deposito.png" alt="">
			</section>
		  </div>
		</div>  
	  </div>



	  <?php 
		include "footer.php" 
	  ?>
	   
	</body>
</html>
<?php
  include "emaildeposito.php";
?>