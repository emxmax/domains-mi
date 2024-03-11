<?php
require_once("../core/class/util/phpmailer/class.phpmailer.php");

class Email{
var $Template;
var $Attach=array();
var $Recipients=array();

		public static function getTemplate($template, $replacement){
			$content = file_get_contents("../core/view/mail/template/".$template);
			
			while(list($key, $val) = each($replacement)){
				//echo "<li>$key - $val</li>";
				$content=str_replace($key, $val, $content);
			}
			return $content;
		}

		public static function setBody($asunto, $mensaje){
			global $WEBSITE;
		 	$body = self::getTemplate("default.html", array(
					"@@ASUNTO@@"=>$asunto,
					"@@MENSAJE@@"=>$mensaje,
					"@@URL_HTTP@@"=>$WEBSITE["URL_HTTP"]));

			return $body;
		}
		
		public static function Send_Recomienda($name, $name_to, $mail_to){
			global $WEBSITE;
			
			$asunto='Recomienda esta página';
			$mensaje='Hola '.$name_to.', tu amigo(a) '.$name.' te recomienda ver esta página: <br /><a href="'.$WEBSITE['URL_HTTP'].'">'.$WEBSITE['DOMAIN'].'</a>';
		 	$body =self::setBody($asunto, $mensaje);
			
			return  self::Send($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"], $mail_to, $asunto, $body);
		}

		public static function Send_RegisterForm($registerID){
			global $WEBSITE;
			
			$oRegForm=CrmRegisterForm::getItem($registerID);
			if($oRegForm==NULL) return false;
			
			$oForm=CrmForm::getItem($oRegForm->formID);
			$lNotify=CrmFormNotify::getList(1, $oRegForm->formID);
			if($lNotify->getLength()==0) return false; //No tiene Destinatarios

			$oCountry=UbgCountry::getItem($oRegForm->countryID);

			//Obtener Lista de Datos Adicionales
			$lRegFields=CrmRegisterField::getList($registerID);
			
			$asunto=$oForm->formName;
			$mensaje ='<p>Se ha registrado un nuevo ingreso en el formulario '.$oForm->formName.'.</p>'."\n";
			$mensaje.='<strong>Datos Comunes: </strong>'."\n";
			$mensaje.='<table>'."\n";
			$mensaje.='<tr><td width="100">Nombres</td><th align="left">'.$oRegForm->name.'</th></tr>'."\n";
			$mensaje.='<tr><td>Apellido P.</td><th align="left">'.$oRegForm->lastname.'</th></tr>'."\n";
			$mensaje.='<tr><td>Apellido M.</td><th align="left">'.$oRegForm->surname.'</th></tr>'."\n";
			$mensaje.='<tr><td>Telefono</td><th align="left">'.$oRegForm->phone.'</th></tr>'."\n";
			$mensaje.='<tr><td>Pa&iacute;s</td><th align="left">'.(($oCountry!=NULL)? $oCountry->countryName: '').'</th></tr>'."\n";
			$mensaje.='<tr><td>Ciudad</td><th align="left">'.$oRegForm->city.'</th></tr>'."\n";
			$mensaje.='<tr><td>Distrito</td><th align="left">'.$oRegForm->district.'</th></tr>'."\n";
			$mensaje.='<tr><td>E-mail</td><th align="left">'.$oRegForm->email.'</th></tr>'."\n";
			$mensaje.='<tr><td>Fecha de Registro</td><th align="left">'.$oRegForm->registerDate.'</th></tr>'."\n";
			$mensaje.='</table><br>'."\n";

			$mensaje.='<strong>Datos Adicionales: </strong>'."\n";
			$mensaje.='<table>'."\n";
			foreach($lRegFields as $obj){
				$mensaje.='<tr><td width="100">'.$obj->fieldName.'</td><th align="left">'.CrmRegisterField::getValue($obj, $oRegForm->formID).'</th></tr>'."\n";
			}
			$mensaje.='</table>'."\n";
			
			$mensaje.='<p>Para acceder a toda la información, ingresar al administrador web<br> >>Informacion General >>Formularios >> Registro de Usuarios</p>'."\n";
			$mensaje.='<a href="'.$WEBSITE['URL_ADMIN'].'">'.$WEBSITE['URL_ADMIN'].'</a>'."\n";

		 	//Aplicar Plantilla
			$body =self::setBody($asunto, $mensaje);
			
			//Destinatarios con Copia
			foreach($lNotify as $oNotify){
				$cc=($oNotify->recipients!='')? $oNotify->recipients: NULL;
				self::Send($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"], $oNotify->email, $asunto, $body, $cc);
				//echo "$WEBSITE[ADMIN_MAIL], $WEBSITE[ADMIN_NAME], $oNotify->email, $asunto, $body, $cc";
				//exit;
			}
			
			return true;
		}

		public static function Send($from, $fromName, $to, $subject, $body, $cc=NULL){
			$mail = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP

			$mail->SetFrom($from, $fromName);
			$mail->AddAddress($to);   // name is optional
			$mail->Subject = $subject;
			$mail->AltBody = "Para ver este mensaje, por favor utilizar una aplicación de correo compatible con HTML"; // optional, comment out and test
			//die($body);
			$mail->MsgHTML($body);
			
			//Add Recipients
			if($cc!=NULL){
				$aCc=explode(",", $cc);
				foreach($aCc as $addr){
					if($addr!='') $mail->AddCC(trim($addr));
				}
			}
			
			return $mail->Send();
		}
}?>