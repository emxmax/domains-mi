<?php 
  ob_start("ob_gzhandler");
  session_start();

  include("util/query.php");
  include("util/url.php");

  if(isset($_SESSION['email'])){
    header("Location:" . $url . "perfil");
  }

  require_once "fbsdk4-5.1.2/src/Facebook/autoload.php";
  require_once "credentials.php";

  $fb = new Facebook\Facebook([
    'app_id' => $app_id, // Replace {app-id} with your app id
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.2'
    ]);

  $helper = $fb->getRedirectLoginHelper();

  $permissions = ['email']; // permisos
  $loginUrl = $helper->getLoginUrl($login_url, $permissions);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Registro</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <ol>
          <li><a href="<?php echo $url; ?>">Inicio</a></li>
          <li class="active">Registro</li>
        </ol>
        <h2>Registro</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="registrar">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-4 col-sm-push-8">
          <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="btn-fb">Ingresa con FACEBOOK</a>
          <br>
        </div>
        <div class="col-lg-4 col-sm-4 col-sm-pull-4">

          <form>
            <div class="form form-cliente">
              <h3>Cliente</h3>
              <input type="text" placeholder="Usuario" id="nomuser">
              <!--a href="">olvidé mi usuario</a-->
              <input type="password" placeholder="Password" id="passuser">
              <!--a href="">olvidé mi clave</a>
              <label><input type="checkbox"> recordarme</label-->
              <div class="text-right">
                <button type="submit" id="btn-enviar">Entrar</button>
              </div>
              <div id="result"></div>
            </div>
          </form>

          <ul>
            <li><a href=""> </a></li>
            <li><a href=""> </a></li>
            <li><a href=""> </a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-4 col-sm-pull-4">


          <form>
            <div class="form form-registrar">
              <h3>Registrar</h3>
              <input type="text" placeholder="E-mail" id="nemail">
              <input type="password" placeholder="Password" id="npass">
              <input type="password" placeholder="Reingresar password" id="nrpass">
              <input type="text" placeholder="Nombres" id="nnombres">
              <input type="text" placeholder="Celular" id="ncelular">
              <div class="text-right">
                <button type="submit" id="btn-nuevo">Enviar</button>
              </div>
              <div id="result2"></div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">

    /* Iniciando jQuery */
    (function(){
      function fLogin(){
        $.post("query-valida.php",{
          "user" : $('#nomuser').val(),
          "pass" : $('#passuser').val(),
        },
          function (data){
            if(data==1){
              var url = 'perfil';
              $(location).attr('href',url);
            }else{
              $('#result').fadeIn(500);//.fadeOut(6000)
              $('#result').html(data)
            }
          }
        )
      }

      $("#btn-enviar").on("click",function(){
        fLogin();
      })
    })()

  </script>
  <script type="text/javascript">

    /* Iniciando jQuery */
    (function(){
      function fNew(){
        $.post("query-nuevo.php",{
          "user_email" : $('#nemail').val(),
          "user_pass" : $('#npass').val(),
          "user_pass2" : $('#nrpass').val(),
          "user_name" : $('#nnombres').val(),
          "user_celular" : $('#ncelular').val()
        },
          function (data){
            if(data=='Creado satisfactoriamente'){
              $('#nemail').val("");
              $('#npass').val("");
              $('#nrpass').val("");
              $('#nnombres').val("");
              $('#ncelular').val("");
              $('#result2').fadeIn(500);//.fadeOut(6000)
              $('#result2').html(data)
            }else{
              $('#result2').fadeIn(500);//.fadeOut(6000)
              $('#result2').html(data)
            }
          }
        )
      }

      $("#btn-nuevo").on("click",function(){
        fNew();
      })
    })()

  </script>
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