<script src="js/secciones/Contacto.js" type="text/javascript"></script>
<section id="contacto">
	<section class="jumbotron">
		<div class="container">
			<ol class="breadcrumb">
			  	<li class="px10"><a href="?sec=inicio">INICIO</a></li>
			  	<li class="active px10">CONTACTO</li>
			</ol>

			<div class="panel panel-black">
				<div class="panel-heading">
					<h2 id="px35">Contacto</h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<span class="green">DIRECCIÓN</span>
							<p class="txt">Av. Javier Prado Este 488 (Torre Orquídeas) – San Isidro </p>
							<span class="green">TELÉFONOS</span>
							<p class="txt">(01) 203-2828 / (01) 203-2820</p>
							<span class="green">HORARIO DE ATENCIÓN</span>
							<p class="txt">Lunes a Viernes de 9:00 am a 6:00 pm. Sábados de 9:30 am a 2:00 pm</p>
							<figure><img src="imagenes/imagen_terreno.png" alt="terrenos" id="imgTerrenos"></figure>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formularioContacto">
							<h2>&bull; Escríbenos</h2><div class="form">
							  	<div class="form-group">
							    	<input type="text" class="form-control" id="txtNombreContacto" placeholder="Nombre">
							  	</div>
							  	<div class="form-group">
							    	<input type="number" class="form-control" id="txtDni" placeholder="*Dni">
							  	</div>
							  	<div class="form-group">
							    	<input type="number" class="form-control" id="txtTelefonoContacto" placeholder="Teléfono">
							  	</div>
							  	<div class="form-group">
							    	<input type="email" class="form-control" id="txtCorreoContacto" placeholder="Email">
							  	</div>
							  	<div class="form-group">
							    	<input type="text" class="form-control" id="txtNombreProyecto" placeholder="Proyecto">
							  	</div>
							  	<div class="form-group">
							    	<textarea class="form-control" id="txtMensajeContacto" placeholder="Consulta" rows="5"></textarea>
							  	</div>
							  <button type="submit" class="btn btn-success" id="btnContacto">Enviar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<link rel="stylesheet" href="css/contacto.css">
<style>
	input[type=number]::-webkit-inner-spin-button,
	 input[type=number]::-webkit-outer-spin-button { 
	 	-webkit-appearance: none; margin: 0; 
	 }
</style>
<script>
	var contacto=new Contacto();
	$(function(){
		contacto.iniciar();
	})
</script>