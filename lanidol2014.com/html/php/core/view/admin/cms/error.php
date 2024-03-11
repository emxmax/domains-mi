<?php
if(!isset($oItem->parameter['error'])) $oItem->parameter['error']=NULL;
$arrErr=array(400, 401, 403, 404, 500, 503, 504, 505);
?>
<tr>
  <td>Descripci&oacute;n</td>
  <td><textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea></td>
</tr>
<tr>
  <td>C&oacute;digo de Error</td>
  <td><select name="parameter[error]" id="error">
        <?php
        foreach ($arrErr as $err) {
            echo '<option value="'.$err.'" '.($err==$oItem->parameter['error']? 'selected="true"':'').' >'.$err.'</option>';
        }
        ?>
    </select>
  </td>
</tr>
