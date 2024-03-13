<?php
require("../core/include/admin/ordering.php");
$DAO=$MODULE->StaticDAO;
?>
<script type="text/javascript">
function Detail(gerencia){
	xform=document.forms[0];
	xform.gerencia.value=gerencia;
	xform.FormView.value="log";
	xform.submit();
}
</script>

<table width="500" class="tblList" cellpadding="0" cellspacing="0">
      <tr> 
        <th width="12">&nbsp;</th>
        <th width="448"><b><?php echo showHeader('gerencia', 'Mundo')?></b></th>
        <th width="40"><b><?php echo showHeader('pageViews', 'Visitas')?></b></th>
      </tr>
<?php
    $list=$DAO::getMundoList_Paging($oItem->contentID);
    foreach ($list as $obj) {
?>
    <tr>
      <td><a href="<? echo "javascript:Detail('".$obj->gerencia."');"; ?>"><img title="Ver Detalle" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                              </td>
      <td><?php echo $obj->gerencia; ?></td>
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
        <input type="button" class="admButton" value="regresar" id="btnBack" name="btnBack" onclick="BackTo('list')">
        <input type="hidden" id="gerencia" name="gerencia">
        <input type="hidden" id="contentID" name="contentID" value="<?php echo $oItem->contentID?>">
        <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
      <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
