<?php
    if(isset($_FILES["file"]))
    {
        $file=$_FILES["file"];
        $nombre=$file["name"];

        $nombre = str_replace(" ", "-", $nombre);
        $tipo=$file["type"];
        $ruta_provisional=$file["tmp_name"];
        $size=$file["size"];
        $carpeta="../documentos/";
        $src=$carpeta.$nombre;
        $resultado=move_uploaded_file($ruta_provisional, $src);

        $trozos = explode(".", $nombre); 
        $extension = end($trozos); 
        $peso_archivo = filesize($src);
        $tamano=tamano_archivo($peso_archivo);

        $results=array();
        $results[0]=$tamano;
        $results[1]=$extension;
        $results[2]=$nombre;
        echo json_encode($results);
    }

    function tamano_archivo($peso , $decimales = 2 ) {
        $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
        return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
    }
?>