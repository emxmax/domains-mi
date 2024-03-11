<?php
	ob_start("ob_gzhandler");
	session_start();

	if(!isset($_GET['sw'])){
		$sw = 0;
	}else{
		$sw = $_GET['sw'];
	}
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

          <h2 class="sub-header">Anexos de Documentos <small>Agregar</small></h2>
		  
		  <?php if($sw == 1){ ?>
			<div class="alert alert-success" role="alert">Registrado exitosamente :)</div>
		  <?php }elseif($sw == 2){ ?>
			<div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
		  <?php }elseif(($sw == 3)){ ?>
			<div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
		  <?php } ?>
		  
          <form action='add.php' method='post' enctype="multipart/form-data">
			  <div class="form-group">
				<label>Nombre: </label>
				<input type="text" class="form-control" name="anex_name">
			  </div>
			  <div class="form-group">
				<label>Titulo: </label>
				<input type="text" class="form-control" name="anex_titulo">
			  </div>
			  <div class="form-group">
				<label>Archivo: </label>
				<input type="file" name="anex_arch">
				<p class="help-block">El archivo debe pesar max.40mb.</p>
			  </div>
			  <div class="form-group">
				<label>¿Que tipo de archivo es?: </label>
				<select class="form-control" name="tarch_id">
					<?php
				  for($n = 0; $n < $nTarchivoAdmin; $n++){
					$tarch_id = mysql_result($rsTarchivoAdmin,$n,"tarch_id");
					$tarch_name = mysql_result($rsTarchivoAdmin,$n,"tarch_name");
					$tarch_img = mysql_result($rsTarchivoAdmin,$n,"tarch_img");
				  ?>
					<option value="<?php echo $tarch_id; ?>"><?php echo $tarch_name; ?></option>
				  <?php } ?>
				</select>
			  </div>
			  <div class="form-group">
				<label>¿En que documento va estar?: </label>
				<select class="form-control" name="doc_id">
					<?php
				  for($m = 0; $m < $nDocumentoAdmin; $m++){
					$doc_id = mysql_result($rsDocumentoAdmin,$m,"doc_id");
					$doc_name = mysql_result($rsDocumentoAdmin,$m,"doc_name");
				  ?>
					<option value="<?php echo $doc_id; ?>"><?php echo $doc_name; ?></option>
				  <?php } ?>
				</select>
			  </div>
			  <div class="form-group text-right">
				<button type="submit" class="btn btn-primary">Agregar</button>
			  </div>
		  </form>
		  
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

			$("#m3").addClass("active")

		})()

	</script>
  </body>
</html>