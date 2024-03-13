<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Libro de reclamaciones</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <ol>
          <li><a href="<?php echo $url; ?>">Inicio</a></li>
          <li class="active">Libro de Reclamación</li>
        </ol>
        <h2>Libro de Reclamación Virtual</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="libro">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-sm-offset-1 col-sm-10">
          <div class="row">
            <div class="col-lg-12">
              <h3>Libro de reclamaciones</h3>
              <p>Redgalar es una web peruana que te permite personalizar tus obsequios dentro de la gran variedad de categorías y productos que ofrece a sus clientes. Somos una empresa joven pero sólida que busca mejorar cada día el servicio y los productos ofrecidos por lo que estamos atentos y prestos a solucionar cualquier duda o queja.</p>
              <p>Conforme a lo establecido en el Código de Protección y Defensa del Consumidor, esta institución cuenta con un Libro de Reclamaciones a su disposición.</p>
              <p>Razón Social: INNOVATIVA  LATAM S.A.C<br>RUC: 20601821592</p>
            </div>
            <div class="col-lg-6 col-lg-offset-3 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
              <div class="text-center">
                <h4>Datos del consumidor reclamante</h4>
              </div>
              <input type="text" placeholder="Nombre competo">
              <input type="text" placeholder="Dirección">
              <input type="text" placeholder="Distrito">
              <input type="text" placeholder="N° doc. identidad">
              <input type="text" placeholder="Correo electrónico">
              <input type="text" placeholder="Teléfono de contacto">
              <textarea rows="3" placeholder="Escribe aquí tu mensaje"></textarea>
              <div class="text-right">
                <button>Enviar</button>  
              </div>
            </div>
          </div>
        </div>
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