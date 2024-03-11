<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conec = "internal-db.s77722.gridserver.com";
$database_conec = "db77722_eco";
$username_conec = "db77722_ecodb";
$password_conec = "dataXX145@eco";
$conec = mysql_pconnect($hostname_conec, $username_conec, $password_conec) or trigger_error(mysql_error(),E_USER_ERROR); 
?>