<?php
if(($oItem->schemeID==13 || $oItem->schemeID==19)){ //Como Vender y Como Crecer
?>
<tr>
 <td>Resumen</td>
 <td>
    <textarea name="resumen" cols="70" rows="3" id="resumen"><?php echo $oItem->resumen; ?></textarea>
 </td>
</tr>
<?php
}
?>