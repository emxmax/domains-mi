<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["widget_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>&iacute;cono (imagen)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
