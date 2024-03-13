<?php
require_once("../core/class/util/phpmailer/class.phpmailer.php");

class Email{
var $Template;
var $Attach=array();
var $Recipients=array();

    private static function getTemplate($template, $replacement){
        $content = file_get_contents("../core/view/mail/template/".$template);

        while(list($key, $val) = each($replacement)){
            $content=str_replace($key, $val, $content);
        }
        return $content;
    }

    private static function setBody($asunto, $mensaje){
        global $WEBSITE;
        $body = self::getTemplate("default.html", array(
                    "@@ASUNTO@@"=>$asunto,
                    "@@MENSAJE@@"=>$mensaje,
                    "@@URL_LINK@@"=>$WEBSITE["URL_HTTP"]));

        return $body;
    }

    private static function setBodyPostIt($origen, $destino, $url_link){
        global $WEBSITE;
        $body = self::getTemplate("postit.html", array(
                    "@@ORIGEN@@"=>$origen,
                    "@@DESTINO@@"=>$destino,
                    "@@URL_TEXT@@"=>$WEBSITE["DOMAIN"].$WEBSITE["ROOT"],
                    "@@URL_LINK@@"=>$url_link));

        return $body;
    }
    
    public static function Send_Recomienda($name, $name_to, $mail_to){
        global $WEBSITE;

        $asunto='Recomienda esta p&aacute;gina';
        $mensaje='Hola '.$name_to.', tu amigo(a) '.$name.' te recomienda ver esta p&aacute;gina: <br /><a href="'.$WEBSITE['URL_HTTP'].'">'.$WEBSITE['DOMAIN'].'</a>';
        $body =self::setBody($asunto, $mensaje);

        return  self::Send($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"], $mail_to, $asunto, $body);
    }

    public static function Send_Recordar($oEmpleado){
        global $WEBSITE;

        $asunto='Recordar clave';
        $mensaje='Hola '.$oEmpleado->nombres.', te enviamos tu clave de acceso. <p>Clave: <strong>'.$oEmpleado->clave.'</strong></p>';
		$mail_to=$oEmpleado->email;
        $body =self::setBody($asunto, $mensaje);

        return  self::Send($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"], $mail_to, $asunto, $body);
    }    
    
    public static function Send_PostIt($oItem){
        global $WEBSITE, $usrSession;
        
		$oEmpleado = CrmEmpleado::getItem($oItem->destinoID);
        if($oEmpleado==NULL) return false;

        $key='login';
        $auth=base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $oItem->destinoID, MCRYPT_MODE_CBC, md5(md5($key))));
        $url=$WEBSITE["URL_HTTP"]."site/redirect.html?ref=recientes.html?postitID=".$oItem->postitID."&auth=".$auth;

        $asunto = "Programa Bravo Lan: Tienes un nuevo mensaje";
		$origen=$usrSession["nombreCompleto"];
		$destino=$oEmpleado->nombres;
        $body =self::setBodyPostIt($origen, $destino, $url);

        return  self::Send($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"], $oEmpleado->email, $asunto, $body);
    }

    public static function Send_RegisterForm($registerID){
        global $WEBSITE;

        $oRegForm=CrmRegisterForm::getItem($registerID);
        if($oRegForm==NULL) return false;

        $oForm=CrmForm::getItem($oRegForm->formID);
        $lNotify=CrmFormNotify::getList(1, $oRegForm->formID, $oRegForm->contactID);
        if($lNotify->getLength()==0) return false; //No tiene Destinatarios

        $oCountry=UbgCountry::getItem($oRegForm->countryID); //Nombre de Pais
        $oContact= CmsParameterLang::getItem($oRegForm->contactID, 1); //Asunto de Contacto

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
        $mensaje.='<tr><td>Asunto de Contacto</td><th align="left">'.(($oContact!=NULL)? $oContact->parameterName: '').'</th></tr>'."\n";
        $mensaje.='<tr><td>Comentario</td><th align="left">'.$oRegForm->comment.'</th></tr>'."\n";
        $mensaje.='<tr><td>Fecha de Registro</td><th align="left">'.$oRegForm->registerDate.'</th></tr>'."\n";
        $mensaje.='</table><br>'."\n";

        $mensaje.='<strong>Datos Adicionales: </strong>'."\n";
        $mensaje.='<table>'."\n";
        foreach($lRegFields as $obj){
                $mensaje.='<tr><td width="100">'.$obj->fieldName.'</td><th align="left">'.CrmRegisterField::getValue($obj, $oRegForm->formID).'</th></tr>'."\n";
        }
        $mensaje.='</table>'."\n";

        $mensaje.='<p>Para acceder a toda la informaci&oacute;n, ingresar al administrador web<br> >>Informacion General >>Formularios >> Mensajes recibidos</p>'."\n";
        $mensaje.='<a href="'.$WEBSITE['URL_ADMIN'].'">'.$WEBSITE['URL_ADMIN'].'</a>'."\n";

        //Aplicar Plantilla
        $body =self::setBody($asunto, $mensaje);

        //Destinatarios con Copia
        foreach($lNotify as $oNotify){
            $cc=($oNotify->recipients!='')? $oNotify->recipients: NULL;
            self::Send($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"], $oNotify->email, $asunto, $body, $cc);
            //echo "$WEBSITE[ADMIN_MAIL], $WEBSITE[ADMIN_NAME], $oNotify->email, $asunto, $body, $cc"; exit;
        }

        return true;
    }

    public static function Send($from, $fromName, $to, $subject, $body, $cc=NULL){
        $mail = new PHPMailer();
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SetFrom($from, $fromName);
        $mail->AddAddress($to); // habilitar en produccion
        //$mail->AddAddress("fishdev@gmail.com"); // comentar en produccion
        //$mail->AddAddress("josebalbin@gmail.com"); // comentar en produccion
        
        $mail->Subject = $subject;
        $mail->AltBody = "Para ver este mensaje, por favor utilizar una aplicaci�n de correo compatible con HTML"; // optional, comment out and test
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