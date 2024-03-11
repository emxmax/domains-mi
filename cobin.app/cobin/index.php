<?php 
// require 'FlashMessages.php';
require 'flash.php';
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cobin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/lightslider.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/index.css">
	<style>
		header{
			height: unset !important;
		}
		@media (max-width: 767px){
			header {
				z-index: 999999 !important;
			}
		}
		header i#menu-co{
			padding-top: 0px !important;
		}
		header nav ul{
			padding-top: 0px !important;
		}
		header .row.cuerpo{
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
		}
		.align-self-end{
			-ms-flex-preferred-size: 0;
			flex-basis: 0;
			-ms-flex-positive: 1;
			flex-grow: 1;			
			-ms-flex-item-align: center!important;
			align-self: center!important;
		}
		#myModal{
			display: none;
		}
/*		#home{
			padding-top: 95px;
		}*/
	</style>
</head>
<body>
	<?php
		include 'header.php';
	?>	
	<section class="slider-home" id="home">
		<ul id="imageGallery">
			<li data-thumb="image/1.jpg" data-src="image/1.jpg">
				<a href="javascript:void(0)"><img src="image/1.jpg"/></a>
			</li>
			<li data-thumb="image/2.jpg" data-src="image/2.jpg">
				<a href="javascript:void(0)"><img src="image/2.jpg"/></a>
			</li>
			<li data-thumb="image/3.jpg" data-src="image/3.jpg">
				<a href="javascript:void(0)"><img src="image/3.jpg"/></a>
			</li>
		</ul>
		<div class="inner-mouse">
			<div id="mouseB12" class="mouse_scroll btn-ancla2">
				<a href="#cobranza">                    
					<div class="mouse">
						<div class="wheel"></div>
					</div> 
					<div>
						<span class="m_scroll_arrows unu"></span> 
						<span class="m_scroll_arrows doi"></span> 
						<span class="m_scroll_arrows trei"></span>
					</div>
				</a>
			</div>
		</div>
	</section>

	<section class="container-fluid" id="store">
		<div class="container">
			<div class="row cuerpo">
				<div class="col-lg-3 col-sm-3">
					<a class="comp" href="javascript:void(0)">
						<img src="image/appstore_1.png" alt="">
					</a>
				</div>
				<div class="col-lg-6 col-sm-6 text-center">
					<a class="correo" href="mailto:hola@cobin.app">hola@cobin.app</a>
				</div>
				<div class="col-lg-3 col-sm-3">
					<a class="comp" href="javascript:void(0)">
						<img src="image/playstore_1.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</section>


	<section id="cobranza" class="container-fluid">
		<div class="container">
			<div class="row cuerpo">
				<div class="col-lg-4 col-sm-4">
					<h5 class="princ">COBin</h5>
					<div class="image">
						<img src="image/logo-a_1.png" alt="" class="princip">						
					</div>
				</div>
				<div class="col-lg-8 col-sm-8">
					<h5 class="sec">Cobranzas Inteligentes</h5>
					<p>Es tu asistente virtual personal que hará que te olvides de lo incómodo que resulta cobrar a tus inquilinos o los que te deben.</p>
				</div>
				<div class="col-lg-offset-1 col-lg-10 col-sm-offset-2 col-sm-10 text-center imagesv">
					<div class="col-lg-4 col-sm-4 col-xs-6 text-center">
						<img src="image/cob-1_1.png" alt="" class="cobra">
						<span>Inmuebles</span>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-6 text-center">
						<img src="image/cob-22_1.png" alt="" class="cobra">
						<span>Muebles</span>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12 text-center">
						<img src="image/cob-3_1.png" alt="">
						<span>Préstamos</span>
					</div>
				</div>
			</div>
		</div>
	</section>	

	<section id="porque" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<h5>¿Por qué usar nuestra app?</h5>
				</div>
				<div class="col-lg-4 col-sm-4 text-center">
					<img src="image/icon-1_1.png" alt="">
					<p>Notificaciones automáticas a quienes te deben.</p>	
				</div>
				<div class="col-lg-4 col-sm-4 text-center">
					<img src="image/icon-2_1.png" alt="">
					<!-- <p>Centro de control para monitoreo de COBin.</p> -->
					<p>Centro de control para el monitoreo de tus: inmuebles, muebles y préstamos, desde tu celular.</p>
				</div>
				<div class="col-lg-4 col-sm-4 text-center">
					<img src="image/icon-3_1.png" alt="">
					<p>Creación automática de contratos.</p>					
				</div>
				<div class="col-lg-4 col-sm-4 text-center">
					<img src="image/icon-4_1.png" alt="">
					<p>Web exclusiva para cobrar a tus deudores.</p>	
				</div>
				<div class="col-lg-4 col-sm-4 text-center">
					<img src="image/icon-5_1.png" alt="">
					<p>Gestor de cobros y penalidades.</p>
				</div>
				<div class="col-lg-4 col-sm-4 text-center">
					<img src="image/icon-6_1.png" alt="">
					<p>Historial & Estadísticas. Controla tus ingresos, penalidades cobradas, días de atraso y más.</p>
				</div>
			</div>
		</div>		
	</section>

	<section id="funciona" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<h5>¿Cómo funciona?</h5>
				</div>
				<div class="col-lg-offset-1 col-lg-10 col-xs-12">
					<div class="col-lg-4 col-sm-4 col-xs-12 text-center">
						<img src="image/por-1_1.png" alt="">
						<p>Descarga la app.</p>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12 text-center">
						<img src="image/por-2.png" alt="">
						<p>Crea tu perfil de usuario.</p>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12 text-center">
						<img src="image/por-3.png" alt="">
						<p>Registra tus alquileres y préstamos.</p>
					</div>
				</div>
			</div>
		</div>	
	</section>

