<?php

	include "incdes/variable.php";
	
	session_start();
	session_destroy();
	
	header("Location:" . $urladmin . "login.php");
?>