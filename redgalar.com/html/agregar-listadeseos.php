<?php
	ob_start("ob_gzhandler");
	session_start();

	include "util/url.php";
	include "util/query.php";
	$cn = db_connect();
	
	$user_email=$_SESSION['email'];
	$sqlUsuario = "SELECT * FROM usuario WHERE user_email='$user_email'";
	$rsUsuario = mysql_query($sqlUsuario);
	
	$user_id = mysql_result($rsUsuario,0,"user_id");
	

	if($_POST["acc"]=="agregar_listadeseospu"){
		$pro_id = $_POST["id"];
		$sqlCantidad = "SELECT lista_estado FROM lista_deseo WHERE lista_deseo.pro_id = $pro_id AND lista_deseo.user_id = $user_id";
		$rsCantidad = mysql_query($sqlCantidad);
		$nCantidad = mysql_num_rows($rsCantidad);
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");		
		if ($nCantidad == 0) {
			// Registrar datos a la tabla
			$sql = "INSERT INTO lista_deseo (user_id,pro_id,lista_estado) VALUES ($user_id,$pro_id,'pu')";
		}else{
			// Actualizar el estado de la tabla 'lista_deseo'
			$sql = "UPDATE lista_deseo 
					SET  lista_estado = 'pu'
					WHERE lista_deseo.pro_id = $pro_id AND lista_deseo.user_id = $user_id";
		}
		//verifica que se haya realizado bien la consulta
		if(mysql_query($sql,$cn)){
			echo "exito";
		}else{
			echo "error";
		}		
	}


	if($_POST["acc"]=="agregar_listadeseospr"){
		$pro_id = $_POST["id"];		
		$sqlCantidad = "SELECT lista_estado FROM lista_deseo WHERE lista_deseo.pro_id = $pro_id AND lista_deseo.user_id = $user_id";
		$rsCantidad = mysql_query($sqlCantidad);		
		$nCantidad = mysql_num_rows($rsCantidad);
		//Inserción en utf8
		mysql_query("SET NAMES 'utf8");
		if ($nCantidad == 0) {
			// Registrar datos a la tabla
		$sql = "INSERT INTO lista_deseo (user_id,pro_id,lista_estado) VALUES ($user_id,$pro_id,'pr')";	
		}else{
			// Actualizar el estado de la tabla 'lista_deseo'
			$sql = "UPDATE lista_deseo 
					SET  lista_estado = 'pr'
					WHERE lista_deseo.pro_id = $pro_id AND lista_deseo.user_id = $user_id";
		}
		//verifica que se haya realizado bien la consulta		
		if(mysql_query($sql,$cn)){
			echo "exito";
		}else{
			echo "error";
		}
	}
?>