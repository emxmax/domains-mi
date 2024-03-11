<?php
$link = mysqli_connect('localhost', 'xxqitbn_db77722_sonrie', 'DaWZO?Wm?n&goJP7')
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';

mysqli_select_db($link ,'xxqitbn_db77722_karldemo') or die('No se pudo seleccionar la base de datos');

// $cn = db_connect();	
$email = $_POST["email"];

//comparamos si exite email
$sql = "SELECT * from  contacto where email = '$email'";
$res = mysqli_query($link,$sql);
if(mysqli_num_rows($res) > 0){
	echo "existe";
}
else{
	$sql1 = "INSERT INTO contacto (email, fecha) VALUES ('$email', now())";
	$bol = mysqli_query($link,$sql1);


	if($bol){
		echo "exito";
	}
	else{
		echo "error";
	}
	
}
?>