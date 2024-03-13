<?php
$gerencia=isset($_REQUEST['gerencia']) ? $_REQUEST['gerencia']: NULL;
require("../core/include/admin/ordering.php");
?>
    <fieldset id="fldFiltro" style="text-align: right; width:590px;">
        <legend accesskey="F">Filtros</legend>
        <table width="100%">
          <tr> 
            <td width="253" align="right">Nombres / Apellidos:</td>
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
      <th width="50"><b><?php echo showHeader('dni', 'DNI')?></b></th>
      <th width="150"><b><?php echo showHeader('nombres','Nombres')?></b></th>
      <th width="100"><b><?php echo showHeader('apellido1','Apellido P.')?></b></th>
      <th width="100"><b><?php echo showHeader('apellido2','Apellido M.')?></b></th>
      <th width="50"><b><?php echo showHeader('enviados','Enviados')?></b></th>
      <th width="50"><b><?php echo showHeader('recibidos','Recibidos')?></b></th>
    </tr>
<?php
    $DAO=$MODULE->StaticDAO;//ShopCustomer
    $list=$DAO::getList_ReporteUsuario($criterio, $gerencia);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><a href="<? echo "javascript:Edit(".$oItem->personaID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                              </td>
      <td><?php echo $oItem->dni; ?></td>
      <td><?php echo $oItem->nombres; ?></td>
      <td><?php echo $oItem->apellido1; ?></td>
      <td><?php echo $oItem->apellido2; ?></td>
      <td align="right"><?php echo $oItem->enviados;?></td>
      <td align="right"><?php echo $oItem->recibidos;?></td>
    </tr>
    <?php } ?>
    </table>
    <table width="600">
    <tr height="30">
        <td align="left">
        <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
        <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
    </table>
