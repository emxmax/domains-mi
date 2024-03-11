<script type="text/javascript">
function on_submit(xform){

	xform.kID.value=xform.userID.value;
	
	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>
				<input type="hidden" name="formID" value="<?php echo $oItem->formID;?>" />
                <table class="tblForm" width="500">
                      <tr>
                        <td>Usuario</td>
                        <td><?php if($MODULE->FormView=='add'){ ?>
						<select name="userID" id="userID" style="width:320px">
                        <?php
						$list=AdmUser::getList_Notify($userAdmin["clientID"], $oItem->formID);
						foreach ($list as $obj) {
							if(!isset($oItem->userID)) $oItem->userID=$obj->userID;
							echo "<option value=\"".$obj->userID."\"";
							if($obj->userID==$oItem->userID) echo " selected";
							echo ">".$obj->firstName." ".$obj->lastName." (".$obj->email.")</option>";
						}
						?>
                        </select>
						<?php }
						else {?>
                        	<input type="hidden" name="userID" id="userID" value="<?php echo $oItem->userID;?>" />
							<?php echo $oItem->firstName. " ". $oItem->lastName." (".$obj->email.")"; ?>
						<?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Correos adicionales</td>
                        <td><textarea name="recipients" id="recipients" cols="45" rows="4"><?php echo $oItem->recipients; ?></textarea></td>
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
