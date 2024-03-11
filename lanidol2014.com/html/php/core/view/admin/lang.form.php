<script type="text/javascript">
function on_submit(xform){
	if(xform.langName.value ==""){
		alert("Por favor, ingrese el campo [Nombre]");
		xform.langName.focus();
		return false;
	}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>

<table class="tblForm" width="500">
      <tr>
        <td>C&oacute;digo</td>
        <td><input name="langCode" type="text" class="text" id="langCode" value="<?php echo $oItem->langCode; ?>" size="10" maxlength="50">
        (ES, EN, ES-PE, etc.)</td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><input name="langName" type="text" class="text" id="langName" value="<?php echo $oItem->langName; ?>" size="45" maxlength="50"></td>
      </tr>
      <tr>
        <td>Alias</td>
        <td><input name="alias" type="text" class="text" id="alias" value="<?php echo $oItem->alias; ?>" size="45" maxlength="50"><br />
            (descripci&oacute;n en el mismo idioma)</td>
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