<?php 
session_start();
if (isset($_SESSION['success'])) {
	echo $_SESSION['success'];
}
unset($_SESSION['success']);
 ?>

	<section class="container-fluid text-center" id="escribenos">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<div class="col-lg-12 text-left">
							<h5>Escríbenos</h5>
						</div>
						<div class="col-lg-12">
							<div class="row">
										
										<!-- POPUP - set up the modal to start hidden and fade in and out -->
										<div id="myModal" class="modal fade">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <!-- dialog body -->
										      <div class="modal-body">
										        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
										        El mensaje fue enviado satisfactoriamente.
										      </div>
										      <!-- dialog buttons -->
										      <div class="modal-footer"><button type="button" class="btn btn-primary">Ok</button></div>
										    </div>
										  </div>
										</div>

								<form class="frceleste" id="frmcontacto" action=email.php method=POST>
									<div class="col-md-4 col-sm-4">
										<div class="imput-i">
											<img src="image/es-1_1.png" alt="" class="cla1">
											<input type="text" name="nombres" placeholder="Nombres" required>
											<input type="hidden" name="tipo" value="socio">
										</div>
										<div class="imput-i">
											<img src="image/es-2_1.png" alt="" class="cla1">
											<input type="text" name="apellidos" placeholder="Apellidos" required>
										</div>
										<div class="imput-i">
											<img src="image/es-3_1.png" alt="" class="cla1">
											<input type="text" name="telefono" placeholder="Teléfono" required>
										</div>
										<div class="imput-i">
											<img src="image/es-4_1.png" alt="" class="cla1">
											<input type="email" name="email" placeholder="Correo electrónico" required>
										</div>
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="imput-ir">
											<img src="image/es-5_1.png" alt="">
											<input type="text" name="asunto" placeholder="Asunto" required>
										</div>
										<div class="imput-ir">
											<img src="image/es-6_1.png" alt="">
											<textarea name="mensaje" rows="6" placeholder="Mensaje"></textarea>
										</div>

									</div>
									<div class="col-lg-12">
										<button>Enviar</button>
									</div>
									<div class="col-lg-12 text-center">
										<div class="msga"></div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="logos" class="container-fluid">
        <div class="container">
            <ul id="carrusel-aliados" class="gallery content-slider">
                <li>
                    <a href="javascript:void(0)" target="_blank">
                        <img src="image/a11.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.mediaimpact.pe/" target="_blank">
                        <img src="image/a2.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="http://www.holinsys.pe" target="_blank">
                        <img src="image/a44.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="image/a5.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section  id="footer-top" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-0 col-md-4 col-sm-4 col-xs-10 col-xs-offset-1">
                    <h5>Suscríbete</h5>
                    <p>Inscríbete a nuestro boletín para recibir noticias de la app: </p>
                    <form id="suscribete">
                        <input type="text" name="email" placeholder="Correo" required>
                        <button type="submit" class="btn btn-default ">Enviar</button>
						<div class="msga"></div>
					</form>
                </div>
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-3 col-sm-3">
					<!-- <h2>Contacto</h2>
					<p style="padding-right: 5%;">y nos contactaremos contigo en breve.</p>
					<p class="em-footer-1">contacto@altoke.com.pe</p> -->
				</div>
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-3 col-sm-3 redes-f">
                    <h5 class="text-left">Síguenos</h5>
                    <div class="redes-footer ">
                        <div class="facebook-b"><a href="https://www.facebook.com/cobin.pe/" target="_blank"><i class="fa fa-facebook"></i></a></div>
                        <div class="instagram-b"><a href="https://www.instagram.com/cobin.app/" target="_blank"><i class="fa fa-instagram"></i></a></div>
                        <div class="youtube-b"><a href="https://www.youtube.com/channel/UC-SdbTxtE7VOrXAlgtUZhmw?view_as=subscriber" target="_blank"><i class="fa fa-youtube-play"></i></a></div>
                        <div class="linkedin-b"><a href="https://www.linkedin.com/showcase/cobin-app/" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
	
	<?php
		include 'footer.php';
	?>
	<div class="box-chat-redgalar">
		<div class="header-chat">
			<img src="image/chat.png" alt="">
			<span>Chat en línea</span>
		</div>
		<div class="box-mensaje-red" style="display:none">
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcobin.pe%2F&tabs=messages&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/lightslider.js"></script>
<script src="js/flip.js"></script>
<script src="js/bootbox.min.js"></script>
<script>
	jQuery(document).ready(function($) {
		$('#imageGallery').lightSlider({
			item:1,
			auto:true,
			loop:true,
			// slideMove:2,
			easing: 'linear',
			cssEasing: 'ease',
			slideEndAnimation: true,
			speed: 1000,
			pause:5000
	});
	$('#carrusel-aliados').lightSlider({
		item:4,
		loop:true,
		slideMove:2,
		pager: false,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		speed:600,
		responsive : [
			{
				breakpoint:800,
				settings: {
					item:4,
					slideMove:1,
					slideMargin:6,
					}
			},
			{
				breakpoint:480,
				settings: {
					item:2,
					slideMove:1
					}
			}
		]
	});
	$(".header-chat").click(function(){
		$(".box-mensaje-red").toggle(function(){
			$(".header-chat i").toggle();
		});
	});
	$('header nav ul li.btn-ancla a').click(function(e){
		e.preventDefault();
		$('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top-80}, 1000);
	});	
	$('.btn-ancla2 a').click(function(e){
		e.preventDefault();
		$('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top-80}, 1000);
	});
	$("#menu-co").click(function(){
		console.log('clickmenu');
		var estado = $("header nav").css("display");
		if(estado=="none"){
			$("header nav").show();
			$("header").css('height','unset');
		}else{
			$("header nav").hide();
		}
	});

	// padding
	var $header = $("header").height();
	// console.log($header);
	$("#home").css('padding-top', $header);
	$(window).resize(function() {
		var $header = $("header").height();		
		$("#home").css('padding-top', $header);
	});
});
</script>
<!-- POPUP sometime later, probably inside your on load event callback -->
<script>
    $("#myModal").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#myModal a.btn").on("click", function(e) {
            console.log("button pressed");   // just as an example...
            $("#myModal").modal('hide');     // dismiss the dialog
        });
    });
    $("#myModal").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#myModal a.btn").off("click");
    });
    
    $("#myModal").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#myModal").remove();
    });
    
    $("#myModal").modal({                    // wire up the actual modal functionality and show the dialog
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // ensure the modal is shown immediately
    });
</script>
<style>
.lSPager.lSpg{
	display: none;
}
@media (max-width: 767px){
	#footer-top form {
		position: relative;
		margin-bottom: 25px;
		z-index: 99999;
	}
}
/*Stylus*/
@media(min-width: 768px){
	#porque p{
		line-height: 26px;
		max-height: 130px;
		min-height: 130px;
	}
}
@media(min-width: 768px) and (max-width: 991px){
	#porque p{
		line-height: 24px;
		padding: 0 28px;
	}
}
@media(min-width: 991px){
	#funciona p{
		line-height: 28px;
	}
}
@media(min-width: 767px) and (max-width: 991px){
	#funciona p{
		line-height: 26px;
	}
}
@media(min-width: 375px){
	#izq{
	float: left;
	}
}
</style>
</body>
</html>