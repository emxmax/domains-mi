<?php

	include "admin/incdes/variable.php";
	
	session_start();
	session_destroy();
	
	header("Location:" . $url . "index.php");
?>