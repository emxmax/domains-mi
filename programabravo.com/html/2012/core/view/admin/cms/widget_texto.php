<?php
//if(!isset($oItem->parameter['estilo'])) $oItem->parameter['estilo']=NULL;
?>
<tr>
 <td>Resumen</td>
 <td>
	<textarea name="resumen" class="ckeditor" cols="72" rows="5" id="resumen"><?php echo $oItem->resumen; ?></textarea>
 </td>
</tr>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>
