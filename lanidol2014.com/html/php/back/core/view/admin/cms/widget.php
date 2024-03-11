<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->parameter['estilo'])) $oItem->parameter['estilo']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["widget_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
<?php if($oItem->schemeID==7){ ?>
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["widget_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
<?php } ?>
});
</script>
<?php if($oItem->schemeID==7){ ?>
<tr>
 <td>Subtítulo</td>
 <td><input name="subTitle" type="text" class="text" id="subTitle" value="<?php echo $oItem->subTitle; ?>" size="70" maxlength="255"></td>
</tr>
<?php } ?>
<tr>
 <td>Resumen</td>
 <td>
	<textarea name="resumen" cols="72" rows="5" id="resumen"><?php echo $oItem->resumen; ?></textarea>
 </td>
</tr>
<tr>
  <td>Imagen</td>
  <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
</tr>
<?php if($oItem->schemeID==7){ ?>
<tr>
  <td>Ícono (imagen)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<?php } ?>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>
<tr>
  <td>Estilo (color)</td>
  <td><select name="parameter[estilo]" id="parameter_estilo">
  		<option value="verde" <?php if ($oItem->parameter['estilo']=='verde') echo "selected"; ?>>Verde (Predeterminado)</option>
  		<option value="anaranjado" <?php if ($oItem->parameter['estilo']=='anaranjado') echo "selected"; ?>>Naranja</option>
  		<option value="celeste" <?php if ($oItem->parameter['estilo']=='celeste') echo "selected"; ?>>Celeste</option>
  		<option value="azul" <?php if ($oItem->parameter['estilo']=='azul') echo "selected"; ?>>Azul</option>
	  </select></td>
</tr>
