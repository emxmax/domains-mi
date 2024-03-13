<?php
$DAO=$MODULE->StaticDAO;
$obj=$DAO::getItem($kID);
if($obj!=null){
	if (!isset($oItem->minisiteCode)) 	$oItem->minisiteCode=$obj->minisiteCode;
	if (!isset($oItem->minisiteName)) 	$oItem->minisiteName=$obj->minisiteName;
	if (!isset($oItem->domain)) 		$oItem->domain=$obj->domain;
	if (!isset($oItem->isDefault)) 		$oItem->isDefault=$obj->isDefault;
	if (!isset($oItem->active)) 		$oItem->active=$obj->active;
	
	if($oItem->isDefault) $MODULE->addAlert("Este ítem está predeterminado, no puede ser modificado o eliminado.");
}
else
	$MODULE->addError($DAO::GetErrorMsg());
?>
                <table class="tblForm" width="500">
                      <tr>
                        <td width="100">Código</td>
                        <td width="400"><strong><?php echo $oItem->minisiteCode; ?></strong></td>
                      </tr>
                      <tr>
                        <td>Nombre</td>
                        <td><strong><?php echo $oItem->minisiteName; ?></strong></td>
                      </tr>
                      <tr>
                        <td>Alias</td>
                        <td><strong><?php echo $oItem->domain; ?></strong></td>
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
