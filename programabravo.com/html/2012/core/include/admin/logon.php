<?php
if (!AdmLogin::isLogged()){
	include("../core/module/admin/login.php");
	include("../core/themes/admin/login_template.php");
	exit();
}
?>