<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["widget_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>Imagen</td>
  <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
</tr>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>
