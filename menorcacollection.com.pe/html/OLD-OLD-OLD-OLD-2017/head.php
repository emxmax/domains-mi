<?php 
	//var_dump($_GET);
	if(!isset($_GET["sec"])){
		$seccion = $_GET["proyectos?sec"];
	}else{

		$seccion= $_GET["sec"];
	}
	
	//echo "".isset($seccion);
	$titulo 		= "";
	$description	= "";
	$keywords 		= "";

	if(!isset($seccion)) {
		$titulo= "Menorca Collection: Venta de terrenos exclusivos con alta calidad";
		$description= "Menorca Collection; venta terrenos exclusivos cerca de lima. Son 2 proyectos con más altos estándares de calidad para mejorar tu estilo de vida: La quebrada y Finca Entre Ríos.";
		$keywords= "Menorca, Menorca Collection, proyectos Menorca, compra de terrenos, venta de terrenos, venta de lotes, urbanización, terrenos cerca de lima, terrenos en Cieneguilla, lotes Menorca, terrenos Menorca, vivir mejor, estilo de vida, seguridad, habilitación urbana, condominio de lujo, terrenos exclusivos, venta de terrenos exclusivos, calidad, La Quebrada, Finca Entre Ríos, tranquilidad, actividades de campo, compra de terrenos exclusivos, condominio exclusivo, terrenos de lujo, tranquilidad, relax, clase.";
	}
	if($seccion == "proyectos"){
		$titulo= "Menorca Collection: Venta de terrenos exclusivos con alta calidad";
		$description= "Menorca Collection; venta terrenos exclusivos cerca de lima. Son 2 proyectos con más altos estándares de calidad para mejorar tu estilo de vida: La quebrada y Finca Entre Ríos.";
		$keywords= "Menorca, Menorca Collection, proyectos Menorca, compra de terrenos, venta de terrenos, venta de lotes, urbanización, terrenos cerca de lima, terrenos en Cieneguilla, lotes Menorca, terrenos Menorca, vivir mejor, estilo de vida, seguridad, habilitación urbana, condominio de lujo, terrenos exclusivos, venta de terrenos exclusivos, calidad, La Quebrada, Finca Entre Ríos, tranquilidad, actividades de campo, compra de terrenos exclusivos, condominio exclusivo, terrenos de lujo, tranquilidad, relax, clase.";
	}
	if($seccion == "proyecto-la-quebrada"){
		$titulo= "La quebrada: condominios de lujo para casas de campo";
		$description= "Condominio de lujo La Quebrada, está diseñado para casas de campo con más de 1000m2. Encontrarás lagunas y 2 club house, además de spa, gimnasio y seguridad permanente.";
		$keywords= "Menorca, Menorca Collection, proyectos Menorca, compra de terrenos, venta de terrenos, venta de lotes, urbanización, terrenos cerca de lima, terrenos en Cieneguilla, lotes Menorca, terrenos Menorca, vivir mejor, estilo de vida, seguridad, habilitación urbana, condominio de lujo, terrenos exclusivos, venta de terrenos exclusivos, calidad, La Quebrada, tranquilidad, actividades de campo, compra de terrenos exclusivos, condominio exclusivo, terrenos de lujo, tranquilidad, relax, clase, seguridad permanente, gimnasio, club house, lagunas, spa, piscina, deportes de aventura, estudio de arquitectos Malachowski, Malachowski, diseñado por arquitectos, casa de campo.";
	}
	if($seccion == "proyecto-finca-entre-rios"){
		$titulo= "Finca Entre Ríos: condominios de lujo para casas de campo";
		$description= "Condominio de lujo Finca Entre Ríos, está diseñado por el estudio de arquitectos Malachowski para disfrutar las comodidades de la ciudad y bondades del campo.";
		$keywords= "Menorca, Menorca Collection, proyectos Menorca, compra de terrenos, venta de terrenos, venta de lotes, urbanización, terrenos cerca de lima, terrenos en Cieneguilla, lotes Menorca, terrenos Menorca, vivir mejor, estilo de vida, seguridad, habilitación urbana, condominio de lujo, terrenos exclusivos, venta de terrenos exclusivos, calidad, Finca Entre Ríos, tranquilidad, actividades de campo, compra de terrenos exclusivos, condominio exclusivo, terrenos de lujo, tranquilidad, relax, clase, seguridad permanente , club house, piscina, deportes, estudio de arquitectos Malachowski, Malachowski, diseñado por arquitectos, casa de campo, comodidades de la ciudad, comodidad, venta de terrenos, venta de lotes.";
	}
	
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="http://mediaimpact.pe/">
	<meta name="description" content="<?php echo $description; ?>" id="metaDesc">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<meta name="news_keywords" content="<?php echo $keywords; ?>">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/fontsawesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="css/cambios.css">
	<link rel="stylesheet" type="text/css" href="css/venobox/venobox.css">
	<link rel="shortcut icon" href="imagenes/logo.JPG" type="image/x-icon" id="lnkIcono"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400">

	<script type="text/javascript" src="js/utiles/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/utiles/bootstrap.js"></script>
	<script type="text/javascript" src="js/utiles/collapse.js"></script>

	<script type="text/javascript" src="js/F.js"></script>
	<script type="text/javascript" src="js/proceso/proceso.js"></script>
	<script type="text/javascript" src="js/app/control/Helper.js"></script>
	<script type="text/javascript" src="js/secciones/Contacto.js"></script>
	<script type="text/javascript" src="js/carrousel.js"></script>
	
	<script src="js/utiles/script/jquery.easing-1.3.js"></script>
    <script src="js/utiles/script/jquery.mousewheel-3.1.12.js"></script>
    <script src="js/utiles/script/jquery.jcarousellite.js"></script>
    <script src="css/venobox/venobox.min.js"></script>

	<link rel="stylesheet" media="all" type="text/css" href="css/style/style-demo.css">
	<link rel="stylesheet" type="text/css" href="js/utiles/fx_archivos/shadowbox.css">
	<script type="text/javascript" src="js/utiles/fx_archivos/shadowbox.js"></script>
	<script type="text/javascript">
    	Shadowbox.init();
	</script>
	
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
	<script type="text/javascript" src="slider/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<link rel="stylesheet" href="css/proyectos.css">
	<link rel="stylesheet" href="css/responsive.css">
	<title id="titleApp"><?php echo $titulo; ?></title>
	
	<script>
	/*
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 		ga('create', 'UA-69924558-1', 'auto');
  		ga('send', 'pageview');
*/
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76266815-1', 'auto');
  ga('send', 'pageview');

</script>
	
</head>