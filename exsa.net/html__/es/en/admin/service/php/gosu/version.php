<?php 
	$version =  phpversion();
	if($version >"5.3.0" && $version <"5.4.0"){
		error_reporting(E_ALL ^ E_NOTICE);
	}
	else if($version >="5.4.0"){
		error_reporting(E_ALL ^ E_STRICT);
	}
	//error_reporting(E_WARNING );
 ?>