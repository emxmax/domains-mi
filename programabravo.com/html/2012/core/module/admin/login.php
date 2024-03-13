<?php
$userName =(isset($_REQUEST["userName"])) ? $_REQUEST["userName"] : null;
$password =(isset($_REQUEST["password"])) ? $_REQUEST["password"] : null;

if(isset($userName) && isset($password)){
	if (ADMLogin::Logon($userName, $password)){
		header("location: index.php");
	}else{
		$MODULE->addError("Usuario o contraseña incorrecta");
	}
}
?>
