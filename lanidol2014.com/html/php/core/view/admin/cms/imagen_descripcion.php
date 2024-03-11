<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=null;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["widget_banner_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
  <tr>
	<td>Descripci&oacute;n</td>
	<td><textarea class="text" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
  </tr>
  <tr>
	<td>Imagen</td>
  <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
  </tr>
<?php include '../core/view/admin/cms/url.php';?>