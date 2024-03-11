<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=null;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo ($oItem->schemeID==21) ? $media_group["imagen_sector"]: $media_group["galeria_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/local/imagen/' or 'userfiles/cms/galeria/imagen/'
});
</script>
  <tr>
	<td>Resumen</td>
	<td><textarea class="ckeditor" name="resumen" cols="40" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
  </tr>
  <tr>
	<td>Imagen</td>
  <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
  </tr>
