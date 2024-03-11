<?php
	$datos=$_POST['data'];
	
	$datos=json_encode($datos);
	$datos=json_decode($datos);
	
	$nombre=$datos->nombre;
	$dni=$datos->dni;
	$direccion=$datos->direccion;
	$telefono=$datos->telefono;
	$email=$datos->email;
	$consulta=$datos->consulta;
	
	$server = "internal-db.s77722.gridserver.com";
	$user = "db77722_sonrie";
	$pass = "50rie14n";
	$bd = "db77722_quebrada";

	$conexion = mysqli_connect($server, $user, $pass,$bd) 
	or die("Ha sucedido un error inexperado en la conexion de la base de datos");

	$sql = "INSERT INTO post (post_nombre,post_telefono,post_email,post_consulta,post_dni,post_dir) VALUES ('$nombre','$telefono','$email','$consulta','$dni','$direccion')";


	mysqli_set_charset($conexion, "utf8"); 
	
	$resultado=mysqli_query($conexion, $sql);

	$close = mysqli_close($conexion) 
	or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
	
	$cabecemail = "From: $email\n" 
	 . "Reply-To: $email\n";
	$asunto = "Mensaje desde el formulario de contacto de LA QUEBRADA"; //asunto del mensaje
	$contenido = "$nombre ha enviado un mensaje desde el formulario de contacto de LA QUEBRADA, estos son sus datos:"
	. "\n"
	. "Nombre: $nombre\n"
	. "Dirección: $direccion\n"
	. "DNI: $dni\n"
	. "Email: $email\n"
	. "Telefono: $telefono\n"
	. "Consulta: $consulta\n"
	. "\n";

	$email_to = "sboza@menorca.com.pe"; //cambiar por tu email
	//  $email_to = "jfalcon910@gmail.com";
	if (@mail($email_to, $asunto ,$contenido ,$cabecemail )){
		echo json_encode("devuelto");
	}
?>