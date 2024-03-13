<?php
$criterio=isset($_REQUEST['criterio']) ? $_REQUEST['criterio']: NULL;
require("../core/include/admin/ordering.php");
$DAO=$MODULE->StaticDAO;
?>
<table width="600" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="16">&nbsp;</th>
      <th width="50"><b><?php echo showHeader('dni', 'DNI')?></b></th>
      <th width="350"><b><?php echo showHeader('empleado','Empleado')?></b></th>
      <th width="50"><b><?php echo showHeader('pageViews','Visitas')?></b></th>
    </tr>
<?php
    $list=$DAO::getList_ReporteUsuario("", $oItem->gerencia, $oItem->contentID);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><a href="<? echo "javascript:Edit(".$oItem->personaID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                              </td>
      <td><?php echo $oItem->dni; ?></td>
      <td><?php echo $oItem->empleado; ?></td>
      <td align="right"><?php echo $oItem->pageViews;?></td>
    </tr>
    <?php } ?>
</table>
<table width="600">
    <tr height="30">
      <td align="left">
        <input type="button" class="admButton" value="regresar" id="btnBack" name="btnBack" onclick="BackTo('view')">
        <input type="hidden" id="gerencia" name="gerencia" value="<?php echo $oItem->gerencia;?>">
        <input type="hidden" id="contentID" name="contentID" value="<?php echo $oItem->contentID?>">
        <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
    <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
