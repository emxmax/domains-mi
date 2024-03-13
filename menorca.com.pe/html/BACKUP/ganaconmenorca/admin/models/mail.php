<?php
require '../../phpmailer/PHPMailerAutoload.php';
class Mailto{
	private $mail	    	= null;
	private $Host	    	= 'smtp.gmail.com';  // Specify main and backup SMTP servers;
	private $Username	    = 'mailsmartlab@gmail.com';                 // SMTP username;
	private $Password	    = 'mailsmartlab?';                      // SMTP password
	private $Port	    	= 587;                                    // TCP port to connect to
	private $From	    	= 'mailsmartlab@gmail.com';
	private $nameFrom	    = 'Administrador Embajadores';
	private $Subject	    = '';
	private $Body 			= '';
	private $AltBody		= 'Tienes un mensaje del Formulario de Reserva';
	private $mensajeenvio	= '';
	private $boolenvio		= false;
	function __construct(){
		## Instanceamos el envio de correo
		$this->mail = new PHPMailer;

		//$this->mail->SMTPDebug = 3;                               // Enable verbose debug output

		$this->mail->isSMTP();                                      // Set mailer to use SMTP
		$this->mail->Host = $this->Host;
		$this->mail->SMTPAuth = true;                               // Enable SMTP authentication
		$this->mail->Username = $this->Username;
		$this->mail->Password = $this->Password;
		$this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$this->mail->Port = $this->Port;
	}
	function EnviarMail($email=NULL){
		$this->mail->setFrom($this->From, $this->nameFrom);
		$this->mail->addAddress('elmer.flores.crispin@gmail.com  ', 'Elmer');     // Add a recipient
		## $this->mail->addAddress('c.augusto.espoi');               // Name is optional
		## $this->mail->addReplyTo('info@example.com', 'Information');
		if (!empty($email))
			$this->mail->addCC($email);
		$this->mail->addBCC('c.augusto.espinoza@gmail.com');
		## $this->mail->addBCC('drezny@gmail.com');

		$this->mail->isHTML(true);
		$this->mail->Subject = $this->Subject;
		$this->mail->Body    = $this->Body;
		$this->mail->AltBody = $this->AltBody;
		if(!$this->mail->send()) {
			$this->mensajeenvio.= 'No se pudo enviar, intentelo mas tarde.';
			## $this->mensajeenvio.= $this->mail->ErrorInfo;
			$this->boolenvio.= false;
		} else {
			$this->mensajeenvio.= "Su ha enviado satisfactoriamente";
			$this->boolenvio.= true;
		}
	}
	function CuerpoReserva($nombre=NULL,$telefono=NULL,$hora=NULL,$cantidad=NULL,$fecha=NULL){
		$this->Subject = 'Formulario de Reserva';
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
		$this->Body.= '<strong>Fecha de Reserva:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $fecha;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Telefono:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $telefono;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Hora:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $hora;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Cantidad de Personas:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $cantidad;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '</table>';
		$this->AltBody = 'Tienes un nuevo mensaje del Formulario de Reserva';
	}
	function CuerpoReservaCoaching($UserDetail,$reservaDetail){
		$this->Subject = 'Formulario de Reserva';
		$this->Body = $UserDetail;
		$this->Body.= $reservaDetail;
		$this->AltBody = 'Tienes un nuevo mensaje del Formulario de Reserva';
	}
	function CuerpoContacto($nombre=NULL,$telefono=NULL,$correo=NULL,$mensaje=NULL,$fecha=NULL){
		$this->Subject = 'Formulario de Contacto';
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
		$this->Body.= '<strong>Celular:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $telefono;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Correo:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $correo;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Mensaje:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $mensaje;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '</table>';
		$this->AltBody = 'Tienes un nuevo mensaje, Contacto';
	}
	function CuerpoBoletin($email=NULL){
		$this->Subject = 'Registro de Boletin';
		$this->Body = '<table>';
		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Email:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $email;
		$this->Body.= '</td>';
		$this->Body.= '</tr>';
		$this->Body.= '</table>';
		$this->AltBody = 'Tienes un mensaje de Registro de Boletin';
	}
	function DameMensajeEnvio(){
		return $this->mensajeenvio;
	}
	function DameBoolEnvio(){
		return $this->boolenvio;
	}
}
?>