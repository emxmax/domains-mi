<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->media['flv'])) $oItem->media['flv']=NULL;
if(!isset($oItem->media['3gp'])) $oItem->media['3gp']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una icono', groupID:  <?php echo $media_group["video_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
CMSFileManager('flv', {title: 'Seleccione un video', groupID:  <?php echo $media_group["video_flv"];?>, fileExt: '*.flv;*.3gp'} ); 
CMSFileManager('3gp', {title: 'Seleccione un video', groupID:  <?php echo $media_group["video_3gp"];?>, fileExt: '*.flv;*.3gp'} ); 
});
</script>
<tr>
  <td>imagen (&iacute;cono)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
  <td>video (flv)</td>
  <td><input name="media[flv]" type="text" class="hidden" id="flv" value="<?php echo $oItem->media['flv']['Id']; ?>"></td>
</tr>
<tr>
  <td>video (3gp)</td>
  <td><input name="media[3gp]" type="text" class="hidden" id="3gp" value="<?php echo $oItem->media['3gp']['Id']; ?>"></td>
</tr>
