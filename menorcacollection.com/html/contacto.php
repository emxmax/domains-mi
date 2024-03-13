<?php

include 'inc/app/contacto_app.php';

ob_start();

?>

<div>
    <div class="web_alineacion">
        <div class="web_columna1">
            <div class="bloque">
                <div class="generico">
                    <div class="navegacion">
                        <ul>
                            <li><a href="./">INICIO</a></li>
                            <li>/</li>
                            <li>CONTACTO</li>
                        </ul><br />
                    </div>
                    <?php include 'inc/front/herramientas.php'; ?>
                    <div class="titulo">
                        <h2>Contacto</h2>
                    </div>
                </div>
                <div class="interna">
                    <div class="contacto">
                        <div class="editor">
                            <p class="texto1">Teléfonos Oficina Principal: 203-2828
</p><br />
                            <p class="texto1"><strong>Ventas:</strong></p>
                            <p class="texto1">Luis Ortiz de Zevallos:</p><br />
                            <p class="texto1">Oficina: (01)2032828  anexo.188</p>
                            <p class="texto1">Móvil: (51)999001064</p>
                            <p class="texto1">Nextel: (51)99400*4707</p>
                        </div>
                        <div class="formulario">
                            <?php if(!$_POST){?>
                            <div class="titulo">
                                <h3>Escríbenos</h3>
                            </div>
                            <form name="frm_form" action="<?php echo selfURL(); ?>" method="post" id="frm_form" enctype="multipart/form-data">
                                <dl>
                                    <dd>
                                        <label for="id_nombre" class="pordefecto1">Nombre</label>
                                        <input type="text" name="id_nombre" id="id_nombre" value="" class="validate[required] frm_caja1" />
                                    </dd>
                                    <dd>
                                        <label for="id_telefono" class="pordefecto1">Teléfono</label>
                                        <input type="text" name="id_telefono" id="id_telefono" value="" class="validate[required,minSize[7],maxSize[9],custom[number]] frm_caja1" />
                                    </dd>
                                    <dd>
                                        <label for="id_email" class="pordefecto1">Email</label>
                                        <input type="text" name="id_email" id="id_email" value="" class="validate[required,custom[email]] frm_caja1" /><br />
                                    </dd>
                                    <dd>
                                        <label for="id_mensaje" class="pordefecto2">Consulta</label>
                                        <textarea rows="4" cols="5" name="id_mensaje" id="id_mensaje" class="validate[required] frm_area1"></textarea>
                                    </dd>
                                    <dd class="frm_botones">
                                        <button type="submit" name="enviar" id="enviar">Enviar</button>
                                        <?php $thisPost->startPost(); ?>
                                    </dd>
                                </dl><br />
                            </form>
                            <?php }else {?>
                            <div class="mensaje">
                                <?php if($estado=="aprobado"){ ?>
                                <h3>Gracias, muy pronto nos comunicaremos con usted - <strong>Mensaje enviado</strong></h3>
                                <?php }elseif($estado=="reprobado"){ ?>
                                <h3>Error en el envio - <strong>Mensaje no enviado</strong></h3>
                                <?php } ?>
                            </div>
                            <?php }?>
                        </div><br />
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

$GLOBALS['TPL']['css'] = 'inc/css/generico.php';
$GLOBALS['TPL']['scripts'] = 'inc/js/contacto_scripts.php';
$GLOBALS['TPL']['interna'] = 2;

$GLOBALS['TPL']['meta_titulo'] = 'Contácto';
//$GLOBALS['TPL']['meta_descripcion'] = '<meta name="description" content="'.$meta_descripcion.'" />';
//$GLOBALS['TPL']['meta_palabras_clave'] = '<meta name="keywords" content="'.$meta_palabras_clave.'" />';

$GLOBALS['TPL']['banner'] =    '<div class="bloque">
                                    <div class="banner">
                                        <ul>
                                            <li><img src="images/banner_interna5.jpg" alt="" /></li>
                                        </ul><br />
                                    </div>
                                </div>';

//mostrar plantilla

include 'inc/front/base.php';

?>                    