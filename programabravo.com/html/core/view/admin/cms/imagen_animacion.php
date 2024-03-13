<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
if(!isset($oItem->parameter['etiqueta'])) $oItem->parameter['etiqueta']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["animacion_home"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
  <tr>
	<td>Encabezado</td>
	<td><textarea name="subTitle" cols="40" id="subTitle"><?php echo $oItem->subTitle; ?></textarea></td>
  </tr>
  <tr>
    <td>Texto</td>
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
  <td>Etiqueta</td>
  <td><input name="parameter[etiqueta]" type="text" class="hidden" id="etiqueta" value="<?php echo $oItem->parameter['etiqueta']; ?>"> (Ej. Entérate como...)</td>
</tr>
<script type="text/javascript">
$(document).ready(function(){
CKEDITOR.replace( 'subTitle',
    {
        toolbar : 'Basic',
        height:"100"
    });
});
</script>
