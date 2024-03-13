<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");

$usrSession = WebLogin::getUserSession();
$personaID=$usrSession["personaID"];
$oEmpleado  = CrmEmpleado::getItem($personaID);
if($oEmpleado->codigoBP==$oEmpleado->clave){
    header('location: cambiarclave.php');
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>
</head>
<body>
<table width="1022" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" background="<?php echo $URL_BASE;?>images/parte01.png" height="152" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top">
            <img src="<?php echo $URL_BASE;?>images/space.png" width="734" height="152" usemap="#Map" border="0" />
        </td>
        <td width="288" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="108" valign="top"><table width="288" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="24"><table width="288" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="166" align="right" valign="middle">Hola <?php echo $nombreUsuario;?></td>
                    <td><a href="<?php echo $URL_BASE;?>salir.html"><img src="<?php echo $URL_BASE;?>images/space.png" width="111" height="23" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                 <td valign="top"><img src="<?php echo $URL_BASE;?>images/space.png" width="252" height="54" usemap="#Map5" border="0" />
                  </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><?php include '../core/include/website/search.php';?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?php echo $URL_BASE;?>images/principal.png" width="1022" height="613" usemap="#MapHome" border="0" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<map name="MapHome" id="Map2">
  <area shape="rect" coords="488,570,647,587" href="comunicalp@lan.com" />
  <area shape="poly" coords="58,255,195,257,247,378,205,503,58,501" href="<?php echo $URL_BASE;?>bravoteam.html" />
  <area shape="poly" coords="216,256,377,257,432,377,391,501,228,504,269,378" href="<?php echo $URL_BASE;?>accionesexcepcionales.html" />
  <area shape="poly" coords="399,255,573,255,626,379,587,501,413,502,454,381" href="<?php echo $URL_BASE;?>actitudlan.html" />
  <area shape="poly" coords="594,256,758,256,810,379,771,501,607,503,648,379" href="<?php echo $URL_BASE;?>espiritudeservicio.html" />
  <area shape="poly" coords="779,257,968,255,968,501,791,504,834,378" href="<?php echo $URL_BASE;?>tiempodeservicios.html" />
</map>
<?php include '../core/include/website/navigation.php';?>
<?php include '../core/include/website/footer.php';?>
</body>
</html>