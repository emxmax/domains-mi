<?php
if(!isset($oItem->parameter['script'])) $oItem->parameter['script']=NULL;
?>
<tr>
 <td>Script-Embed</td>
 <td>
    <textarea name="parameter[script]" cols="70" rows="4" id="script"><?php echo $oItem->parameter['script']; ?></textarea>
 </td>
</tr>