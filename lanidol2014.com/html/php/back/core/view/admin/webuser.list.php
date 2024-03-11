<?php
?>
					<table width="500" class="tblList" cellpadding="0" cellspacing="0">
                      <tr> 
                        <th width="35">&nbsp;</th>
                        <th width="200"><?php echo $MODULE->getSortingHeader("firstName", "Nombre");?></th>
                        <th width="70"><?php echo $MODULE->getSortingHeader("userName", "Usuario");?></th>
                        <th width="120"><?php echo $MODULE->getSortingHeader("profileName", "Perfil");?></th>
                        <th width="60"><?php echo $MODULE->getSortingHeader("state", "Estado");?></th>
                      </tr>
	<?php
	$DAO=$MODULE->StaticDAO;//CrmUser
	$lCrmUser=$DAO::getList_Paging($MODULE->UsrSession["clientID"]);

	foreach ($lCrmUser as $oItem) {
	?>
                      <tr> 
                        <td nowrap="nowrap"><a href="<?php echo "javascript:Edit(".$oItem->userID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->userID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
						</td>
                        <td><?php echo $oItem->firstName." ".$oItem->lastName; ?></td>
                        <td><?php echo $oItem->userName; ?></td>
                        <td><?php echo $oItem->profileName; ?></td>
                        <td align="center"><?php echo $DAO::getState($oItem->state);?></td>
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
