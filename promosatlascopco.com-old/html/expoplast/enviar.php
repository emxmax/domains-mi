<?php

@$nombres = addslashes($_POST['nombres']);
@$telefono = addslashes($_POST['telefono']);
@$email = addslashes($_POST['email']);
@$empresa = addslashes($_POST['empresa']);
@$autorizo = addslashes($_POST['autorizo']);

$cabecemail = "From: Atlas Copco <mc@mediaimpact.pe> \n"
        . "Reply-To: Atlas Copco <mc@mediaimpact.pe>\n";
$asunto = "Expo Plast - Promos Atlas Copco"; //asunto del mensaje
$contenido = "Nombres: $nombres\n"
        . "Apellidos: $apellidos\n"
        . "Telefono: $telefono\n"
        . "Email: $email\n"
        . "Empresa: $empresa\n"
        . "Ciudad: $ciudad\n"
        . "Autorizo: $autorizo\n"
        . "\n";

$email_to = "emxmax@hotmail.com";

if (@mail($email_to, $asunto, $contenido, $cabecemail)) {
    $extra = 'http://www.promosatlascopco.com/compresores-de-tornillo/gracias';
    header("location: $extra");
}
?>