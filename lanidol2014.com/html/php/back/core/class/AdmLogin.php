<?php
require_once("base/Database.php");

class AdmLogin extends Database
{
	private static $arrUser = array();

	public static function Logon($userName, $password)
	{
		$oAdmUser=AdmUser::getItem_Login($userName, $password);
		if($oAdmUser!=null){
			
			$arrMenu=array();
			$arrModule=array();
			
			$lUserEvent=AdmProfileEvent::getList_UserProfile($oAdmUser->profileID);
			foreach($lUserEvent as $obj){ //Add all events by user
				if (!in_array($obj->moduleID, $arrModule)) $arrModule[]+=$obj->moduleID;
			}
			
			$lUserMenu=AdmMenu::getList_UserProfile(implode(',', $arrModule));
			foreach($lUserMenu as $obj){ //Add all menus by user
				$arrMenu[]+=$obj->menuID;
			}

			self::$arrUser["userID"]		=$oAdmUser->userID;
			self::$arrUser["fullName"]		=$oAdmUser->firstName." ".$oAdmUser->lastName;
			self::$arrUser["profileID"]		=$oAdmUser->profileID;
			self::$arrUser["clientID"]		=$oAdmUser->clientID;
			self::$arrUser["userMenu"]		=implode(',', $arrMenu);
			self::$arrUser["userModule"]	=implode(',', $arrModule);
			self::$arrUser["userEventList"]	=serialize($lUserEvent);
			self::RegUserSession();
			return true;
			}
		else 
			return false;
	}

	public static function getUserSession()
	{
	global $ADMIN;
	
		self::$arrUser=(isset($_SESSION[$ADMIN["SESSION"]])) ? $_SESSION[$ADMIN["SESSION"]] : null;
		return self::$arrUser;
	}

	public static function RegUserSession()
	{
	global $ADMIN;
	
		$_SESSION[$ADMIN["SESSION"]]=self::$arrUser;
	}
	
	public static function UnregisterUser()
	{
	global $ADMIN;
	
		$_SESSION[$ADMIN["SESSION"]]=null;
	}

	public static function isLogged()
	{
	global $ADMIN;
	
		return isset($_SESSION[$ADMIN["SESSION"]]);
	}
}

?>
