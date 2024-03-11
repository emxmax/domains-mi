<tr>
 <td>Descripci&oacute;n</td>
 <td>
    <textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea>
 </td>
</tr>
<tr>
  <td>Etiqueta</td>
  <td><input name="parameter[etiqueta]" type="text" class="hidden" id="etiqueta" value="<?php echo $oItem->parameter['etiqueta']; ?>"> (Ej. Experto)</td>
</tr>

<?php
if(($oItem->sectionID==5 || $oItem->sectionID==16) && $oItem->parentContentID==0){
    include("../core/include/admin/cms/resumen.php");
}
?>