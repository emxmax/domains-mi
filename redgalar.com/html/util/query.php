<?php
	
	include "fns_db.php";
	$cn = db_connect();
	
	$sqlProducto = "SELECT * FROM producto WHERE pro_estado=1 ORDER BY pro_id ASC";
	$rsProducto = mysql_query($sqlProducto);
	$nProducto = mysql_num_rows($rsProducto);

	$sqlCategoria = "SELECT * FROM categoria ORDER BY cate_id ASC";
	$rsCategoria = mysql_query($sqlCategoria);
	$nCategoria = mysql_num_rows($rsCategoria);



	if(isset($_SESSION["fb_access_token"])){

  require_once "fbsdk4-5.1.2/src/Facebook/autoload.php";
  require_once "credentials.php";

  $fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.2',
    ]);

  $accessToken = $_SESSION['fb_access_token'] ;

  if(isset($accessToken)){
  $fb->setDefaultAccessToken($accessToken);

    try {
      $response = $fb->get('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
      $userNode = $response->getGraphUser();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }


    $user_id_fb = $userNode['id'];
    $user_genero = $userNode['gender'];
    $user_foto = $userNode['picture']['url'];
    $user_name = $userNode['first_name']." ".$userNode['last_name'];
    $user_email = $userNode['email'];
    $user_provider = "facebook";


    $sql = "SELECT user_email FROM usuario WHERE user_email = '$user_email' and user_provider='facebook'";
    $rs = mysql_query($sql);
    $n = mysql_num_rows($rs);

    if($n==0){
      $sqlNuevoFb = "INSERT INTO usuario (user_name,user_provider,user_id_fb,user_email,user_genero,user_foto) VALUES ('$user_name','$user_provider','$user_id_fb','$user_email','$user_genero','$user_foto');";
      mysql_query($sqlNuevoFb,$cn);

      $titulo    = 'Registro exitoso en REDGALAR.COM';
      //$mensaje   = 'Hola '.$user_name.' gracias por registrarte';
      $mensaje = '
      <html>
      <head>
        <title>Registro exitoso en REDGALAR.COM</title>
      </head>
      <body>
        <a href="https://www.redgalar.com/" target="_blank"><img src="https://www.redgalar.com/img/gracias-por-registrarse.jpg" style="width:100%;"/></a>
      </body>
      </html>
      ';
      // Cabecera que especifica que es un HMTL
      $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
      $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $cabeceras .= 'From: REDGALAR.COM <info@redgalar.com>' . "\n" .
                'Reply-To: info@redgalar.com';

      mail($user_email, $titulo, $mensaje, $cabeceras);

    }

    $_SESSION['nombre'] = $user_name;
    $_SESSION['email'] = $user_email;

  }

}

?>