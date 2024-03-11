<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una icono', groupID:  <?php echo $media_group["galeria_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["galeria_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>imagen (&iacute;cono)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
  <td>imagen (grande)</td>
  <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
</tr>
