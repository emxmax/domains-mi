<?php
	include "fns_db.php";
	$cn = db_connect();

	$sqlFoto = "SELECT fot_id, fot_name, fot_img FROM foto";
	$rsFoto = mysql_query($sqlFoto);
	$nFoto = mysql_num_rows($rsFoto);

	$sqlVideo = "SELECT vid_id, vid_name, vid_url FROM video";
	$rsVideo = mysql_query($sqlVideo);
	$nVideo = mysql_num_rows($rsVideo);

	$sqlPlano = "SELECT plan_id, plan_name, plan_img, plan_arch FROM plano";
	$rsPlano = mysql_query($sqlPlano);
	$nPlano = mysql_num_rows($rsPlano);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>La Quebrada</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<!--GoogleMaps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php include_once("analyticstracking.php") ?>
  </head>
  <body>
    <div class="container-fluid" id="menorca-sesion">
    	<div class="row">
			<div class="container text-right">
		 		<a data-toggle="modal" data-target="#exampleModal">| Iniciar Sesión</a>
		 	</div>
		</div>
    </div>
	<header class="container-fluid">
		<div class="row menorca-barra">
			<div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
				<ul>
					<li><a href="#menorca-beneficios">SOBRE EL PROYECTO</a></li>
					<li>/</li>
					<li><a href="#menorca-ficha">FICHA DEL PROYECTO</a></li>
					<li>/</li>
					<li><a href="#menorca-planos">PLANOS</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
				<img class="logo" src="img/logo_empresa.png" style="position:absolute;top:-50px;width:100%;-webkit-box-shadow: -10px 10px 19px -11px rgba(0,0,0,0.88);
