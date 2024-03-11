<?php
	ob_start("ob_gzhandler");
	session_start();

	include '../incdes/fns_db.php';
	$cn = db_connect();

	if(!isset($_GET['sw'])){
		$sw = 0;
	}else{
		$sw = $_GET['sw'];
	}

	$id = $_GET["anun_id"];

	$sql = "SELECT anun_id, anun_titulo, anun_img, anun_desc ,nivel_id  
			FROM anuncio
			WHERE anun_id = $id";
	$rs = mysql_query($sql);

	$anun_id = mysql_result($rs,0,"anun_id");
	$anun_titulo = mysql_result($rs,0,"anun_titulo");
	$anun_img = mysql_result($rs,0,"anun_img");
	$anun_desc = mysql_result($rs,0,"anun_desc");
	$nivel_id = mysql_result($rs,0,"nivel_id");
	
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

          <h2 class="sub-header">Boletines y Anuncios <small>Editar</small></h2>
		  
		  <?php if($sw == 1){ ?>
			<div class="alert alert-success" role="alert">Modificado exitosamente :)</div>
		  <?php }elseif($sw == 2){ ?>
			<div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
		  <?php }elseif(($sw == 3)){ ?>
			<div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
		  <?php } ?>
		  
          <form action='edit.php' method='post' enctype="multipart/form-data">
			  <div class="form-group">
				<label>Titulo: </label>
				<input type="text" class="form-control" name="anun_titulo" value="<?php echo $anun_titulo; ?>">
				<input type="hidden" name="anun_id" value="<?php echo $anun_id; ?>">
			  </div>
			  <div class="form-group">
				<label>Descripción: </label>
				<textarea class="form-control" rows="3" name="anun_desc"><?php echo $anun_desc; ?></textarea>
			  </div>
			  <div class="form-group">
				<label>Imagen Actual: </label>
				<img src="img/<?php echo $anun_img; ?>" width='96'>
			  </div>
			  <div class="form-group">
				<label>Cambiar Imagen: </label>
				<input type="file" name="fImg">
				<input type="hidden" name="anun_img" value="<?php echo $anun_img; ?>">
				<p class="help-block">La imagen debe ser max.400px de ancho.</p>
			  </div>
			  <div class="form-group">
				<label>¿Que usuario lo podra ver?: </label>
				<select class="form-control" name="nivel_id" value="<?php echo $nivel_id; ?>">
					<option value="1">Colaborador</option>
					<option value="2">Cliente</option>
					<option value="3">Ambos</option>
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

			$("#m1").addClass("active")

		})()

	</script>
  </body>
</html>