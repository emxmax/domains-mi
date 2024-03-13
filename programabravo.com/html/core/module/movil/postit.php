<?php
date_default_timezone_set('America/Lima');
require_once("../core/class/util/phpmailer/class.phpmailer.php");

$oItem = new eCrmPostIt();

$oItem->postitID		=(isset($_REQUEST["postitID"])) ? $_REQUEST["postitID"] : NULL;
$oItem->typeID			=(isset($_REQUEST["typeID"])) ? $_REQUEST["typeID"] : NULL;
$oItem->origenID		=$PAGE->UsrSession["personaID"];
$oItem->destinoID		=(isset($_REQUEST["destinoID"])) ? $_REQUEST["destinoID"] : NULL;
$oItem->mensaje			=(isset($_REQUEST["mensaje"])) ? $_REQUEST["mensaje"] : NULL;
$oItem->votos			=0;
$oItem->estado			=1;

if($PAGE->Command!=""){
	if($PAGE->processFormAction(new CrmPostIt(), $oItem)){
		
		//$oEmpleadoOrigen = CrmEmpleado::getItem($oItem->origenID);
		$oEmpleado = CrmEmpleado::getItem($oItem->destinoID);
		
		if($PAGE->Command=="insert" && $oEmpleado!=NULL){
			$mail = new PHPMailer();
			//$mail->IsSMTP(); // telling the class to use SMTP
		
			$mail->SetFrom($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"]);
			$mail->AddAddress($oEmpleado->email, $oEmpleado->nombres." ".$oEmpleado->apellido1." ".$oEmpleado->apellido2);   // name is optional
			//$mail->AddAddress("fishdev@gmail.com", "Fischer Tirado");
			//$mail->AddAddress("josebalbin@gmail.com", "Jose Balbin");
		
			$message=file_get_contents("../core/view/website/mail/template.html");
			$message=str_replace("@@ORIGEN@@", $PAGE->UsrSession["nombres"], $message);
			$message=str_replace("@@DESTINO@@", $oEmpleado->nombres, $message);
			$message=str_replace("@@URL_TEXT@@", $WEBSITE["DOMAIN"].$WEBSITE["ROOT"], $message);
			$message=str_replace("@@URL_LINK@@", $WEBSITE["URL_HTTP"]."/content/index.php?module=postit&formView=view&amp;postitID=".$oItem->postitID, $message);
		
			$mail->Subject = "Esp&iacute;ritu de servicio Lan: Tienes un nuevo mensaje";
			$mail->AltBody    = "Para ver este mensaje, por favor utilizar una aplicaci&oacute;n de correo compatible con HTML"; // optional, comment out and test
			$mail->MsgHTML($message);
			
			$mail->Send();
		}
		
		header("location: index.php?module=".$PAGE->Module."&formView=".$PAGE->FormView."&postitID=".$oItem->postitID);		
		exit;
	}
}

$nombreUsuario	=$PAGE->UsrSession["nombres"];
$nombreCompleto	=$PAGE->UsrSession["nombreCompleto"];

//Registro de Logs
$oEmpleadoLog=new eCrmEmpleadoLog();
$oEmpleadoLog->personaID	=$PAGE->UsrSession["personaID"];
$oEmpleadoLog->moduleID		=21;
$oEmpleadoLog->contentID	=0;
$oEmpleadoLog->observacion	="URL: ".$_SERVER['REQUEST_URI'];
CrmEmpleadoLog::AddNew($oEmpleadoLog);

?>
