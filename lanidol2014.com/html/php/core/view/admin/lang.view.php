<?php
$DAO=$MODULE->StaticDAO;
$obj=$DAO::getItem($kID);
if($obj!=null){
	if (!isset($oItem->langCode)) 	$oItem->langCode=$obj->langCode;
	if (!isset($oItem->langName)) 	$oItem->langName=$obj->langName;
	if (!isset($oItem->alias)) 		$oItem->alias=$obj->alias;
	if (!isset($oItem->isDefault)) 	$oItem->isDefault=$obj->isDefault;
	if (!isset($oItem->active)) 	$oItem->active=$obj->active;

	if($oItem->isDefault) $MODULE->addAlert("Este &iacute;tem est&aacute; predeterminado, no puede ser modificado o eliminado.");
}
else
	$MODULE->addError($DAO::GetErrorMsg());
?>
<table class="tblForm" width="500">
      <tr>
        <td width="100">C&oacute;digo</td>
        <td width="400"><strong><?php echo $oItem->langCode; ?></strong></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><strong><?php echo $oItem->langName; ?></strong></td>
      </tr>
      <tr>
        <td>Alias</td>
        <td><strong><?php echo $oItem->alias; ?></strong></td>
      </tr>
      <tr> 
        <td>Estado</td>
        <td><strong><?php echo $DAO::getActive($oItem->active);?></strong></td>
      </tr>
      <tr> 
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="2"><input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
      </tr>
</table>
