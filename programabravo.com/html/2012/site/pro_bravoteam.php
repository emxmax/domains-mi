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

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<script type="text/javascript" src="fancybox/myfancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondobravoteam.jpg">
  <tr>
    <td height="70" align="right" valign="top"><img src="<?php echo $URL_BASE;?>images/menutop.jpg" width="188" height="70" usemap="#Map" border="0" /></td>
  </tr>
  <tr>
    <td height="430" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="70" valign="top">&nbsp;</td>
        <td valign="top"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="178" height="158" usemap="#Map3" border="0" /></td>
      </tr>
    </table></td>
  </tr>
</table>

<?php include '../core/include/website/navigation.php';?>

<map name="Map3" id="Map3"><area shape="rect" coords="2,1,175,63" id="various5" href="animaciones/Bravo2.html" />
  <area shape="rect" coords="2,89,175,156" href="archivos/bravoteam.pdf" target="_blank" />
</map>
</body>
</html>
