<?php
class Mailto{
	private $mail	    	= null;
	private $Host	    	= 'mediaimpact.pe';  // Specify main and backup SMTP servers;
	private $Username	    = 'ce@mediaimpact.pe';                 // SMTP username;
	private $Password	    = 'kalin123';                      // SMTP password
	private $Port	    	= 26;                                    // TCP port to connect to
	private $From	    	= 'ce@mediaimpact.pe';
	private $nameFrom	    = 'Atlas Copco';
	private $Subject	    = '';
	private $Body 			= '';
	private $AltBody		= 'Generadores Transportables - Promos Atlas Copco';
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
	
	function CuerpoContacto($arr=NULL){
		$this->Subject = 'Generadores Transportables - Promos Atlas Copco';
		$this->Body = '<table>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Nombre: </strong>';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['nombre'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Apellido:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['apellidos'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Teléfono:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['telefono'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Correo:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['correo'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Empresa:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['empresa'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Ciudad:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['ciudad'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Autoriza:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['autoriza'];
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