<?php
if(!isset($oItem->media['documento'])) $oItem->media['documento']=null;
$date=date("Y-m-d", strtotime($oItem->date));
if($date=="1969-12-31") $date="";

$groupID=$media_group["pagina_documento"];
$display="none";
if($oItem->schemeID==43){
	$groupID=$media_group["documento_inteligo"];
	$display="";
}
?>
<script type="text/javascript" src="../core/plugins/datepick/jquery.datepick.js"></script>
<style type="text/css">
@import url('../core/plugins/datepick/jquery.datepick.css');
</style>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('documento', {title: 'Seleccione un documento', groupID:  <?php echo $groupID;?>, fileExt: '*.pdf;*.doc;*.xls;*.ppt;*.docx;*.xlsx;*.pptx'} ); 
$("#date").datepick({dateFormat: 'yyyy-mm-dd', showTrigger: '<img src="../core/plugins/datepick/calendar.gif" alt="calendario"  align="absmiddle" >'});
});
</script>
  <tr>
	<td>Documento</td>
    <td><input name="media[documento]" type="text" class="hidden" id="documento" value="<?php echo $oItem->media['documento']['Id']; ?>"></td>
  </tr>
  <tr style="display:<?php echo $display;?>">
	<td>Resumen</td>
	<td><textarea class="ckeditor" name="resumen" cols="40" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
  </tr>
  <tr style="display:<?php echo $display;?>">
    <td>Fecha</td>
    <td><input name="date" type="text" class="hidden" id="date" value="<?php echo $date; ?>"></td>
  </tr>
