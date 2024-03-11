<?php
include "util/consultas.php";
include "util/url.php";
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bienvenidos al blog de Karl Maslo - CEO de EXSA"</title>
        <link href="Karl Maslo Luna" rel="shortcut icon"/>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/fuentes.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!--[endif]-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76601248-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>


    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="line-blue">                    
                </div>  
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <?php
                        include './widget.php';
                        ;
                        ?>
                        <div class="col-lg-8 col-sm-8">                           
                            <?php
                            include './menu.php';
                            ?>
                            <?php
                            for ($i = 0; $i < $nNoticia; $i++) {
                                $no_id = mysql_result($rsNoticia, $i, "no_id");
                                $no_titulo = mysql_result($rsNoticia, $i, "no_titulo");
                                $no_categoria = mysql_result($rsNoticia, $i, "cat_id");
                                $no_fecha = mysql_result($rsNoticia, $i, "no_fecha");
                                $no_desc = mysql_result($rsNoticia, $i, "no_desc");
                                $no_img = mysql_result($rsNoticia, $i, "no_img");
                                $no_url = mysql_result($rsNoticia, $i, "no_url");
                                ?> 

                                <?php
                                if ($i == 0) {
                                    ?>
                                    <div class="noticias-1">
                                    <a href="noticias/<?php echo $no_url; ?>">
                                        <img src="admin/mod-noticias/img/<?php echo $no_img; ?>" style="width: 100%; height: 400px; object-fit: cover;"> 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3><?php echo $no_titulo; ?></h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>
                                                    <?php echo substr($no_desc, 0, 180); ?>...
                                                </p>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <hr>                                                    
                                                    <div class="col-lg-5 col-lg-offset-5 col-sm-10 col-xs-9 contenedorVmas">
                                                        <h4>Ver más</h4>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-xs-3 contenedorIcono">
                                                     	<a href="noticias/<?php echo $no_url; ?>"><i class="fa fa-play"></i></a>
                                                    </div>
                                                </div>                                      

                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <?php
                                } if ($i == 1) {
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-6 noticia-2" >
                                        <a href="noticias/<?php echo $no_url; ?>">
                                            <div>
                                                <img src="admin/mod-noticias/img/<?php echo $no_img; ?>" style="width: 100%; height: 280px; object-fit: cover;"> 
                                                <div class="col-lg-12">
                                                    <h3><?php if(strlen($no_titulo)>60){ echo substr($no_titulo, 0, 60)."..."; }else{ echo $no_titulo;} ?></h3>
                                                    <hr>
                                                </div>

                                                <div class="row" >

                                                     <div class="col-lg-5 col-lg-offset-5 col-sm-10 col-xs-9">
                                                        <h4>Ver más</h4>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-xs-3">
                                                        <a href="noticias/<?php echo $no_url; ?>"><i class="fa fa-play"></i></a>
                                                    </div>
                                                </div>                                   

                                            </div> 
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    if ($i == 2) {
                                        ?>
                                        <div class="col-lg-6 noticia-3">
                                            <div>
                                                <a href="noticias/<?php echo $no_url; ?>">
                                                <img src="admin/mod-noticias/img/<?php echo $no_img; ?>" style="width: 100%; height: 280px; object-fit: cover;"> 
                                                <div class="col-lg-12">
                                                    <h3><?php if(strlen($no_titulo)>60){ echo substr($no_titulo, 0, 60)."..."; }else{ echo $no_titulo;} ?></h3>
                                                    <hr>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-lg-5 col-lg-offset-5 col-sm-10 col-xs-9">
                                                          <h4>Ver más</h4>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-xs-3">
                                                        <a href="noticias/<?php echo $no_url; ?>"><i class="fa fa-play"></i></a>
                                                    </div>
                                                </div>                                   
                                                </a>
                                            </div>    
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($i == 3) {
                                    ?>
                                    <div class="noticias-4">
                                    <a href="noticias/<?php echo $no_url; ?>">
                                        <img src="admin/mod-noticias/img/<?php echo $no_img; ?>" style="width: 100%; height: 400px; object-fit: cover;"> 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3><?php echo $no_titulo; ?></h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>
                                                    <?php echo substr($no_desc, 0, 180); ?>...
                                                </p>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <hr>
                                                    <div class="col-lg-5 col-lg-offset-5 col-sm-11 col-xs-9">
                                                        <h4>Ver más</h4>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-2 col-xs-3">
                                                         <a href="noticias/<?php echo $no_url; ?>"><i class="fa fa-play"></i></a>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include './footer.php';
        ?>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
