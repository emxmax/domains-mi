<?php
require("../core/include/admin/ordering.php");
?>
<script type="text/javascript">
function Detail(gerencia){
	xform=document.forms[0];
	xform.gerencia.value=gerencia;
	xform.FormView.value="view";
	xform.submit();
}
</script>
<table width="600" class="tblList" cellpadding="0" cellspacing="0">
      <tr> 
        <th width="16">&nbsp;</th>
        <th width="400"><b><?php echo showHeader('gerencia','Mundo')?></b></th>
        <th width="50"><b><?php echo showHeader('pageViews','Visitas')?></b></th>
      </tr>
<?php
    $DAO=$MODULE->StaticDAO;//ShopCustomer
    $schemeID=3;
    $langID=1;
    $list=$DAO::getAreaList_Paging($schemeID, $langID);
    foreach($list as $oItem){
?>
    <tr>
      <td><a href="<? echo "javascript:Detail('".$oItem->gerencia."');"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a></td>
      <td><?php echo $oItem->gerencia; ?></td>
      <td align="right"><?php echo $oItem->pageViews;?></td>
    </tr>
    <?php } ?>
</table>
<table width="600">
    <tr height="30">
      <td align="left">
        <input type="hidden" id="gerencia" name="gerencia">
        <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>">
      </td>
      <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
