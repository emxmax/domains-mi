<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com - Vende con nosotros</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
</head>
<body>
  <?php include "header.php";?>
    <div class="container" id="vende-nosotros">
      <div class="row">
        <?php include('aside.php'); ?>        
        <div class="col-lg-8">
            <h2 class="titulo">Vende con nosotros</h2>
        </div>
        <section class="col-lg-8 col-lg-offset-1 col-sm-8 pdf">
            <iframe src="pdf/redgalar.pdf" width="800" height="400"></iframe>
        </section>
      </div>
    </div>
  <?php  include "footer.php" ?>
</body>
</html>