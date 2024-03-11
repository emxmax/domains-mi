

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Noticias  |  Exsa</title>

	<link href="https://exsa.net/imagenes/fav-exsa.png" rel="shortcut icon">

	<link rel="apple-touch-icon" href="https://exsa.net/imagenes/fav-exsa.png"/>

	<!-- estilos bootsrap -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	

	<link rel="stylesheet" href="../css/estilos.css">

	

	<!-- Fuentes -->

	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

	<!-- Slick Slider -->

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>



	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>





	<link rel="stylesheet" href="https://exsa.mediaimpact.digital/css/tab-noticia.css">

	<link rel="stylesheet" href="https://exsa.mediaimpact.digital/css/generales.css">

	<!-- Font awesome -->

	<style>

		#tab-noticias-sec1 .tab-noticia-principal .noticias h3{

			height: auto;

		}

	</style>

</head>

<body>

<?php
	include 'header.php';
?>



<section id="tab-noticias-sec1" class="container-fluid" style="background-image: url(https://exsa.mediaimpact.digital/image/noticia/fondo-noticia.jpg);background-size: cover;background-position: center center;">

	<div class="container">

		<div id="menu-movil">

			<div class="col-lg-11">

				<nav id="contenedor-movil">

					<?php include('navmovil.php');?>

				</nav>

			</div>

		</div>		

		<div class="row tab-noticia">

			<div class="col-lg-9">

				<div class="tab-noticia-principal">

					<a class="atras" href="https://exsa.net/noticias"><img src="https://exsa.mediaimpact.digital/image/noticia/arrow-left-black.png" alt="atras">Regresar a Noticias</a>

					<h3><a href="https://exsa.mediaimpact.digital/noticias" class="azul">NOTICIAS/</a><span class="tag">Innovación y Tecnología</span></h3>

					<hr>

					<div class="noticias">

						<div class="row noticia">

							<div class="col-lg-6  col-md-6 col-12">

								<div class="img-noticia">

									<a href="https://exsa.net/noticias/tecnologia-para-la-mineria-subterranea.php">

										<img src="http://www.exsasoluciones.pe/wp-content/uploads/2018/04/Tecnolog%C3%ADa-para-la-miner%C3%ADa-subterr%C3%A1nea-779x445.jpg" alt="noticia exsa">

									</a>

								</div>

								<div class="text-noticia">

									<a href="https://exsa.net/noticias/tecnologia-para-la-mineria-subterranea.php">

										<h3>Tecnología para la minería subterránea</h3>

									</a>

									<span class="fecha"><img src="https://exsa.mediaimpact.digital/image/noticia/calendario.png" alt="calendario"> 5 Abril, 2018</span>

									<div class="leer-mas">

										<a href="https://exsa.net/noticias/tecnologia-para-la-mineria-subterranea.php">Leer más</a>						

									</div>

								</div>

							</div>

							<div class="col-lg-6  col-md-6 col-12">

								<div class="img-noticia">

									<a href="https://exsa.net/noticias/robotizando-la-industria-minera.php">

										<img src="https://exsa.net/noticias/bgnoticia4-1.jpg" alt="noticia exsa">

									</a>

								</div>

								<div class="text-noticia">

									<a href="https://exsa.net/noticias/robotizando-la-industria-minera.php">

										<h3>Robotizando la industria minera</h3>

									</a>

									<span class="fecha"><img src="https://exsa.mediaimpact.digital/image/noticia/calendario.png" alt="calendario"> 28 Marzo, 2018</span>

									<div class="leer-mas">

										<a href="https://exsa.net/noticias/robotizando-la-industria-minera.php">Leer más</a>						

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>



				<!--<div class="cargar text-center">

					<i class="fas fa-spinner fa-spin"></i>

				</div>-->

			</div>

			<aside id="aside" class="col-lg-3">

				<?php include('navaside.php'); ?>

			</aside>

		</div>

	</div>

</section>



<section id="noticias-sec2">

</section>	

<section id="noticias-servicios" class="container-fluid" style="background-size: cover;background-position: 0;position: relative;z-index: 999">

	

</section>

<?php
	include 'footer.php';
?>

<!-- JQUERY -->

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	<!-- BOOTSRAP -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- 
	<script>

	$(document).ready(function(){

		if ($("nav.menu > ul > li").hasClass('activar')) {

			$("nav.menu > ul > li.activar").removeClass('activar');

		}

	});

	</script> -->

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<script src="https://exsa.mediaimpact.digital/js/main.js"></script>

	<script src="https://exsa.mediaimpact.digital/js/home-productos-slider.js"></script>

	<script src="https://exsa.mediaimpact.digital/js/home-submenu.js"></script>

	

	<script>

		$('.boton-top').click(function(){

			$('body,html').animate({scrollTop : 0}, 1200);

			return false;

		});

	</script>

	<script>

	$(document).ready(function() {

		$("nav.menu > ul > li#noticias").addClass('activar');

	});

	</script>

	<script>

		// MENU

		$(".inner-cat").click(function(){

			$('#menu-drop').toggle();

		});

		$(".menu-cat-mov").click(function(){

			$(this).children('ul').toggle();

		});

	</script>

	<script>

		$(document).ready(function() {

			// MENU-HEADER

			console.log("entro al JQUERY");

			$(".menu-mas").click(function(){

				console.log("entro al menu-mas");

				$(".menu").css({"width":"100%"});

				$(".menu").css({"opacity":"1"});

			});

			$(".menuclose").click(function(){

				console.log("entro al menu-close");

				$(".menu").css({"width":"0px"});

				$(".menu").css({"opacity":"0"});

			});

		});

	</script>

	<script>

		$(document)	.ready(function(){

			var $ancho_pantalla = $(window).width();

			console.log($ancho_pantalla);

			if($ancho_pantalla<768){

				$( ".tab-noticia-principal h3 .azul" ).html("NOTICIAS");

				$( ".tab-noticia-principal h3 .tag" ).html("<br>Innovación y Tecnología");

			}

			$(window).resize(function(){

				var $ancho_pantalla = $(window).width();

				console.log("resize: "+$ancho_pantalla);

				if($ancho_pantalla<768){

					$( ".tab-noticia-principal h3 .azul" ).html("NOTICIAS");

					$( ".tab-noticia-principal h3 .tag" ).html("<br>Innovación y Tecnología");

				}

				else{

					$( ".tab-noticia-principal h3 .azul" ).html("NOTICIAS/");

					$( ".tab-noticia-principal h3 .tag" ).html("Innovación y Tecnología");

				}

			});

		});			

	</script>

</body>

</html>