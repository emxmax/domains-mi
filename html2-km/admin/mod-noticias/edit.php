<?php

include '../../util/conexion.php';
$cn = db_connect();

$no_id = $_POST["no_id"];
$no_titulo = $_POST["no_titulo"];
$no_url = $_POST["no_url"];
$no_fecha = $_POST["no_fecha"];
$no_categoria = $_POST["cat_id"];
$no_img = $_POST["no_img"];
$no_desc = $_POST["no_desc"];

if ($_FILES['fgal_img']['tmp_name'] != "") {

    // Capturando la imagen
    $tmp_name_file = $_FILES["fgal_img"]["tmp_name"];
    $name_file_img = $_FILES["fgal_img"]["name"];
    $no_img = $name_file_img;

    // Moviendo la imagen a un directorio
    move_uploaded_file($tmp_name_file, "img/$name_file_img");
}

//Inserción en utf8
mysql_query("SET NAMES 'utf8");

// ACTUALIZAR
$sql = "UPDATE noticia SET 
				no_titulo = '$no_titulo',
				no_fecha = '$no_fecha',
                                cat_id = '$no_categoria',
				no_img = '$no_img',
				no_desc = '$no_desc',
				no_url = '$no_url' 				
			WHERE no_id = $no_id";

if (mysql_query($sql, $cn)) {
    header("Location:editar.php?no_id=" . $no_id . "&sw=1");
} else {
    header("Location:editar.php?no_id=" . $no_id . "&sw=2");
}
?>