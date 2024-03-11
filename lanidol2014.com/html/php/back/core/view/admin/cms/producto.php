<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;

if(!isset($oItem->media['nombre'])) $oItem->media['nombre']=NULL;
if(!isset($oItem->media['cargo'])) $oItem->media['cargo']=NULL;
if(!isset($oItem->media['email'])) $oItem->media['email']=NULL;

?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["producto_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
	CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["producto_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>Resumen</td>
  <td><textarea class="ckeditor" name="resumen" style="height:60px;" cols="40" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
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
  <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>"></td>
</tr>
<tr>
 <td colspan="2"><strong>CONTACTO:</strong></td>
</tr>
<tr>
 <td>Nombre</td>
 <td><input name="parameter[nombre]" type="text" class="text" id="parameter_nombre" value="<?php echo $oItem->parameter["nombre"]; ?>" size="50" maxlength="255"></td>
</tr>
<tr>
 <td>Cargo</td>
 <td><input name="parameter[cargo]" type="text" class="text" id="parameter_cargo" value="<?php echo $oItem->parameter["cargo"]; ?>" size="50" maxlength="255"></td>
</tr>
<tr>
 <td>E-mail</td>
 <td><input name="parameter[email]" type="text" class="text" id="parameter_email" value="<?php echo $oItem->parameter["email"]; ?>" size="50" maxlength="255"></td>
</tr>
