<?php
?>
                    <table width="500" class="tblList" cellpadding="0" cellspacing="0">
                      <tr> 
                        <th width="35">&nbsp;</th>
                        <th width="280"><?php echo $MODULE->getSortingHeader("minisiteName", "Nombre");?></th>
                        <th width="100"><?php echo $MODULE->getSortingHeader("isDefault", "Predeterminado");?></th>
                        <th width="60"><?php echo $MODULE->getSortingHeader("active", "Activo");?></th>
                      </tr>
    <?php $DAO=$MODULE->StaticDAO;//CmsMinisite
	$list=$DAO::getList_Paging();
	foreach ($list as $oItem) {
	?>
                      <tr>
                        <td nowrap="nowrap"><?php if($oItem->isDefault==0){ ?>
                        	<a href="<?php echo "javascript:Edit(".$oItem->minisiteID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->minisiteID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
                        <?php } else {?>
	                        <a href="<?php echo "javascript:View(".$oItem->minisiteID.");"; ?>"><img title="Visualizar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                        <?php } ?>
						</td>
                        <td><?php echo $oItem->minisiteName; ?></td>
                        <td align="center"><input type="checkbox" disabled="disabled" <?php if($oItem->isDefault==1) echo "checked";?> /></td>
                        <td align="center"><input type="checkbox" disabled="disabled" <?php if($oItem->active==1) echo "checked";?> /></td>
                      </tr>
                      <?php } ?>
                    </table>
                    <table width="500">
                      <tr height="30"> 
                        <td align="left">
                          <input type="button" class="admButton" value="nuevo ítem" name="btnNew" onClick="addNew(this.form)"></td>
                          <td align="right">&nbsp;<?php echo $MODULE->getPaging($DAO);?></td>
                      </tr>
                    </table>
