<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $cn = db_connect();

  echo $busqueda . "<br>";
  $sqlUsuario = "SELECT * FROM usuario";
  $rsUsuario = mysql_query($sqlUsuario,$cn);
  $nUsuario = mysql_num_rows($rsUsuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com - Regalos personalizados en un click</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <section class="col-lg-9 col-sm-8" id="listado-categoria">
          <div class="row">
            <div class="col-lg-12">
              <?php
                for($i=0;$i<$nUsuario;$i++){ 
                  $user_id = mysql_result($rsUsuario,$i,"user_id");
                  $user_name = mysql_result($rsUsuario,$i,"user_name");
                  $user_apellido = mysql_result($rsUsuario,$i,"user_apellido");
                  $user_foto = mysql_result($rsUsuario,$i, "user_foto");

                  echo "user_id : " . $user_id . "<br>";
                  echo "user_name: " . $user_name . "<br>";
                  echo "user_apellido" . $user_apellido . "<br>";
                  echo "<br><br><br>";
              	}
              ?>
            </div>
          </div>         
        </section>
      </div>
    </div>  
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>