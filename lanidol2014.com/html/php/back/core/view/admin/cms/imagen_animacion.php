<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
if(!isset($oItem->parameter['estilo'])) $oItem->parameter['estilo']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["animacion_home"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
  <tr>
	<td>Resumen</td>
	<td><textarea class="ckeditor" name="resumen" cols="40" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
  </tr>
<tr>
 <td>Imagen</td>
 <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
</tr>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>
<tr>
  <td>Estilo (color)</td>
  <td><select name="parameter[estilo]" id="parameter_estilo">
  		<option value="blanco" <?php if ($oItem->parameter['estilo']=='blanco') echo "selected"; ?>>Blanco (Predeterminado)</option>
  		<option value="gris" <?php if ($oItem->parameter['estilo']=='gris') echo "selected"; ?>>Gris</option>
	  </select></td>
</tr>