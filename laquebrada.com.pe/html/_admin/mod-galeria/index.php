<?php
  ob_start("ob_gzhandler");
  session_start();
  include "../incdes/variable.php";
  include "../incdes/query.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrador / La Quebrada</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/style.css">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
	
	 <?php include("../header.php");?>	
     <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include("../aside.php");?>	
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Galería de Fotos</h2>
		  <p class="text-right"><a class="btn btn-primary" href="nuevo.php" role="button">Agregar Nuevo</a></p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Imagen</th>
				          <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
				<?php
				  for($n = 0; $n < $nGaleriaAdmin; $n++){
					$gal_id = mysql_result($rsGaleriaAdmin,$n,"gal_id");
					$gal_titulo = mysql_result($rsGaleriaAdmin,$n,"gal_titulo");
					$gal_desc = mysql_result($rsGaleriaAdmin,$n,"gal_desc");
					$gal_img = mysql_result($rsGaleriaAdmin,$n,"gal_img");
				  ?>
                <tr>
                  <td><?php echo utf8_encode($gal_id); ?></td>
                  <td><?php echo $gal_titulo; ?></td>
                  <td><?php echo $gal_desc; ?></td>
                  <td><img width="50px" src="img/<?php echo $gal_img; ?>"/></td>
        				  <td><a role="button" class="btn btn-primary btn-xs" href="editar.php?gal_id=<?php echo $gal_id; ?>">Editar</a></td>
        				  <td><a role="button" class="btn btn-primary btn-xs lk-del" id="<?php echo $gal_id; ?>">Eliminar</a></td>
                </tr>
				<?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		/* Iniciando jQuery */
		(function(){

			$("#m8").addClass("active")

			$(".lk-del").on("click",function(e){
				e.preventDefault()
				if(confirm("Esta seguro de Eliminar?")){
					var key = $(this).attr("id")
					var url = "del.php?gal_id="
					$(location).attr('href',url + key);
				}
			})

		})()

	</script>
  </body>
</html>