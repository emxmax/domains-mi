<table width="1024" height="768" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $URL_BASE;?>images/fondohome.jpg">
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
                  <td><input name="dni" type="text" class="defaultInputValue required" id="dni" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #757575; border: 1px solid #cccccc; height: 28px; width:264px; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; padding-right: 6px; padding-left: 6px;" title="Tu número de DNI" /></td>
                </tr>
                <tr>
                  <td height="6"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><input name="clave" type="text" class="defaultInputValue required" id="clave" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #757575; border: 1px solid #cccccc; height: 28px; width:152px; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; padding-right: 6px; padding-left: 6px;" title="4 últimos dígitos de tu DNI" /></td>
                      <td width="5"></td>
                      <td><a href="#" id="lnkSubmit"><img src="<?php echo $URL_BASE;?>images/enviar.gif" width="106" height="30" /></a></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="4" class="arial11"></td>
                </tr>
                <tr>
                  <td class="arial11">Si eres administrador, <a href="#" class="arial11">haz click aquí</a></td>
                </tr>
              </table></td>
            </tr>
          </table></form></td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmLogin").submit(function(){
        if($('#dni').val()==$('#dni').attr('title') || $('#clave').val()==$('#clave').attr('title')){
            alert("Debes ingresar todos los datos requeridos!");
            return false;
        }else
            return true;
    });
    $("#lnkSubmit").click(function(){
        return $("#frmLogin").submit();
    });
    $("#clave").keydown(function(event){
      if ( event.which == 13 ) {
            return $("#frmLogin").submit();
       }
    });
});
</script>