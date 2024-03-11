<?php

$mail='manager@alamocompany.us'; // Cambiar por tu correo

$name = $_POST['name'];
$depa = $_POST['depa'];
$distrito = $_POST['distrito'];
$direccion = $_POST['direccion'];
$contacto = $_POST['contacto'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];


$thank="http://www.alamocompany.us/Conta.html"; // redirecciona a pagina

$message = "
Nombre: ".$name. ";
#Dptos/casas: ".$depa. ";
Distrito: ".$distrito. ";
Direccion: ".$direccion."
Contacto: ".$contacto. ";
Telefono: ".$telefono. ";
E-mail: ".$email."";


if (mail($mail,"Contacto nuevo",$message)) // asunto Correo Nuevo
Header ("Location: $thank" );

?>
