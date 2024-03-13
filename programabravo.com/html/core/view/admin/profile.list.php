<?php
?>
					<table width="500" class="tblList" cellpadding="0" cellspacing="0">
                      <tr> 
                        <th width="35">&nbsp;</th>
                        <th width="365"><?php echo $MODULE->getSortingHeader("profileName", "Perfil");?></th>
                        <th width="100"><?php echo $MODULE->getSortingHeader("isDefault", "Predeterminado");?></th>
                      </tr>
	<?php
	$DAO=$MODULE->StaticDAO;//AdmProfile
	$lAdmProfile=$DAO::getList_Paging($userAdmin["clientID"]);

	foreach ($lAdmProfile as $oItem){
	?>
                      <tr> 
                        <td nowrap="nowrap"><?php if($oItem->isDefault==0){ ?>
                        	<a href="<?php echo "javascript:Edit(".$oItem->profileID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->profileID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
                        <?php } else {?>
	                        <a href="<?php echo "javascript:View(".$oItem->profileID.");"; ?>"><img title="Visualizar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                        <?php } ?>
						</td>
                        <td><?php echo $oItem->profileName; ?></td>
                        <td align="center"><input type="checkbox" disabled="disabled" <?php if($oItem->isDefault==1) echo "checked";?> /></td>
                      </tr>
	<?php } ?>
                    </table>
					<table width="500">
					  <tr height="30"> 
						<td align="left">
						  <input type="button" class="admButton" value="nuevo ítem" name="btnNew" onClick="addNew(this.form)"></td>
						  <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
					  </tr>
					</table>
