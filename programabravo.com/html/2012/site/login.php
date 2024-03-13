<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");

$dni        =(isset($_REQUEST["dni"])) ? $_REQUEST["dni"] : NULL;
$clave      =(isset($_REQUEST["clave"])) ? $_REQUEST["clave"] : NULL;
$msg_error  =NULL;

if(isset($dni) && isset($clave)){
    if (WebLogin::Logon($dni, $clave)){
        header("location: index.html");
        exit();
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
<body>
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="images/fondohome.jpg">
  <tr>
    <td height="452">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="38" valign="top">&nbsp;</td>
        <td width="302" valign="top"><form name="frmLogin" id="frmLogin" method="post">
          <table width="100%" border="0" cellspacing="0" cellpadding="12">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><input name="dni" type="text" class="text defaultInputValue" id="dni" title="Tu número de DNI" style="width:264px;" /></td>
                </tr>
                <tr>
                  <td height="6"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><input name="clave" type="text" class="text defaultInputValue" id="clave" title="4 últimos dígitos de tu DNI" style="width:152px;" /></td>
                      <td width="5"></td>
                      <td><a href="#" id="lnkLogin"><img src="<?php echo $URL_BASE;?>images/enviar.gif" border="0" width="106" height="30" /></a></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="4" class="arial11"></td>
                </tr>
                <tr>
                  <td class="arial11">Si eres administrador, <a href="http://www.programabravo.com/admin/" class="arial11">haz click aquí</a></td>
                </tr>
              </table></td>
            </tr>
          </table></form></td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
