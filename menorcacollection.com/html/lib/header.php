<?php
header('Accept-Ranges: bytes');
$ExpStr = 'Expires: '.gmdate("D, d M Y H:i:s", time() + 14400) . " GMT"; // 14400 = 4 horas
header($ExpStr);
header("Cache-Control: maxage=14400");
header("Cache-Control: public, must-revalidate");
header("Cache-Control: public");
header("pragma: public");
header("Content-Transfer-Encoding:gzip;q=1.0,identity;q=0.5,*;q=0");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_TIME, 'es_PE');
?>