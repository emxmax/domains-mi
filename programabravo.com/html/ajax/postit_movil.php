<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require_once("../core/include/admin/header_ajax.php");
require_once("../core/config/main.php");

$command	=(isset($_REQUEST['cmd'])) 	? $_REQUEST['cmd'] : NULL;
$filtro		=(isset($_REQUEST['filtro'])) ? $_REQUEST['filtro'] : NULL;
$personaID	=(isset($_REQUEST['pID'])) ? $_REQUEST['pID'] : NULL;
$postitID	=(isset($_REQUEST['pstID'])) ? $_REQUEST['pstID'] : NULL;
$query		=(isset($_REQUEST['query'])) ? $_REQUEST['query'] : NULL;
$page		=(isset($_REQUEST['page'])) ? $_REQUEST['page'] : NULL;

switch($command){
	case 'search':
		SearchList($query);
		break;
	case 'like':
		AddLike($postitID);
		break;
	default:
		GetList($filtro, $personaID);
		break;
}

function SearchList($query){
global $WEBSITE;
	$list=CrmPostIt::Search($query);
	
	if($list->getLength()==0){
		NotFound();
		return;
	}
	
	echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>';
	  
	foreach($list as $obj){
		echo ' <td valign="top"><div class="reconoce'.$obj->typeID.'">'.getPostItItem($obj).'</div></td>';
	}
	
	echo '<tr>
	</table>';
}

function GetList($filtro, $personaID){
global $WEBSITE;
	$list=CrmPostIt::GetList($filtro, $personaID);
	
	if($list->getLength()==0){
		NotFound();
		return;
	}
	
	echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>';
	  
	foreach($list as $obj){
		echo ' <td valign="top"><div class="reconoce'.$obj->typeID.'">'.getPostItItem($obj).'</div></td>';
	}
	
	echo '<tr>
	</table>';
}

function AddLike($postitID){
global $WEBSITE;
session_start();

	if($_SESSION["liteCMS_WEB"]!=NULL){
		$UsrSession	=$_SESSION["liteCMS_WEB"];

		if(CrmPostIt::Validar_AddLike($postitID, $UsrSession["personaID"])){
			if (CrmPostIt::AddLike($postitID, $UsrSession["personaID"])){
				echo CrmPostIt::getTotalLikes($postitID);
				
				//Registro de Logs
				$oEmpleadoLog=new eCrmEmpleadoLog();
				$oEmpleadoLog->personaID	=$UsrSession["personaID"];
				$oEmpleadoLog->moduleID		=21;
				$oEmpleadoLog->contentID	=0;
				$oEmpleadoLog->observacion	="LIKE: ".$postitID;
				CrmEmpleadoLog::AddNew($oEmpleadoLog);

				return;
			}
		}
	}

	echo '0';
}

function getPostItItem($oItem){
	$postit_view=file_get_contents("../view/movil/postit/view_default.html");
	$postit_view=str_replace("%%ID%%", $oItem->postitID, $postit_view);
	$postit_view=str_replace("%%ORIGEN%%", ucwords(strtolower($oItem->origen)), $postit_view);
	$postit_view=str_replace("%%DESTINO%%", ucwords(strtolower($oItem->destino)), $postit_view);
	$postit_view=str_replace("%%MUNDO%%", ucwords(strtolower($oItem->mundo)), $postit_view);
	$postit_view=str_replace("%%MENSAJE%%", "&ldquo;".$oItem->mensaje."&rdquo;", $postit_view);
	$postit_view=str_replace("%%VOTOS%%", $oItem->votos, $postit_view);
	
	return utf8_decode($postit_view);
}

function NotFound(){
	echo '<table width="500" height="200" align="center">
			<tr><td align="center" class="letra18blanco"><p>No se han encontrado resultados</p></td>
		<tr></table>';
}

?>
