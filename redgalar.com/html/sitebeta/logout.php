<?php

	include "util/url.php";
	
	session_start();
	session_destroy();
	
	header("Location:" . $url . "registro");
?>