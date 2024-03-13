<?php
	include "url.php";

	define("DB_SERVER","localhost");
	define("DB_USER","xxqitbn_db77722_sonrie");
	define("DB_PASSWORD","DaWZO?Wm?n&goJP7");
	define("DB_DATABASE","xxqitbn_db77722_redgalar");

	function db_connect()
	{
		$result = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
		if (!$result)
			return false;
		if (!mysql_select_db(DB_DATABASE))
			return false;
		return $result;
	}
	
?>