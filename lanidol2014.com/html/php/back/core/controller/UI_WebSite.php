<?php
class UI_WebSite{

var $pageTitle;
var $metaTag;

var $oContentLang;
var $oSectionLang;
var $contentID;
var $sectionID;
var $langID;
var $minisiteID;
var $staticURL;

var $currentTheme;
var $arrParent;
var $lContentPath;
var $Command;
var $UsrSession;
var $msgError;
    
    function __construct($staticURL, $contentID, $sectionID, $langID, $minisiteID, $Command, $lightbox=FALSE){

        $this->staticURL    =$staticURL;
        $this->contentID    =$contentID;
        $this->sectionID    =$sectionID;
        $this->langID       =$langID;
        $this->minisiteID   =$minisiteID;
        
        $this->Command      =$Command;
        $this->module       ="home"; // Default Module
        $this->UsrSession   =(isset($_SESSION["liteCMS_STM_WEB"])) ? $_SESSION["liteCMS_STM_WEB"] : NULL;
        $this->arrParent    =array();
        $this->lContentPath =new Collection();
        
        $this->pageTitle    =SEO::get_SiteName();
        $this->metaTag      =array('title'=>'', 'description'=>'', 'keywords'=>'');

        if($this->staticURL!=NULL)
            $this->loadStaticURL();
        else
            $this->loadContentID();

        if($this->oContentLang==NULL && $this->oSectionLang!=NULL && $this->oSectionLang->showContent==0){
            $lContent=CmsContentLang::getWebList(0, $this->oSectionLang->sectionID, $this->oSectionLang->langID, $this->oSectionLang->minisiteID);
            $this->oSectionLang = null;
            if($lContent->getLength()>0)
                header("location: ".SEO::get_URLContent($lContent->getItem(0)));
        }

        if($this->oContentLang!=NULL){
            
            $this->validatePage();//verify template type
            
            $this->sectionID    =$this->oContentLang->sectionID;
            $this->langID       =$this->oContentLang->langID;
            $this->minisiteID   =$this->oContentLang->minisiteID;
            
            $parentID=$this->oContentLang->parentContentID;
            while(intval($parentID)>0){
                $this->arrParent[]= $parentID;
                $oParent=CmsContentLang::getItem($parentID, $this->langID, $this->minisiteID);
                $this->lContentPath->addItem($oParent, $parentID);
                $parentID=(isset($oParent))? $oParent->parentContentID: 0;
            }
            $this->lContentPath->sortKeys();
        }
        
        $this->setPageHeaders();
        $this->setCurrentTheme($lightbox);
    }
    
    function loadStaticURL(){
    global $WEBSITE;
    
        $arrUrl=explode("/", $this->staticURL);
        $match=($WEBSITE["MINISITE"]!="") ? preg_match("/".str_replace($WEBSITE["MINISITE"], "/", "")."/i", $this->staticURL): FALSE; //valida si se visualiza en version movil
        
        if((count($arrUrl)>1 && !$match) || (count($arrUrl)>2)){ //validar para el caso de minisites
            $this->oContentLang = CmsContentLang::getWebItem_StaticURL($this->staticURL);
            if($this->oContentLang!=NULL){
                $this->oSectionLang =CmsSectionLang::getWebItem( $this->oContentLang->sectionID, $this->langID );
            }
        }
        else
            $this->oSectionLang = CmsSectionLang::getWebItem_StaticURL($this->staticURL);
    }

    function loadContentID(){
        if(isset($this->contentID) && isset($this->langID) && isset($this->minisiteID)){
            $this->oContentLang = CmsContentLang::getWebItem($this->contentID, $this->langID, $this->minisiteID);
            if($this->oContentLang!=NULL){
                $this->oSectionLang =CmsSectionLang::getWebItem( $this->oContentLang->sectionID, $this->langID );
            }
        }
        else{
            if(isset($this->sectionID) && isset($this->langID) && isset($this->minisiteID)){
                $this->oSectionLang = CmsSectionLang::getItem($this->sectionID, $this->langID, $this->minisiteID);
            }
        }
    }

    function setPageHeaders(){
        $this->pageTitle    =SEO::get_SiteName();
        $this->metaTag      =array('title'=>'', 'description'=>'', 'keywords'=>'');
        
        if(isset($this->oContentLang)){
            $this->pageTitle .=": ".$this->oContentLang->title;
            $this->metaTag=XMLParser::getArray_MetaTag($this->oContentLang->metaTag);
            $this->module   ="content";// Content Module
        }
        else{
            if(isset($this->oSectionLang)){
                $this->pageTitle .=": ".$this->oSectionLang->title;
                $this->metaTag=XMLParser::getArray_MetaTag($this->oSectionLang->metaTag);
                $this->module   =($this->oSectionLang->sectionID>1)? "section": "home"; // Section Module
            }
        }
            
    }
    
    private function setCurrentTheme($lightbox){
    global $WEBSITE;
    
        if($lightbox)
            $this->currentTheme= "website/web_lightbox.php";
        else{
            $this->currentTheme   =(isset($WEBSITE["MINISITE"]) && $WEBSITE["MINISITE"]!="")? $WEBSITE["MINISITE"]: "website/".$this->currentTheme;
        }
    }
    
    function validatePage(){
    
        switch($this->oContentLang->templateID){
        case 3: //Subnivel
            $lChild=CmsContentLang::getWebList($this->oContentLang->contentID, $this->oContentLang->sectionID, $this->oContentLang->langID, $this->oContentLang->minisiteID);
            if($lChild->getLength()>0){
                $oItem=$lChild->getItem(0);
                header('location: '.SEO::get_URLContent($oItem));
                exit;
            }
            break;
        }
    
    }

    function getFormView(){
        
        if($this->oContentLang!=NULL){
            $oScheme=CmsScheme::getItem($this->oContentLang->schemeID);
            $contentView='cms/'.$oScheme->webSource.'.php'; // Content Template
        }else{
            $contentView='index.php'; // Default view
        }

        return $contentView;
    }
    
    function addError($strErr){
        if($strErr=="") return;
        
        $this->msgError.="<li>".$strErr."</li>\n";
    }

    function getErrorMessage(){
        return $this->msgError;
    }

    function getPaging(){
        $DAO=$this->StaticDAO;
        $pageCount=$DAO::GetPageCount();
        
        $xlink="";
        if ($pageCount>1) {
            $xlink="Pag. ";
        
            $j=floor($this->Page/10)*10;
            if($this->Page>10) $xlink.="<a href='javascript:MovePg(".($j-1).")'><<</a> ";
            for ($i=0;$i<10;$i++){
                if($j==$this->Page)
                    $xlink.= "<strong>".($j+1)."</strong> ";
                    else
                        $xlink.= "<a href='javascript:MovePg($j)'>".($j+1)."</a> ";
                if(($j+1)>=$pageCount) break;
                $j++;
            }
    
            if(($j+1)<$pageCount) $xlink.="<a href='javascript:MovePg($j)'>>></a> ";
        
        }   

        return $xlink;
    }

}

?>