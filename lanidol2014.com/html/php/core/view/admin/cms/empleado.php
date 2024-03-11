<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->media['foto'])) $oItem->media['foto']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["empleado_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
CMSFileManager('foto', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["empleado_foto"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
$("#tdTitulo").html("Nombre");
});
</script>
<tr>
 <td>Cargo</td>
 <td><input name="subTitle" type="text" class="text" id="subTitle" value="<?php echo $oItem->subTitle; ?>" size="70" maxlength="255"></td>
</tr>
<tr>
 <td>E-mail</td>
 <td><input name="subTitle2" type="text" class="text" id="subTitle2" value="<?php echo $oItem->subTitle2; ?>" size="70" maxlength="255"></td>
</tr>
<tr>
  <td>Descripci&oacute;n</td>
  <td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
</tr>
<tr>
  <td>Foto pequeña</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
  <td>Foto grande</td>
  <td><input name="media[foto]" type="text" class="hidden" id="foto" value="<?php echo $oItem->media['foto']['Id']; ?>"></td>
</tr>
