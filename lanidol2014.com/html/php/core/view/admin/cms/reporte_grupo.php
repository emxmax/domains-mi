<?php
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->parameter['login'])) $oItem->parameter['login']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('icono', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["reporte_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/pagina/imagen/'
});
</script>
<tr>
  <td>Imagen (ícono)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
  <td>Autenticación</td>
  <td><label><input name="parameter[login]" type="checkbox" id="login" value="1" <?php if($oItem->parameter['login']==1) echo "checked"; ?>> Requiere usuario y contraseña</label></td>
</tr>
