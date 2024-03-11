<?php
include "util/url.php";
include "util/consultas.php";
$cn = db_connect();
$no_url = $_GET['no_url'];

$sqlNoti = "SELECT * FROM noticia WHERE no_url='$no_url'";
$rsNoti = mysql_query($sqlNoti);

$no_id = mysql_result($rsNoti, 0, "no_id");
$no_titulo = mysql_result($rsNoti, 0, "no_titulo");
$no_fecha = mysql_result($rsNoti, 0, "no_fecha");
$no_desc = mysql_result($rsNoti, 0, "no_desc");
$no_img = mysql_result($rsNoti, 0, "no_img");
$no_url = mysql_result($rsNoti, 0, "no_url");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bienvenidos al blog de Karl Maslo - CEO de EXSA</title>
        <meta property="og:url" content="http://www.karlmaslo.pe/noticias/<?php echo $no_url;?>"/>
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $no_titulo;?>" />
        <meta property="og:description" content="<?php echo substr($no_desc,0,150);?>" />
        <meta property="og:site_name" content="blog de Karl Maslo" />
        <meta property="og:image" content="<?php echo $url;?>admin/mod-noticias/img/<?php echo $no_img;?>" />
	<meta name="author" content="MediaImpact">
    	<meta name="description" content="karlmaslo">
    	<meta name="keywords" content="">
    	<meta name="robots" content="index, follow">
        <link href="Karl Maslo Luna" rel="shortcut icon"/>
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/fuentes.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!--[endif]-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                            <div class="noticias-detalle">
                                <img src="<?php echo $url;?>admin/mod-noticias/img/<?php echo $no_img;?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3><?php echo $no_titulo;?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row noticias-texto">
                                <div class="col-lg-12">
                                    <p>
                                        <?php echo $no_desc;?>
                                    </p>
                                    <hr>
                                </div>
                            </div>

                            <div class="row" id="redes">
                                <div class="col-lg-12">                                   
                                    <p>Compartir en
                                        <a onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.karlmaslo.pe/noticias/<?php echo $no_url;?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');" href="javascript: void(0);"><i class="fa fa-facebook"></i></a>
                                        <a onclick="window.open('http://twitter.com/home?status=Leyendo: http://www.karlmaslo.pe/noticias/<?php echo $no_url;?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');" href="javascript: void(0);"><i class="fa fa-twitter"></i></a>
                                    </p>
                                </div>                                     
                            </div>
                            <div class="row noticias-texto">
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="comentario">
                              <?php
                                    $sqlComen = "SELECT * from comentario WHERE no_id=$no_id ORDER BY com_id DESC";
                                    $rsComen = mysql_query($sqlComen);
                                    $nComen = mysql_num_rows($rsComen);
                                    if ($nComen > 0)
                                        echo "<ul>";
                                    for ($i = 0; $i < $nComen; $i++) {
                                        $com_name = mysql_result($rsComen, $i, "com_name");
                                        $com_mensaje = mysql_result($rsComen, $i, "com_mensaje");
                                ?> 
                                  <li>  
                                        <div class="img-inner">
                                            <img src="../img/user.jpg" class="img-responsive">
                                        </div>
                                        <div class="info-comment">
                                            <h3><?php echo $com_name;?></h3>
                                            <p>
                                                <?php echo $com_mensaje;?>
                                            </p>
                                        </div>
                                  </li>
                                <?php 
                                    }

                                ?>
                              </ul>

                            </div>
                            <div class="row" id="formulario" >
                                <div class="col-lg-12">
                                    <h3>DEJA TU COMENTARIO</h3>   
                                    <form action="../enviarcomentario.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre</label>
                                            <input type="text" class="form-control" name="com_name" required >
                                            <input type="hidden" class="form-control" name="no_id" value="<?php echo $no_id;?>">
                                            <input type="hidden" class="form-control" name="no_url" value="<?php echo $no_url;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Correo electrónico</label>
                                            <input type="email" class="form-control" name="com_email" required >
                                        </div>       
                                        <label for="exampleInputEmail1">Mensaje</label>
                                        <textarea class="form-control" rows="5" name="com_mensaje" required ></textarea>
                                        <button type="submit" class="btn btn-default center-block">PUBLICAR CONTENIDO</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php
        include './footer.php'
        ;
        ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>


