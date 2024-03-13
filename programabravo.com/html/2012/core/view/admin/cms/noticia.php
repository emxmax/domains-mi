<?php
$date=date("Y-m-d", strtotime($oItem->date));
if($date=="1969-12-31") $date="";

if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=null;
if(!isset($oItem->media['portada'])) $oItem->media['portada']=null;

?>
<script type="text/javascript" src="../core/plugins/datepick/jquery.datepick.js"></script>
<style type="text/css">
@import url('../core/plugins/datepick/jquery.datepick.css');
</style>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["noticia_imagen"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
    CMSFileManager('portada', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["noticia_portada"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
	$("#date").datepick({dateFormat: 'yyyy-mm-dd', showTrigger: '<img src="../core/plugins/datepick/calendar.gif" alt="calendario"  align="absmiddle" >'});
});
</script>
  <tr>
	<td>Resumen</td>
	<td><textarea name="resumen" id="resumen"><?php echo htmlentities($oItem->resumen); ?></textarea></td>
  </tr>
  <tr>
	<td>Detalle</td>
	<td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
  </tr>
  <tr>
    <td>Fecha</td>
    <td><input name="date" type="text" class="hidden" id="date" value="<?php echo $date; ?>"></td>
  </tr>
  <tr>
    <td>Imagen (Portada)</td>
    <td><input name="media[portada]" type="text" class="hidden" id="portada" value="<?php echo $oItem->media['portada']['Id']; ?>">
    Tamaño de imagen: 285 x 109 px
    </td>
  </tr>
  <tr>
    <td>Imagen (Detalle)</td>
    <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<?php echo $oItem->media['imagen']['Id']; ?>">
    Tamaño de imagen: 600 × 374 px
    </td>
  </tr>
  <tr>
    <td>Sumilla</td>
    <td><input name="subTitle" type="text" class="hidden" id="subTitle" size="55" value="<?php echo htmlentities($oItem->subTitle); ?>"></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td><input type="checkbox" name="showInHome" id="showInHome" value="1" <?php if($oItem->showInHome==1 || $oItem->showInHome==NULL) print "checked";?>> Ver en Home</td>
  </tr>
<script type="text/javascript">
$(document).ready(function(){
CKEDITOR.replace( 'resumen',
    {
        toolbar : 'Basic',
        height:"100"
    });
});
</script>
