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
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondoreconocimiento_01.jpg">
  <tr>
    <td height="70" align="right" valign="top"><img src="<?php echo $URL_BASE;?>images/menutop.jpg" width="188" height="70" usemap="#Map" border="0" /></td>
  </tr>
  <tr>
    <td valign="top"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="1003" height="688" usemap="#Map3" border="0" />
      <map name="Map3" id="Map3">
      <area shape="rect" coords="36,393,289,525" href="ultimoscomentarios.html" />
          <area shape="circle" coords="627,79,59" href="reconocer.html?typeID=7" />
          <area shape="circle" coords="777,79,59" href="reconocer.html?typeID=8" />
          <area shape="circle" coords="927,79,59" href="reconocer.html?typeID=9" />
          <area shape="circle" coords="627,224,59" href="reconocer.html?typeID=10" />
          <area shape="circle" coords="777,224,59" href="reconocer.html?typeID=11" />
          <area shape="circle" coords="927,224,59" href="reconocer.html?typeID=12" />
          <area shape="circle" coords="626,368,59" href="reconocer.html?typeID=13" />
          <area shape="circle" coords="776,368,59" href="reconocer.html?typeID=14" />
          <area shape="circle" coords="926,368,59" href="reconocer.html?typeID=15" />
          <area shape="rect" coords="40,295,358,357" href="top10.html" />
    </map></td>
  </tr>
</table>

<?php include '../core/include/website/navigation.php';?>

</body>
</html>
