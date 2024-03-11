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
	<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
		<div class="col-lg-10 col-lg-offset-1 col-md-12">
			<div class="panel panel-default text-center">
			  <div class="panel-body">
				  <div class="form-group">
					<label>Usuario: </label>
					<input type="text" class="form-control" id="nomuser">
				  </div>
				  <div class="form-group">
					<label>Contraseña: </label>
					<input type="password" class="form-control" id="passuser">
				  </div>
				  <button type="submit" class="btn btn-default" id="btn-enviar">INGRESAR</button>
				  
				  <div id="result"></div>
			  </div>
			</div>
		</div>
	</div>
	
	<style>
		.panel{
			background-color: rgba(255, 255, 255, 0.7) !important;
		}
	</style>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
	<script type="text/javascript">

		 $.backstretch("../img/banner_home2.jpg");
		/* Iniciando jQuery */
		(function(){
			function fLogin(){
				$.post("query-valida.php",{
					"user" : $('#nomuser').val(),
					"pass" : $('#passuser').val(),
				},
					function (data){
						console.log(data)
						if(data==1){
							var url = 'index.php';
							$(location).attr('href',url);
						}else{
							$('#result').fadeIn(500);//.fadeOut(6000)
							$('#result').html(data)
						}
					}
				)
			}

			$("#btn-enviar").on("click",function(){
				fLogin();
			})
		})()

	</script>
  </body>

</html>