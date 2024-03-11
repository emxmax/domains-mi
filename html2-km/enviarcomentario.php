<?php
include "util/conexion.php";
$cn = db_connect();

$com_name = $_POST["com_name"];
$no_id = $_POST["no_id"];
$no_url = $_POST["no_url"];
$com_email = $_POST["com_email"];
$com_mensaje = $_POST["com_mensaje"];

$com_fecha = date("Y")."-".date("m")."-".date("d");

if ($com_name == "" || $com_email == "" || $com_mensaje == "") {
    header("Location:noticias/".$no_url);
} else {

    //Inserción en utf8
    mysql_query("SET NAMES 'utf8");

    // Registrar datos a la tabla
    $sql = "INSERT INTO comentario (com_name,com_email,com_mensaje,com_fecha,no_id)
				VALUES('$com_name','$com_email','$com_mensaje','$com_fecha','$no_id')";

    if (mysql_query($sql, $cn)) {
        header("Location:noticias/".$no_url);
    } else {
        header("Location:noticias/".$no_url);
    }
}
?>