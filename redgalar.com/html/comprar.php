<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $pro_id=$_GET['pro_id'];

  $sqlProducto = "SELECT * FROM producto WHERE pro_id='$pro_id'";
  $rsProducto = mysql_query($sqlProducto);

  $pro_id = mysql_result($rsProducto,0,"pro_id");
  $pro_name = mysql_result($rsProducto,0,"pro_name");
  $pro_precio_n = mysql_result($rsProducto,0,"pro_precio_n");
  $pro_precio_o = mysql_result($rsProducto,0,"pro_precio_o");
  $pro_detalles = mysql_result($rsProducto,0,"pro_detalles");
  $pro_img = mysql_result($rsProducto,0,"pro_img");
  $pro_envio = mysql_result($rsProducto,0,"pro_envio");

  if(!isset($_SESSION['email'])){
    header("Location:" . $url . "logout.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/responsive-tabs.css" />
  <script src="https://integ-pago.culqi.com/js/v1"></script>
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <section class="col-lg-9" id="comprar" data-precio="<?php echo $pro_precio_n;?>">
          <div class="row">
            <div class="col-lg-5 col-lg-offset-2">
              <div class="col-lg-12">
                <div class="row">
                  <form action="agregar-envio.php" method="POST">
                    <h3>ENVIO</h3>
                    <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>">
                    <label>Distrito:</label>
                    <select name="en_distrito" required>
                      <option value="">--------------- SELECCIONE ---------------</option>
                      <option value="Ate">Ate</option>
                      <option value="Bellavista">Bellavista</option>
                      <option value="Barranco">Barranco</option>
                      <option value="Breña">Breña</option>
                      <option value="Cercado Callao">Cercado Callao</option>
                      <option value="Cercado de Lima">Cercado de Lima</option>
                      <option value="Carmen de la Legua">Carmen de la Legua</option>
                      <option value="Comas">Comas</option>
                      <option value="Chorrillos">Chorrillos</option>
                      <option value="El Agustino">El Agustino</option>
                      <option value="Independencia">Independencia</option>
                      <option value="Jesús María">Jesús María</option>
                      <option value="Magdalena del Mar">Magdalena del Mar</option>
                      <option value="Miraflores">Miraflores</option>
                      <option value="Los Olivos">Los Olivos</option>
                      <option value="La Perla">La Perla</option>
                      <option value="La Punta">La Punta</option>
                      <option value="La Molina">La Molina</option>
                      <option value="La Victoria">La Victoria</option>
                      <option value="Lince">Lince</option>
                      <option value="Pueblo Libre">Pueblo Libre</option>
                      <option value="Puente Piedra">Puente Piedra</option>
                      <option value="Rimac">Rimac</option>
                      <option value="San Isidro">San Isidro</option>
                      <option value="San Juan de Miraflores">San Juan de Miraflores</option>
                      <option value="San Luis">San Luis</option>
                      <option value="San Martin de Porres">San Martin de Porres</option>
                      <option value="San Miguel">San Miguel</option>
                      <option value="Santiago de Surco">Santiago de Surco</option>
                      <option value="Surquillo">Surquillo</option>
                      <option value="San Borja">San Borja</option>
                      <option value="Santa Anita">Santa Anita</option>
                      <option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
                      <option value="Santa Rosa">Santa Rosa</option>
                      <option value="Ventanilla">Ventanilla</option>
                      <option value="Villa María del Triunfo">Villa María del Triunfo</option>
                      <option value="Villa El Savador">Villa El Savador</option>
                    </select>
                    <label>Dirección:</label>
                    <input type="text" name="en_direccion" required>
                    <label for="">Referencia:</label>
                    <input type="text" name="en_referencia" required>
                    <label for="">Persona de contacto:</label>
                    <input type="text" name="en_persona_c" required>
                    <label for="">Teléfono:</label>
                    <input type="text" name="en_telf" required>
                    <label for="">Horario:</label>
                    <select name="en_horario" required>
                      <option value="">--------------- SELECCIONE ---------------</option>
                      <option value="09:00 - 11:00">09:00 - 12:00</option>
                      <option value="11:00 - 13:00">12:00 - 15:00</option>
                      <option value="13:00 - 16:00">15:00 - 18:00</option>
                      <option value="16:00 - 19:00">18:00 - 20:00</option>
                    </select>
                    <label>Comentario:</label>
                    <textarea rows="3" name="en_comentario" required></textarea>
                    <div class="text-center">
                      <button>SIGUIENTE</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="col-lg-12">
                <div class="row">
                  <h3>Producto Seleccionado</h3>
                  <div class="producto-select">
                    <div class="col-lg-4">
                      <div class="img-producto">
                        <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <h4><?php echo utf8_encode($pro_name);?></h4>
                      <span>S/ <?php echo $pro_precio_o;?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>  
  </div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
      $('#btn-category').click(function(){
        var estado = $('header ol').css('display');
        if(estado=='none'){
          $('header ol').css('display','table');
        }else{
          $('header ol').css('display','none');
        }
        
      });
  });
  </script>
</body>
</html>