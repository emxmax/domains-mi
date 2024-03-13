<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo Conectar::ruta();?>template/css/main.css">
    <title>Admin || Redgalar</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1><img src="<?php echo Conectar::ruta();?>template/images/logo-blanco.png" alt="logo"></h1>
      </div>
      <div class="login-box">
        <form id="login-form" class="login-form" data-validate="parsley">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INICIO DE SECCION</h3>
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" name="user" type="text" placeholder="Usuario" data-required="true" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">CONTRASE&Ntilde;A</label>
            <input class="form-control" name="pass" type="password" data-required="true" placeholder="Contrase&ntilde;a">
          </div>

          <div class="form-group btn-container">
			<input type="hidden" id="estado" name="estado" value="1">
            <button type="submit" class="btn btn-primary btn-block">INGRESAR <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
		  <div class="form-group">
			<div class="alerta"></div>
		  </div>
        </form>
      </div>
    </section>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="<?php echo Conectar::ruta();?>template/js/plugins/pace.min.js"></script>
  <!-- parsley -->
  <script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.min.js"></script>
  <script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.extend.js"></script>
  
  <script src="<?php echo Conectar::ruta();?>template/js/main.js"></script>
  <script src="<?php echo Conectar::ruta();?>template/js/login.js"></script>
  
</html>