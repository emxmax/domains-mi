<?php
$DAO=$MODULE->StaticDAO;
$userAdmin	=AdmLogin::getUserSession();

$obj=$DAO::getItem($kID);
if($obj!=null){
	if (!isset($oItem->profileID)) 		$oItem->profileID	=$obj->profileID;
	if (!isset($oItem->profileName)) 	$oItem->profileName	=$obj->profileName;
	if (!isset($oItem->isDefault)) 		$oItem->isDefault=$obj->isDefault;
	
	if($oItem->isDefault) $MODULE->addAlert("Este ítem está predeterminado, no puede ser modificado o eliminado.");

}
else
	$MODULE->addError($DAO::GetErrorMsg());

function Print_TreeModule($menuID, $profileID){
	$lModulo=AdmModule::getList_Profile($menuID);
	foreach($lModulo as $oModule){
		$moduleID	=$oModule->moduleID;
		$list=AdmEvent::getList_Profile($moduleID, $profileID);
		if($list->getLength()==0) continue;
		echo "<li class=\"open\"><span>$oModule->moduleName</span><ul>";
		foreach ($list as $obj) {
			echo "<li><input type=\"checkbox\" disabled=\"disabled\" name=\"events[]\" id=\"ev_".$obj->eventID."\" value=\"".$obj->eventID."\"";
			if($obj->profileID==$profileID || $profileID==1 || $profileID==2) echo " checked";
			echo "><label for=\"ev_".$obj->eventID."\">".$obj->eventName."</label></li>";
		}
		echo "</ul></li>";
	}
}

?>
<link rel="stylesheet" href="../core/plugins/treeview/jquery.treeview.css" /> 
<script src="../core/plugins/treeview/lib/jquery.cookie.js" type="text/javascript"></script> 
<script src="../core/plugins/treeview/jquery.treeview.js" type="text/javascript"></script> 
<script type="text/javascript"> 
		$(function() {
			$("#tree").treeview({
				collapsed: true,
				animated: "medium",
				control:"#sidetreecontrol",
				persist: "location"
			});
		})
		
</script> 
<script type="text/javascript">
function on_submit(xform){
	if(xform.profileName.value ==""){
		alert("Please, enter [Name]");
		xform.profileName.focus(); return false;}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>
                    <table class="tblForm" width="500">
                      <tr> 
                        <td width="100">Nombre</td>
                        <td width="400"><strong><?php echo $oItem->profileName; ?></strong></td>
                      </tr>
                      <tr> 
                        <td valign="top"><br />Permisos</td>
                        <td><div id="sidetreecontrol" style="float:right"><a href="?#">Contraer items</a> | <a href="?#">Expandir items</a></div> 
                        <ul id="tree">
<?php
	$lMenu=AdmMenu::getList_Profile(0);
	foreach($lMenu as $oMenu){
		$menuID=$oMenu->menuID;
		Print_TreeModule($menuID, $oItem->profileID);
		echo "<li class=\"open\"><span>$oMenu->menuName</span><ul>";
		$lSMenu=AdmMenu::getList_Profile($menuID);
		foreach($lSMenu as $oSMenu){
			$submenuID=$oSMenu->menuID;
			echo "<li class=\"open\"><span>$oSMenu->menuName</span><ul>";
			Print_TreeModule($submenuID, $oItem->profileID);
			echo "</ul></li>";
		}
		echo "</ul></li>";
	}
	?>
                          </ul>
                          </td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                      </tr>
                    <tr> 
                      <td colspan="2"><input type="button" class="admButton" name="btnCancel" value="regresar" onClick="javascript:Back();"></td>
					</tr>
                  </table>
