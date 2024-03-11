<?php
class Mailto{
	private $mail	    	= null;
	private $Host	    	= 'mediaimpact.pe';  // Specify main and backup SMTP servers;
	private $Username	    = 'antoniaenelespejo@gmail.com'; // SMTP username;
	private $Password	    = 'kalin123';                    // SMTP password
	private $Port	    	= 26;                                    // TCP port to connect to
	private $From	    	= 'antoniaenelespejo@gmail.com';
	private $nameFrom	    = 'Antonia.';
	private $Subject	    = '';
	private $Body 			= '';
	private $AltBody		= 'Tienes un mensaje del Formulario';
	private $mensajeenvio	= '';
	private $boolenvio		= false;
	function __construct(){
		## Instanceamos el envio de correo
	}
	function EnviarMail($email=NULL){
		$para = $email;

		$titulo = $this->Subject;

		$mensaje = $this->Body;

		$cabeceras = 'MIME-Version: 1.0' . "\r\n";

		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$cabeceras .= 'From: '.$this->nameFrom.'<'.$this->From.'>';

		$enviado = mail($para, $titulo, $this->Body, $cabeceras);
 
		if ($enviado){
			$this->mensajeenvio.= "Su mensaje se ha enviado satisfactoriamente";
			$this->boolenvio = true;
		 	return $this->boolenvio;
		}
		else{
			$this->mensajeenvio.= 'No se pudo enviar, intentelo mas tarde.';
		  	$this->boolenvio = false;
		 	return $this->boolenvio;
		}
	}
	function CuerpoContacto($arrdata=NULL){
		$this->Subject = 'Formulario de Antonia';
		$this->Body = '<table>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Nombre:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arrdata['nombre'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>E-mail:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arrdata['email'];;
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