<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=null;
?>
<script type="text/javascript">
</script>
      <tr>
        <td>Descripci&oacute;n</td>
        <td>
            <textarea class="ckeditor" name="description" cols="40" style="height:280px;" id="description"><?php echo $oItem->description; ?></textarea>
        </td>
      </tr>
