<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Blog</title>
        <!-- Bootstrap -->

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!--[endif]-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!--FACEBOOK PLUGIN-->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=426112100846981";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!--END FACEBOOK PLUGIN -->

</head>
<body>

    <style>
        body{
            background-color: #F8F3F0;
        }

        #header{
            background-color: white;
            box-shadow: 0px 2px 12px #8e8071;
            position: relative;
            z-index: 99;
        }
        #header img{
            width: 180px;
            padding: 10px;
        }
        @media (min-width: 768px) {
            #header img{
                width: 100%;
                padding: 10px;
            }
        }
        #header i{
            float: right;
            font-size: 20px;
            padding: 5px;
            margin-top: 20px;
            color: black;
        }
        @media (min-width: 768px) {
            #header i{
                margin-top: 10px;
                font-size: 30px;
                padding: 10px;
            }
        }


        #slider{
            background-image: url('img/fondo-paradero.png');
            width: 100%;                
            background-repeat: no-repeat;
            background-position: 50% 0;
            background-size: cover;
            min-height: 400px;
            background-attachment: fixed;
        }
        #menu{
            background-color: white;
            box-shadow: 0px 0px 9px #8e8071;
            position: relative;
            z-index: 90;
            margin-bottom: 40px;
        }
        #menu a{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            font-size: 19px;
            color: #333333;
            padding: 25px 0px 25px 0px;
            transition-duration: 0.25s;
        }
        #menu a:hover{
            background-color: white;
            color: #FBA5D2;
            transition-duration: 0.25s;
        }
        #noticias{

        }
        #noticias img{
            width: 100%;
        }
        #noticias h2{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 600;
            font-size: 21px;
            padding: 10px  30px 10px 30px;
        }
        #noticias p{
            padding: 0px  30px 20px 30px;
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
        }
        #noticias .noticia-previo{
            background-color: white;
        }
        #noticias h3{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 700;
            color: #8E8071;
            font-size: 16px;
            letter-spacing:-1px;
            text-align: center;
        }

        #noticias .opciones .col-lg-12>div{
            background-color: #F6F1ED;
            position: relative;
            margin-top: 0px;
            bottom: 10px;
            box-shadow: 0px 2px 4px #9d9d9d;
            margin-bottom: 30px;
        }

        #widget .search{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            padding: 50px 30px 50px 30px;
            background-color:white;border-left: 4px solid #EBC85E;
            margin-bottom: 30px;
        }
        #widget .search p{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 300;
            text-align: center;
            margin-top: 20px;
            color: black;
        }

        #widget .post img{
            width: 100%
        }
        #widget .post h2{

            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            padding: 10px 30px 10px 30px;
            margin-top: 0px;
            font-size: 17px;
            color: white;
            background-color: #8E8071;              
        }
        #widget .post a p{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            color: #e86741;
        }
        #widget .post .spacio-post{
            margin-top: 20px;
        }
        #widget .categorias h4{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            color: #8E8071;
            padding: 10px 20px 10px 20px;
            background-color: red;
            margin: 0px;
            background-color: white;
            border-left:3px solid white;
            transition-duration: 0.1s;
            cursor: pointer;
        }
        #widget .categorias h4:hover{
            transition-duration: 0.1s;
            border-left: 3px solid #4daf7b;
            background-color: #F8F3F0;
        }
        #widget .categorias h2{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            padding: 10px 30px 10px 30px;
            font-size: 17px;
            color: white;
            background-color: #8E8071;              
        }

        #widget .facebook-plugin h2{
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            padding: 10px 30px 10px 30px;
            font-size: 17px;
            color: white;
            background-color: #8E8071;              
        }
        footer{
        text-align: center;
         font-family: 'OpenSans';
            font-style: normal;
            font-weight: 400;
            background-color: white;
              box-shadow: 0px 0px 12px #9d9d9d;
        }
        footer p{
        padding: 20px 0px 20px 0px;
      
        }
    </style>

    <section id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="row">


                                <div class="col-lg-3 col-sm-3 col-xs-8">
                                    <img src="img/logo-paradero.png" alt="logo-paradero">
                                </div>
                                <div class="col-lg-3 col-lg-offset-6 col-sm-offset-6 col-sm-3 col-xs-4">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"> <i class="fa fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="slider">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </section>

    <section id="menu">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <ul class="nav nav-tabs nav-justified">
                                <li role="presentation"><a href="#">All</a></li>
                                <li role="presentation"><a href="#">Noticias</a></li>
                                <li role="presentation"><a href="#">Novedad</a></li>
                                <li role="presentation"><a href="#">Messages</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="row">

                                <!--NOTICAS-->
                                <div class="col-lg-8 col-sm-8" id="noticias">
                                    <div class="row">

                                        <?php
                                        for ($i = 0; $i < 1; $i++) {
                                            ?>

                                            <div class="col-lg-12">
                                                <div class="noticia-previo">
                                                    <img src="img/noticias/Linea hotel marriot.jpg"> 
                                                    <h2>Hotel Marriot para millennials en el Perú </h2>
                                                    <p>
                                                        Una esencia transformadora es lo que caracteriza a todo proyecto de branding y esto lo demuestra los planes a futuro de Heinz Prelle para Marriott con marcas pensadas para los millennials peruanos. 
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="opciones">  
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3>FILLED</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-comment"></i> 39</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-pencil"></i> AUTOR</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <a href="noticia-detalle.php"><h3><i class="fa fa-plus-circle"></i> LEER MÁS</h3></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="noticia-previo">
                                                    <img src="img/noticias/Victoria by victorinox.jpg"> 
                                                    <h2>Victoria: la nueva línea para la mujer de Victorinox en el Perú </h2>
                                                    <p>
                                                        El poder de la marca como elemento diferenciador es lo que ha permitido a Victorinox crecer en el Perú con productos pensados exclusivamente para la mujer. 
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="opciones">  
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3>FILLED</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-comment"></i> 39</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-pencil"></i> AUTOR</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-plus-circle"></i> LEER MÁS</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="noticia-previo">
                                                    <img src="img/noticias/Barra mar.jpg"> 
                                                    <h2>Barra Mar: una variedad de sabores marinos al paso </h2>
                                                    <p>
                                                        El Perú ha reafirmado su identidad por medio de la cocina y Barra Mar lo hace a través de un concepto que demuestra que nuestra innovación culinaria sigue marcando la pauta. 
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="opciones">  
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3>FILLED</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-comment"></i> 39</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-pencil"></i> AUTOR</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-plus-circle"></i> LEER MÁS</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12">
                                                <div class="noticia-previo">
                                                    <img src="img/noticias/Claridad.jpg"> 
                                                    <h2>Claridad: consultora especializada en coaching estratégico   </h2>
                                                    <p>
                                                        Ximena Vega Amat y León inicia su proyecto personal de coaching estratégico para romper con el modelo tradicional de estrategias de marketing y publicidad. 
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="opciones">  
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3>FILLED</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-comment"></i> 39</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-pencil"></i> AUTOR</h3>
                                                            </div>
                                                            <div class="col-lg-3 col-xs-6 col-sm-3">
                                                                <h3><i class="fa fa-plus-circle"></i> LEER MÁS</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!--NOTICAS-->


                                <!--BUSQUEDA-->
                                <div class="col-lg-4 col-sm-4" id="widget">

                                    <div class="row">
                                        <div class="search">
                                            <h4>Newsletter sign-up Go</h4>
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">

                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">GO</button>
                                                <p>Your email is safe with us.</p>
                                            </form>
                                        </div>
                                    </div>
                                    <!--BUSQUEDA-->

                                    <!--POPULAR POST-->
                                    <div class="row" style="background-color: white">
                                        <div class="post">
                                            <h2>POST POPULARES</h2>
                                            <?php
                                            for ($i = 0; $i < 5; $i++) {
                                                ?>
                                                <div class="col-lg-12 spacio-post" >
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xs-12 col-md-5">
                                                            <img src="http://2.bp.blogspot.com/-qjxQiRdDBow/UipzCrMVMXI/AAAAAAAAA6w/XAyIHDSW6JI/s72-c/newIconSet.jpg"> 
                                                        </div>
                                                        <div class="col-lg-8 col-xs-12 col-md-7">
                                                            <a href="#"><p>New icon pack released!</p></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!--POPULAR POST-->

                                    <!--CATEGORIAS-->
                                    <div class="row" >
                                        <div class="categorias">
                                            <h2>BLOG CATEGORIA</h2>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <h4>Ilustration</h4>
                                                    <h4>Ilustration</h4>
                                                    <h4>Ilustration</h4>
                                                    <h4>Ilustration</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CATEGORIAS-->

                                    <!--FACEBOOK-->
                                    <div class="row">
                                        <div class="facebook-plugin">
                                            <h2>LIKE FACEBOOK</h2>

                                            <div class="fb-page" data-href="https://www.facebook.com/MediaImpactPeru/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/MediaImpactPeru/?fref=ts"><a href="https://www.facebook.com/MediaImpactPeru/?fref=ts">Media Impact</a></blockquote></div></div>
                                        </div>
                                    </div>
                                    <!--FACEBOOK-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>2016 Copyright MediaImpact. Todos los derechos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
