<?php
if($MODULE->FormView=="section"){
    $oItem = new eCmsSectionLang();

    $oItem->sectionID       =$kID;
    $oItem->langID          =(isset($_REQUEST["langID"])) ? $_REQUEST["langID"] : NULL; //Initialized
    $oItem->minisiteID      =(isset($_REQUEST["minisiteID"])) ? $_REQUEST["minisiteID"] : NULL; //Initialized
    $oItem->title           =(isset($_REQUEST["title"])) ? $_REQUEST["title"] : NULL;
    $oItem->subTitle        =(isset($_REQUEST["subTitle"])) ? $_REQUEST["subTitle"] : NULL;
    $oItem->description     =(isset($_REQUEST["description"])) ? $_REQUEST["description"] : NULL;
    $oItem->resumen         =(isset($_REQUEST["resumen"])) ? $_REQUEST["resumen"] : NULL;
    $oItem->showContent     =(isset($_REQUEST["showContent"])) ? $_REQUEST["showContent"] : NULL;

    $oItem->parentSectionID =(isset($_REQUEST["parentSectionID"])) ? $_REQUEST["parentSectionID"] : NULL;
    $oItem->sectionName     =(isset($_REQUEST["sectionName"])) ? $_REQUEST["sectionName"] : NULL;
    $oItem->showInMenu      =(isset($_REQUEST["showInMenu"])) ? $_REQUEST["showInMenu"] : NULL;
    $oItem->position        =(isset($_REQUEST["position"])) ? $_REQUEST["position"] : NULL;
    $oItem->isMinisite      =(isset($_REQUEST["isMinisite"])) ? $_REQUEST["isMinisite"] : NULL;
    $oItem->isEditable      =(isset($_REQUEST["isEditable"])) ? $_REQUEST["isEditable"] : NULL;
    $oItem->active          =(isset($_REQUEST["active"])) ? $_REQUEST["active"] : NULL;
    $oItem->staticURL       =(isset($_REQUEST["staticURL"])) ? $_REQUEST["staticURL"] : NULL;

    $oItem->parameter   =(isset($_REQUEST["parameter"])) ? $_REQUEST["parameter"] : NULL;
    $oItem->media       =(isset($_REQUEST["media"])) ? $_REQUEST["media"] : NULL;
    $oItem->metaTag     =(isset($_REQUEST["metaTag"])) ? $_REQUEST["metaTag"] : NULL;
    
    $MODULE->processFormAction('CmsSectionLang', $oItem);
    if($MODULE->FormView=="list"){
        header("location: ".$MODULE->getURL());
        exit;
    }
}
else{
    $classDAO="CmsContentLang";
    $oItem = new eCmsContentLang();

    $oItem->contentID       =$kID;
    $oItem->langID          =(isset($_REQUEST["langID"])) ? $_REQUEST["langID"] : NULL; //Initialized
    $oItem->title           =(isset($_REQUEST["title"])) ? $_REQUEST["title"] : NULL;
    $oItem->subTitle        =(isset($_REQUEST["subTitle"])) ? $_REQUEST["subTitle"] : NULL;
    $oItem->subTitle2       =(isset($_REQUEST["subTitle2"])) ? $_REQUEST["subTitle2"] : NULL;
    $oItem->description     =(isset($_REQUEST["description"])) ? $_REQUEST["description"] : NULL;
    $oItem->description2    =(isset($_REQUEST["description2"])) ? $_REQUEST["description2"] : NULL;
    $oItem->description3    =(isset($_REQUEST["description3"])) ? $_REQUEST["description3"] : NULL;
    $oItem->resumen         =(isset($_REQUEST["resumen"])) ? $_REQUEST["resumen"] : NULL;
    $oItem->date            =(isset($_REQUEST["date"])) ? $_REQUEST["date"] : NULL;
    $oItem->linkType        =(isset($_REQUEST["linkType"])) ? $_REQUEST["linkType"] : NULL;
    $oItem->linkContentID   =(isset($_REQUEST["linkContentID"])) ? $_REQUEST["linkContentID"] : NULL;
    $oItem->linkURL         =(isset($_REQUEST["linkURL"])) ? $_REQUEST["linkURL"] : NULL;
    $oItem->linkTarget      =(isset($_REQUEST["linkTarget"])) ? $_REQUEST["linkTarget"] : NULL;
    $oItem->staticURL       =(isset($_REQUEST["staticURL"])) ? $_REQUEST["staticURL"] : NULL;
    $oItem->registerDate    =(isset($_REQUEST["registerDate"])) ? $_REQUEST["registerDate"] : NULL;
    $oItem->active          =(isset($_REQUEST["active"])) ? $_REQUEST["active"] : NULL;
    $oItem->showInHome      =(isset($_REQUEST["showInHome"])) ? $_REQUEST["showInHome"] : NULL;

    $oItem->parentContentID =(isset($_REQUEST["parentContentID"])) ? $_REQUEST["parentContentID"] : NULL;
    $oItem->schemeID        =(isset($_REQUEST["schemeID"])) ? $_REQUEST["schemeID"] : NULL;
    $oItem->minisiteID      =(isset($_REQUEST["minisiteID"])) ? $_REQUEST["minisiteID"] : NULL; //Initialized
    $oItem->contentName     =(isset($_REQUEST["contentName"])) ? $_REQUEST["contentName"] : NULL;
    $oItem->position        =(isset($_REQUEST["position"])) ? $_REQUEST["position"] : NULL;
    $oItem->sectionID       =(isset($_REQUEST["sectionID"])) ? $_REQUEST["sectionID"] : NULL;
    $oItem->templateID      =(isset($_REQUEST["templateID"])) ? $_REQUEST["templateID"] : NULL;

    $oItem->media           =(isset($_REQUEST["media"])) ? $_REQUEST["media"] : NULL;
    $oItem->parameter       =(isset($_REQUEST["parameter"])) ? $_REQUEST["parameter"] : NULL;
    $oItem->metaTag         =(isset($_REQUEST["metaTag"])) ? $_REQUEST["metaTag"] : NULL;

    $MODULE->processFormAction('CmsContentLang', $oItem);
    if($MODULE->ValidateEvent("ADMINISTRAR") && $MODULE->Command=="moveUp" && $oItem->contentID>0){
        $oContent=CmsContent::getItem($oItem->contentID);
        $oContent->append($oItem->sectionID);
        CmsContent::MoveUp($oContent);//Update position
    }
        
}

