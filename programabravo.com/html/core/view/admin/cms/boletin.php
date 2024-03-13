<?php
if(!isset($oItem->media['documento'])) $oItem->media['documento']=null;
if(!isset($oItem->media['icono'])) $oItem->media['icono']=null;

$date=date("Y-m-d", strtotime($oItem->date));
if($date=="1969-12-31") $date="";
?>
<script type="text/javascript" src="../core/plugins/datepick/jquery.datepick.js"></script>
<style type="text/css">
@import url('../core/plugins/datepick/jquery.datepick.css');
</style>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('documento', {title: 'Seleccione un documento', groupID:  <?php echo $media_group["boletin_archivo"];?>, fileExt: '*.pdf;*.doc;*.xls;*.ppt;*.docx;*.xlsx;*.pptx'} ); 
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["boletin_icono"];?>, fileExt: '*.pdf;*.doc;*.xls;*.ppt;*.docx;*.xlsx;*.pptx'} ); 

$("#date").datepick({dateFormat: 'yyyy-mm-dd', showTrigger: '<img src="../core/plugins/datepick/calendar.gif" alt="calendario"  align="absmiddle" >'});
});
</script>
  <tr>
    <td>Ícono (imagen)</td>
    <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
  </tr>
  <tr>
	<td>Documento</td>
    <td><input name="media[documento]" type="text" class="hidden" id="documento" value="<?php echo $oItem->media['documento']['Id']; ?>"></td>
  </tr>
  <tr style="display:<?php echo $display;?>">
	<td>Resumen</td>
	<td><textarea name="resumen" cols="40" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
  </tr>
  <tr style="display:<?php echo $display;?>">
    <td>Fecha</td>
    <td><input name="date" type="text" class="hidden" id="date" value="<?php echo $date; ?>"></td>
  </tr>
<script type="text/javascript">
$(document).ready(function(){
CKEDITOR.replace( 'resumen',
    {
        toolbar : 'Basic',
        height:"100"
    });
});
</script>
