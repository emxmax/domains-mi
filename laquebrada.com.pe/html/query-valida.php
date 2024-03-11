<?php
	session_start();

	include "fns_db.php";
	$cn = db_connect();
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT user_id, user_name, user_nick, user_pass, nivel_id
			FROM usuario
			WHERE user_nick = '$user'";
		
	$rs = mysql_query($sql);
	$n = mysql_num_rows($rs);

	if($n){
		$id = mysql_result($rs,0,'user_id');
		$xpass = mysql_result($rs,0,'user_pass');
		$nombre = mysql_result($rs,0,'user_name');

		$nivel = mysql_result($rs,0,'nivel_id');

		if($pass == $xpass){
			$_SESSION['iduser'] = $id;
			$_SESSION['user2'] = $user;
			$_SESSION['nombre'] = $nombre;
			$_SESSION['nivel'] = $nivel;				
			echo 1;
		}else{
			echo "Password Incorrecto";
		}
	}else{
		echo "No existe el nombre de usuario";
	}
	
?>