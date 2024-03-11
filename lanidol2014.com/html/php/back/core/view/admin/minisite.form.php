<script type="text/javascript">
function on_submit(xform){
	if(xform.minisiteName.value ==""){
		alert("Por favor, ingrese el campo [Nombre]");
		xform.minisiteName.focus();
		return false;
	}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>

                <table class="tblForm" width="500">
                      <tr>
                        <td>Código</td>
                        <td><input name="minisiteCode" type="text" class="text" id="minisiteCode" value="<?php echo $oItem->minisiteCode; ?>" size="25" maxlength="50"><br />
                        (país, agencia, subdominio, etc.)</td>
                      </tr>
                      <tr>
                        <td>Nombre</td>
                        <td><input name="minisiteName" type="text" class="text" id="minisiteName" value="<?php echo $oItem->minisiteName; ?>" size="45" maxlength="50"></td>
                      </tr>
                      <tr>
                        <td>Dominio</td>
                        <td><input name="domain" type="text" class="text" id="domain" value="<?php echo $oItem->domain; ?>" size="45" maxlength="50"><br />
                        (www.sudominio.com, minisite.sudominio.com, etc.)</td>
                      </tr>
                      <tr> 
                        <td>Estado</td>
                        <td><input type="checkbox" name="active" value="1" <?php if($oItem->active==1) print "checked";?>> Activo</td>
                      </tr>
                      <tr> 
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2"><input type="button" class="admButton" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
                          <input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
                      </tr>
                    </table>
