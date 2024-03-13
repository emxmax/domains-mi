<?php

ob_start("ob_gzhandler");
session_start();

include '../../util/query-admin.php';
$cn = db_connect();

if (!isset($_GET['sw'])) {
    $sw = 0;
} else {
    $sw = $_GET['sw'];
}

include "../incdes/variable.php";

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador / Pedidos</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link href="/css/neditor.css" rel="stylesheet">
        <link href="../css/datepicker.css" rel="stylesheet">
        <script src="../js/ckeditor.js"></script>
        <script src="../js/sample.js"></script>
        <script src="../js/sample2.js"></script>
        <script src="../js/sample3.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-color">

        <?php include("../header.php"); ?>  
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 sidebar">
                    <?php include("../aside.php"); ?>   
                </div>
                <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-xs-12 main">
                    
                    <h2 class="sub-header">Pedidos</h2>
                    <?php if ($sw == 1) { ?>
                        <div class="alert alert-success" role="alert">Modificado exitosamente :)</div>
                    <?php } elseif ($sw == 2) { ?>
                        <div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
                    <?php } elseif (($sw == 3)) { ?>
                        <div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
                    <?php } ?>

                <div class="row">                   
                <div class="col-sm-12 ">
                <table class="table table-striped table-bordered">
                          <tr>
                            <th class="tg-yw4l">DE</th>
                            <th class="tg-yw4l">PARA</th>
                            <th class="tg-yw4l">TEMA</th>
                            <th class="tg-yw4l">DIRECCIÓN</th>
                            <th class="tg-yw4l">HORARIO</th>
                            <th class="tg-yw4l">ESTADO</th>
                            <th class="tg-yw4l"></th>
                            <th class="tg-yw4l"></th>
                          </tr>
                    <?php
                    for ($n = 0; $n < $nPedidos; $n++) {
                        $pe_id = mysql_result($rsPedidos, $n, "pe_id");
                        $pe_de = mysql_result($rsPedidos, $n, "pe_de");
                        $pe_para= mysql_result($rsPedidos, $n, "pe_para");
                        $pe_tema = mysql_result($rsPedidos, $n, "pe_tema");
                        $pe_direccion = mysql_result($rsPedidos, $n, "pe_direccion");
                        $pe_horario = mysql_result($rsPedidos, $n, "pe_horario");
                        $es_id = mysql_result($rsPedidos, $n, "es_id");
                        $es_name = mysql_result($rsPedidos, $n, "es_name");
                    ?>              
                  <tr>
                    <td class="tg-yw4l"> <?php echo $pe_de?> </td>
                    <td class="tg-yw4l"> <?php echo $pe_para?> </td>
                    <td class="tg-yw4l"> <?php echo $pe_tema?> </td>
                    <td class="tg-yw4l"> <?php echo $pe_direccion?> </td>
                    <td class="tg-yw4l"> <?php echo $pe_horario?> </td>
                    <td class="tg-yw4l"> <?php echo $es_name?> </td>
                    <td class="tg-yw4l"> <a role="button" class="btn btn-primary btn-xs" href="ver.php?pe_id=<?php echo $pe_id; ?>">Ver</a></td>
                    <td class="tg-yw4l"> <a role="button" class="btn btn-primary btn-xs lk-del" <?php if($es_id!=='1'){ echo "id='$pe_id'"; }else{ echo "disabled='disabled'";} ?> >Cambiar a Entregado</a></td>
                  </tr>    
                <?php
                }
                ?>
                 </table>
                    </div>

                </div>
            </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="../js/neditor.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            (function () {

                $("#m1").addClass("active");

                $(".lk-del").on("click", function (e) {
                    e.preventDefault()
                    var key = $(this).attr("id")
                    var url = "del.php?pe_id="
                    $(location).attr('href', url + key);
                })

            })();
        </script>
    </body>
</html>