<script type="text/javascript">
$(document).ready(function() {
CKEDITOR.replace( 'description2', { toolbar : 'Basic', height: '150px'});
});
</script>
<tr>
 <td>Descripci&oacute;n</td>
 <td>
    <textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea>
 </td>
</tr>
<tr>
 <td>P�rrafo de enlace</td>
 <td>
    <textarea name="resumen" cols="107" rows="4" id="resumen"><?php echo $oItem->resumen; ?></textarea>
 </td>
</tr>
<tr>
 <td>L�nea Telef�nica</td>
 <td>
    <textarea name="description2" cols="40" id="description2"><?php echo $oItem->description2; ?></textarea>
 </td>
</tr>
