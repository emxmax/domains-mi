<?php
require_once("base/Database.php");

class CrmFormNotify extends Database
{

	public static function  getItem($formID, $userID){
		$query ="SELECT frm.formID, frm.userID, frm.recipients, frm.active, usr.firstName, usr.lastName, usr.email
			FROM
				crm_form_notify AS frm 
			INNER JOIN adm_user AS usr 
				ON usr.userID=frm.userID
			WHERE
				frm.formID='$formID'
				AND frm.userID='$userID'";

		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($clientID, $formID){
		$query ="SELECT frm.formID, frm.userID, frm.recipients, frm.active, usr.firstName, usr.lastName, usr.email
			FROM
				crm_form_notify AS frm 
			INNER JOIN adm_user AS usr 
				ON usr.userID=frm.userID
			WHERE
				usr.clientID='$clientID'
				AND frm.formID='$formID'
			ORDER BY
				usr.firstName, usr.lastName";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Paging($clientID, $formID){
		$query ="SELECT frm.formID, frm.userID, frm.recipients, frm.active, usr.firstName, usr.lastName, usr.email
			FROM
				crm_form_notify AS frm 
			INNER JOIN adm_user AS usr 
				ON usr.userID=frm.userID
			WHERE
				usr.clientID='$clientID'
				AND frm.formID='$formID'
			";
		if(self::$orderBy=="") self::$orderBy="usr.firstName, usr.lastName ASC";

		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  AddNew($oFormNotify){
		//Update data to table
		$query = "INSERT INTO crm_form_notify(formID, userID, recipients, active)
					VALUES ('$oFormNotify->formID', '$oFormNotify->userID', '$oFormNotify->recipients', '$oFormNotify->active')";

		return parent::Execute($query);
	}
	
	public static function  Update($oFormNotify){
		//Update data to table
		$query = "UPDATE crm_form_notify SET 
					recipients	='$oFormNotify->recipients',
					active		='$oFormNotify->active'
				WHERE formID ='$oFormNotify->formID'
					AND userID ='$oFormNotify->userID'";
		return parent::Execute($query);
	}

	public static function  Delete($oFormNotify){
		$query = "DELETE FROM crm_form_notify 
				WHERE formID ='$oFormNotify->formID'
					AND userID ='$oFormNotify->userID'";
		parent::Execute($query);
	}

}

?>