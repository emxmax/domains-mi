<?php 

date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../config/conexion.php');
include('../models/usuario.php');

$objuser = new Usuario();
/*
	traer la informacion desde JSON
*/
$datauser = $objuser->listarUser($user, $pass);

var_dump($datauser);

/*
<?php 

date_default_timezone_set('America/Lima');//-->definimos la zona horaria

$conexion = mysql_connect("localhost", "xxqitbn_db77722_usrlotes","XPGr1MAojXh3Ot&K");

mysql_select_db("xxqitbn_db77722_menolotes",$conexion);

$q = mysql_query("select * from user",$conexion);

$resultado = mysql_fetch_assoc($q);

var_dump($resultado);


?>

*/
?>