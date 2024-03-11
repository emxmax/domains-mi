<?php
session_start();
header("content-type: utf-8");
require("../core/config/main.php");

$command=OWASP::RequestString('cmd');
$contentID=OWASP::RequestInt('pID');

switch($command){
	case 'like':
		AddLike($contentID);
		break;
}

function AddLike($contentID){

	$usrSession=WebLogin::getUserSession();
	$personaID=$usrSession['personaID'];

	if($usrSession==null){
		RaiseError('Tu usuario no se encuentra registrado. Intentalo mas tarde.');
		return;
	}

	$oLike=CmsContentLikes::getItem($contentID, $personaID);
	$isLiked=($oLike!=null);
	
	if($isLiked){
		RaiseError('Lo sentimos, pero ya has votado por esta foto. Gracias');
		return;
	}
	
	$oLike=new eCmsContentLikes($contentID, $personaID);
	if (CmsContentLikes::AddNew($oLike)){
		$totalLikes= CmsContentLikes::getTotalLikes($contentID);
		Response($totalLikes, 'Felicitaciones, has votado por esta foto. Gracias');
		return;
	}

}


function Response($rval, $msg){
	echo $_GET['callback'].
	"({
		'retval': ".intval($rval).",
		'message': '".$msg."'
	})";
}

function RaiseError($err){
	echo $_GET['callback'].
	"({
		'retval': 0,
		'message': '".$err."'
	})";
}
?>