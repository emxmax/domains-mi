<?php

@$mail = addslashes($_POST['mail']);

$cabecemail = "From: $mail\n"
        . "Reply-To: $mail\n";
$asunto = "Mensaje desde el formulario de contacto de REDGALAR.COM"; //asunto del mensaje
$contenido = "$nombre se ha suscrito a la web:"
        . "\n"
        . "Email: $mail\n"
        . "\n";

$email_to = "info@redgalar.com";

if (@mail($email_to, $asunto, $contenido, $cabecemail)) {
    $extra = './';
    header("location: $extra");
}
?>