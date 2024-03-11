<?php
if(!isset($oItem->media['reporte'])) $oItem->media['reporte']=null;
$date=isset($oItem->date)? date("Y-m-d", strtotime($oItem->date)): "";
?>
<script type="text/javascript" src="../core/plugins/datepick/jquery.datepick.js"></script>
<style type="text/css">
@import url('../core/plugins/datepick/jquery.datepick.css');
</style>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('reporte', {title: 'Seleccione un documento', groupID:  <?php echo $media_group["reporte"];?>, fileExt: '*.pdf;*.doc;*.xls;*.ppt;*.docx;*.xlsx;*.pptx'} ); 
$("#date").datepick({dateFormat: 'yyyy-mm-dd', showTrigger: '<img src="../core/plugins/datepick/calendar.gif" alt="calendario"  align="absmiddle" >'});
});
</script>
  <tr>
	<td>Documento</td>
    <td><input name="media[reporte]" type="text" class="hidden" id="reporte" value="<?php echo $oItem->media['reporte']['Id']; ?>"></td>
  </tr>
  <tr>
	<td>Resumen</td>
	<td><textarea class="ckeditor" name="resumen" cols="40" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
  </tr>
  <tr>
    <td>Fecha</td>
    <td><input name="date" type="text" class="hidden" id="date" value="<?php echo $date; ?>"></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td><input type="checkbox" name="showInHome" id="showInHome" value="1" <?php if($oItem->showInHome==1 || $oItem->showInHome==NULL) print "checked";?>> Ver en Últimos Reportes</td>
  </tr>
