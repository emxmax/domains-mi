<?php
require_once("base/Database.php");

class AdmClient extends Database
{

	public static function  getItem($clientID){
		$oItem=null;
		$query = "SELECT clientID, clientCode, company, address, phone, email, state
				FROM adm_client
				WHERE profileID='$profileID' ";
		return parent::GetObject(parent::GetResult($query));
	}
	
	public static function  getList(){
		$list=new Collection();
		$query ="SELECT clientID, clientCode, company, address, phone, email, state
		FROM adm_client";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  getList_Paging(){
		$list=new Collection();
		$query ="SELECT clientID, clientCode, company, address, phone, email, state
		FROM adm_client";
		return parent::GetCollection(parent::GetResult($query));
	}

	
}

?>