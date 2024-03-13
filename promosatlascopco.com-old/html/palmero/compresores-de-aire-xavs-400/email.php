<?php
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";

define("DB_SERVER","localhost");
define("DB_USER","xxqitbn_db77722_sonrie");
define("DB_PASSWORD","DaWZO?Wm?n&goJP7");
define("DB_DATABASE","xxqitbn_db77722_palmero_xats");


// define("DB_SERVER","localhost");
// define("DB_USER","root");
// define("DB_PASSWORD","");
// define("DB_DATABASE","atlaspalmero");

function db_connect()
{
	$result = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	if (!$result)
		return false;
	if (!mysql_select_db(DB_DATABASE))
		return false;
	return $result;
}


$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$empresa = $_POST["empresa"];
$provincia = $_POST["provincia"];
$localidad = $_POST["localidad"];

$cn = db_connect();

$sql = "INSERT INTO contacto (nombres, apellidos, telefono, email, empresa,provincia,localidad)
				VALUES('$nombres','$apellidos','$telefono','$email', '$empresa','$provincia','$localidad')";
if (mysql_query($sql, $cn)) {

        $iddd = mysql_insert_id();

		// EMAIL
		$email_user = "mediaimpact18@gmail.com";
		$email_password = "mediaimpact18##";
		$the_subject = "Mensaje Landing - Palmero - #".$iddd;
		$address_to = "rca@mediaimpact.pe";
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
		$phpmailer->AddCC("pgenetti@palmero.com", "");
		$phpmailer->AddCC("emorelli@palmero.com", "");
		$phpmailer->Subject = $the_subject; 
		$phpmailer->Body .="<h1 style='color: black;'>Mensaje Landing - Palmero COMPRESORES DE AIRE XAVS 400</h1>";
		$phpmailer->Body .= "<p>Recibiste un  nuevo contacto:</p>";
		$phpmailer->Body .= "<p>Nombre :".$nombres." </p>";
		$phpmailer->Body .= "<p>Apellido :".$apellidos." </p>";
		$phpmailer->Body .= "<p>Teléfono :".$telefono." </p>";
		$phpmailer->Body .= "<p>Email :".$email." </p>";
		$phpmailer->Body .= "<p>Empresa :".$empresa." </p>";
		$phpmailer->Body .= "<p>Provincia :".$provincia." </p>";
		$phpmailer->Body .= "<p>Localidad :".$localidad." </p>";
		// $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
		$phpmailer->IsHTML(true);
		if ($phpmailer->Send()) {
			header('Location: gracias.html');
		}else{
		    header('Location: index.html');
		}

}
?>