<?php
session_start();
require_once("../../config/main.php");
if (!AdmLogin::isLogged()){
	echo "acceso denegado!";
	exit();
}

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=ISO-8859-1');

$command	=(isset($_REQUEST['cmd'])) 	? $_REQUEST['cmd'] : NULL;
$groupID	=(isset($_REQUEST['gID'])) 	? $_REQUEST['gID'] : NULL;
$fileName	=(isset($_REQUEST['fName']))? $_REQUEST['fName'] : NULL;
$basePath	=(isset($_REQUEST['path'])) ? $_REQUEST['path'] : NULL;
$mediaID	=(isset($_REQUEST['mID'])) 	? $_REQUEST['mID'] : NULL;

switch($command){
    case 'filelist':
            ShowFiles($basePath);
            break;
    case 'path':
            CMSMediaGroup_GetPath($groupID);
            break;
    case 'file':
            CMSMedia_GetFile($mediaID);
            break;
    case 'list':
            CMSMedia_ShowList($groupID);
            break;
    case 'add':
            CMSMedia_AddNew($groupID, $fileName);
            break;
    case 'delete':
            if(isset($basePath) && isset($fileName))
                    Delete_File($basePath, $fileName);
            else{
                    if(isset($mediaID)) CMSMedia_Delete($mediaID);
            }
            break;
}

function getFileIcon($filePath){

    $fileType= CmsMedia::getMediaType($filePath);
    $arrExts = pathinfo(strtolower($filePath)); 
    $fileExt = $arrExts['extension']; 

    $pathIcons = '../core/plugins/media-picker/icons/';

    switch ($fileType){
        case 'document':
        case 'animation':
        case 'video':
        case 'audio':
        case 'web-file':
        case 'zip-file':
                $filePath=$pathIcons.$fileExt.'.gif';
                break;
        case 'unknown':
                $filePath=$pathIcons.'unknown.gif';
                break;
        case 'image':
                $filePath='../core/plugins/media-picker/thumbnail.php?img='.$filePath.'&w=74&h=82';
    }
    return 	$filePath;
}

function ShowFiles($basePath){
    if ($handle = opendir('../../../'.$basePath)) {

        $flist=array(); $i=0;
        //Get file list for ordering
        while (false !== ($file = readdir($handle))){
                if($file=="." || $file=="..") continue;
                $flist[$i++]=$file;
        }
        closedir($handle);

        if(count($flist)==0){
                echo "<p>No existen archivos, debe cargar uno nuevo.</p>";
                return;
        }

        sort($flist);
        foreach($flist as $file){
                $filePath = '../'.$basePath.$file;
                echo "<li><a href=\"#\" id=\"".$file."\" title=\"".$filePath."\"><img class=\"icon\" src=\"".getFileIcon($filePath)."\" />".$file."</a></li>\n";
        }
    }
    else
        echo "<p>ERROR DE APLICACION:<br />(no se puede ubicar el directorio $basePath)</p>";
}

function CMSMediaGroup_GetPath($groupID){
    $oGroup=CmsMediaGroup::getItem($groupID);
    if($oGroup!=NULL)
        echo $oGroup->basePath;
    else
        echo "<p>No se ha definido una ruta para este grupo ($groupID).</p>";
}


function CMSMedia_GetFile($mediaID){
    $oMedia=CmsMedia::getItem($mediaID);
    if($oMedia!=NULL){
        $oGroup=CmsMediaGroup::getItem($oMedia->groupID);
        $basePath="../".$oGroup->basePath;
        echo "<img class=\"icon\" src=\"".getFileIcon($basePath.$oMedia->mediaName)."\" />".$oMedia->mediaName;
    }
    else
        echo "<span>No disponible (media=$mediaID)</span>";
}

function CMSMedia_ShowList($groupID, $mediaID=NULL){
    $oGroup=CmsMediaGroup::getItem($groupID);
    if($oGroup!=NULL){
        $basePath='../'.$oGroup->basePath;
        $lsFiles=CmsMedia::getList($groupID);
        if($lsFiles->getLength()==0){
            echo "<p>No existen archivos, debe cargar uno nuevo.</p>";
            return;
        }
        foreach($lsFiles as $oMedia){
            echo "<li><a href=\"#\" id=\"".$oMedia->mediaID."\" title=\"".$basePath.$oMedia->mediaName."\"><img class=\"icon\" src=\"".getFileIcon($basePath.$oMedia->mediaName)."\" />".$oMedia->mediaName."</a></li>\n";
        }
    }
    else
        echo "<p>Error interno:<br />(no se ha definido el grupo $groupID en la base de datos)</p>";
}

function CMSMedia_AddNew($groupID, $fileName){
    $oMedia=new eCmsMedia(null, $groupID, $fileName);
    if(CmsMedia::AddNew($oMedia))
        echo "1";
    else
        echo "<p>Error:".CmsMedia::GetErrorMsg()."</p>";
}

function Delete_File($basePath, $file){
    $filePath='../../../'.$basePath.$file;
    if(Unlink_File($filePath))
        echo "1";
    else
        echo "<p>Error: No se puede eliminar el archivo $filePath</p>";
}

function CMSMedia_Delete($mediaID){
    $oMedia=CmsMedia::getItem($mediaID);
    if($oMedia!=NULL){
        $oGroup=CmsMediaGroup::getItem($oMedia->groupID);
        $filePath='../../../'.$oGroup->basePath.$oMedia->mediaName;

        if(!file_exists($filePath)){
                echo (CmsMedia::Delete($oMedia)) ? "1" :"Error: ".CmsMedia::GetErrorMsg();
                return;
        }

        if(Unlink_File($filePath)){
                echo (CmsMedia::Delete($oMedia)) ? "1" :"Error: ".CmsMedia::GetErrorMsg();
        }
        else
                echo "<p>Error: No se puede eliminar el archivo $filePath</p>";
    }
    else
            echo "<p>Error: No existe en la base de datos (mediaID=$mediaID)</p>";

}

function Unlink_File($filePath){
    if(!file_exists($filePath)) return false;
    if(!@unlink($filePath)) return false;

    return true;
}
?>