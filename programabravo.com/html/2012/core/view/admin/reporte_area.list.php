<?php
require("../core/include/admin/ordering.php");
?>
<script type="text/javascript">
function Detail(gerencia){
	xform=document.forms[0];
	xform.gerencia.value=gerencia;
	xform.FormView.value="list";
	xform.moduleID.value=23;
	xform.submit();
}
</script>
<fieldset id="fldFiltro" style="text-align: right; width:590px;">
<legend accesskey="F">Filtros</legend>
<table width="100%">
    <tr> 
      <td width="253" align="right">Mundo o &aacute;rea:</td>
      <td width="275"><input name="criterio" type="text" class="text" value="<?php echo $criterio?>" size="55" maxlength="255"> </td>
      <td width="60" rowspan="2" align="right"><input name="btnSearch" type="submit" value="Buscar" class="admButton"></td>
    </tr>
    <tr>
      <td align="right">Ordenar por:</td>
      <td>
        <input type="radio" name="orden_filtro" id="orden_enviado" value="enviados DESC" <?php if($orden_filtro=="enviados DESC") echo "checked"; ?> onclick="this.form.submit()" /><label for="orden_enviado">Enviados</label>
        <input type="radio" name="orden_filtro" id="orden_recibido" value="recibidos DESC" <?php if($orden_filtro=="recibidos DESC") echo "checked"; ?> onclick="this.form.submit()" /><label for="orden_recibido">Recibidos</label>
    </td>
    </tr>
  </table>
</fieldset>
<table width="600" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="16">&nbsp;</th>
      <th width="450"><b><?php echo showHeader('gerencia','Mundo')?></b></th>
      <th width="50"><b><?php echo showHeader('enviados','Enviados')?></b></th>
      <th width="50"><b><?php echo showHeader('recibidos','Recibidos')?></b></th>
    </tr>
<?php
    $DAO=$MODULE->StaticDAO;//ShopCustomer
    $list=$DAO::getList_ReporteArea($criterio);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><a href="<? echo "javascript:Detail('".$oItem->gerencia."');"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a></td>
      <td><?php echo $oItem->gerencia; ?></td>
      <td align="right"><?php echo $oItem->enviados;?></td>
      <td align="right"><?php echo $oItem->recibidos;?></td>
    </tr>
    <?php } ?>
</table>
<table width="600">
    <tr height="30">
      <td align="left"><input type="hidden" id="gerencia" name="gerencia" value="<?php echo $gerencia;?>"></td>
      <td align="right"><?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
