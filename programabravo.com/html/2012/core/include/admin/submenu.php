<?php
class menu_left{
var $userID;
var $userAdmin;

	function menu_left(){
		$this->userAdmin	=AdmLogin::getUserSession();
		$this->userID 		=$this->userAdmin["userID"];
	}

	function printMenu($parentmenuID) {
		global $MODULE;
		$list=AdmMenu::getList_ParentMenu($parentmenuID, $this->userAdmin["userMenu"] );

		foreach ($list as $obj) {
			$menuID=$obj->menuID;
			echo "<span class='headerbar'><div class=\"". ($MODULE->menuID==$menuID ? "selected" : ""). "\">".$obj->menuName."</div></span>";
			$this->printModule($menuID);
		}
	}

	function printModule($menuID){
	global $MODULE;
		$list=AdmModule::getList_UserModule($menuID, $this->userAdmin["userModule"] );
		if($list->getLength()>0){
			echo "<ul>\n";
			foreach ($list as $obj) {
				$moduleID=$obj->moduleID;
				$url="index.php?moduleID=$moduleID".($obj->moduleParams!="" ? ("&".$obj->moduleParams) : "");
				echo "<li><a href=\"".$url."\" class=\"". ($MODULE->moduleID==$moduleID ? "selected" : ""). "\">".$obj->moduleName."</a></li>\n";
			}
			echo "</ul>\n";
		}
	}
}

$cMenu=new menu_left();

if($MODULE->menuID>0) echo $cMenu->printMenu($MODULE->parentMenuID);
?>