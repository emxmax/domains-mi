<script type="text/javascript" src="../core/plugins/tiny_mce/tiny_mce.js"></script>
<?php include("../core/plugins/media-picker/media-picker_loader.php");?>

<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple"
});

$(document).ready(function() {
	FileManager('imgIcon', {title: 'Seleccione una imagen', basePath: '<?php echo $userFiles["Categories"]["icon"]; ?>', fileExt: '*.jpg;*.gif;*.png'} );
});

function on_submit(xform){
	if(xform.categoryName.value ==""){
		alert("Por favor, ingrese el campo [Nombre]");
		xform.categoryName.focus();
		return false;
	}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>

                <table class="tblForm" width="500">
                      <tr>
                        <td>Nombre</td>
                        <td><input name="categoryName" type="text" class="text" id="categoryName" value="<?php echo $oItem->categoryName; ?>" size="45" maxlength="255"></td>
                      </tr>
                      <tr>
                        <td>Descripci&oacute;n</td>
                        <td><textarea class="text" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea class="text" >                        </td>
                      </tr>
                      <tr>
                        <td> Imagen (&iacute;cono)</td>
                      <td><input name="imgIcon" type="text" class="text" id="imgIcon" value="<?php echo $oItem->imgIcon; ?>"></td>
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
