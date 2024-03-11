<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->parameter['estilo'])) $oItem->parameter['estilo']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["widget_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>Ícono (imagen)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
  <td>Estilo (color)</td>
  <td><select name="parameter[estilo]" id="parameter_estilo">
  		<option value="verde" <?php if ($oItem->parameter['estilo']=='verde') echo "selected"; ?>>Verde (Predeterminado)</option>
  		<option value="naranja" <?php if ($oItem->parameter['estilo']=='naranja') echo "selected"; ?>>Naranja</option>
  		<option value="celeste" <?php if ($oItem->parameter['estilo']=='celeste') echo "selected"; ?>>Celeste</option>
  		<option value="azul" <?php if ($oItem->parameter['estilo']=='azul') echo "selected"; ?>>Azul</option>
  		<option value="gris" <?php if ($oItem->parameter['estilo']=='gris') echo "selected"; ?>>Gris</option>
	  </select></td>
</tr>
