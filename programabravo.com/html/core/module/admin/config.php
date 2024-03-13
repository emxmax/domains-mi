<?php

if($MODULE->Command=="update" && isset($_REQUEST['value'])){
	$flgUpdate=false;
	foreach ($_REQUEST['value'] as $id=> $value){
		$oItem = new eConfig();
		
		$oItem->configID		=$id;
		$oItem->value			=$value;
		
		$flgUpdate=Config::Update($oItem);
	}
	
	if($flgUpdate){
		$MODULE->addAlert("Se han actualizado los datos!");	
	}
	
}

//$MODULE->processFormAction('Config', $oItem);

?>
