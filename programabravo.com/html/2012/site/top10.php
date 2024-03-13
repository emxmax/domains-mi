<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Programa Bravo | LAN Perú</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondotop10.jpg">
  <tr>
    <td height="70" align="right" valign="top"><img src="<?php echo $URL_BASE;?>images/menutop.jpg" width="188" height="70" usemap="#Map" border="0" /></td>
  </tr>
  <tr>
    <td height="220" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="348" valign="top">&nbsp;</td>
        <td width="282" valign="top"><iframe width="282" height="390" frameborder="0" src="mensajes.html?filtro=2"></iframe></td>
        <td width="46" valign="top">&nbsp;</td>
        <td width="282" valign="top"><iframe width="282" height="390" frameborder="0" src="mensajes.html?filtro=4"></iframe></td>
      </tr>
    </table>
   </td>
  </tr>
</table>

<?php include '../core/include/website/navigation.php';?>

</body>
</html>
