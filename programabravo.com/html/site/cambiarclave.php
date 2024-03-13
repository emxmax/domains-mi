<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");

function ProcessForm($clave, $clave2){
global $msg_error;   
    $usrSession = WebLogin::getUserSession();
    $personaID=$usrSession["personaID"];
    $oEmpleado  = CrmEmpleado::getItem($personaID);

    if(!(isset($clave) && isset($clave2))){
        $msg_error = 'Debe ingresar y confirmar la nueva clave.';
        return false;
    }
    if($clave!=$clave2){
        $msg_error = 'Las claves ingresadas no coinciden.';
        return false;
    }
    if($oEmpleado->clave==$clave){
        $msg_error = 'Debes ingresar una clave distinta a la clave actual.';
        return false;
    }
    if($oEmpleado->codigoBP==$clave){
        $msg_error = 'Debes ingresar una clave distinta a tu c&oacute;digo BP.';
        return false;
    }
    
    if (CrmEmpleado::Update_Clave($personaID, $clave)){
        return true;
    }
    else{
        $msg_error = 'Ocurri&oacute; un error: '.CrmEmpleado::GetErrorMsg();
        return false;
    }
}

$clave  = OWASP::RequestString('clave');
$clave2 = OWASP::RequestString('clave2');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>
<script type="text/javascript">
$(function() {
<?php 
    $msg_error  =NULL;
    if(isset($clave) && isset($clave2)){
        if(!ProcessForm($clave, $clave2)){
            echo 'ShowAlert("'.$message.'");'; 
        }
        else {
            echo 'ShowMessage("<p>Tu clave ha sido cambiada con &eacute;xito.</p> <p>Por favor presiona  &quot;<a href=\"index.html\" target=\"_parent\">continuar</a>&quot;<br /></p>");';
        }
    }
    ?>
});
</script>
</head>
<body style="background:url('<?php echo $URL_BASE;?>images/fondo.jpg') no-repeat center top #F8D043;">
<table width="562" height="530" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="390" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table width="562" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="344" valign="top">&nbsp;</td>
        <td valign="top"><form id="frmUpdate" name="frmLogin" method="post">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="32" valign="top">Ahora por favor <strong>ingresa una nueva clave dos veces</strong> (una que solo tu recuerdes) y presiona el botón &quot;Confirmar&quot;. En adelante esa será tu única clave de acceso.<br />
                <br /></td>
            </tr>
            <tr>
              <td height="32" valign="top"><input name="clave" type="text" class="defaultInputValue" id="clave" style="width:176px;background-color: #FFF;border: 1px solid #999;height: 22px;border-radius: 3px;font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 11px;color: #666;" title="Nueva clave" /></td>
            </tr>
            <tr>
              <td height="32" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="94"><input name="clave2" type="text" class="defaultInputValue" id="clave2" style="width:83px;;background-color: #FFF;border: 1px solid #999;height: 22px;border-radius: 3px;font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 11px;color: #666;" title="Confirmar clave" /></td>
                  <td><a id="lnkUpdate" href="#"><img src="images/confirmar.png" width="85" height="26" border="0" /></a></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="32" valign="top">&nbsp;</td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include '../core/include/website/footer.php';?>
</body>
</html>
