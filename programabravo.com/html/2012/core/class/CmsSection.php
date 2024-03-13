<?php
require_once("base/Database.php");

class CmsSection extends Database
{
	
	public static function getItem($sectionID){
		$oItem=null;
		$query = "SELECT sectionID, parentSectionID, sectionName, position, isMinisite, isEditable
				FROM cms_section
				WHERE sectionID='$sectionID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function getList(){
		$list=new Collection();
		$query ="SELECT sectionID, parentSectionID, sectionName, position, isMinisite, isEditable
				FROM cms_section";
		return parent::GetCollection(parent::GetResult($query));
	}

	
}

?>