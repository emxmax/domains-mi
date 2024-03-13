<?php 
    require_once('../config.php');
    $production = PRODUCTION_SERVER;

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>SCD Validador de clases php</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript">
	var production = parseInt("<?php echo $production?1:0; ?>");
	</script>
</head>
<body>
	<section id="preloader">
		<img src="img/preloader.gif">
	</section>
	<script type="text/javascript">
		document.getElementById('preloader').style.height = window.innerHeight+"px";
	</script>
	<section class="container-fluid" id="app" >

		<nav class="navbar navbar-inverse navegacionSuperior" role="navigation">
		  <ul class="nav navbar-nav">
            <li class="active"><a href="#">Browser Gosu</a></li>
            <li><a href="#" id="btnEnviarMensaje">Enviar un mensaje</a></li>

            
          </ul>
           <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Version 0.0.1</a></li>
	        
	      </ul>
		</nav>
		<div class="row">
			<section class="col-md-2 sidebar" id="seccionArchivos">
				<h4>
					Archivos
					<button id="btnRecargarArchivos" class="btn btn-primary btn-sm" data-toggle="tooltip" type="button" data-placement="left" title="Tooltip on left">
					  <span class="glyphicon glyphicon-repeat"></span> 
					</button>

				</h4>
				<div id="contendorArchivos">
					
				</div>
				
			</section>
			<section class="col-md-6" >
				<div class="panel panel-default" id="panelFunciones">
					<div class="panel-heading">
				    	<h3 class="panel-title">Metodos</h3>
				  	</div>
				  <div class="panel-body" id="cuerpoFunciones">
				   		<button id="btnRecargarFunciones" class="btn btn-primary btn-sm" data-toggle="tooltip" type="button" data-placement="left" title="Tooltip on left">
						  	<span class="glyphicon glyphicon-repeat"></span> 
						</button>
						<label id="lblNombreArchivo">Bienvenidos:</label>
						<div id="contendorFuncionesMetodos">
							<div class="row" id="contenedorFunciones">
								
							</div>
							<section class="controles">
								<h5 id="lblNombreMetoto">
									
								</h5>
								<table class="table table-striped">
									<thead>
										
									</thead>
									<tbody id="listaParametros">
										
									</tbody>
								</table>
								<button type="button" id="btnConsultar" class="btn btn-primary">Consultar</button>
							</section>
						</div>
				  </div>
				  
				</div>
				<div class="footerApp">
					
				</div>
			</section>
			<section class="col-md-4" id="resultadosApp">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#resulInfo" data-toggle="tab">Información</a></li>
				  <li><a href="#resultado" data-toggle="tab">Resultado</a></li>
				  <li><a href="#resultadoJSON" data-toggle="tab">Resultado JSON</a></li>
				  <li><a href="#resultadoTabulado" data-toggle="tab">Tabulado</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="resulInfo">
						<table class="table">
							<thead>
								
							</thead>
							<tbody>
								<tr>
									<td>Tiempo Total</td>
									<td id="lblTiempoTotal">0</td>
								</tr>
								<tr>
									<td>Tiempo de consulta</td>
									<td id="lblTiempoConsulta">0</td>
								</tr>
								<tr>
									<td>Tiempo de decodificación</td>
									<td id="lblTiempoDecodificacion">0</td>
								</tr>
								<tr>
									<td>Datos enviados</td>
									<td id="lblDatosEnviados">0</td>
								</tr>
								<tr>
									<td>Datos recibidos</td>
									<td id="lblDatosRecibidos">0</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="resultado">
					  	
					  	
					  	<ul id="graficoResultado">
					  		
					  	</ul>
					</div>
					<div class="tab-pane" id="resultadoJSON">
						<textarea id="textoJSON"></textarea>
					</div>
					<div class="tab-pane" id="resultadoTabulado">
						<div class="table-responsive">
							<table class="table table-striped table-bordered">
								<thead id="tabuladoCabecera">
									
								</thead>
								<tbody id="tabuladoCuerpo">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
	<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="js/vendor/jquery.json-2.4.min.js"></script>
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/vendor/S.js"></script>
	<?php if($production ){ ?>
		<script type="text/javascript" src="js/app.min.js"></script>
	<?php } else {?>		
		<script type="text/javascript" src="js/app.js"></script>
	<?php } ?>

</html>