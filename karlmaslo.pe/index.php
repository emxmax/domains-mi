<?php
$idiomas = explode(";", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
if(strpos($idiomas[0], "es") !== FALSE){
    $language = "es";
}
else{
    $language = "en";
}
//Ante cualquier otro idioma devolvemos "es"
if($language <> "es" && $language <> "en"){
    $language = "es";
}
//dd($language);
header('Location: '.$language.'/');
?>