<?php
session_start();

	$arrSessions=$_SESSION; 
	session_destroy(); 
	foreach ($arrSessions as $session_name => $session_value) { 
		unset($session_name); 
	} 
	unset($arrSessions); 
	header("location: index.php");
	exit;
?>
