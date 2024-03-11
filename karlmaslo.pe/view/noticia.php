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
$url_seo  = $objfunc->sanitize($_GET['not_url']);

$url_seo = $objfunc->convertir_html($url_seo);

$objnot  = new Noticia();
$codcat   = $objnot->dameCodigo($url_seo);

$objnot  = new Noticia();
$datanot        = $objnot->dameDetalle($codcat);
$codigo         = $datanot[0]['art_id'];
$codcategoria   = $datanot[0]['tca_cat_id'];
if($varLang == "es"){
    $namecategoria   = $datanot[0]['namecategoria'];
    $titulo         = $datanot[0]['art_nombre'];
    $descripcion    = $objfunc->convertir_html($datanot[0]['art_descripinferior']);
    $frase          = $objfunc->convertir_html($datanot[0]['art_frase']);
}
else{
    $namecategoria   = $datanot[0]['namecategoria_en'];
    $titulo         = $datanot[0]['art_nombre_en'];
    $descripcion    = $objfunc->convertir_html($datanot[0]['art_descripinferior_en']);
    $frase          = $objfunc->convertir_html($datanot[0]['art_frase_en']);
}
$tipomul        = $datanot[0]['art_tipomultimedia'];
$imagen         = $datanot[0]['art_imggrande'];
$video          = $datanot[0]['art_video'];
$f_publicacion  = $datanot[0]['art_fechapublicacion'];
$for_f_publica  = $objfunc->postFecha($f_publicacion, $varLang);
if ($datanot[0]['tca_cat_id'] == 1)
    $urlcategoria  = "innovacion";
if ($datanot[0]['tca_cat_id'] == 2)
    $urlcategoria  = "industria-del-gas";
if ($datanot[0]['tca_cat_id'] == 3)
    $urlcategoria  = "actualidad";
if ($datanot[0]['tca_cat_id'] == 4)
    $urlcategoria  = "servicio-a-la-mineria";
if ($datanot[0]['tca_cat_id'] == 5)
    $urlcategoria  = "seguridad";

//***** traemos todas las noticias que pertenecen a esa categoría

$objlistnot   = new Noticia();
$objlistado   = $objlistnot->dameListCategoria($codcategoria);
$itemlist     = count($objlistado) - 1;
$htmllist = "";
$rutaImg = _URL_."adminkarl/resources/assets/image/noticia/";
for ($i=0;$i<=$itemlist;$i++){
    $datanot2 = $objlistado[$i];
    $list_codigo         = $datanot2['art_id'];
    if($varLang == "es"){
        $list_namecategoria  = $datanot2['namecategoria'];
        $list_titulo         = $datanot2['art_nombre'];
        $list_des_corta      = $objfunc->convertir_html($datanot2['art_descripsuperior']);
        $list_frase          = $objfunc->convertir_html($datanot2['art_frase']);
    }
    else{
        $list_namecategoria  = $datanot2['namecategoria_en'];
        $list_titulo         = $datanot2['art_nombre_en'];
        $list_des_corta      = $objfunc->convertir_html($datanot2['art_descripsuperior_en']);
        $list_frase          = $objfunc->convertir_html($datanot2['art_frase_en']);
    }
	
	if(strlen($list_titulo) > 76){
        $list_titulo = substr($list_titulo, 0 , 76)."...";
    }
	$list_des_corta = strip_tags($list_des_corta);
    if(strlen($list_des_corta) > 150){
        $list_des_corta = substr($list_des_corta, 0 , 150)."...";
    }

    $list_tipomul        = $datanot2['art_tipomultimedia'];
    $list_imagen         = $datanot2['art_imggrande'];
    $list_video          = $datanot2['art_video'];
    $list_f_publicacion  = $datanot2['art_fechapublicacion'];
    $list_imgportada     = $datanot2['art_imgportada'];
    $list_nameurl_seo    = $datanot2['nameurl_seo'];
    $styleImg = "style='background-image: url(".$rutaImg.$list_imgportada.")'";

    $htmllist.= "<div class='item'>";
    $htmllist.= "<div class='noticia-ver' ".$styleImg."><div class='sombra' style='width:100%;height:100%;background-color:rgba(0,25,45,0.8);top:0;left:0;position:absolute;'></div>
            ";
    $htmllist.= "<div style='position:relative;'><h3>".$list_titulo."</h3>";
    $htmllist.= "<p>".$list_des_corta."</p>";
    $htmllist.= "<a href='"._URL_.$varLang."/noticias/".$list_nameurl_seo."' class='leer-mas'>".$gLeermas." <i class='fa fa-long-arrow-right' aria-hidden='true'></i></a></div>";
    $htmllist.= "</div>";
    $htmllist.= "</div>";
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karl Maslo | <?php echo $titulo?></title>

    <meta name="title" content="Karl Maslo | <?php echo $titulo?>" />
    <meta name="description" content="<?php echo $frase ?>" />
    <meta name="image" content="<?php echo _URL_;?>adminkarl/resources/assets/image/noticia/<?php echo $imagen;?>" />

    <!--TWITTER-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:creator" content="@KarlMaslo">
    <meta name="twitter:title" content="<?php echo $titulo?>">
    <meta name="twitter:description" content="<?php echo $frase?>">

    <!--OG-->
    <meta property="og:title" content="Karl Maslo | <?php echo $titulo?>" />
    <meta property="og:description" content="<?php echo $frase ?>" />
    <meta property="og:image" content="<?php echo _URL_;?>adminkarl/resources/assets/image/noticia/<?php echo $imagen;?>" />

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
                            <a href="<?php echo _URL_.$varLang.'/'.$urlcategoria ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span style="left: 80px;width: 190px;text-align: left;"><?php echo $namecategoria; ?></span></a>
                        </div>
                        <a href="javascript:history.back(1)" class="volver"><?php echo $gVolver;?></a>
                        <h1><?php echo $titulo?></h1>
                        <div class="subtitulo">
                            <?php echo $frase ?>
                        </div>
                        <img src="<?php echo _URL_;?>adminkarl/resources/assets/image/noticia/<?php echo $imagen;?>" alt="">
                        <div class="body-noti">
                            <?php echo $descripcion; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12 text-left">
                            <div class="row">
                                <ol>
                                    <li><?php echo $gShare;?></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2F<?php echo _URL_;?>&title=&summary=&source=http%3A%2F%2F<?php echo _URL_;?>"
                                           target="_blank" title="Compartir en LinkedIn"
                                           onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2F<?php echo _URL_;?>&text=:%20http%3A%2F%2F<?php echo _URL_;?>"
                                           target="_blank" title="Tweet"
                                           onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12 text-right">
                            <span class="fecha"><?php echo $for_f_publica; ?></span>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                            <h2><?php echo $gVerpost;?></h2>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <i class="flechas-noticia fa fa-angle-left" aria-hidden="true" id="flecha-left"></i>
                                <div id="owl-demo">
                                    <?php echo $htmllist; ?>
                                </div>
                                <i class="flechas-noticia fa fa-angle-right" aria-hidden="true" id="flecha-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>