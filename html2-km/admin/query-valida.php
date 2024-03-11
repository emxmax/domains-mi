<?php
	session_start();

	include "../util/conexion.php";
	$cn = db_connect();
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT user_name, user_nick, user_pass 
			FROM usuario
			WHERE user_nick = '$user'";
		
	$rs = mysql_query($sql);
	$n = mysql_num_rows($rs);

	if($n){
		$xpass = mysql_result($rs,0,'user_pass');
		$nombre = mysql_result($rs,0,'user_name');

		if($pass == $xpass){
			$_SESSION['user'] = $user;
			$_SESSION['nombre'] = $nombre;				
			echo 1;
		}else{
			echo "Password Incorrecto";
		}
	}else{
		echo "No existe el nombre de usuario";
	}
	
?>