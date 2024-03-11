<?php
ob_start("ob_gzhandler");
session_start();

include '../../util/conexion.php';
$cn = db_connect();

if (!isset($_GET['sw'])) {
    $sw = 0;
} else {
    $sw = $_GET['sw'];
}


$sql = "SELECT ka_id, ka_img, ka_titulo, ka_desc 
			FROM biografia
			WHERE ka_id = 1";
$rs = mysql_query($sql);

$ka_id = mysql_result($rs, 0, "ka_id");
$ka_img = mysql_result($rs, 0, "ka_img");
$ka_titulo = mysql_result($rs, 0, "ka_titulo");
$ka_desc = mysql_result($rs, 0, "ka_desc");


include "../../util/url.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador / Blog</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="../css/neditor.css" rel="stylesheet">
        <link href="../css/datepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php include("../header.php"); ?>	
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12 sidebar">
                    <?php include("../aside.php"); ?>	
                </div>
                <div class="col-lg-11 col-lg-offset-1 col-md-10 col-md-offset-2 col-xs-12 main">

                    <h2 class="sub-header">Biografia <small>Editar</small></h2>

                    <?php if ($sw == 1) { ?>
                        <div class="alert alert-success" role="alert">Modificado exitosamente :)</div>
                    <?php } elseif ($sw == 2) { ?>
                        <div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
                    <?php } elseif (($sw == 3)) { ?>
                        <div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
                    <?php } ?>

                    <form action='edit.php' method='post' enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Titulo: </label>
                            <input type="text" class="form-control" name="ka_titulo" value="<?php echo $ka_titulo; ?>">
                            <input type="hidden" name="ka_id" value="<?php echo $ka_id; ?>">
                        </div>

                        <div class="form-group">
                            <label>Imagen Actual: </label>
                            <img src="img/<?php echo $ka_img;?>" width="200px"/>
                        </div>
                        <div class="form-group">
                            <label>Cambiar Imagen: </label>
                            <input type="file" name="fgal_img">
                            <input type="hidden" name="ka_img" value="<?php echo $ka_img; ?>">
                            <p class="help-block">El archivo no debe tener tildes en su nombre.</p>
                        </div>
                        <div class="form-group">
                            <label>Descripción: </label>
                            <textarea class="form-control neditor" name="ka_desc" id="txtEditor" data-width="100%" data-height="320"><?php echo $ka_desc; ?></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="../js/neditor.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">

            /* Iniciando jQuery */
            (function () {

                $("#m2").addClass("active");
                var editor = new nEditor($("#txtEditor")); // Textarea unique ID
                editor.init();
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '-3d'
                });

            })()

        </script>
    </body>
</html>