<?php

include 'inc/app/index_app.php';

ob_start();

?>

<div class="web_fondo1">
    <div class="web_alineacion">
        <div class="web_columna1">
            <div class="bloque">
                <div class="home">
                    <div class="caracteristicas">
                        <ul>
                            <li><a class="opcion1">Confort</a></li>
                            <li><a class="opcion2">Lujo</a></li>
                            <li><a class="opcion3">Paisajismo</a></li>
                        </ul><br />
                    </div>
                </div>
            </div>
        </div><br />
    </div>
</div>      
<?php include 'inc/code/bloque1_code.php'; ?>

<?php $GLOBALS['TPL']['contenido'] = ob_get_contents(); ?>

<?php

ob_end_clean();

$GLOBALS['TPL']['css'] = 'inc/css/index.php';
$GLOBALS['TPL']['scripts'] = 'inc/js/index_scripts.php';
$GLOBALS['TPL']['interna'] = 1;

$GLOBALS['TPL']['meta_titulo'] = 'Menorca';
//$GLOBALS['TPL']['meta_descripcion'] = '<meta name="description" content="'.$meta_descripcion.'" />';
//$GLOBALS['TPL']['meta_palabras_clave'] = '<meta name="keywords" content="'.$meta_palabras_clave.'" />';


$GLOBALS['TPL']['banner'] =    '<div class="bloque">
                                    <a class="btnIzq"></a>
                                    <a class="btnDer"></a>
                                    <div class="banner" id="banner_principal">
                                        <ul>
                                            <li><img src="images/banner_home1.jpg" alt="" /></li>
                                            <li><img src="images/banner_home2.jpg" alt="" /></li>
                                            <li><img src="images/banner_home3.jpg" alt="" /></li>
                                            <li><img src="images/banner_home4.jpg" alt="" /></li>
                                            <li><img src="images/banner_home5.jpg" alt="" /></li>
                                        </ul><br />
                                    </div>
                                    <a class="enlace1" href="proyecto-la-quebrada.php">enlace 1</a>
                                    <a class="enlace2" href="proyecto-la-quebrada.php">enlace 2</a>
                                </div>';

// mostrar plantilla

include 'inc/front/base.php';

?>