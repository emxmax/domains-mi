<?php
$userName = OWASP::RequestString('userName');
$startDate = OWASP::RequestString('startDate');
$endDate = OWASP::RequestString('endDate');

if($startDate==NULL) $startDate=date('Y-m-d');
if($endDate==NULL) $endDate=date('Y-m-d');
?>
<script type="text/javascript" src="../core/plugins/datepick/jquery.datepick.js"></script>
<style type="text/css">
@import url('../core/plugins/datepick/jquery.datepick.css');
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#startDate").datepick({dateFormat: 'yyyy-mm-dd', showTrigger: '<img src="../core/plugins/datepick/calendar.gif" alt="calendario"  align="absmiddle" >'});
    $("#endDate").datepick({dateFormat: 'yyyy-mm-dd', showTrigger: '<img src="../core/plugins/datepick/calendar.gif" alt="calendario"  align="absmiddle" >'});
});
</script>
<fieldset id="fldFiltro" style="text-align: right; width:490px;">
    <legend accesskey="F">Filtros</legend>
    <table width="100%">
    <tr>
      <td nowrap align="right">Usuario:</td>
      <td><input name="userName" type="text" class="text" value="<?php echo $userName?>" style="width:70px" maxlength="20"></td>
      <td nowrap align="right">Rango de fechas:</td>
      <td><input id="startDate" name="startDate" readonly="readonly" type="text" class="text" value="<?php echo $startDate?>" style="width:60px" maxlength="10"></td>
      <td><input id="endDate" name="endDate" readonly="readonly" type="text" class="text" value="<?php echo $endDate?>" style="width:60px" maxlength="10"></td>
      <td width="60" align="right"><input name="btnSearch" type="button" value="Buscar" class="admButton" onclick="Search(this.form)"></td>
    </tr>
  </table>
</fieldset>
<table width="500" class="tblList" cellpadding="0" cellspacing="0">
<tr> 
  <th width="35">&nbsp;</th>
  <th width="100"><?php echo $MODULE->getSortingHeader("logDate", "Fecha");?></th>
  <th><?php echo $MODULE->getSortingHeader("userID", "Usuario");?></th>
  <th><?php echo $MODULE->getSortingHeader("eventID", "Evento");?></th>
</tr>
<?php
$list=AdmLog::getList_Paging($userName, $startDate, $endDate.' 23:59:59');
foreach ($list as $oItem){
?>
    <tr> 
      <td nowrap="nowrap">
        <a href="<?php echo "javascript:View('".$oItem->logDate.",".$oItem->eventID.",".$oItem->userID."');"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
        <a href="<?php echo "javascript:Delete('".$oItem->logDate.",".$oItem->eventID.",".$oItem->userID."');"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
      </td>
      <td><?php echo $oItem->logDate; ?></td>
      <td><?php echo $oItem->userName;?></td>
      <td><?php echo $oItem->eventName;?></td>
    </tr>
<?php } ?>
</table>
<table width="500">
  <tr height="30">
    <td align="left">
        <input type="button" class="admButton" value="exportar" name="btnNew" onClick="Export(this.form)"></td>
    <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
  </tr>
</table>
