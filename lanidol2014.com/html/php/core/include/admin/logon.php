<?php
if (!AdmLogin::isLogged()){
    header('location: login.php');
    exit();
}
?>