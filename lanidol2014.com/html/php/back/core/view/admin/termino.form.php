<?php
$ctlEdit="<input type='text' name='terminoName' id='terminoName' size='95' value='".$oItem->terminoName."' />";
switch($oItem->inputType){
case 1:
	$ctlEdit="<input type='text' name='terminoName' id='terminoName' size='95' value='".$oItem->terminoName."' />";
	break;
case 2:
	$ctlEdit="<textarea name='terminoName' id='terminoName' rows='4' cols='95'>".$oItem->terminoName."</textarea>";
	break;
case 3:
	$ctlEdit="<input type='text' name='terminoName' id='terminoName' size='25' value='".$oItem->terminoName."' />
	<script type=\"text/javascript\">$(document).ready(function() { FileManager('terminoName', {title: 'Seleccione una imagen', basePath: '".$userFiles["Denuncia"]["imagen"]."', fileExt: '*.jpg;*.gif;*.png'} );});</script>";
	break;
}

?>
<?php include("../core/plugins/media-picker/media-picker_loader.php");?>
<script type="text/javascript">
function on_submit(xform){
	if($("#terminoName").val() ==""){
		alert("Por favor, ingrese el campo [Nombre]");
		$("#terminoName").focus();
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
                        <td><?php echo $ctlEdit;?></td>
                      </tr>
                      <tr> 
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2"><input type="button" class="admButton" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
						<input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
                      </tr>
                </table>
