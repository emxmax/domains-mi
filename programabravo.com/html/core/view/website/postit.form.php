<?php

?>
<script type="text/javascript">
var info;
	$(document).ready(function(){
		xform="#frmContent";
		prepareForm(xform);
	    $('#mensaje').limit('180');
		$('#empleado').simpleAutoComplete('../core/ajax/empleado.php?cmd=empleado',{
			autoCompleteClassName: 'autocomplete',
			selectedClassName: 'sel',
			attrCallBack: 'rel',
			identifier: 'personaID'
			},estadoCallback);
		
	    $('#lnkSubmit').click(function(){
			if(isValidate(xform) && $("#destinoID").val()!=""){
					$("#cmd").val("insert");
					$("#frmContent").submit();
				}
			else
				showError("Debes ingresar todos los datos requeridos!");
		});
		
		function estadoCallback( par )
		{
			$("#destinoID").val( par[0] );
			$("#mundo").val( par[1] );
		}
	});
</script>
<input type="hidden" name="destinoID" id="destinoID" />
<input type="hidden" name="typeID" id="typeID" value="<?php echo $oItem->typeID;?>" />
<table width="842" height="597" border="0" align="center" cellpadding="0" cellspacing="0" background="images/fondotabla.png">
  <tr>
    <td valign="top"><div class="reconoce">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="134" valign="top"><a href="logoff.php"><img src="images/space.png" width="137" height="57" border="0" /></a></td>
        </tr>
        <tr>
          <td height="301" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="527" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="175" valign="top">&nbsp;</td>
                  <td width="352" valign="top"><div class="reconoce<?php echo $oItem->typeID;?>">
                    <table width="352" height="301" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="60" valign="top"><a href="http://www.espiritudeservicio.com/content/index.php?module=postit&formView=type"><img src="images/space.png" width="240" height="50" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="295" valign="top"><table border="0" cellspacing="0" cellpadding="2" width="295">
                          <tr>
                            <td width="80" align="right" class="letra11negro">Para:&nbsp;</td>
                            <td><input name="empleado" type="text" class="formblanco2 required" id="empleado" /></td>
                            </tr>
                          <tr>
                            <td align="right" class="letra11negro">Mundo:&nbsp;</td>
                            <td><input name="mundo" type="text" readonly="readonly" class="formblanco2" id="mundo" /></td>
                            </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td><textarea name="mensaje" class="formtransparente required" id="mensaje"></textarea></td>
                            </tr>
                          <tr>
                            <td align="right" class="letra11negro">De:&nbsp;</td>
                            <td><input name="usuario" type="text" class="formblanco2" id="usuario" value="<?php echo $nombreCompleto;?>" readonly="readonly" /></td>
                            </tr>
                          </table>
                          <table width="295" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="120">&nbsp;</td>
                                  <td align="left"><a id="lnkSubmit" href="javascript:;"><img src="images/publicar.png" width="91" height="16" border="0" /></a></td>
                                </tr>
                              </table></td>
                              </tr>
                            </table></td>
                        <td valign="top">&nbsp;</td>
                        </tr>
                      </table></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table></td>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="22" valign="top"></td>
                </tr>
                <tr>
                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="19" valign="top">&nbsp;</td>
                      <td valign="top" class="letra24blanco">Hola <?php echo $nombreUsuario;?></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          
          </td>
        </tr>
        <tr>
          <td height="51" valign="top"><a href="index.php?module=postit&formView=type"><img src="images/space.png" width="240" height="50" border="0" /></a></td>
        </tr>
        <tr>
          <td height="111" valign="top">
          <?php include("../core/include/website/search.php");?>
          </td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

