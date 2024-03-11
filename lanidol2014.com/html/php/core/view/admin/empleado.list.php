<?php

?>
				<fieldset id="fldFiltro" style="text-align: right; width:490px;">
					<legend accesskey="F">Filtros</legend>
				
					<table width="100%">
                      <tr> 
                        <td width="253" align="right">Nombres / Apellidos:</td>
                        <td width="175"><input name="criterio" type="text" class="text" value="<?php echo $criterio?>" size="30" maxlength="255"> </td>
						<td width="60" align="right"><input name="btnSearch" type="submit" value="Search" class="admButton"></td>
					  </tr>
					</table>
				</fieldset>
				
                <table width="500" class="tblList" cellpadding="0" cellspacing="0">
                      <tr> 
                        <th width="42">&nbsp;</th>
                        <th width="50"><b><?php echo $MODULE->getSortingHeader('dni', 'DNI')?></b></th>
                        <th width="120"><b><?php echo $MODULE->getSortingHeader('nombres','Nombres')?></b></th>
                        <th width="80"><b><?php echo $MODULE->getSortingHeader('apellido1','Apellido P.')?></b></th>
                        <th width="80"><b><?php echo $MODULE->getSortingHeader('apellido2','Apellido M.')?></b></th>
                        <th width="60"><b><?php echo $MODULE->getSortingHeader('estado','Estado')?></b></th>
                      </tr>
    <?php
	$DAO=$MODULE->StaticDAO;//ShopCustomer
	$list=$DAO::getList_Paging($criterio);
	foreach ($list as $oItem) {
	?>
                      <tr>
                        <td><a href="<?php echo "javascript:Edit(".$oItem->personaID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->personaID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
						</td>
                        <td><?php echo $oItem->dni; ?></td>
                        <td><?php echo $oItem->nombres; ?></td>
                        <td><?php echo $oItem->apellido1; ?></td>
                        <td><?php echo $oItem->apellido2; ?></td>
                        <td align="center"><?php echo $DAO::getEstado($oItem->estado);?></td>
                      </tr>
                      <?php } ?>
                </table>
                <table width="500">
					<tr height="30">
                        <td align="left">
                          <input type="button" class="admButton" value="nuevo ítem" name="btnNew" onClick="addNew(this.form)">
						  <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
						<td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
					</tr>
                </table>
