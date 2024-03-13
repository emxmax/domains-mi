<?php
session_start();
date_default_timezone_set('America/Lima');
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");
require_once("../core/class/util/phpmailer/class.phpmailer.php");

$oItem = new eCrmPostIt();

$oItem->postitID    =(isset($_REQUEST["postitID"])) ? intval($_REQUEST["postitID"]) : NULL;
$oItem->typeID      =(isset($_REQUEST["typeID"])) ? intval($_REQUEST["typeID"]) : NULL;
$oItem->origenID    =$usrSession["personaID"];
$oItem->destinoID   =(isset($_REQUEST["destinoID"])) ? intval($_REQUEST["destinoID"]) : NULL;
$oItem->mensaje     =(isset($_REQUEST["mensaje"])) ? $_REQUEST["mensaje"] : NULL;

if($Command=="addnew"){

    $oItem->votos       =0;
    $oItem->estado      =1;
    
    if(CrmPostIt::AddNew($oItem)){

        $oEmpleado = CrmEmpleado::getItem($oItem->destinoID);

        if($oEmpleado!=NULL){
            $mail = new PHPMailer();
            //$mail->IsSMTP(); // telling the class to use SMTP

            $mail->SetFrom($WEBSITE["ADMIN_MAIL"], $WEBSITE["ADMIN_NAME"]);
            $mail->AddAddress($oEmpleado->email);   // name is optional
            //$mail->AddAddress("fishdev@gmail.com");
            //$mail->AddAddress("josebalbin@gmail.com");
            
            $key='login';
            $auth=base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $oItem->destinoID, MCRYPT_MODE_CBC, md5(md5($key))));
            $url=$WEBSITE["URL_HTTP"]."site/redirect.html?ref=quedicendemi.html?postitID=".$oItem->postitID."&auth=".$auth;

            $message=file_get_contents("../core/view/mail/template/default.html");
            $message=str_replace("@@ORIGEN@@", $nombreCompleto, $message);
            $message=str_replace("@@DESTINO@@", $oEmpleado->nombres, $message);
            $message=str_replace("@@URL_TEXT@@", $WEBSITE["DOMAIN"].$WEBSITE["ROOT"], $message);
            
            $message=str_replace("@@URL_LINK@@", $url, $message);

            $mail->Subject = "Programa Bravo Lan: Tienes un nuevo mensaje";
            $mail->AltBody    = "Para ver este mensaje, por favor utilizar una aplicación de correo compatible con HTML"; // optional, comment out and test
            $mail->MsgHTML($message);

            $mail->Send();
            
            //TEST
            //echo $url;
            //exit();
        }

        header("location: ultimoscomentarios.html?postitID=".$oItem->postitID);		
        exit;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>

<script type="text/javascript">
var info;
$(function(){
    xform="#frmContent";
    prepareForm(xform);
    $('#mensaje').limit('180');
    $('#empleado').simpleAutoComplete('../ajax/empleado.php?cmd=empleado',{
        autoCompleteClassName: 'autocomplete',
        selectedClassName: 'sel',
        attrCallBack: 'rel',
        identifier: 'personaID'
    },estadoCallback);

    $('#lnkSubmit').click(function(){
        if(isValidate(xform) && $("#destinoID").val()!=""){
            $("#cmd").val("addnew");
            $("#frmContent").submit();
        }
        else
            ShowAlert("Debes ingresar todos los datos requeridos!");
    });

    function estadoCallback( par )
    {
        $("#destinoID").val( par[0] );
        $("#mundo").val( par[1] );
    }
});
</script>
</head>
<body>
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondoreconocer_<?php echo $oItem->typeID;?>.jpg">
  <tr>
    <td height="70" align="right" valign="top"><img src="<?php echo $URL_BASE;?>images/menutop.jpg" width="188" height="70" usemap="#Map" border="0" /></td>
  </tr>
  <tr>
    <td height="167" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="706" valign="top"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="281" height="167" usemap="#Map2" border="0" /></td>
        <td align="right" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="right" class="pass24"><?php echo date('d').' de '.Fecha::getNombreMes(date('m')).' de '.date('Y');?></td>
          </tr>
        </table></td>
        <td width="48" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="405" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="231" valign="top">&nbsp;</td>
        <td width="476" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="26">&nbsp;</td>
          </tr>
          <tr>
            <td class="pass36">Hola <?php echo $nombreUsuario;?></td>
          </tr>
        </table></td>
        <td valign="top">
	<form method="post" id="frmContent" class="valid-form">
            <input type="hidden" id="postitID" name="postitID" />
            <input type="hidden" name="cmd" id="cmd" />
            <input type="hidden" name="destinoID" id="destinoID" />
            <input type="hidden" name="typeID" id="typeID" value="<?php echo $oItem->typeID;?>" />
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><input name="empleado" type="text" class="input1 required" id="empleado" /></td>
            </tr>
            <tr>
              <td height="3"></td>
            </tr>
            <tr>
              <td><input name="mundo" type="text" class="input1 required" id="mundo" readonly="true" /></td>
            </tr>
            <tr>
              <td height="3"></td>
            </tr>
            <tr>
              <td><textarea name="mensaje" id="mensaje" maxlength="250" cols="45" rows="5" class="input2 required"></textarea></td>
            </tr>
            <tr>
              <td height="3"></td>
            </tr>
            <tr>
              <td><input name="usuario" type="text" class="input1 required" id="usuario" value="<?php echo $nombreCompleto;?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td height="3"></td>
            </tr>
            <tr>
              <td><input name="mundoUsuario" type="text" class="input1 required" id="mundoUsuario" value="<?php echo $mundoUsuario;?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td height="28"></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="74">&nbsp;</td>
                  <td><a id="lnkSubmit" href="javascript:;"><img src="<?php echo $URL_BASE;?>images/espacio.gif" border="0" width="135" height="46" /></a></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="126" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="426" valign="top">&nbsp;</td>
        <td width="598" valign="top"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="513" height="100" usemap="#Map3" border="0" />
          <map name="Map3" id="Map3">
            <area shape="rect" coords="4,57,219,74" href="mailto:soporte@programabravo.com" />
            <area shape="rect" coords="297,47,504,82" href="mailto:sugerencias@programabravo.com" />
          </map></td>
      </tr>
    </table></td>
  </tr>
</table>

<?php include '../core/include/website/navigation.php';?>

<map name="Map2" id="Map2"><area shape="rect" coords="30,57,272,80" href="quedicendemi.html" />
  <area shape="rect" coords="30,97,272,120" href="ultimoscomentarios.html" />
</map>
</body>
</html>
