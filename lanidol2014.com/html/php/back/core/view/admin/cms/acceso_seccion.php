<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["acceso_seccion"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>Descripci&oacute;n</td>
  <td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
</tr>
<tr>
  <td>Ícono (imagen)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>