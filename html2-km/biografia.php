<?php
include "util/url.php";
include "util/consultas.php";
$cn = db_connect();

$sql = "SELECT ka_id, ka_img, ka_titulo, ka_desc 
			FROM biografia
			WHERE ka_id = 1";
$rs = mysql_query($sql);

$ka_id = mysql_result($rs, 0, "ka_id");
$ka_img = mysql_result($rs, 0, "ka_img");
$ka_titulo = mysql_result($rs, 0, "ka_titulo");
$ka_desc = mysql_result($rs, 0, "ka_desc");
?>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bienvenidos al blog de Karl Maslo - CEO de EXSA"</title>
        <link href="Karl Maslo" rel="shortcut icon"/>
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
                            <div class="noticias-1">
                                <img src="<?php echo $url;?>admin/mod-biografia/img/<?php echo $ka_img;?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3><?php echo $ka_titulo;?></h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <p style="text-align: justify"><?php echo $ka_desc;?></p>
                                    </div>
                                </div>
                            </div>



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
