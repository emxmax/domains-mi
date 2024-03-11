<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=null;
?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('icono', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["subseccion_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/subseccion/icono/'
	CMSFileManager('mediana', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["subseccion_mediana"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/subseccion/mediana/'
	CMSFileManager('grande', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["subseccion_grande"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/subseccion/grande/'
});
</script>
<tr>
  <td>Descripci&oacute;n</td>
  <td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
</tr>
<tr>
  <td> Imagen &iacute;cono</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
  <td> Imagen Mediana</td>
  <td><input name="media[mediana]" type="text" class="hidden" id="mediana" value="<?php echo $oItem->media['mediana']['Id']; ?>"></td>
</tr>
<tr>
  <td> Imagen Grande</td>
  <td><input name="media[grande]" type="text" class="hidden" id="grande" value="<?php echo $oItem->media['grande']['Id']; ?>"></td>
</tr>
