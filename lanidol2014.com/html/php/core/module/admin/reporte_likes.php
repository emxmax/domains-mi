<?php
$oItem = new eCmsContentLikes();

$oItem->contentID			=$kID;
$oItem->totalLikes			=(isset($_REQUEST["totalLikes"])) ? $_REQUEST["totalLikes"] : NULL;

//$MODULE->processFormAction(new CmsContentLikes(), $oItem);
$MODULE->StaticDAO='CmsContentLikes';
$DAO=$MODULE->StaticDAO;

$DAO::$page=$MODULE->Page;
$DAO::$orderBy=$MODULE->OrderBy;

if($MODULE->Command=='clear'){
	if($DAO::Clear())
		$MODULE->addAlert("Se han eliminado los datos correctamente.");
	else
		$MODULE->addError($DAO::GetErrorMsg());
}

?>
