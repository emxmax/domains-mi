<?php
?>
<table class="tblForm" width="500">
      <tr>
        <td width="100">Fecha</td>
        <td><strong><?php echo $oItem->logDate; ?></strong></td>
      </tr>
      <tr>
        <td>Usuario</td>
        <td><strong><?php echo $oItem->userName; ?></strong></td>
      </tr>
      <tr>
        <td>Evento</td>
        <td><strong><?php echo $oItem->eventName; ?></strong></td>
      </tr>
      <tr> 
        <td>Comentario</td>
        <td><strong><?php echo $oItem->comment;?></strong></td>
      </tr>
      <tr> 
        <td>Inf. t&eacute;nica</td>
        <td><i><?php echo unserialize($oItem->object);?></i></td>
      </tr>
      <tr> 
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="2"><input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
      </tr>
</table>
