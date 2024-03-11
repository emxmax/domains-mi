<?php
if(!isset($oItem->media['img_regresar'])) $oItem->media['img_regresar']=null;
if(!isset($oItem->media['img_contacto'])) $oItem->media['img_contacto']=null;
?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('img_regresar', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["pagina_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/pagina/imagen/'
	CMSFileManager('img_contacto', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["pagina_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/pagina/imagen/'
});
</script>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Mensaje predeterminado</td>
  <td><input name="subTitle" size="72" type="text" id="subTitle" value="<?php echo $oItem->subTitle; ?>"></td>
</tr>
<tr>
  <td>Descripci&oacute;n del error</td>
  <td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
</tr>
<tr>
  <td>Imagen Regresar (bot&oacute;n)</td>
  <td><input name="media[img_regresar]" type="text" id="img_regresar" value="<?php echo $oItem->media['img_regresar']['Id']; ?>"></td>
</tr>
<tr>
  <td>Imagen Contactenos (bot&oacute;n)</td>
  <td><input name="media[img_contacto]" type="text" id="img_contacto" value="<?php echo $oItem->media['img_contacto']['Id']; ?>"></td>
</tr>
