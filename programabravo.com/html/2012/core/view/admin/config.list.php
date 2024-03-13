<?php

?>
<script type="text/javascript" src="../core/assets/admin/js/datepicker/popcalendar.js"></script>
<script type="text/javascript">
function on_submit(xform){

	xform.Command.value="update";
	xform.submit();
}
</script>
                <table class="tblForm" width="500">
<?php
$list=Config::getList();
foreach($list as $oItem){
$lbl_input='<input name="value['.$oItem->configID.']" type="text" class="text" id="value_'.$oItem->configID.'" value="'.$oItem->value.'" size="45" maxlength="255">';
switch($oItem->inputType){
	case 'text':
		$lbl_input='<textarea name="value['.$oItem->configID.']" type="text" class="text" id="value_'.$oItem->configID.'" cols="45" rows="4" maxlength="255">'.$oItem->value.'</textarea>';
		break;
	case 'numeric':
		$lbl_input='<input name="value['.$oItem->configID.']" type="text" class="text" id="value_'.$oItem->configID.'" value="'.$oItem->value.'" size="5" maxlength="5">';
		break;
	case 'bool':
		$lbl_input='<input name="value['.$oItem->configID.']" type="radio" class="text" id="value_'.$oItem->configID.'_1" value="1" '.(($oItem->value=='1')?'checked="true"':'').'>activo <input name="value['.$oItem->configID.']" type="radio" class="text" id="value_'.$oItem->configID.'_0" value="0" '.(($oItem->value!='1')?'checked="true"':'').'>inactivo';
		break;
	case 'date':
		$lbl_input='<input name="value['.$oItem->configID.']" type="text" readonly="readonly" class="text" id="value_'.$oItem->configID.'" value="'.$oItem->value.'" size="15" maxlength="10"><a href="javascript:;"><img src="../core/assets/admin/images/calendar.jpg" bsolicitud="0" onClick="popUpCalendar(this, document.forms[0].value_'.$oItem->configID.', \'yyyy-mm-dd\')"></a> (aaaa-mm-dd)';
		break;
	case 'email':
	default:
		$lbl_input='<input name="value['.$oItem->configID.']" type="text" class="text" id="value_'.$oItem->configID.'" value="'.$oItem->value.'" size="45" maxlength="255">';
		break;
}
	
?>                      
                      <tr>
                        <td><?php echo $oItem->description?></td>
                        <td><?php echo $lbl_input; ?></td>
                      </tr>
<?php
}
?>                      
                      <tr> 
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2"><input type="button" class="admButton" value="actualizar datos" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);"></td>
                      </tr>
                </table>
