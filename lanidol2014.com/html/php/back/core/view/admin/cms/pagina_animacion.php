<?php
if(!isset($oItem->parameter['video'])) $oItem->parameter['video']=NULL;
?>
<tr>
 <td>Subtítulo</td>
 <td><input name="subTitle" type="text" class="text" id="subTitle" value="<?php echo $oItem->subTitle; ?>" size="70" maxlength="255"></td>
</tr>
<tr>
 <td>Descripci&oacute;n</td>
 <td>
    <textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea>
 </td>
</tr>
<tr>
  <td>Video (url)</td>
  <td><input type="text" name="parameter[video]" id="parameter_video" size="70" maxlength="255" value="<?php echo $oItem->parameter['video'];?>" />
  <br />(ej. http://www.youtube.com/embed/5FlQSQuv_mg)
  </td>
</tr>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>
<?php
if($oItem->sectionID==5 && $oItem->parentContentID==0){
?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('seccion_icono', {title: 'Seleccione una imagen', groupID: <?php echo $media_group["seccion_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); });
</script>
<tr>
  <td>Página de Sección</td>
  <td><br />
  <table class="tblForm" width="450">
    <tr>
      <td>Ícono (imagen)</td>
      <td><input name="media[seccion_icono]" type="text" class="hidden" id="seccion_icono" value="<?php echo $oItem->media['seccion_icono']['Id']; ?>"></td>
    </tr>
    <tr>
      <td>Resumen</td>
      <td><textarea name="resumen" cols="53" rows="3" id="resumen"><?php echo $oItem->resumen; ?></textarea></td>
    </tr>
  </table>
  </td>
</tr>
<?php
}
?>