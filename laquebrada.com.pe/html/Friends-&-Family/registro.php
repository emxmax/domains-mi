<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>REGISTRO FRIENDS & FAMILY</title>
        <link href="" rel="shortcut icon"/>
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
    </head>

    <div class="brow">
        
    </div>
    <section id="header">
        <a href="http://laquebrada.com.pe/"><img src="img/logo-la-quebrada.png" class="center-block"></a>
    </section>
    <section id="titulos">
        <div class="brow-ligth">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>
                            PROGRAMA FRIENDS&FAMILY
                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="brow-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>
                            FORMULARIO DE REFERIDOS
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <img src="img/sombra-cool.png" alt="sombra" class="sombra-2">


    <style>
form h6{
text-align: right;margin-right: 0px;
  font-family: 'Gotham-Medium';
    font-style: normal;
    font-weight: 400;
    font-size:10px;
}
@media (min-width: 768px) {
    form h6{
    	text-align: center;
        padding-bottom: 14px;
    }
}
form h5{
  font-family: 'Gotham-Medium';
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
}
@media (min-width: 1200px) {
    form h5{
        margin-left: -100px;
    }
}
 </style>
<form method="POST" action="enviarform.php">
    <section id="formulario">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p>
                        Tus nombres y apellidos
                    </p>
                   <h6>* Campo obligatorio</h6>
                    <input type="text" name="name_cliente" required>
                    <p>
                        Código de cliente
                    </p>
                      <h6>* Campo opcional<span style="color:transparent;">....</span></span></h6>
                    <input type="text" name="codigo_cliente" required>
                    <p>
                        E-mail
                    </p>
                      <h6>* Campo obligatorio</h6>
                    <input type="email" name="email_cliente" required>
                </div>
            </div>

        </div>
    </section>
    <img src="img/sombra-cool.png" alt="sombra" class="sombra-2" style="margin-top: 40px">



    <section id="referidos">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <h5>Ingrese los datos de sus amigos y/o familiares para participar en el
                  programa Friends & Family</h5>
                    <h3 style="margin-top: 30px;">Referido 1</h3>
                    <div class="row">
                        <label class="col-sm-3">Nombres y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_1">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dir_1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 tel">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tel_1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="img/sombra.jpg">
            </div>


            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>Referido 2</h3>
                    <div class="row">
                        <label class="col-sm-3">Nombres y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_2">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dir_2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 tel">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tel_2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="img/sombra.jpg">
            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>Referido 3</h3>
                    <div class="row">
                        <label class="col-sm-3">Nombres y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_3">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dir_3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 tel">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tel_3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="img/sombra.jpg">
            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>Referido 4</h3>
                    <div class="row">
                        <label class="col-sm-3">Nombres y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_4">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dir_4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_4">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 tel">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tel_4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="img/sombra.jpg">
            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>Referido 5</h3>
                    <div class="row">
                        <label class="col-sm-3">Nombres y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_5">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dir_5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_5">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 tel">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tel_5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button>ENVIAR</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

</form>

    <div id="footer">
        <img src="img/menorca-white.png" class="center-block" alt="menorca">
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>
