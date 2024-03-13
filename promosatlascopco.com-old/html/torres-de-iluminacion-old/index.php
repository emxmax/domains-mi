<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Torres de Iluminación | Atlas Copco</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="GESMEDIC">
    <meta name="keywords" content="Torre de iluminación">

    <link rel="apple-touch-icon" sizes="57x57" href="imagenes/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="imagenes/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="imagenes/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="imagenes/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="imagenes/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="imagenes/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="imagenes/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="imagenes/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="imagenes/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="imagenes/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imagenes/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="imagenes/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon/favicon-16x16.png">
    <link rel="manifest" href="imagenes/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="public/image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/assets/css/font.css">
    <link rel="stylesheet" href="./resources/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./resources/assets/js/jquery-3.1.1.min.js"></script>
    <script src="./resources/assets/js/jquery.validate.min.js"></script>
    <script src="./resources/assets/js/bootstrap.min.js"></script>
    <script src="./resources/assets/js/init.js"></script>
    <link rel="shortcut icon" href="./resources/assets/image/logo_atlas.png"/>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="cinta">
          <img src="./resources/assets/image/cinta.png">
          <div class="contenido-cinta">
            <img src="./resources/assets/image/icon-eco.png">
            <p>Todos nuestros equipos cuentan con certificados de compromiso con el medio ambiente.</p>
          </div>
        </div>
        <div class="container">
          <?php include("header.php"); ?>
        </div>
        <section>
          <div class="container">
            <div class="row cuerpo-landing">
              <div class="col-xs-12">
                <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                  <div class="row">
                    <div class="consulta">
                      Complete sus datos y un especialista le enviará información detallada de nuestra gama de torres de iluminación.
                    </div>
                    <form id="formulario">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="group">
                            <input type="text" name="nombre" id="nombre" class="nombre" placeholder="Nombres">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="group">
                            <input type="text" name="apellidos" class="apellidos" id="apellidos" placeholder="Apellidos">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="group">
                            <input type="text" name="telefono" class="telefono" id="telefono" placeholder="Teléfono">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="group">
                            <input type="email" name="correo" class="correo" id="correo" placeholder="Email">
                          </div>
                        </div>
                      </div>
                      <div = class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="group">
                            <input type="text" name="empresa" class="empresa" id="empresa" placeholder="Empresa">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="group">
                            <input type="text" name="ciudad" class="ciudad" id="ciudad" placeholder="Ciudad">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="row autorizacion">
                          	<input type="checkbox" name="autoriza" id="autoriza" checked value="si"> Autorizo a Atlas Copco a utilizar mis datos personales para los fines mencionados.
                        </div>
                      </div>
                      <a href="javascript:void(0)" class="button" id="enviar-datos">ENVIAR</a>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                  <div class="carro">
                    <div class="foto-carro">
                      <div>
                        ¿Sabía que una torre de iluminación HiLight es capaz de cubrir áreas de hasta 5,000 m2 con media de 20lux (luminosidad)?
                        Encuentre la torre transportable que se ajuste a tus necesidades.
                        <br>
                        <a href="http://www.atlascopco.com.pe/es-pe/construction-equipment/products/light-towers" target="_blank">Más información</a>
                      </div>
                      <div>
                        <img src="./resources/assets/image/carro.png">
                      </div>
                    </div>
                    <div class="rectangle">
                      <p>Otros equipos y servicios</p>
                      <ul>
                        <li>
                            <a href="http://www.atlascopco.com.pe/es-pe/construction-equipment/products/Mobile-air-compressors" target="_blank">Compresores</a> 
                        </li>
                        <li>
                            <a href="http://www.atlascopco.com.pe/es-pe/construction-equipment/products/handheld" target="_blank">Herramientas de Construcción</a> 
                        </li>
                        <li>
                            <a href="http://www.atlascopco.com.pe/es-pe/construction-equipment/service" target="_blank">Servicio Técnico y Repuestos</a>
                        </li>
                        <li>
                            <a href="http://www.atlascopco.com.pe/es-pe/construction-equipment/products/Mobile-air-compressors" target="_blank">Generadores</a> 
                        </li>
                        <li>
                          	<a href="http://www.atlascopco.com.pe/es-pe/Rental" target="_blank">Alquiler de equipos</a>                           
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php include("footer.php"); ?>
      </div>
    </div>
  </body>
</html>