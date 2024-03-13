<html lang="es">
  <head>
    <title>Plantas Eléctricas - Generadores Transportables | Atlas Copco</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="GESMEDIC">
    <meta name="keywords" content="Torre de iluminación">
    <link rel="shortcut icon" href="public/image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/assets/css/font.css">
    <link rel="stylesheet" href="./resources/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./resources/assets/js/jquery-3.1.1.min.js"></script>
    <script src="./resources/assets/js/jquery.validate.min.js"></script>
    <script src="./resources/assets/js/bootstrap.min.js"></script>
    <script src="./resources/assets/js/init.js"></script>
    <link rel="shortcut icon" href="./resources/assets/image/logo_atlas1.png"/>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="cinta">
          <img src="./resources/assets/image/cinta.png">
          <div class="contenido-cinta">
            <p>PROMOCIÓN EXCLUSIVA</p>
          </div>
        </div>
        <div class="container">
          <?php include("header.php"); ?>
        </div>
        <section>
          <div class="container">
            <div class="row cuerpo-landing">
              <div class="col-xs-12">
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                  <div class="row">
                    <div class="consulta">
                      <b>¡POTENCIE SU NEGOCIO CON LAS PLANTAS ELÉCTRICAS ATLAS COPCO!</b><br><br>
                      Ingrese sus datos y un especialista le enviará información de toda nuestra gama.
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
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                  <div class="carro">
                    <div class="foto-carro">
                    	<div class="col-lg-12">
                    		<div class="row">
                    			<img src="./resources/assets/image/carro.png">
                    		</div>
	                    </div>
                      	<div class="col-lg-12 carrito">
                      		<div class="row">
		                       ¿Sabía usted que las plantas eléctricas pueden dar energía a industrias, centrales, eventos e incluso a zonas críticas? Ofrecen una capacidad de 15 KVA a 1450 KVA en potencia Prime.
		                       <br>
		                       <a href="http://www.atlascopco.com.co/es-co/construction-equipment/products/Power-Generators" target="_blank">Más información</a>
	                       </div>
                      	</div>
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