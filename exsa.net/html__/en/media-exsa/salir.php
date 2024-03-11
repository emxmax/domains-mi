<?php
session_start(); 
session_destroy();
header("Location: login.html"); 
    //ademas salgo de este script 
    exit(); 
?>
