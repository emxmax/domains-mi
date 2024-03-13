<?php 
$enlace = "descarga-atlas.rar";
header ("Content-Disposition: attachment; filename=descarga-atlas.rar");
header ("Content-Type: application/octet-stream"); 
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>
