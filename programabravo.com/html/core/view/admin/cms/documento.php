<?php
if(!isset($oItem->media['documento'])) $oItem->media['documento']=null;
?>
<script type="text/javascript" src="../core/plugins/datepick/jquery.datepick.js"></script>
<style type="text/css">
@import url('../core/plugins/datepick/jquery.datepick.css');
</style>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('documento', {title: 'Seleccione un documento', groupID:  <?php echo $media_group["pagina_documento"];?>, fileExt: '*.pdf;*.doc;*.xls;*.ppt;*.docx;*.xlsx;*.pptx'} ); 
});
</script>
  <tr>
	<td>Documento</td>
    <td><input name="media[documento]" type="text" class="hidden" id="documento" value="<?php echo $oItem->media['documento']['Id']; ?>"></td>
  </tr>
