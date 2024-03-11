<?php
require_once("base/Database.php");

class WebLogin extends Database
{
	private static $usrSession = array();

	public static function Logon($userName, $password, $rememberMe=false)
	{
		$oCrmEmpleado=CrmEmpleado::getItem_Login($userName, $password);
		if($oCrmEmpleado!=NULL){
			self::$usrSession["personaID"]		=$oCrmEmpleado->personaID;
			self::$usrSession["nombres"]		=ucwords(strtolower($oCrmEmpleado->nombres));
			self::$usrSession["nombreCompleto"]	=ucwords(strtolower($oCrmEmpleado->nombres." ".$oCrmEmpleado->apellido1." ".$oCrmEmpleado->apellido2));
			self::$usrSession["dni"]			=$oCrmEmpleado->dni;

			self::$usrSession["nombres"]		=htmlentities(self::$usrSession["nombres"]);
			self::$usrSession["nombreCompleto"]	=htmlentities(self::$usrSession["nombreCompleto"]);

			self::RegUserSession();
			return true;
			}
		else 
			return false;
	}

	public static function getUserSession()
	{
		self::$usrSession=self::isLogged() ? $_SESSION['USER_INFO'] : NULL;
		return self::$usrSession;
	}

	public static function RegUserSession($rememberMe=false)
	{
		$_SESSION['USER_INFO']=self::$usrSession;
		if($rememberMe){
			$expire=time()+(3600*24*365);
			setcookie('USER_INFO', serialize($_SESSION['USER_INFO']), $expire, '/');
		}
	}
	
	public static function UnregisterUser()
	{
		$_SESSION['USER_INFO']=NULL;
	}

	public static function isLogged()
	{
		if(isset($_COOKIE['USER_INFO'])) $_SESSION['USER_INFO']=unserialize($_COOKIE['USER_INFO']);
		
		return isset($_SESSION['USER_INFO']);
	}
}

?>
