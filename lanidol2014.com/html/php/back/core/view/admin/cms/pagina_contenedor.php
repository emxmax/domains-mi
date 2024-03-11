<tr>
 <td>Descripci&oacute;n</td>
 <td>
    <textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea>
 </td>
</tr>
<?php
if(($oItem->sectionID==19 || $oItem->sectionID==20 || $oItem->sectionID==21) && $oItem->parentContentID==0){
    include("../core/include/admin/cms/resumen.php");
}
?>