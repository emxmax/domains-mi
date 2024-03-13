<?php
require '../../phpmailer/PHPMailerAutoload.php';
class Mailto{
	private $mail	    	= null;
	private $Host	    	= 'mail.codegraph.pe';  // Specify main and backup SMTP servers;
	private $Username	    = 'enviomail@codegraph.pe';                 // SMTP username;
	private $Password	    = 'kalin123';                      // SMTP password
	private $Port	    	= 26;                                    // TCP port to connect to
	private $From	    	= 'ce@mediaimpact.pe';
	private $nameFrom	    = 'Menorca.';
	private $Subject	    = '';
	private $Body 			= '';
	private $AltBody		= 'Tienes un mensaje del Formulario';
	private $mensajeenvio	= '';
	private $boolenvio		= false;
	function __construct(){
		## Instanceamos el envio de correo
		$this->mail = new PHPMailer;

		$this->mail->SMTPDebug = 1;                               // Enable verbose debug output

		$this->mail->isSMTP();                                      // Set mailer to use SMTP
		$this->mail->Host = $this->Host;
		$this->mail->SMTPAuth = true;                               // Enable SMTP authentication
		$this->mail->Username = $this->Username;
		$this->mail->Password = $this->Password;
		$this->mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$this->mail->Port = $this->Port;
	}
	function EnviarMail($email=NULL){
		$para = $email.',c.augusto.espinoza@gmail.com';

		$titulo = $this->Subject;

		$mensaje = $this->Body;

		$cabeceras = 'MIME-Version: 1.0' . "\r\n";

		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$cabeceras .= 'From: '.$this->nameFrom.'<'.$this->From.'>';

		$enviado = mail($para, $titulo, $this->Body, $cabeceras);
 
		if ($enviado){
			$this->mensajeenvio.= "Su reserva se ha enviado satisfactoriamente";
			$this->boolenvio = true;
		 	return $this->boolenvio;
		}
		else{
			$this->mensajeenvio.= 'No se pudo enviar, intentelo mas tarde.';
		  	$this->boolenvio = false;
		 	return $this->boolenvio;
		}
	}
	function EnviarMail_($email=NULL){
		$this->mail->setFrom($this->From, $this->nameFrom);
		$this->mail->addAddress('vicman.corzo@gmail.com', 'Victor Corzo');     // Add a recipient
		## $this->mail->addAddress('ellen@example.com');               // Name is optional
		## $this->mail->addReplyTo('info@example.com', 'Information');
		if (!empty($email))
			$this->mail->addCC($email);
		$this->mail->addBCC('c.augusto.espinoza@gmail.com');

		$this->mail->isHTML(true);                                  // Set email format to HTML

		$this->mail->Subject = $this->Subject;
		$this->mail->Body    = $this->Body;
		$this->mail->AltBody = $this->AltBody;
		if(!$this->mail->send()) {
			$this->mensajeenvio.= 'No se pudo enviar, intentelo mas tarde.';
			## $this->mensajeenvio.= $this->mail->ErrorInfo;
			$this->boolenvio.= false;
		} else {
			$this->mensajeenvio.= "Su se ha enviado satisfactoriamente";
			$this->boolenvio.= true;
		}
		return $this->boolenvio; 
	}
	function Cuerpo($nombre=NULL, $direccion=NULL,$telefono=NULL,$email=NULL){
		$this->Subject = 'Formulario de Menorca';
		$this->Body = '<table>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Nombre: </strong>';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $nombre;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Direccion:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $direccion;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Teléfono:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $telefono;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Email:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $email;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '</table>';
		$this->AltBody = 'Tienes un nuevo mensaje del Formulario';
	}
	function DameMensajeEnvio(){
		return $this->mensajeenvio;
	}
	function DameBoolEnvio(){
		return $this->boolenvio;
	}
}
?>