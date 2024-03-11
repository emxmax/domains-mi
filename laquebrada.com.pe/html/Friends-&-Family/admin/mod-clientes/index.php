<?php
  ob_start("ob_gzhandler");
  session_start();
  include "../incdes/variable.php";
  include "../../util/query-admin.php";

  $cli_email = $_GET["cli_email"];

  $sqlRef = "SELECT * FROM referido WHERE cli_email = '$cli_email' ORDER BY re_posicion AND re_name IS NOT NULL";
  $rsRef = mysql_query($sqlRef);
  $nRef = mysql_num_rows($rsRef);

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
  	<link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/excellentexport.min.js"></script>
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
        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12 sidebar">
          <?php include("../aside.php");?>	
        </div>
        <div class="col-lg-11 col-lg-offset-1 col-md-10 col-md-offset-2 col-xs-12 main">

          <h2 class="sub-header">Referidos del Cliente Seleccionado</h2>
          
          <p class="text-right"><a class="btn btn-primary" download="referidos-del-cliente-seleccionado.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');">Exportar Excel</a></p>

		      <div class="table-responsive">
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Email</th>  
                  <th>Teléfono</th>
                </tr>
              </thead>
              <tbody>
				  <?php
				  for($n = 0; $n < $nRef; $n++){
					$re_id = mysql_result($rsRef,$n,"re_id");
					$re_name = mysql_result($rsRef,$n,"re_name");
					$re_dir = mysql_result($rsRef,$n,"re_dir");
					$re_email = mysql_result($rsRef,$n,"re_email");
					$re_telf = mysql_result($rsRef,$n,"re_telf");
          $re_posicion = mysql_result($rsRef,$n,"re_posicion");

          if($re_name!==""){
				  ?>
                <tr>
                  <td><?php echo $re_posicion; ?></td>
                  <td><?php echo $re_name; ?></td>
                  <td><?php echo $re_dir; ?></td>
                  <td><?php echo $re_email; ?></td>
                  <td><?php echo $re_telf; ?></td>
                </tr>
				  <?php                      
          }
          } ?>
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

		})()

	</script>
  </body>
</html>