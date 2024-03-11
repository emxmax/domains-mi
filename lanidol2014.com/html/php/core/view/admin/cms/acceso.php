<?php

if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
if(!isset($oItem->parameter['sectionID'])) $oItem->parameter['sectionID']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["acceso_icono"];?>, fileExt: '*.jpg;*.gif;*.png'} ); 
});
</script>
<tr>
  <td>Subt&iacute;tulo</td>
  <td><input name="subTitle" type="text" class="hidden" id="subTitle" size="70" value="<?php echo $oItem->subTitle; ?>"></td>
</tr>
<tr>
  <td>Resumen</td>
  <td><textarea name="resumen" id="resumen"><?php echo htmlentities($oItem->resumen); ?></textarea></td>
</tr>
<tr>
  <td>&iacute;cono (imagen)</td>
  <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
 <td>Enlace</td>
 <td>
     <select name="parameter[sectionID]" id="sectionID" style="width:235px;">
<?php
$parentSectionID=4;
$langID=1;
$list=CmsSectionLang::getWebList($parentSectionID, $langID);
foreach($list as $obj){
?>
            <option value="<?php echo  $obj->sectionID; ?>" <?php if($oItem->parameter['sectionID']==$obj->sectionID) echo "selected"; ?>><?php echo  $obj->title; ?></option>
<?php
}
?>
     </select>
 </td>
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