-moz-box-shadow: -10px 10px 19px -11px rgba(0,0,0,0.88);
box-shadow: -10px 10px 19px -11px rgba(0,0,0,0.88);"/>
			</div>
			<div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
				<ul>
					<li><a href="#menorca-ubicacion">UBICACIÓN</a></li>
					<li>/</li>
					<li><a href="#menorca-grafico">GALERIA DE FOTOS Y VIDEOS</a></li>
					<li>/</li>
					<li><a href="#menorca-contacto">CONTACTO</a></li>
				</ul>
			</div>
		</div>
	</header>
	<div class="container-fluid" id="menorca-slider">
		<div class="row">
			<img src="img/banner_home2.jpg" alt="">
		</div>
	</div>
	<section class="container-fluid" id="menorca-ficha">
		<div class="container">
			<div class="row">
				<h2>Ficha del Proyecto</h2>
				<p>Ubicado en Cieneguilla a 5 minutos del Óvalo principal, La Quebrada es un condominio de lujo conceptuado para el desarrollo de casas de campo en terrenos desde 1,000 m2.</p>
				<p>Cuenta con 2 club house, uno para el uso de adultos y otro especialmente diseñado para el uso de jóvenes, una zona equipada para el esparcimiento de los niños, 2 piscinas, spa, gimnasio, canchas deportivas y senderos ideales para la práctica del trekking o ciclismo de montaña.</p>
				<p>Además cuenta con un proyecto de arborización único en Cieneguilla que se verá reflejado en más de 750 000m2 de áreas verdes, un vivero, 3 lagunas y un sistema de punta que te permitirá ver las condiciones climáticas en el condominio desde cualquier lugar.</p>
			</div>
		</div>
	</section>
	<section class="container-fluid" id="menorca-beneficios">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-3"></span>
						</div> Club House
					</h3>
					<p>Cuenta con: Salones de usos múltiples, zonas equipadas para eventos privados, restaurante, terrazas para uso de toda la familia y un área mayor a 2,000 m2.</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-2"></span>
						</div> Gimnasio
					</h3>
					<p>Estará equipado con máquinas de última generación, una sala para el desarrollo de clases de ejercicios aeróbicos y todos los elementos necesarios para que usted se mantenga en forma.</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-8"></span>
						</div> Seguridad permanente
					</h3>
					<p>La Quebrada es un condominio cerrado, con seguridad las 24 horas y un sólo ingreso exclusivo para el uso de los condominos.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-5"></span>
						</div> Piscina
					</h3>
					<p>Ubicada junto al club house, La Quebrada contará con una piscina exclusiva para adultos y otra para niños.</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-12"></span>
						</div> Spa
					</h3>
					<p>Nuestro lujoso spa está equipado con una sauna seca, una de vapor, dos salas de masajes, una piscina cubierta y un amplio jardín Zen</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-14"></span>
						</div> Zona para niños
					</h3>
					<p>Contaremos con una zona especialmente diseñada para uso y recreación de los niños.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-13"></span>
						</div> Aventura
					</h3>
					<p>La Quebrada contará con diferentes caminos y senderos ideales para la práctica de trekking y ciclismo de montaña.</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-6"></span>
						</div> Deportes
					</h3>
					<p>Contaremos con canchas de Tenis, frontón, futbol, canchas multi deportivas, un bicicross y un skate park.</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menorca-sob-bene">
					<h3>
						<div class="menorca-icon">
							<span class="icon-7"></span>
						</div> Club house para jóvenes
					</h3>
					<p>Estará equipado para que los jóvenes puedan realizar las actividades de recreación que más les gusta.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid" id="menorca-collap">
		<div class="row">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="menorca-heading-1">
					<div class="container">
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#menorca-collap-1" aria-expanded="true" aria-controls="menorca-collap-1">
						  ▼ Proyecto Plantar
						</a>
					  </h4>
					</div>
				</div>
				<div id="menorca-collap-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="menorca-heading-1">
				  <div class="panel-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<p>
									La Quebrada contará con un proyecto de forestación único en Cieneguilla que se verá reflejado en un vivero de más de 6,000 m2, 3 lagunas, un sistema de punta que permitirá ver las condiciones climáticas en el condominio desde cualquier lugar, y más de 750 000m2 de paisajismo.</br>Las áreas forestadas representan más del 40% del área total del proyecto.
								</p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<img src="img/imagen_proyecto1_plantar1z.jpg">
							</div>
						</div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="menorca-heading-2">
					<div class="container">  
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#menorca-collap-2" aria-expanded="false" aria-controls="menorca-collap-2">
						  ▼ Diseño
						</a>
					  </h4>
					</div>
				</div>
				<div id="menorca-collap-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="menorca-heading-2">
				  <div class="panel-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<p>
									La Quebrada es un condominio exclusivo diseñado por el estudio de arquitectos Malachowski, conceptuado para el desarrollo de casas de campo en terrenos desde 1,000 m2.</br>Además con el fin de asegurar el orden y paisajismo, La Quebrada cuenta con un reglamento de construcción y 3 planos de casas modelo a su disposición en caso sea requerido.
								</p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<img src="img/imagen_proyecto1_diseno1.jpg">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<img src="img/imagen_proyecto1_diseno2.jpg">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<img src="img/imagen_proyecto1_diseno3.jpg">
							</div>
						</div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="menorca-heading-3">
					<div class="container">  
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#menorca-collap-3" aria-expanded="false" aria-controls="menorca-collap-3">
						  ▼ Actividades y Life Style en Cienequilla
						</a>
					  </h4>
					</div>
				</div>
				<div id="menorca-collap-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="menorca-heading-3">
				  <div class="panel-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<p>
									Vivir en Cieneguilla es tener las bondades del campo y las comodidades de la ciudad al alcance de tus manos. Podrá realizar diversos tipos de deportes y actividades en el campo, como montar a caballo, practicar ciclismo de montaña, trekking, cuatrimotos, disfrutar de un excelente almuerzo en los diferentes restaurantes de la zona, pasar una tarde entre amigos o simplemente desconectarse y disfrutar de la tranquilidad que te ofrece estar en el campo.</br>
									Todo a pocos minutos de supermercados, grifos, bodegas y todo lo que necesita para poder disfrutar de momentos diferentes en familia.
								</p>
							</div>
						</div>	
					</div>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="menorca-heading-4">
					<div class="container">  
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#menorca-collap-4" aria-expanded="false" aria-controls="menorca-collap-4">
						  ▼ Características generales del proyecto
						</a>
					  </h4>
					</div>
				</div>
				<div id="menorca-collap-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="menorca-heading-4">
				  <div class="panel-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<ul>
									<li>
										<div class="menorca-icon">
											<span class="icon-3"></span>
										</div> Club House
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-12"></span>
										</div> Spa
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-5"></span>
										</div> Piscina
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-7"></span>
										</div> Club House para Jóvenes
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-8"></span>
										</div> Seguridad Permanente
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-16"></span>
										</div> Lagunas
									</li>
								</ul>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<ul>
									<li>
										<div class="menorca-icon">
											<span class="icon-4"></span>
										</div> Fútbol
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-15"></span>
										</div> Trekking
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-13"></span>
										</div> Ciclismo
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-9"></span>
										</div> Terrenos desde 1000m2
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-11"></span>
										</div> Proyecto Arborizado
									</li>
									<li>
										<div class="menorca-icon">
											<span class="icon-17"></span>
										</div> Skate park
									</li>
								</ul>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<img src="img/imagen_mapa_1.png">
							</div>
						</div>	
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</section>
	<section class="container-fluid" id="menorca-ubicacion">
		<div class="container">
			<div class="row">
				<h2>Ubicación</h2>
			</div>
		</div>
		<div class="row">
			<div id="menorca-mapa">
			</div>
		</div>
	</section>
	<section class="container-fluid" id="menorca-planos">
		<div class="container">
			<div class="row">
				<h2>Planos</h2>
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<ul role="tablist">
						<?php
							for($nn = 0; $nn < $nPlano; $nn++){
								$plan_id = mysql_result($rsPlano,$nn,"plan_id");
								$plan_name = mysql_result($rsPlano,$nn,"plan_name");
								$plan_img = mysql_result($rsPlano,$nn,"plan_img");
								$plan_arch = mysql_result($rsPlano,$nn,"plan_arch");
								  
							if($nn==0){ ?>
								  	<a href="#tab<?php echo $plan_id; ?>" aria-controls="tab<?php echo $plan_id; ?>" role="tab" data-toggle="tab"><li role="presentation" class="active"><?php echo $plan_name; ?></li></a>
							<?php  }else{ ?>
								  	<a href="#tab<?php echo $plan_id; ?>" aria-controls="tab<?php echo $plan_id; ?>" role="tab" data-toggle="tab"><li role="presentation"><?php echo $plan_name; ?></li></a>
							<?php } 
							} ?>
						</ul>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<div class="tab-content">
						<?php
							for($nm = 0; $nm < $nPlano; $nm++){
								$plan_id = mysql_result($rsPlano,$nm,"plan_id");
								$plan_name = mysql_result($rsPlano,$nm,"plan_name");
								$plan_img = mysql_result($rsPlano,$nm,"plan_img");
								$plan_arch = mysql_result($rsPlano,$nm,"plan_arch");
								  
							if($nm==0){ ?>
								  	<div role="tabpanel" class="tab-pane active" id="tab<?php echo $plan_id; ?>"><img src="admin/mod-planos/img/<?php echo $plan_img; ?>"/></div>
							<?php  }else{ ?>
								  	<div role="tabpanel" class="tab-pane" id="tab<?php echo $plan_id; ?>"><img src="admin/mod-planos/img/<?php echo $plan_img; ?>"/></div>
							<?php } 
							} ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid" id="menorca-grafico">
		<div class="container">
			<div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h2>Fotos</h2>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Indicators 
							  <ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							  </ol>-->

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
								<?php
								  for($n = 0; $n < $nFoto; $n++){
									$fot_id = mysql_result($rsFoto,$n,"fot_id");
									$fot_name = mysql_result($rsFoto,$n,"fot_name");
									$fot_img = mysql_result($rsFoto,$n,"fot_img");
								  
								  if($fot_id==1){ ?>
								  	<div class="item active">
									  <img src="admin/mod-fotos/img/<?php echo $fot_img; ?>" alt="<?php echo $fot_name; ?>">
									</div>
								<?php  }else{ ?>
								  	<div class="item">
									  <img src="admin/mod-fotos/img/<?php echo $fot_img; ?>" alt="<?php echo $fot_name; ?>">
									</div>
								  	
								<?php } 
								} ?>
							  </div>
							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h2>Videos</h2>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<?php
									  for($n = 0; $n < $nVideo; $n++){
										$vid_id = mysql_result($rsVideo,$n,"vid_id");
										$vid_name = mysql_result($rsVideo,$n,"vid_name");
										$vid_url = mysql_result($rsVideo,$n,"vid_url");
									  
									  if($n==0){ ?>
									  	<div class="item active">
									  	  <iframe src="https://player.vimeo.com/video/<?php echo $vid_url; ?>?title=0&byline=0&portrait=0" width="100%" height="380" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
										</div>
									<?php  }else{ ?>
									  	<div class="item">
										  <iframe src="https://player.vimeo.com/video/<?php echo $vid_url; ?>?title=0&byline=0&portrait=0" width="100%" height="380" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
										</div>  	
									<?php } 
									} ?>
								</div>
								<!-- Controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
					<p>
					<b>Nota sobre los videos:</b></br>
					Para disfrutar de la alta calidad del video, haz click en el icono de Calidad del video y selecciona 1080p
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid" id="menorca-contacto">
		<div class="container">
			<div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
				<h2>Contacto</h2>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				
					<p>Teléfono Oficina Principal: 203-2828</p>

					<p>Ventas:</p>

					<p>Arq. Suzan Boza:</p>

					<p>Oficina: (01) 2032828 anexo 188</p>

					<p>Móvil: (01) 965016580</p>

				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3>&#9642; Escríbenos</h3>
					<div>
					  <div class="form-group">
					    <input type="text" class="form-control" placeholder="* Nombres Completos" id="m_nombre">
					  </div>
					  <div class="form-group">
					    <input type="number" class="form-control" placeholder="* DNI" id="m_dni">
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control" placeholder="* Dirección" id="m_direccion">
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control" placeholder="Télefono" id="m_telf">
					  </div>
					  <div class="form-group">
					    <input type="email" class="form-control" placeholder="Email" id="m_email">
					  </div>
					  <div class="form-group">
					  <textarea class="form-control" placeholder="Consulta" rows="3" id="m_consul"></textarea>
					  </div>
					  <div class="form-group text-center">
					  	<button type="submit" class="btn btn-default" id="btnenviar" onclick="enviar()">Enviar</button>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-sm-12 col-xs-12 fondo">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 fconocer">
						<h2>&#9642; CONOZCA MÁS DE NOSOTROS</h2>
						<a href="#">Descubra todos nuestros proyectos</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
						<img src="img/logo_menorca1.png">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bloquetelefono">
						<h2 class="telefono">TELÉFONO 203-2828</h2>
					</div>
				</div>
			</div>
			<div class="row derechos">
				<p>© COPYRIGHT 2015. MENORCA. Todos los derechos reservados.</p>
			</div>
		</div>
	</footer>

	<div class="modal fade bs-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  		<div class="modal-dialog modal-sm" role="document">
   			<div class="modal-content menorca-login-sesion">
      			<div class="modal-header text-center" style="padding-top: 0px !important; padding-right: 0px !important; padding-left: 0px !important;">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute !important;
    right: 20px !important;
    top: 10px !important;"><span style="color:white;" aria-hidden="true">&times;</span></button>
        			<img src="img/login_m.png" width="100%;">
      			</div>
      			<div class="modal-body">
        			<div>
          				<div class="form-group">
            				<label class="control-label ">Usuario:</label>
            				<input type="text" class="form-control" id="nomuser"/>
          				</div>
          				<div class="form-group">
            				<label class="control-label">Password:</label>
            				<input type="password" class="form-control" id="passuser"/>
          				</div>
        			</div>
      			</div>
      			<div class="modal-footer" style="text-align:center !important;">
        			<button type="button" class="btn btn-success" id="btn-enviar">INGRESAR</button>
      			</div>
      			<div id="result"></div>
    		</div>
  		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModalMensaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header" style="border-bottom:0 !important;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black !important;"><span aria-hidden="true">cerrar</span></button>
		  </div>
		  <div class="modal-body">
			<div class="row" style="padding-bottom: 50px;">  
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<h4 style="font-family: 'Gotham';
  font-style: normal;
  font-weight: 700;color:#E90A1E;font-size: 30px;">Gracias por<br> contactarnos</h4>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<p style="font-family: 'Gotham';
  font-style: normal;
  font-weight: 200;color:#3c3c3b;font-size: 23px;">En breves momentos atendemos tu consulta.</b></p>
				</div>
				<!--
				<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
						<div class="fb-share-button" data-href="http://jjc-creciendojuntos.com" data-layout="button"></div>
					</div>
				</div>
				-->
			</div>
		  </div>
		</div>
	  </div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    	$('#myCarousel').carousel({
		  wrap: false
		})
    </script>
    <script>
		google.maps.event.addDomListener(window, 'load', drawMap);

		function drawMap() {
			var mapa;
			var opcionesMapa = {
				zoom: 15,
				scrollwheel: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			mapa = new google.maps.Map(document.getElementById('menorca-mapa'), opcionesMapa);
			var geolocalizacion = new google.maps.LatLng(-12.100235, -76.79345);
			var image = "img/menorca-logo-mapa.png";
			var marcador = new google.maps.Marker({
				map: mapa,
				draggable: false,
				position: geolocalizacion,
				visible: true,
				icon: image,
				animation: google.maps.Animation.DROP
			});
			mapa.setCenter(geolocalizacion);
		}
	</script>
	<script type="text/javascript">

		/* Iniciando jQuery */
		(function(){
			function fLogin(){
				$.post("query-valida.php",{
					"user" : $('#nomuser').val(),
					"pass" : $('#passuser').val(),
				},
					function (data){
						if(data==1){
							var url = 'documentos.php';
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
	<script>
		
		function enviar()
		{
			var objEnviar=new Object();
			objEnviar.nombre=$("#m_nombre").val();
			objEnviar.dni=$("#m_dni").val();
			objEnviar.direccion=$("#m_direccion").val();
			objEnviar.telefono=$("#m_telf").val();
			objEnviar.email=$("#m_email").val();
			objEnviar.consulta=$("#m_consul").val();

			if (!objEnviar.nombre) {
				alert("Ingrese el Nombre");
			}else{
				if(!objEnviar.dni){
					alert("Ingrese su DNI");
				}else{
					if(!objEnviar.direccion){
						alert("Ingrese su Dirección");
					}else{
						if(!objEnviar.telefono){
							alert("Ingrese su Telefono");
						}
						else{
							if ( !(/\S+@\S+\.\S+/.test(objEnviar.email)) ) {
									alert("Coloque un email Correcto");
								}
							else{
								if(!objEnviar.consulta){
								alert("Ingrese su Consulta");
							}
								else{
									procesar(objEnviar);
								}
							}
						}
					}
				}
			}
		}
		function procesar(obj,funcRetorno)
		{
			var datos={"data":obj};
			$.ajax({          
				dataType:"json",
				data:datos,
				type:'POST',
				url: 'recibe.php',
				complete:function(evt,ss,aa){
					
					if(evt.responseText="devuelto"){
						$('#myModalMensaje').modal('show');
						$("#m_nombre").val("");
						$("#m_dni").val("");
						$("#m_direccion").val("");
						$("#m_telf").val("");
						$("#m_email").val("");
						$("#m_consul").val("");
					}else{
						alert("PROBLEMAS AL ENVIAR");
					}
				}
			});
		}
	</script>
  </body>
</html>