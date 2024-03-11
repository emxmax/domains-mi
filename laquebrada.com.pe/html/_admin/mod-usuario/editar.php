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

	$id = $_GET["user_id"];

	$sql = "SELECT user_id, user_name, user_nick, user_pass ,nivel_id 
			FROM usuario
			WHERE user_id = $id";
	$rs = mysql_query($sql);

	$user_id = mysql_result($rs,0,"user_id");
	$user_name = mysql_result($rs,0,"user_name");
	$user_nick = mysql_result($rs,0,"user_nick");
	$user_pass = mysql_result($rs,0,"user_pass");
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

          <h2 class="sub-header">Usuarios <small>Editar</small></h2>
		  
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
				<input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			  </div>
			  <div class="form-group">
				<label>Usuario: </label>
				<input type="text" class="form-control" name="user_nick" value="<?php echo $user_nick; ?>">
			  </div>
			  <div class="form-group">
				<label>Contraseña: </label>
				<input type="text" class="form-control" name="user_pass" value="<?php echo $user_pass; ?>">
			  </div>
			  <div class="form-group">
				<label>¿Cual sera su nivel de acceso?: </label>
				<select class="form-control" name="nivel_id">
					<?php
				  for($m = 0; $m < $nNivel2Admin; $m++){
					$nivel_id = mysql_result($rsNivel2Admin,$m,"nivel_id");
					$nivel_name = mysql_result($rsNivel2Admin,$m,"nivel_name");
				  ?>
					<option value="<?php echo $nivel_id; ?>"><?php echo $nivel_name; ?></option>
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

			$("#m4").addClass("active")

		})()

	</script>
  </body>
</html>