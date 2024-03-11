<?php
  ob_start("ob_gzhandler");
  session_start();
  include "incdes/variable.php";
  include "incdes/query.php";
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
  	<link rel="stylesheet" href="css/style.css">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
	
	 <?php include("header.php");?>	
     <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include("aside.php");?>	
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Boletines y Anuncios</h2>
		  <p class="text-right"><a class="btn btn-primary" href="mod-anuncios/nuevo.php" role="button">Agregar Nuevo</a></p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Imagen</th>
                  <th>Nivel</th>
				  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
				<?php
				  for($n = 0; $n < $nAnuncioAdmin; $n++){
					$anun_id = mysql_result($rsAnuncioAdmin,$n,"anun_id");
					$anun_titulo = mysql_result($rsAnuncioAdmin,$n,"anun_titulo");
					$anun_img = mysql_result($rsAnuncioAdmin,$n,"anun_img");
					$anun_desc = mysql_result($rsAnuncioAdmin,$n,"anun_desc");
					$nivel_id = mysql_result($rsAnuncioAdmin,$n,"nivel_id");
				  ?>
                <tr>
                  <td><?php echo utf8_encode($anun_id); ?></td>
                  <td><?php echo $anun_titulo; ?></td>
                  <td><?php echo $anun_desc; ?></td>
                  <td><img width="50px" src="mod-anuncios/img/<?php echo $anun_img; ?>"/></td>
                  <td><?php echo $nivel_id; ?></td>
				  <td><a role="button" class="btn btn-primary btn-xs" href="mod-anuncios/editar.php?anun_id=<?php echo $anun_id; ?>">Editar</a></td>
				  <td><a role="button" class="btn btn-primary btn-xs lk-del" id="<?php echo $anun_id; ?>">Eliminar</a></td>
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

			$("#m1").addClass("active")

			$(".lk-del").on("click",function(e){
				e.preventDefault()
				if(confirm("Esta seguro de Eliminar?")){
					var key = $(this).attr("id")
					var url = "mod-anuncios/del.php?anun_id="
					$(location).attr('href',url + key);
				}
			})

		})()

	</script>
  </body>
</html>