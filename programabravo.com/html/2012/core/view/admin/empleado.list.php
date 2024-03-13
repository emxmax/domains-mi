<?php
require("../core/include/admin/ordering.php");
?>
<fieldset id="fldFiltro" style="text-align: right; width:590px;">
    <legend accesskey="F">Filtros</legend>
    <table width="100%">
      <tr> 
        <td width="253" align="right">Nombres / Apellidos:</td>
        <td width="175"><input name="criterio" type="text" class="text" value="<?php echo $criterio?>" size="30" maxlength="255"> </td>
        <td width="60" align="right"><input name="btnSearch" type="submit" value="Search" class="admButton"></td>
      </tr>
    </table>
</fieldset>

<table width="600" class="tblList" cellpadding="0" cellspacing="0">
      <tr> 
        <th width="50">&nbsp;</th>
        <th width="50"><b><?php echo showHeader('dni', 'DNI')?></b></th>
        <th width="190"><b><?php echo showHeader('nombres','Nombres')?></b></th>
        <th width="120"><b><?php echo showHeader('apellido1','Apellido P.')?></b></th>
        <th width="120"><b><?php echo showHeader('apellido2','Apellido M.')?></b></th>
        <th width="60"><b><?php echo showHeader('estado','Estado')?></b></th>
      </tr>
<?php
    $DAO=$MODULE->StaticDAO;//ShopCustomer
    $list=$DAO::getList_Paging($criterio);
    foreach ($list as $oItem) {
    ?>
        <tr>
          <td><a href="<? echo "javascript:Edit(".$oItem->personaID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
              <a href="<? echo "javascript:Delete(".$oItem->personaID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
          </td>
          <td><?php echo $oItem->dni; ?></td>
          <td><?php echo $oItem->nombres; ?></td>
          <td><?php echo $oItem->apellido1; ?></td>
          <td><?php echo $oItem->apellido2; ?></td>
          <td align="center"><?php echo $DAO::getEstado($oItem->estado);?></td>
        </tr>
<?php } ?>
  </table>
  <table width="600">
      <tr height="30">
          <td align="left">
              <input type="button" class="admButton" value="nuevo &iacute;tem" name="btnNew" onClick="addNew(this.form)">
              <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
          <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
      </tr>
  </table>
