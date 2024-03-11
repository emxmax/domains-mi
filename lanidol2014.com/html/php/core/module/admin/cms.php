<?php
$filtro=OWASP::RequestString('filtro');

if($MODULE->FormView=="section"){
    $oItem = new eCmsSectionLang();

    $oItem->sectionID       =$kID;
    $oItem->langID          = OWASP::RequestInt('langID');
    
    $oItem->title           = OWASP::RequestString('title');
    $oItem->subTitle        = OWASP::RequestString('subTitle');
    $oItem->description     = OWASP::RequestString('description');
    $oItem->resumen         = OWASP::RequestString('resumen');
    
    $oItem->showContent     = OWASP::RequestInt('showContent');
    $oItem->parentSectionID = OWASP::RequestString('parentSectionID');
    
    $oItem->sectionName     = OWASP::RequestString('sectionName');
    $oItem->position        = OWASP::RequestString('position');
    $oItem->isMinisite      = OWASP::RequestString('isMinisite');
    $oItem->isEditable      = OWASP::RequestString('isEditable');
    $oItem->active          = OWASP::RequestString('active');
    $oItem->staticURL       = OWASP::RequestString('staticURL');

    $oItem->media           = OWASP::RequestArray('media');
    $oItem->parameter       = OWASP::RequestArray('parameter');
    $oItem->metaTag         = OWASP::RequestArray('metaTag');

    if(!isset($oItem->langID) && isset($_SESSION["langID"])) $oItem->langID=filter_var($_SESSION["langID"]);
    $MODULE->processFormAction('CmsSectionLang', $oItem);
    if($MODULE->FormView=="list"){
        header("location: ".$MODULE->getURL());
        exit;
    }
}
else{
    $classDAO="CmsContentLang";
    $oItem = new eCmsContentLang();

    $oItem->contentID       = $kID;
    $oItem->langID          = OWASP::RequestInt('langID');

    $oItem->title           = OWASP::RequestString('title');
    $oItem->subTitle        = OWASP::RequestString('subTitle');
    $oItem->subTitle2       = OWASP::RequestString('subTitle2');
    $oItem->description     = OWASP::RequestHTML('description');
    $oItem->description2    = OWASP::RequestHTML('description2');
    $oItem->description3    = OWASP::RequestHTML('description3');
    $oItem->resumen         = OWASP::RequestHTML('resumen');
    $oItem->date            = OWASP::RequestString('date');
    
    $oItem->linkType        = OWASP::RequestInt('linkType');
    $oItem->linkContentID   = OWASP::RequestInt('linkContentID');
    $oItem->linkURL         = OWASP::RequestString('linkURL');
    $oItem->linkTarget      = OWASP::RequestString('linkTarget');
    $oItem->staticURL       = OWASP::RequestString('staticURL');
    $oItem->registerDate    = OWASP::RequestString('registerDate');
    $oItem->active          = OWASP::RequestInt('active');
    $oItem->showInHome      = OWASP::RequestInt('showInHome');
    
    $oItem->parentContentID = OWASP::RequestInt('parentContentID');
    $oItem->schemeID        = OWASP::RequestInt('schemeID');
    $oItem->contentName     = OWASP::RequestString('contentName');
    $oItem->position        = OWASP::RequestInt('position');
    $oItem->sectionID       = OWASP::RequestInt('sectionID');
    $oItem->templateID      = OWASP::RequestInt('templateID');

    $oItem->media           = OWASP::RequestArray('media');
    $oItem->parameter       = OWASP::RequestArray('parameter');
    $oItem->metaTag         = OWASP::RequestArray('metaTag');

    if(!isset($oItem->langID) && isset($_SESSION["langID"])) $oItem->langID=filter_var($_SESSION["langID"]);
    $MODULE->processFormAction('CmsContentLang', $oItem);
    if($MODULE->ValidateEvent("ADMINISTRAR") && $MODULE->Command=="moveUp" && $oItem->contentID>0){
        $oContent=CmsContent::getItem($oItem->contentID);
        $oContent->append($oItem->sectionID);
        CmsContent::MoveUp($oContent);//Update position
    }

}

if(($MODULE->Command=="insert" || $MODULE->Command=="update" || $MODULE->Command=="delete") && $MODULE->FormView=="list"){
    header("location: ".$MODULE->getURL()."&parentContentID=".$oItem->parentContentID);
    exit;
}
if($MODULE->Command=="reorder" && $MODULE->FormView=="sort"){
    $kIDs=OWASP::RequestString('kIDs');
    $aItems=explode(',', $kIDs);
    if(is_array($aItems) && CmsContent::UpdatePositionList($aItems)){
	echo '<script type="text/javascript"> parent.set_reload=true; parent.$.modal.close(); </script>';
	exit;
    }
}

if($MODULE->FormView=="edit"){
    $obj=CmsContentLang::getItem($kID, $oItem->langID);
    if($obj!=NULL){
        $oItem->parentContentID=$obj->parentContentID;
        $oItem->schemeID=$obj->schemeID;

        if (!isset($oItem->title)) 		$oItem->title=$obj->title;
        if (!isset($oItem->subTitle)) 		$oItem->subTitle=$obj->subTitle;
        if (!isset($oItem->subTitle2)) 		$oItem->subTitle2=$obj->subTitle2;
        if (!isset($oItem->description)) 	$oItem->description=$obj->description;
        if (!isset($oItem->description2)) 	$oItem->description2=$obj->description2;
        if (!isset($oItem->description3)) 	$oItem->description3=$obj->description3;
        if (!isset($oItem->resumen)) 		$oItem->resumen=$obj->resumen;
        if (!isset($oItem->date)) 		$oItem->date=$obj->date;
        if (!isset($oItem->linkType)) 		$oItem->linkType=$obj->linkType;
        if (!isset($oItem->linkContentID)) 	$oItem->linkContentID=$obj->linkContentID;
        if (!isset($oItem->linkURL)) 		$oItem->linkURL=$obj->linkURL;
        if (!isset($oItem->linkTarget)) 	$oItem->linkTarget=$obj->linkTarget;
        if (!isset($oItem->staticURL)) 		$oItem->staticURL=$obj->staticURL;

        if (!isset($oItem->media)) 		$oItem->media=XMLParser::getArray_Media($obj->media);
        if (!isset($oItem->parameter)) 		$oItem->parameter=XMLParser::getArray_Parameter($obj->parameter);
        if (!isset($oItem->metaTag)) 		$oItem->metaTag=XMLParser::getArray_MetaTag($obj->metaTag);

        if (!isset($oItem->registerDate)) 	$oItem->registerDate=$obj->registerDate;
        if (!isset($oItem->active)) 		$oItem->active=$obj->active;
        if (!isset($oItem->showInHome)) 	$oItem->showInHome=$obj->showInHome;

        if (!isset($oItem->contentName)) 	$oItem->contentName=$obj->contentName;
        if (!isset($oItem->position)) 		$oItem->position=$obj->position;
        if (!isset($oItem->sectionID)) 		$oItem->sectionID=$obj->sectionID;
        if (!isset($oItem->templateID)) 	$oItem->templateID=$obj->templateID;
    }		
    else
        $MODULE->addError(CmsContentLang::GetErrorMsg());
}

if($MODULE->FormView!="list" && isset($oItem->schemeID)){
    //Get Scheme
    $oScheme=CmsScheme::getItem($oItem->schemeID);
    $MODULE->ItemTitle=$oItem->title;
    $MODULE->ItemType=$oScheme->alias;
}

$_SESSION["langID"]=$oItem->langID;
?>
