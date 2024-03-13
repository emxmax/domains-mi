<?php
require("../core/include/admin/ordering.php");
$DAO=$MODULE->StaticDAO;
?>
<script type="text/javascript">
function PageView(contentID){
	xform=document.forms[0];
	xform.contentID.value=contentID;
	xform.FormView.value="view";
	xform.submit();
}
</script>

<table width="500" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="12">&nbsp;</th>
      <th width="448"><b><?php echo showHeader('contentTitle', 'P&aacute;gina')?></b></th>
      <th width="40"><b><?php echo showHeader('pageViews', 'Visitas')?></b></th>
    </tr>
<?php
    $schemeID=3;
    $langID=1;
    $list=$DAO::getContentList_Paging($schemeID, $langID);
    foreach ($list as $obj) {
?>
    <tr>
      <td><a href="<? echo "javascript:PageView(".$obj->contentID.");"; ?>"><img title="Ver Detalle" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                              </td>
      <td><?php echo $obj->contentTitle; ?></td>
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
          <input type="hidden" id="contentID" name="contentID">
          <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>"></td>
        <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
