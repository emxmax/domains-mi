<?php
session_start();
date_default_timezone_set('America/Lima');
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");
require_once("../core/class/util/phpmailer/class.phpmailer.php");

$oItem = new eCrmPostIt();

$oItem->postitID    =(isset($_REQUEST["postitID"])) ? intval($_REQUEST["postitID"]) : NULL;
$oItem->typeID      =(isset($_REQUEST["typeID"])) ? intval($_REQUEST["typeID"]) : NULL;
$oItem->origenID    =$usrSession["personaID"];
$oItem->destinoID   =(isset($_REQUEST["destinoID"])) ? intval($_REQUEST["destinoID"]) : NULL;
$oItem->mensaje     =(isset($_REQUEST["mensaje"])) ? $_REQUEST["mensaje"] : NULL;

if($Command=="addnew"){

    $oItem->votos       =0;
    $oItem->estado      =1;
    
    if(CrmPostIt::AddNew($oItem)){

		Email::Send_PostIt($oItem);

        header("location: recientes.html?postitID=".$oItem->postitID);		
        exit;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>
<script type="text/javascript">
var info;
$(function(){
    xform="#frmContent";
    prepareForm(xform);
    $('#mensaje').limit('180');
    $('#empleado').simpleAutoComplete('../ajax/empleado.php?cmd=empleado',{
        autoCompleteClassName: 'autocomplete',
        selectedClassName: 'sel',
        attrCallBack: 'rel',
        identifier: 'personaID'
    },estadoCallback);

    $('#lnkSubmit').click(function(){
        if(isValidate(xform) && $("#destinoID").val()!=""){
            $("#cmd").val("addnew");
            $("#frmContent").submit();
        }
        else
            ShowAlert("Debes ingresar todos los datos requeridos!");
    });

    function estadoCallback( par )
    {
        $("#destinoID").val( par[0] );
        $("#mundo").val( par[1] );
    }
});
</script>
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
    <td><table width="1022" height="259" border="0" cellspacing="0" cellpadding="0" background="<?php echo $URL_BASE;?>images/parte02.png">
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
        <td valign="top" background="<?php echo $URL_BASE;?>images/parte03d<?php echo $oItem->typeID-6;?>.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="124">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="325">&nbsp;</td>
                <td>
                <form method="post" id="frmContent" class="valid-form">
                    <input type="hidden" id="postitID" name="postitID" />
                    <input type="hidden" name="cmd" id="cmd" />
                    <input type="hidden" name="destinoID" id="destinoID" />
                    <input type="hidden" name="typeID" id="typeID" value="<?php echo $oItem->typeID;?>" />
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="29" valign="top">
                        <input name="empleado" type="text" class="required" id="empleado" style="width:210px;" />
                    </td>
                  </tr>
                  <tr>
                    <td height="27" valign="top">
                        <input name="mundo" type="text" class="required" id="mundo" readonly="true" style="width:210px;" />
                    </td>
                  </tr>
                  <tr>
                    <td height="77" valign="top">
                        <textarea name="mensaje" id="mensaje" maxlength="250" cols="45" rows="5" class="required"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td height="29" valign="top">
                        <input name="usuario" type="text" class="required" id="usuario" value="<?php echo $nombreCompleto;?>" readonly="readonly" style="width:210px;" />
                    </td>
                  </tr>
                  <tr>
                    <td height="30" valign="top">
                        <input name="mundoUsuario" type="text" class="required" id="mundoUsuario" value="<?php echo $mundoUsuario;?>" readonly="readonly" style="width:210px;" />
                    </td>
                  </tr>
                  <tr>
                    <td height="39" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="113" valign="top">&nbsp;</td>
                        <td valign="top">
                            <a id="lnkSubmit" href="javascript:;"><img src="<?php echo $URL_BASE;?>images/space.png" width="107" height="23" border="0" /></a>
                        </td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table>
                </form>
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top"><img src="<?php echo $URL_BASE;?>images/space.png" width="565" height="83" usemap="#Map3" border="0" /></td>
          </tr>
        </table></td>
        <td width="431"><img src="<?php echo $URL_BASE;?>images/parte04d.png" width="431" height="536" usemap="#Map2" border="0" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include '../core/include/website/navigation.php';?>
<?php include '../core/include/website/footer.php';?>
</body>
</html>
