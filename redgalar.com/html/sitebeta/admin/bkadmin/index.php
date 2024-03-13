<?php
ob_start("ob_gzhandler");
session_start();
include "incdes/variable.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- include the style -->
        <link rel="stylesheet" href="css/alertify.min.css" />
        <!-- include a theme -->
        <link rel="stylesheet" href="css/themes/default.min.css" />
    </head>
    <body>

        <?php include("header.php"); ?>	
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 sidebar">
                    <?php include("aside.php"); ?>	
                </div>
                <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-xs-12 main">

                    <h2 class="sub-header">Administrador</h2>
                    <p>Administrador de contenido de la página web</p>

                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/alertify.js"></script>
    </body>
</html>