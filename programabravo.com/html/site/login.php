<?php
@session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");

$dni        = OWASP::RequestString('dni');
$clave      = OWASP::RequestString('clave');
$msg_error  =NULL;

if(isset($dni) && isset($clave)){
    if (WebLogin::Logon($dni, $clave)){
        //header("location: http://programabravo.com/site/");
        //exit();
    }
    else{
        $msg_error="Tus datos de acceso no son v&aacute;lidos!";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>
<script type="text/javascript">
$(function() {
    <?php if(isset($msg_error)) echo 'ShowAlert("'.$msg_error.'");'; ?>
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
        <td valign="top"><form id="frmLogin" name="frmLogin" method="post" action="procesar.php">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="32" valign="top">
                <input name="dni" type="text" class="defaultInputValue" id="dni" style="width:176px;background-color: #FFF;border: 1px solid #999;height: 22px;border-radius: 3px;font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 11px;color: #666;" title="Tu número de DNI" />
              </td>
            </tr>
            <tr>
              <td height="32" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="94">
                    <input name="clave" type="text" class="defaultInputValue" id="clave" style="width:83px;;background-color: #FFF;border: 1px solid #999;height: 22px;border-radius: 3px;font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 11px;color: #666;" title="Tu clave" />
                  </td>
                    <td><input name="button" type="button" class="input2" id="lnkLogin" style="width:85px" value="Iniciar sesión" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="32" valign="top">Para ingresar por primera vez, ingresa tu código BP. Inmediatamente, el sistema te pedirá que personalices tu clave. Si olvidaste tu clave, <a class="fancybox fancybox.iframe" href="recordar.html">ingresa aquí</a>.<br />
                <br />
                <br />
                <br />
                Si eres Administrador, <a href="http://www.programabravo.com/admin" target="_blank">entra aquí</a></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include '../core/include/website/footer.php';?>
<script type="text/javascript">
$(document).ready(function() {
    $('.fancybox').fancybox();
    $.fancybox.open({
        href : 'mensaje.html',
        type : 'iframe',
        scrolling: 'no',
        padding : 5
    });
    $("#fancybox-manual-b").click(function() {
        $.fancybox.open({
            href : 'iframe.html',
            type : 'iframe',
            scrolling: 'no',
            padding : 5
        });
    });
});
</script>
</body>
</html>
