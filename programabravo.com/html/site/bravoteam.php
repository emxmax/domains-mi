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
    <td><table width="1022" height="259" border="0" cellspacing="0" cellpadding="0" background="<?php echo $URL_BASE;?>images/parte08.png">
      <tr>
        <td width="847" valign="top">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="206">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><a href="http://smallseotools.com/visitor-hit-counter/" target="_blank" title="Visitor Counter">
<img src="http://smallseotools.com/visitor-counter/counter.php?code=436c26abd464041efd354bc550f76482&style=0004&pad=9&type=ip&initCount=25328"title="Visitor Counter" Alt="Visitor Counter" border="0">
</a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="1022" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" background="<?php echo $URL_BASE;?>images/parte07a.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="78">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="96">&nbsp;</td>
                <td><embed src="animaciones/Bravo2.swf" width="475" height="264"></embed></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top"><img src="<?php echo $URL_BASE;?>images/space.png" width="565" height="83" usemap="#Map3" border="0" /></td>
          </tr>
        </table></td>
        <td width="431"><img src="<?php echo $URL_BASE;?>images/parte04a.png" width="431" height="536" usemap="#Map2" border="0" /></td>
      </tr>
    </table></td>
  </tr>
</table>
    <?php include '../core/include/website/navigation.php';?>
    <?php include '../core/include/website/footer.php';?>
</body>
</html>
