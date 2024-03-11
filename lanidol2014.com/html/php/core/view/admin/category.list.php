<?php
?>
                    <table width="500" class="tblList" cellpadding="0" cellspacing="0">
                      <tr> 
                        <th width="35">&nbsp;</th>
                        <th width="400"><?php echo $MODULE->getSortingHeader("categoryName", "Nombre");?></th>
                        <th width="60"><?php echo $MODULE->getSortingHeader("estado", "Estado");?></th>
                      </tr>
    <?php
	$DAO=$MODULE->StaticDAO;//ShopCategory
	$list=$DAO::getList_Paging();
	foreach ($list as $oItem) {
	?>
                      <tr>
                        <td nowrap="nowrap"><a href="<?php echo "javascript:Edit(".$oItem->categoryID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->categoryID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
						</td>
                        <td><?php echo $oItem->categoryName; ?></td>
                        <td align="center"><?=$DAO::getActive($oItem->active);?></td>
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
