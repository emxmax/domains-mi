<?php
	ob_start("ob_gzhandler");
	session_start();

	include '../incdes/query.php';
	$cn = db_connect();

	if(!isset($_GET['sw'])){
		$sw = 0;
	}else{
		$sw = $_GET['sw'];
	}

	$id = $_GET["anex_id"];

	$sql = "SELECT anex_id, anex_name, anex_titulo, anex_arch ,tarch_id, doc_id  
			FROM anexo
			WHERE anex_id = $id";
	$rs = mysql_query($sql);

	$anex_id = mysql_result($rs,0,"anex_id");
	$anex_name = mysql_result($rs,0,"anex_name");
	$anex_titulo = mysql_result($rs,0,"anex_titulo");
	$anex_arch = mysql_result($rs,0,"anex_arch");
	$tarch_id = mysql_result($rs,0,"tarch_id");
	$doc_id = mysql_result($rs,0,"doc_id");
	
	include "../incdes/variable.php";
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

          <h2 class="sub-header">Anexos de Documentos <small>Editar</small></h2>
		  
		  <?php if($sw == 1){ ?>
			<div class="alert alert-success" role="alert">Modificado exitosamente :)</div>
		  <?php }elseif($sw == 2){ ?>
			<div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
		  <?php }elseif(($sw == 3)){ ?>
			<div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
		  <?php } ?>
		  
          <form action='edit.php' method='post' enctype="multipart/form-data">
			  <div class="form-group">
				<label>Nombre: </label>
				<input type="text" class="form-control" name="anex_name" value="<?php echo $anex_name; ?>">
				<input type="hidden" name="anex_id" value="<?php echo $anex_id; ?>">
			  </div>
			  <div class="form-group">
				<label>Titulo: </label>
				<input type="text" class="form-control" name="anex_titulo" value="<?php echo $anex_titulo; ?>">
			  </div>
			  <div class="form-group">
				<label>Archivo Actual: </label>
				<input type="text" class="form-control" value="<?php echo $anex_arch; ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Cambiar Archivo: </label>
				<input type="file" name="fArch">
				<input type="hidden" name="anex_arch" value="<?php echo $anex_arch; ?>">
				<p class="help-block">El archivo no debe tener tildes en su nombre.</p>
			  </div>
			  <div class="form-group">
				<label>¿Que tipo de archivo es?: </label>
				<select class="form-control" name="tarch_id" value="<?php echo $tarch_id; ?>">
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
			  <div class="form-group text-right">
				<button type="submit" class="btn btn-primary">Editar</button>
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