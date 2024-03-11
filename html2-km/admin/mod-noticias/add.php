<?php

include "../../util/conexion.php";
$cn = db_connect();

$no_titulo = $_POST["no_titulo"];
$no_url = $_POST["no_url"];
$no_fecha = $_POST["no_fecha"];
$no_categoria = $_POST["cat_id"];
$no_img = $_POST["no_img"];
$no_desc = $_POST["no_desc"];

if ($no_titulo == "" || $no_fecha == "" || $no_desc == "") {
    header("Location:nuevo.php?sw=3");
} else {

    // Capturando el archivo
    $tmp_name_file = $_FILES["no_img"]["tmp_name"];
    $name_file_arch = $_FILES["no_img"]["name"];

    // Moviendo el archivo a un directorio
    move_uploaded_file($tmp_name_file, "img/$name_file_arch");


    //Inserción en utf8
    mysql_query("SET NAMES 'utf8");

    // Registrar datos a la tabla
    $sql = "INSERT INTO noticia (no_titulo,cat_id,no_img,no_desc,no_fecha,no_url)
				VALUES('$no_titulo','$no_categoria','$name_file_arch','$no_desc','$no_fecha','$no_url')";

    if (mysql_query($sql, $cn)) {
        header("Location:nuevo.php?sw=1");
    } else {
        header("Location:nuevo.php?sw=2");
    }
}
?>