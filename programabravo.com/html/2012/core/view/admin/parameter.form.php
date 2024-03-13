<?php
if(!isset($oItem->attribute['minutos'])) $oItem->attribute['minutos']=null;
?>

<script type="text/javascript">
function on_submit(xform){
	if($("#parameterName").val() ==""){
		alert("Por favor, ingrese el campo [Nombre]");
		$("#parameterName").focus();
		return false;
	}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>
                <input type="hidden" name="groupID" value="<?php echo $oItem->groupID?>">
                <input type="hidden" name="langID" value="<?php echo $oItem->langID?>">
                <table class="tblForm" width="500">
                      <tr>
                        <td>Nombre</td>
                        <td><input name="parameterName" type="text" class="text" id="parameterName" value="<?php echo $oItem->parameterName; ?>" size="45" maxlength="255"></td>
                      </tr>
					  <tr>
						<td>Descripción</td>
						<td><textarea name="description" id="description" cols="60" rows="4"><?php echo $oItem->description; ?></textarea></td>
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
