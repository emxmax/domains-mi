<?php

if(!isset($oItem->parameter['telefono'])) $oItem->parameter['telefono']=NULL;
if(!isset($oItem->parameter['fax'])) $oItem->parameter['fax']=NULL;
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;

if(!isset($oItem->parameter['lat'])) $oItem->parameter['lat']=NULL;
if(!isset($oItem->parameter['lng'])) $oItem->parameter['lng']=NULL;

?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["oficina_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>Descripci&oacute;n</td>
  <td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
</tr>
<tr>
  <td>&iacute;cono (Imagen)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
 <td>Coordenadas <br />del Mapa</td>
 <td><table class="tblForm">
 	<tr><td>Latitud</td><td>Longitud</td></tr>
 	<tr><td><input name="parameter[lat]" type="text" class="text" id="lat" value="<?php echo $oItem->parameter['lat']; ?>" size="19" maxlength="255"></td>
    <td><input name="parameter[lng]" type="text" class="text" id="lng" value="<?php echo $oItem->parameter['lng']; ?>" size="19" maxlength="255"></td></tr>
    </table><br />
 </td>
</tr>
