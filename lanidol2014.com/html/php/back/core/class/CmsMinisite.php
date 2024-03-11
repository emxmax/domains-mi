<?php
require_once("base/Database.php");

class CmsMinisite extends Database
{

	public static function  getItem($minisiteID){
		$query = "SELECT minisiteID, minisiteCode, minisiteName, domain, isDefault, active
				FROM cms_minisite
				WHERE minisiteID='$minisiteID' ";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query ="SELECT minisiteID, minisiteCode, minisiteName, domain, isDefault, active
		FROM cms_minisite
		ORDER BY minisiteID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Paging(){
		$query ="SELECT minisiteID, minisiteCode, minisiteName, domain, isDefault, active
		FROM cms_minisite
		";
		if(self::$orderBy=="") self::$orderBy="minisiteID ASC";

		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getList_Active(){
		$query ="SELECT minisiteID, minisiteCode, minisiteName, domain, isDefault, active
		FROM cms_minisite
		WHERE active='1'
		ORDER BY minisiteID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  AddNew($oMinisite){
		//Search the max Id
		$query = "SELECT MAX(minisiteID) FROM cms_minisite";
		$result = parent::GetResult($query);
		$oMinisite->minisiteID = parent::fetchScalar($result)+1;
		//Insert data to table
		$query = "INSERT INTO cms_minisite(minisiteID, minisiteCode, minisiteName, domain, isDefault, active)
				VALUES('$oMinisite->minisiteID', '$oMinisite->minisiteCode', '$oMinisite->minisiteName', '$oMinisite->domain', '$oMinisite->isDefault', '$oMinisite->active')";
		return parent::Execute($query);
	}

	public static function  Update($oMinisite){
		//Update data to table
		$query = "UPDATE cms_minisite SET 
					minisiteCode	='$oMinisite->minisiteCode',
					minisiteName	='$oMinisite->minisiteName',
					domain 			='$oMinisite->domain',
					isDefault		='$oMinisite->isDefault',
					active			='$oMinisite->active'
				WHERE 
					minisiteID	='$oMinisite->minisiteID'";
		return parent::Execute($query);
	}

	public static function  Delete($oMinisite){
		$query = "DELETE FROM cms_minisite 
				WHERE minisiteID= '$oMinisite->minisiteID' AND isDefault='0'";
		return parent::Execute($query);
	}

}

?>