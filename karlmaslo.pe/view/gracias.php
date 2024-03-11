<?php
$varLang = $_GET["l"];
include('../config/conexion.php');
include('../modelo/funciones.php');
include('../modelo/noticia.php');
include('../modelo/categoria.php');
include('../modelo/globales.php');
include('../modelo/variables.php');

//****Capturando las variables**** 
$objfunc  = new misFunciones();
$codcat   = $objfunc->sanitize($_GET['codigo']);

$objnot  = new Noticia();
$datanot        = $objnot->dameDetalle($codcat);
$codigo         = $datanot[0]['art_id'];
$codcategoria   = $datanot[0]['tca_cat_id'];
if($varLang == "es"){
	$namecategoria  = $datanot[0]['namecategoria'];
	$titulo         = $datanot[0]['art_nombre'];
	$descripcion    = $objfunc->convertir_html($datanot[0]['art_descripinferior']);
	$frase          = $objfunc->convertir_html($datanot[0]['art_frase']);
}
else{
	$namecategoria  = $datanot[0]['namecategoria_en'];
	$titulo         = $datanot[0]['art_nombre_en'];
	$descripcion    = $objfunc->convertir_html($datanot[0]['art_descripinferior_en']);
	$frase          = $objfunc->convertir_html($datanot[0]['art_frase_en']);
}
$tipomul        = $datanot[0]['art_tipomultimedia'];
$imagen         = $datanot[0]['art_imggrande'];
$video          = $datanot[0]['art_video'];
$f_publicacion  = $datanot[0]['art_fechapublicacion'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karl Maslo | Home</title>
    <meta name="description" content="" />
    
    <link href="<?php echo _URL_;?>img/ico.png" rel="shortcut icon">
    <link rel="apple-touch-icon" href="<?php echo _URL_;?>img/ico.png"/>
    
    <link href="<?php echo _URL_;?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo _URL_;?>css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo _URL_;?>css/owl.carousel.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Global site tag (gtag.js) - Google AdWords: 823799622 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-823799622"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-823799622');
</script>

<!-- Event snippet for Suscribir al blog conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-823799622/Jz-MCLv3s3oQxt7oiAM'});
</script>
</head>
<style>
    .subtitulo > p{
        font-family: 'Lato';
        font-style: italic;
        font-weight: 200;
        font-size: 18px;
        color: #808080;
        text-align: center;
    }
    .body-noti p a{
        color: #4c4c93;
        font-family: 'Lato';
        font-weight: 400;
    } 
</style>
<body>
	
<?php include('menu.php'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div id="noticia-body">
                <div class="row">
                    <div class="categoria">
                        <a href="javascript:void(0)"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span><?php echo $namecategoria; ?></span></a>
                    </div>
                    <a href="javascript:history.back(1)" class="volver"><?php echo $gVolver;?></a>
                    <h1><?php echo $tgracias?></h1>
                    <div class="subtitulo">
                        <?php echo $dgracias ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>