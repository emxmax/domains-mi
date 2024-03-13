<?php

	session_start();

	include "util/fns_db.php";
	$cn = db_connect();
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT user_name, user_email, user_pass 
			FROM usuario
			WHERE user_email = '$user'";
		
	$rs = mysql_query($sql);
	$n = mysql_num_rows($rs);

	if($n){
		$xpass = mysql_result($rs,0,'user_pass');
		$nombre = mysql_result($rs,0,'user_name');
		$email = mysql_result($rs,0,'user_email');

		if($pass == $xpass){
			$_SESSION['nombre'] = $nombre;
			$_SESSION['email'] = $email;				
			echo 1;
		}else{
			echo "Password Incorrecto";
		}
	}else{
		echo "No existe el nombre de usuario";
	}
	
?>