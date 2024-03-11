<?php
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";

define("DB_SERVER","localhost");
define("DB_USER","xxqitbn_db77722_sonrie");
define("DB_PASSWORD","DaWZO?Wm?n&goJP7");
define("DB_DATABASE","xxqitbn_db77722_cobin");

function db_connect()
{
	$result = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	if (!$result)
		return false;
	if (!mysql_select_db(DB_DATABASE))
		return false;
	return $result;
}


$nombres = utf8_decode(ucwords(strtolower($_POST["nombres"])));
$apellidos = utf8_decode(ucwords(strtolower($_POST["apellidos"])));
$telefono = $_POST["telefono"];
$email = utf8_decode($_POST["email"]);
$asunto = utf8_decode($_POST["asunto"]);
$mensaje = utf8_decode($_POST["mensaje"]);

$cn = db_connect();

$sql = "INSERT INTO contacto (nombres, apellidos, telefono, email, asunto, mensaje)
				VALUES('$nombres','$apellidos','$telefono','$email', '$asunto','$mensaje')";
if (mysql_query($sql, $cn)) {

        $iddd = mysql_insert_id();

		// EMAIL
		$email_user = "mc@mediaimpact.pe";
		$email_password = "Mediaimpact2016$";
		$the_subject = "Cobin Contacto #".$iddd;
		$address_to = "scampos1c@hotmail.com";
		$from_name = "Cobin Web";
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
		$phpmailer->setFrom('hola@cobin.app',$from_name);
		$phpmailer->AddAddress($address_to); // recipients email
		// $phpmailer->AddCC("hola@cobin.app", "");
		$phpmailer->Subject = $the_subject; 
		$phpmailer->Body .="<h1 style='color: black;'>Mensaje - Cobin Web</h1>";
		$phpmailer->Body .= "<p>Recibiste un  nuevo contacto:</p>";
		$phpmailer->Body .= "<p>Nombres : ".$nombres." </p>";
		$phpmailer->Body .= "<p>Apellidos : ".$apellidos." </p>";
		$phpmailer->Body .= "<p>Telefono : ".$telefono." </p>";
		$phpmailer->Body .= "<p>Email : ".$email." </p>";
		$phpmailer->Body .= "<p>Asunto : ".$asunto." </p>";
		$phpmailer->Body .= "<p>Mensaje : <br><br>".$mensaje." </p>";
		// $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
		$phpmailer->IsHTML(true);
		if ($phpmailer->Send()) {
			header('Location: ./#frmcontacto');
		}else{
		    header('Location: ./');
		}

}
?>