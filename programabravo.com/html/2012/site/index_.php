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
<link href="<?php echo $URL_BASE;?>styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondoprograma.jpg">
  <tr>
    <td height="70" align="right" valign="top"><img src="<?php echo $URL_BASE;?>images/menutop01.jpg" width="188" height="70" usemap="#Map" border="0" /></td>
  </tr>
  <tr>
    <td height="120" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="448" valign="top"><table width="448" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="410">&nbsp;</td>
          </tr>
          <tr>
            <td><table width="448" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="34" valign="top">&nbsp;</td>
                <td valign="top"><a href="mailto:comunicalp@lan.com"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="154" height="26" border="0" /></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td valign="top"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="501" height="496" usemap="#Map2" border="0" /></td>
      </tr>
    </table></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="136,10,174,66" href="<?php echo $URL_BASE;?>salir.html" /><area shape="rect" coords="91,10,129,66" href="javascript:history.forward()" /><area shape="rect" coords="50,10,88,66" href="javascript:history.back()" />
</map>

<map name="Map2" id="Map2">
  <area shape="poly" coords="19,336,65,286,128,308,121,198,157,151,157,88,100,53,23,145,3,249" href="<?php echo $URL_BASE;?>pro_tiempodeservicio.html" />
  <area shape="poly" coords="101,48,159,79,161,139,318,131,377,110,394,48,306,8,186,9" href="<?php echo $URL_BASE;?>pro_bravoteam.html" />
  <area shape="poly" coords="270,382,231,432,270,492,172,482,57,404,23,344,67,293,129,311,185,369" href="<?php echo $URL_BASE;?>pro_espiritudeservicio.html" />
  <area shape="poly" coords="384,285,415,343,484,332,441,409,379,462,278,492,236,438,272,385,334,362,368,321" href="<?php echo $URL_BASE;?>pro_actitudlan.html" />
  <area shape="poly" coords="328,135,388,114,402,54,472,129,489,183,489,320,419,339,388,282,386,229,361,163" href="<?php echo $URL_BASE;?>pro_accionesexcepcionales.html" />
</map>
</body>
</html>
