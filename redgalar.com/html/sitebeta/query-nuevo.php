<?php

	session_start();

	include "util/fns_db.php";
	$cn = db_connect();
	
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];
	$user_pass2 = $_POST['user_pass2'];
	$user_celular = $_POST['user_celular'];

	$sqlExiste = "SELECT * FROM usuario WHERE user_email = '$user_email'";
	$rsExiste = mysql_query($sqlExiste);
	$nExiste = mysql_num_rows($rsExiste);

	if($user_pass == $user_pass2){
		if($nExiste){
			echo "Ya esta en uso este correo";
		}else{
			$sqlNuevo = "INSERT INTO usuario (user_name,user_email,user_pass,user_celular) VALUES ('$user_name','$user_email','$user_pass','$user_celular');";
			mysql_query($sqlNuevo,$cn);


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

			if(mail($user_email, $titulo, $mensaje, $cabeceras)){
				echo "Creado satisfactoriamente";
			}
			
		}
	}else{
		echo "Las contraseñas no coinciden";
	}
?>