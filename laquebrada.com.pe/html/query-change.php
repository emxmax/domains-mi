<?php
	session_start();

	include "fns_db.php";
	$cn = db_connect();
	
	$passactual = $_POST['passuseractual'];
	$passnuevo = $_POST['passusernueva'];
	$iduser = $_POST['iduser'];
	
	$sql = "SELECT user_pass FROM usuario WHERE user_id ='$iduser'";

	$rs = mysql_query($sql);
	$n = mysql_num_rows($rs);

	if($n){
		$xpass = mysql_result($rs,0,'user_pass');
		
		if($passactual == $xpass){
			
			$sql2 = "UPDATE usuario SET user_pass='$passnuevo' WHERE user_id='$iduser'";
			$rs2 = mysql_query($sql2);
			
			echo 1;
		}else{
			echo "Error con la conraseña actual";
		}
	}else{
		echo "Error con la sesion";
	}
	
?>