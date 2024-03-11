<?php
  ob_start("ob_gzhandler");
  session_start();
  include "incdes/variable.php";
  include "../util/query-admin.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrador / LA QUEBRADA</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/excellentexport.min.js"></script>
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
        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12 sidebar">
          <?php include("aside.php");?>	
        </div>
        <div class="col-lg-11 col-lg-offset-1 col-md-10 col-md-offset-2 col-xs-12 main">

          <h2 class="sub-header">Clientes</h2>
         

          <p class="text-right"><a class="btn btn-primary" href="http://laquebrada.com.pe/Friends-&-Family/admin/excel/listaclientes.php" >Exportar Excel</a></p>

          <!--
          <p class="text-right"><a class="btn btn-primary" download="clientes.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');">Exportar Excel</a></p>
          -->

          <div class="table-responsive">
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Código</th>
                  <th>Email</th>
				          <th></th>
                </tr>
              </thead>
              <tbody>
				<?php
				  for($n = 0; $n < $nClienteAdmin; $n++){
					$cli_id = mysql_result($rsClienteAdmin,$n,"cli_id");
					$cli_name = mysql_result($rsClienteAdmin,$n,"cli_name");
					$cli_codigo = mysql_result($rsClienteAdmin,$n,"cli_codigo");
          $cli_email = mysql_result($rsClienteAdmin,$n,"cli_email");
				  ?>
                <tr>
                  <td><?php echo $cli_id; ?></td>
                  <td><?php echo $cli_name; ?></td>
                  <td><?php echo $cli_codigo; ?></td>
                  <td><?php echo $cli_email; ?></td>
                  <td><a role="button" class="btn btn-primary btn-xs" href="mod-clientes/index.php?cli_email=<?php echo $cli_email; ?>">Ver Referidos</a></td>
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

			$("#m1").addClass("active");

		})()

	</script>
  </body>
</html>