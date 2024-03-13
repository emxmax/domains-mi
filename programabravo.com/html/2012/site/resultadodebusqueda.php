<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");

$filtro     = isset($_REQUEST['filtro'])? intval($_REQUEST['filtro']): NULL;
$criterio   = isset($_REQUEST['criterio'])? $_REQUEST['criterio']: NULL;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>
</head>

<body>
<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondoquedicendemi.jpg">
  <tr>
    <td height="70" align="right" valign="top"><img src="<?php echo $URL_BASE;?>images/menutop.jpg" width="188" height="70" usemap="#Map" border="0" /></td>
  </tr>
  <tr>
    <td height="20" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="493" valign="top"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="439" valign="top">&nbsp;</td>
        <td width="282" valign="top"><iframe width="489" height="493" frameborder="0" src="mensajes.html?filtro=<?php echo $filtro;?>&criterio=<?php echo $criterio;?>"></iframe></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="426" valign="top">&nbsp;</td>
        <td width="598" valign="top"><table width="514" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="85"><table width="514" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="197"><form id="frmSearch" name="frmSearch" method="post" action="resultadodebusqueda.html">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="38"></td>
                      <td width="123"><input name="criterio" id="criterio" type="text" class="text defaultInputValue" title="ingrésalo aquí" /></td>
                      <td width="37"><a href="javascript:;" id="lnkSearch"><img src="<?php echo $URL_BASE;?>images/espacio.gif" border="0" width="37" height="25" /></a></td>
                    </tr>
                  </table>
                </form></td>
                <td><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="264" height="25" usemap="#Map2" border="0" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="70"><img src="<?php echo $URL_BASE;?>images/espacio.gif" width="512" height="70" usemap="#Map3" border="0" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<map name="Map2" id="Map2">
  <area shape="rect" coords="94,2,258,24" href="reconocimiento.html" />
</map>
<map name="Map3" id="Map3">
  <area shape="rect" coords="297,19,504,54" href="mailto:sugerencias@programabravo.com" />
  <area shape="rect" coords="3,26,218,49" href="mailto:soporte@programabravo.com" />
</map>
<?php include '../core/include/website/navigation.php';?>
</body>
</html>
