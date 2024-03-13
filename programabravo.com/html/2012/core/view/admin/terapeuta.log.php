<?php
require("../core/include/admin/ordering.php");
$DAO=$MODULE->StaticDAO;
?>
<table width="500" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="16">&nbsp;</th>
      <th style="display:none" width="12">&nbsp;</th>
      <th width="448"><b><?php echo showHeader('empleado', 'Usuario')?></b></th>
      <th width="40"><b><?php echo showHeader('pageViews', 'Visitas')?></b></th>
    </tr>
<?php
    $list=$DAO::getEmpleadoList_Paging($oItem->contentID, $oItem->gerencia);
    foreach ($list as $obj) {
?>
    <tr>
      <td><a href="<? echo "javascript:Edit(".$obj->personaID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                              </td>
      <td style="display:none"><a href="<? echo "javascript:ViewModal('".$obj->registroID."');"; ?>"><img title="Ver Detalle" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                              </td>
      <td><?php echo $obj->empleado; ?></td>
      <td align="center"><?php echo $obj->pageViews; ?></td>
    </tr>
    <?php } ?>
</table>
<div id="divViewForm" style="display:none; height:400px; width:450px;">
<img src="../core/assets/admin/images/i_loading.gif" align="absbottom" /> Cargando...
</div>
<table width="500">
    <tr height="30">
        <td align="left"><input type="button" class="admButton" value="ver estad&iacute;sticas" name="btnStats" onClick="ViewStats(this.form)" style="display:none">
        <input type="button" class="admButton" value="regresar" id="btnBack" name="btnBack" onclick="BackTo('view')">
        <input type="hidden" id="gerencia" name="gerencia" value="<?php echo $oItem->gerencia; ?>">
        <input type="hidden" id="contentID" name="contentID" value="<?php echo $oItem->contentID; ?>">
        <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
      <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
