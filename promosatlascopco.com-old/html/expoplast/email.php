<?php
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";

define("DB_SERVER","localhost");
define("DB_USER","xxqitbn_db77722_sonrie");
define("DB_PASSWORD","DaWZO?Wm?n&goJP7");
define("DB_DATABASE","xxqitbn_db77722_atlasexpoplast");
// define("DB_SERVER","localhost");
// define("DB_USER","root");
// define("DB_PASSWORD","");
// define("DB_DATABASE","atlaschile");

function db_connect()
{
	$result = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	if (!$result)
		return false;
	if (!mysql_select_db(DB_DATABASE))
		return false;
	return $result;
}


$nombres = utf8_decode($_POST["nombres"]);
$telefono = utf8_decode($_POST["telefono"]);
$email = utf8_decode($_POST["email"]);
$empresa = utf8_decode($_POST["empresa"]);

$cn = db_connect();

$sql = "INSERT INTO contacto (nombres, telefono, email, empresa)
				VALUES('$nombres','$telefono','$email', '$empresa')";
if (mysql_query($sql, $cn)) {

        $iddd = mysql_insert_id();

		// EMAIL
		$email_user = "mc@mediaimpact.pe";
		$email_password = "Mediaimpact2016$";
		$the_subject = "Expo Plast Mayo 2018 #".$iddd;
		$address_to = "emxmax@hotmail.com";
		$from_name = "Mensaje Landing";
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
		$phpmailer->setFrom('info@atlas.com',$from_name);
		$phpmailer->AddAddress($address_to); // recipients email

		$phpmailer->AddCC("compresores.peru@pe.atlascopco.com", "");
		$phpmailer->AddCC("claudia.bravo@pe.atlascopco.com", "");
		// $phpmailer->AddCC("jessica.canelo@pe.atlascopco.com ", "");
		$phpmailer->AddCC("jorge.sanchez@pe.atlascopco.com", "");
		$phpmailer->Subject = $the_subject; 
		$phpmailer->Body .="<h1 style='color: black;'>Mensaje Landing - Expo Plast</h1>";
		$phpmailer->Body .= "<p>Recibiste un  nuevo contacto:</p>";
		$phpmailer->Body .= "<p>Nombres :".$nombres." </p>";
		$phpmailer->Body .= "<p>Telefono :".$telefono." </p>";
		$phpmailer->Body .= "<p>Email :".$email." </p>";
		$phpmailer->Body .= "<p>Empresa :".$empresa." </p>";
		// $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
		$phpmailer->IsHTML(true);
		if ($phpmailer->Send()) {
			header('Location: gracias.html');
		}else{
		    header('Location: ./');
		}

}
?>