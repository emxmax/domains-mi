<?php

	include "phpmailer/class.phpmailer.php";

	include "phpmailer/class.smtp.php";


        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $pais = $_POST["pais"];
        $dni = $_POST["dni"];
        $empresa = $_POST["empresa"];
        $mensaje = $_POST["mensaje"];


		$email_user = "mediaimpact18@gmail.com";

        $email_password = "mediaimpact18##";

        $the_subject = "Formulario de contacto - Exsa";

        $address_to = "info@exsa.net";
        
        $from_name = "Exsa Soluciones";

        $phpmailer = new PHPMailer();

        // ---------- datos de la cuenta de Gmail -------------------------------

        $phpmailer->Username = $email_user;

        $phpmailer->Password = $email_password; 

        //-----------------------------------------------------------------------

        // $phpmailer->SMTPDebug = 1;

        $phpmailer->SMTPSecure = 'ssl';

        $phpmailer->Host = "smtp.gmail.com"; // GMail

        $phpmailer->Port = 465;

        $phpmailer->IsSMTP(); // use SMTP

        $phpmailer->SMTPAuth = true;

        $phpmailer->setFrom($phpmailer->Username,$from_name);

        $phpmailer->AddAddress($address_to); // recipients email

        $phpmailer->Subject = $the_subject; 

        $phpmailer->Body .="<h1 style='color: black;'>Exsa Soluciones</h1>";

        $phpmailer->Body .= "<p>Mensaje del formulario de contacto : </p>";

        $phpmailer->Body .= "<p>Nombre: ".$nombres." </p>";
        $phpmailer->Body .= "<p>Apellidos: ".$apellidos." </p>";
        $phpmailer->Body .= "<p>Email: ".$email."</p>";
        $phpmailer->Body .= "<p>Télefono: ".$telefono."</p>";
        $phpmailer->Body .= "<p>País: ".$pais."</p>";
        $phpmailer->Body .= "<p>Doc. de identidad: ".$dni."</p>";
        $phpmailer->Body .= "<p>Empresa: ".$empresa."</p>";
        $phpmailer->Body .= "<p>Mensaje: ".$mensaje."</p>";


        // $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";

        $phpmailer->IsHTML(true);

        if ($phpmailer->Send()) {
            $phpmailer = new PHPMailer();
            $phpmailer->Username = $email_user;
            $phpmailer->Password = $email_password; 
            $phpmailer->SMTPSecure = 'ssl';
            $phpmailer->Host = "smtp.gmail.com"; // GMail
            $phpmailer->Port = 465;
            $phpmailer->IsSMTP(); // use SMTP
            $phpmailer->SMTPAuth = true;
            $phpmailer->setFrom($phpmailer->Username,$from_name);
            $phpmailer->AddAddress($email); // recipients email
            $phpmailer->Subject = $the_subject;
            $phpmailer->Body .="<!DOCTYPE html>
<html>
  <head>
    
  <style type='text/css'>
    img{
      width:100%;
    }

</style></head>
  <body style='background-color: #FFFFFF; width: 100%;margin: 0 auto;'>
    <table width='600' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:Arial, Helvetica, sans-serif;font-size:20px;color:#FFFFFF;background-color:#f3f3f3; background-image: url(https://www.mediaimpact.pe/demo/mailing/toyota/exsa/img/exsa-head.png); margin-bottom: -5px; background-repeat: no-repeat; background-size: cover;'>
      <tr>
        <td style='float: left; width: 25%'>
          <a href='https://exsa.net/' style='max-width: 140px;'><img src='https://www.mediaimpact.pe/demo/mailing/toyota/exsa/img/logo-exsa.png'></a>
        </td>
<!--         <td>
          <img src='https://www.mediaimpact.pe/demo/mailing/toyota/exsa/img/exsa-mail.png'>
        </td> -->
      </tr>
    </table>
    <table width='600' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:Arial, Helvetica, sans-serif;font-size:16px;color:#424446;background-color:#f3f3f3; background-image: url(https://www.mediaimpact.pe/demo/mailing/toyota/exsa/img/exsa-fondo.jpg); background-repeat: no-repeat; background-size: cover;'>
      <tr>
        <td style='padding-left: 50px; padding-right:50px; padding-top: 35px; padding-bottom: 35px;'>
        <p>Estimado(a) <span style='text-transform: uppercase; font-weight: bold;'>".$nombres." ".$apellidos."</span>,<br/>
          <br/>Hemos recibido tu mensaje satisfactoriamente.
          <br/>En breve, un especialista se comunicar&aacute; contigo.
        <br/>
        <br/>Saludos cordiales,
          <br/><a href='https://exsa.net/contacto/' style='color: #0674BA; text-decoration: none;'>Equipo de Exsa Soluciones</a>
        <br/>
        <br/>Si recibiste este correo por error, por favor omitirlo.</p>
        </td>
      </tr>
    </table>
  </body>
</html>";
        
        $phpmailer->IsHTML(true);
            if ($phpmailer->Send()) {
                header('Location: https://exsa.net/contacto/gracias.php');
            }
            else{
                header('Location: https://exsa.net/contacto/error.php');
            }
        }else{
            header('Location: https://exsa.net/contacto/error.php');
        }
        // FIN DEL MENSAJE 



?>