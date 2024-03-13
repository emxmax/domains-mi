<?php
require_once("base/Database.php");

class AdmUser extends Database
{

	public static function  getItem($userID){
		$query = "SELECT adm.userID, adm.clientID, adm.firstName, adm.lastName, adm.userName, adm.password, adm.email, adm.profileID, adm.state
				FROM adm_user as adm
				WHERE adm.userID='$userID' ";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItem_Login($userName, $password){
		$query = "SELECT adm.userID, adm.clientID, adm.firstName, adm.lastName, adm.userName, adm.password, adm.email, adm.profileID, adm.state
				FROM adm_user as adm
				WHERE adm.userName='$userName' AND adm.password='$password' AND state=1 ";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($clientID){
		$list=new Collection();
		$query ="SELECT adm.userID, adm.clientID, adm.firstName, adm.lastName, adm.userName, adm.password, adm.email, adm.profileID, adm.state, prof.profileName
		FROM adm_user AS adm
		INNER JOIN adm_profile AS prof
			ON adm.profileID=prof.profileID
		";
		if($clientID>0) $query .= "WHERE adm.clientID='$clientID'";
		
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Profile($profileID, $clientID){
		$list=new Collection();
		$query ="SELECT adm.userID, adm.clientID, adm.firstName, adm.lastName, adm.userName, adm.password, adm.email, adm.profileID, adm.state, prof.profileName
		FROM adm_user AS adm
		INNER JOIN adm_profile AS prof
			ON adm.profileID=prof.profileID
		WHERE adm.profileID='$profileID'
		";
		if($clientID>0) $query .= "AND adm.clientID='$clientID'";
		
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Notify($clientID, $formID, $contactID){
		$list=new Collection();
		$query ="SELECT adm.userID, adm.clientID, adm.firstName, adm.lastName, adm.userName, adm.password, adm.email, adm.profileID, adm.state, prof.profileName
		FROM adm_user AS adm
		INNER JOIN adm_profile AS prof
			ON adm.profileID=prof.profileID
		WHERE
			adm.userID NOT IN (SELECT userID FROM crm_form_notify WHERE formID='$formID' AND contactID='$contactID')
		";
		if($clientID>0) $query .= " AND adm.clientID='$clientID'";
		
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  getList_Paging($clientID){
		$query ="SELECT adm.userID, adm.clientID, adm.firstName, adm.lastName, adm.userName, adm.password, adm.email, adm.profileID, adm.state, prof.profileName
		FROM adm_user AS adm
		INNER JOIN adm_profile AS prof
			ON adm.profileID=prof.profileID
		";
		if($clientID>0) $query .= "WHERE adm.clientID='$clientID'";
		
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  AddNew($oAdmUser){
		//Search the max Id
		$query = "SELECT MAX(userID) FROM adm_user";
		$result = parent::GetResult($query);
		$oAdmUser->userID = parent::fetchScalar($result)+1;
		//Insert data to table
		$query = "INSERT INTO adm_user(userID, clientID, firstName, lastName, userName, password, email, profileID, state)
				VALUES('$oAdmUser->userID', '$oAdmUser->clientID', '$oAdmUser->firstName', '$oAdmUser->lastName', '$oAdmUser->userName', '$oAdmUser->password', '$oAdmUser->email', '$oAdmUser->profileID', '$oAdmUser->state')";
		return parent::Execute($query);
	}

	public static function  Update($oAdmUser){
		//Update data to table
		$query = "UPDATE adm_user SET 
				clientID	='$oAdmUser->clientID',
				firstName	='$oAdmUser->firstName', 
				lastName	='$oAdmUser->lastName', 
				userName	='$oAdmUser->userName',
				password	='$oAdmUser->password', 
				email		='$oAdmUser->email', 
				profileID	='$oAdmUser->profileID',
				state		='$oAdmUser->state'
			WHERE userID='$oAdmUser->userID'";
		return parent::Execute($query);
	}

	public static function  Delete($oAdmUser){
		$query = "DELETE FROM adm_user WHERE userID='$oAdmUser->userID'";
		return parent::Execute($query);
	}

	public static function  getState($state){
		switch($state){
			case 1: 	return "Activo"; break;
			case 2: 	return "Bloqueado"; break;
			case 0: 	return "Inactivo"; break;
		}
		return "";
	}

}

?>