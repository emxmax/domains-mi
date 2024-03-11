<?php
session_start();
require_once("../../config/main.php");
header('Content-type: text/html');
function ResponseJS($data){
	echo json_encode($data);
    exit;
}

if (!AdmLogin::isLogged()){
    $data = array('error' => 'Acceso denegado!');
	ResponseJS($data);
}

$folder = OWASP::RequestString('folder');

if(isset($_FILES['filedata']) && !empty($_FILES['filedata'])){

    $tempFile   = $_FILES['filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $WEBSITE["ROOT"] . $folder;
    $fileName   =  TextParser::parseFileName($_FILES['filedata']['name']); //Testear en produccion
    $targetFile =  str_replace('//', '/', $targetPath) . $fileName;
    
    if(!is_dir($targetPath) && !mkdir($targetPath, 0777, true)){
        $data = array('error' => 'No se puede crear el directorio: '.$targetPath);
        ResponseJS($data);
    }

    UploadFile::$Config["max_filesize"]       =1012400*10;//10Mb;
    if(UploadFile::ValidateUpload($_FILES['filedata'])){
        UploadFile::MoveUploaded($_FILES['filedata'], $targetFile);
        $data = array('filename' => $fileName);
    }
    else
        $data = array('error' => 'Error de escritura.');

}
else
     $data = array('error' => 'No se ha seleccionado el archivo');

ResponseJS($data);
?>