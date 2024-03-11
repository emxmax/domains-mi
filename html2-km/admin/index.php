<?php
ob_start("ob_gzhandler");
session_start();
include "../util/url.php";
include "../util/consultas-admin.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador / Blog Paradero</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php include("header.php"); ?>	
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12 sidebar">
                    <?php include("aside.php"); ?>	
                </div>
                <div class="col-lg-11 col-lg-offset-1 col-md-10 col-md-offset-2 col-xs-12 main">

                    <h2 class="sub-header">Noticias</h2>

                    <p class="text-right"><a class="btn btn-primary" href="mod-noticias/nuevo.php" role="button">Agregar Nuevo</a></p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Fecha</th>
                                    <th>url</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>   
                                    <th>Descripción</th>                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($n = 0; $n < $nNoticiaAdmin; $n++) {

                                    $no_id = mysql_result($rsNoticiaAdmin, $n, "no_id");
                                    $no_titulo = mysql_result($rsNoticiaAdmin, $n, "no_titulo");
                                    $no_fecha = mysql_result($rsNoticiaAdmin, $n, "no_fecha");
                                    $no_desc = mysql_result($rsNoticiaAdmin, $n, "no_desc");
                                    $no_img = mysql_result($rsNoticiaAdmin, $n, "no_img");
                                    $no_url = mysql_result($rsNoticiaAdmin, $n, "no_url");
                                    $cat_des = mysql_result($rsNoticiaAdmin, $n, "cat_des");
                                    ?>
                                    <tr>
                                        <td><?php echo $no_id; ?></td>
                                        <td><?php echo $no_titulo; ?></td>
                                        <td><?php echo $no_fecha; ?></td>
                                        <td><?php echo $no_url; ?></td>
                                        <td><?php echo utf8_encode($cat_des); ?></td>
                                        <td class="text-center"><img width="100px" src="mod-noticias/img/<?php echo $no_img; ?>"/></td>
                                        <td class="text-justify"><?php echo substr($no_desc, 0, 110); ?>[...]</td>
                                        <td><a role="button" class="btn btn-primary btn-xs" href="mod-noticias/editar.php?no_id=<?php echo $no_id; ?>">Editar</a></td>
                                        <td><a role="button" class="btn btn-primary btn-xs lk-del" id="<?php echo $no_id; ?>">Eliminar</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">

            /* Iniciando jQuery */
            (function () {

                $("#m1").addClass("active")

                $(".lk-del").on("click", function (e) {
                    e.preventDefault()
                    if (confirm("Esta seguro de Eliminar?")) {
                        var key = $(this).attr("id")
                        var url = "mod-noticias/del.php?no_id="
                        $(location).attr('href', url + key);
                    }
                })

            })()

        </script>
    </body>
</html>