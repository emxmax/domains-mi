<?php
?>
<script type="text/javascript">
function ViewModal(id){
	url=document.forms[0].action+"&kID="+id+"&FormView=edit&callback=true";
	$('#divViewForm').modal({overlayClose:true, persist:true});

	$.ajax({
		url: url,
		success: function(data) {
			$('#divViewForm').html('<div class="subtitulo"><?php echo $MODULE->moduleName.": Detalle";?></div>'+data);
		}
	});
}
</script>
<style type="text/css">
.trPendiente td{ font-weight:bold;}
</style>
				<fieldset id="fldFiltro" style="text-align: right; width:590px;">
					<legend accesskey="F">Filtros</legend>
				
					<table width="100%">
                      <tr>
                        <td width="260">Formulario:</td>
                        <td width="180">Nombres / Apellidos / Email:</td>
						<td width="50" rowspan="2" valign="bottom" align="right"><input name="btnSearch" type="submit" value="Buscar" class="admButton"></td>
					  </tr>
                      <tr>
                        <td><select name="formID" onChange="this.form.submit();" style="width:250px">
                        <?php
						$list=CrmForm::getList();
						foreach ($list as $obj) {
							if(!isset($oItem->formID)) $oItem->formID=$obj->formID;
							echo "<option value=\"".$obj->formID."\"";
							if($obj->formID==$oItem->formID) echo " selected";
							echo ">".$obj->formName."</option>";
						}
						?>
                            </select></td>
                        <td><input name="txtsearch" type="text" class="text" value="<?php echo $txtsearch?>" size="40" maxlength="255"> </td>
					  </tr>
					</table>
				</fieldset>
				
                <table width="600" class="tblList" cellpadding="0" cellspacing="0">
                      <tr>
                        <th width="35">&nbsp;</th>
                        <th width="120"><?php echo $MODULE->getSortingHeader("registerDate", "Fecha");?></th>
                        <th width="120"><?php echo $MODULE->getSortingHeader("name", "Nombre");?></th>
                        <th width="120"><?php echo $MODULE->getSortingHeader("lastname", "Apellido P.");?></th>
                        <th width="120"><?php echo $MODULE->getSortingHeader("surname", "Apellido M.");?></th>
                        <th width="60"><?php echo $MODULE->getSortingHeader("state", "Estado");?></th>
                      </tr>
    <?php $DAO=$MODULE->StaticDAO; //CrmRegisterForm
	$list=$DAO::getList_Paging($oItem->formID, $txtsearch);
	foreach ($list as $oItem){
	?>
                      <tr class="<?php echo ($oItem->state==2)?'trPendiente': ''; ?>">
                        <td nowrap="nowrap"><a href="<?php echo "javascript:ViewModal(".$oItem->registerID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                            <a href="<?php echo "javascript:Delete(".$oItem->registerID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
						</td>
                        <td><?php echo $oItem->registerDate; ?></td>
                        <td><?php echo $oItem->name; ?></td>
                        <td><?php echo $oItem->lastname; ?></td>
                        <td><?php echo $oItem->surname; ?></td>
                        <td align="center"><?php echo $DAO::getState($oItem->state);?></td>
                      </tr>
                      <?php } ?>
                </table>
                <div id="divViewForm" style="display:none; height:400px; width:450px;">
                <img src="../core/assets/admin/images/i_loading.gif" align="absbottom" /> Cargando...
                </div>
                
                <table width="500">
					<tr height="30">
                        <td align="left">
						  <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
						<td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
					</tr>
                </table>
