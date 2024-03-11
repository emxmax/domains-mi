<?php
$lLang=CmsLang::getList_Active();
if(CmsLang::getErrorMsg()!="") $MODULE->addError(CmsLang::getErrorMsg());
?>
                    <input type="hidden" name="groupID" value="<?php echo $groupID?>">

                    <fieldset id="fldFiltro" style="text-align: right; width:490px;">
                        <legend accesskey="F">Filtros</legend>
                        <table width="100%">
                          <tr> 
                            <td align="right" width="130">Idioma: 
                                <select name="langID" onChange="this.form.submit();">
                            <?php
                            foreach ($lLang as $obj) {
                                if(!isset($oItem->langID)) $oItem->langID=$obj->langID;
                                echo "<option value=\"$obj->langID\"";
                                if($obj->langID==$oItem->langID) print " selected";
                                echo ">$obj->alias</option>";
                            }
                            ?>
                                </select>
                             </td>
                          </tr>
                        </table>
                    </fieldset>
                    
                    <table width="500" class="tblList" cellpadding="0" cellspacing="0">
                      <tr> 
                        <th width="35">&nbsp;</th>
                        <th width="390"><?php echo $MODULE->getSortingHeader("parameterName", "Nombre");?></th>
                        <th width="60"><?php echo $MODULE->getSortingHeader("active", "Estado");?></th>
                      </tr>
<?php

	$DAO=$MODULE->StaticDAO;//CmsParameterLang
	$list=$DAO::getList_Paging($groupID, $langID);
	foreach ($list as $oItem) {
	?>
                      <tr>
                        <td nowrap="nowrap"><a href="<?php echo "javascript:Edit(".$oItem->parameterID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->parameterID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
						</td>
                        <td><?php echo $oItem->parameterName; ?></td>
                        <td align="center"><?php echo $DAO::getActive($oItem->active);?></td>
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
