<?php ob_start("compress_page"); ?>
<?php //include 'inc/app/base_app.php'; ?>
<?php if(doctype==0): ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php elseif(doctype==1): ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php elseif(doctype==2): ?><!DOCTYPE html>
<?php endif; ?>
<?php if(doctype!=2): ?>
<?php if($p==0): ?><html xmlns="http://www.w3.org/1999/xhtml" lang="pe" xml:lang="pe">
<?php elseif($p==1): ?><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<?php elseif($p==2): ?><html xmlns="http://www.w3.org/1999/xhtml" lang="cn" xml:lang="cn">
<?php endif; ?>
<?php else: ?> 
<html>
<?php endif; ?>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title><?php if(!empty($GLOBALS['TPL']['meta_titulo'])){ echo $GLOBALS['TPL']['meta_titulo'].' '; } ?> - <?php echo cliente; ?></title>
    <base href="<?php echo site; ?>" />
    <meta name="author" content="Magma Comunicaciones || http://www.magma.pe" />
    <?php if(!empty($GLOBALS['TPL']['meta_descripcion'])) echo $GLOBALS['TPL']['meta_descripcion'];?>
	<?php if(!empty($GLOBALS['TPL']['meta_palabras_clave'])) echo $GLOBALS['TPL']['meta_palabras_clave'];?>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="icon" type="image/gif" href="images/animated_favicon1.gif" />
	<?php if(!empty($GLOBALS['TPL']['css'])) include $GLOBALS['TPL']['css']; ?>
	<script type="text/javascript" src="/min/g=default_js&amp;1"></script>
	<?php if(!empty($GLOBALS['TPL']['extra_head'])) echo $GLOBALS['TPL']['extra_head'];?>
</head>
<?php flush(); ?>

<body>
    <div class="web_root">
        <div class="web_cabecera">
            <div class="web_fondo1">
                <div class="web_alineacion">
                    <div class="bloque">
                        <div class="menuSuperior">
                            <ul>
                                <li><a href="http://www.menorcainversiones.com.pe/sobre-menorca.php">Sobre menorca</a></li>
                                <li><a href="coleccion.php">Proyectos M.Collection</a></li>
                                <li><a href="contacto.php">Contacto</a></li>
                            </ul><br />
                        </div>
                        <div class="menuRedes">
                            <a class="email" href="contacto.php">email</a>
                            <a class="home" href="./">home</a>
                            <a class="facebook" href="https://www.facebook.com/LaQuebradaCieneguilla?fref=ts" onclick="target='_blank'">facebook</a>
                        </div>
                        <?php if (!empty($GLOBALS['TPL']['menu'])) echo $GLOBALS['TPL']['menu']; ?>
                        <h1 class="logo">
                            <a href="./">
                                <strong>Menorca</strong>
                                <img src="images/logo_empresa.png" alt="" />
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="web_fondo2">
                <div class="web_alineacion">
                    <?php if (!empty($GLOBALS['TPL']['banner'])) echo $GLOBALS['TPL']['banner']; ?>
                </div>
            </div>
        </div>
        <?php if($GLOBALS['TPL']['interna']==1){ ?>
        <div class="web_principal">
            <?php if (!empty($GLOBALS['TPL']['contenido'])) echo $GLOBALS['TPL']['contenido']; ?>
        </div>
        <?php }else if($GLOBALS['TPL']['interna']==2){ ?>
        <div class="web_principal principalFondo1">
            <?php if (!empty($GLOBALS['TPL']['contenido'])) echo $GLOBALS['TPL']['contenido']; ?>
        </div>
        <?php } ?>
        <div class="web_pie">
            <div class="web_fondo1">
                <div class="web_alineacion">
                    <div class="bloque">
                        <div class="nosotros">
                            <h3>conozca más de nosotros</h3>
                            <p><a href="http://www.menorcainversiones.com.pe/coleccion.php">Descubra todos nuestros proyectos.</a></p>
                            <a href="http://www.menorcacollection.com.pe/coleccion.php" target="_blank">Proyectos</a>
                        </div>
                        <div class="telefonos">
                            <h4>Teléfonos <strong>203-2828</strong> </h4>
                        </div>
                        <h2 class="logo1">
                            <a href="./">
                                <strong>Menorca</strong>
                                <img src="images/logo_menorca1.png" alt="" />
                            </a>
                        </h2>
                        <h2 class="logo2">
                            <a href="./">
                                <strong>Menorca</strong>
                                <img src="images/logo_menorca2.png" alt="" />
                            </a>
                        </h2>
                        <div class="creditos">
                            <h2>(C) COPYRIGHT <?php echo date('Y'); ?>. menorca Todos los derechos reservados.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php ob_end_flush(); ?>
<?php if(!empty($GLOBALS['TPL']['comentario']) && $GLOBALS['TPL']['comentario']==1){ ?>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '<?php echo disqus_shortname; ?>'; // required: replace example with your forum shortname
    var disqus_developer = <?php echo disqus_developer; ?>;

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<?php } ?>
<?php if (!empty($GLOBALS['TPL']['scripts'])) include $GLOBALS['TPL']['scripts']; ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46339069-1', 'menorcacollection.com.pe');
  ga('send', 'pageview');

</script>
</body>
</html>