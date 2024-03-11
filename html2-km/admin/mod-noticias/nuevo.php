<?php
ob_start("ob_gzhandler");
session_start();

if (!isset($_GET['sw'])) {
    $sw = 0;
} else {
    $sw = $_GET['sw'];
}
include "../incdes/variable.php";



include "../../util/consultas.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador / Paradero blog</title>
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

                    <h2 class="sub-header">Noticias <small>Agregar</small></h2>

                    <?php if ($sw == 1) { ?>
                        <div class="alert alert-success" role="alert">Registrado exitosamente :)</div>
                    <?php } elseif ($sw == 2) { ?>
                        <div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
                    <?php } elseif (($sw == 3)) { ?>
                        <div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
                    <?php } ?>

                    <form action='add.php' method='post' enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Titulo: </label>
                            <input type="text" class="form-control" name="no_titulo" id="no_titulo">
                        </div>
                        <div class="form-group">
                            <label>Url: </label>
                            <input type="text" class="form-control" name="no_url" id="no_url">
                        </div>
                        <div class="form-group">
                            <label>Categoria: </label>
                            <select class="form-control" name="cat_id">
                                <?php
                                $sqlCategoria = "SELECT * from categoria";
                                $rsCategoria = mysql_query($sqlCategoria);
                                $nCategoria = mysql_num_rows($rsCategoria);

                                for ($n = 0; $n < $nCategoria; $n++) {
                                    $cat_id = mysql_result($rsCategoria, $n, "cat_id");
                                    $cat_nombre = mysql_result($rsCategoria, $n, "cat_des");
                                    ?>
                                    <option value="<?php echo $cat_id; ?>"><?php echo $cat_nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha: </label>
                            <input class="datepicker form-control" data-date-format="mm/dd/yyyy" name="no_fecha">
                        </div>
                        <div class="form-group">
                            <label>Imagen: </label>
                            <input type="file" name="no_img">

                        </div>
                        <div class="form-group">
                            <label>Descripción: </label>
                            <textarea class="form-control neditor" name="no_desc" id="txtEditor" data-width="100%" data-height="320"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Agregar</button>
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

                $("#m1").addClass("active");
                var editor = new nEditor($("#txtEditor")); // Textarea unique ID
                editor.init();
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '-3d'
                });


                $("#no_titulo").on('keyup', generaUrl);

                function generaUrl()
                {
                    valor = $(this).val();
                    texto = normalize((valor.toLowerCase()).replace(/ /g, "-"));
                    $("#no_url").val(texto);
                    if (texto == "") {
                        $("#no_url").val('');
                    }
                }
                function normalize(str) {

                    var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç",
                            to = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
                            mapping = {};

                    for (var i = 0, j = from.length; i < j; i++)
                        mapping[ from.charAt(i) ] = to.charAt(i);

                    var ret = [];
                    for (var i = 0, j = str.length; i < j; i++) {
                        var c = str.charAt(i);
                        if (mapping.hasOwnProperty(str.charAt(i)))
                            ret.push(mapping[ c ]);
                        else
                            ret.push(c);
                    }
                    return ret.join('');
                }


            })()

        </script>
    </body>
</html>