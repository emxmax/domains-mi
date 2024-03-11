<?php
if(!isset($oItem->parameter['estilo'])) $oItem->parameter['estilo']=NULL;
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
<tr>
  <td>Estilo (color)</td>
  <td><select name="parameter[estilo]" id="parameter_estilo">
  		<option value="verde" <?php if ($oItem->parameter['estilo']=='verde') echo "selected"; ?>>Verde (Predeterminado)</option>
  		<option value="anaranjado" <?php if ($oItem->parameter['estilo']=='anaranjado') echo "selected"; ?>>Naranja</option>
  		<option value="celeste" <?php if ($oItem->parameter['estilo']=='celeste') echo "selected"; ?>>Celeste</option>
  		<option value="azul" <?php if ($oItem->parameter['estilo']=='azul') echo "selected"; ?>>Azul</option>
	  </select></td>
</tr>