if(($MODULE->Command=="insert" || $MODULE->Command=="update" || $MODULE->Command=="delete") && $MODULE->FormView=="list"){
    header("location: ".$MODULE->getURL()."&parentContentID=".$oItem->parentContentID."&langID=".$oItem->langID."&minisiteID=".$oItem->minisiteID);
    exit;
}

if($MODULE->FormView=="edit"){
    $obj=CmsContentLang::getItem($kID, $oItem->langID);
    if($obj!=NULL){
        $oItem->parentContentID=$obj->parentContentID;
        $oItem->schemeID=$obj->schemeID;
//      $oItem->langID=$obj->langID;
//      $oItem->minisiteID=$obj->minisiteID;

        if (!isset($oItem->langID))         $oItem->langID=$obj->langID;
        if (!isset($oItem->minisiteID))     $oItem->minisiteID=$obj->minisiteID;

        if (!isset($oItem->title))          $oItem->title=$obj->title;
        if (!isset($oItem->subTitle))       $oItem->subTitle=$obj->subTitle;
        if (!isset($oItem->subTitle2))      $oItem->subTitle2=$obj->subTitle2;
        if (!isset($oItem->description))    $oItem->description=$obj->description;
        if (!isset($oItem->description2))   $oItem->description2=$obj->description2;
        if (!isset($oItem->description3))   $oItem->description3=$obj->description3;
        if (!isset($oItem->resumen))        $oItem->resumen=$obj->resumen;
        if (!isset($oItem->date))           $oItem->date=$obj->date;
        if (!isset($oItem->linkType))       $oItem->linkType=$obj->linkType;
        if (!isset($oItem->linkContentID))  $oItem->linkContentID=$obj->linkContentID;
        if (!isset($oItem->linkURL))        $oItem->linkURL=$obj->linkURL;
        if (!isset($oItem->linkTarget))     $oItem->linkTarget=$obj->linkTarget;
        if (!isset($oItem->staticURL))      $oItem->staticURL=$obj->staticURL;
        
        if (!isset($oItem->media))          $oItem->media=XMLParser::getArray_Media($obj->media);
        if (!isset($oItem->parameter))      $oItem->parameter=XMLParser::getArray_Parameter($obj->parameter);
        if (!isset($oItem->metaTag))        $oItem->metaTag=XMLParser::getArray_MetaTag($obj->metaTag);

        if (!isset($oItem->registerDate))   $oItem->registerDate=$obj->registerDate;
        if (!isset($oItem->active))         $oItem->active=$obj->active;
        if (!isset($oItem->showInHome))     $oItem->showInHome=$obj->showInHome;

        if (!isset($oItem->contentName))    $oItem->contentName=$obj->contentName;
        if (!isset($oItem->position))       $oItem->position=$obj->position;
        if (!isset($oItem->sectionID))      $oItem->sectionID=$obj->sectionID;
        if (!isset($oItem->templateID))     $oItem->templateID=$obj->templateID;
    }       
    else
        $MODULE->addError(CmsContentLang::GetErrorMsg());
}

if($MODULE->FormView!="list" && isset($oItem->schemeID)){
    //Get Scheme
    $oScheme=CmsScheme::getItem($oItem->schemeID);
    $MODULE->ItemTitle=$oItem->title;
    $MODULE->ItemType=$oScheme->templateName;
}

?>
