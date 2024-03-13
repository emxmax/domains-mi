<?php
require_once("lib/config.php");
if (isset($_POST["estado"]) and $_POST["estado"]=="1") {
	require_once("controller/logeoController.php");
}
else {
	require_once("controller/loginController.php");
}
?>