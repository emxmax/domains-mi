<?php
class SEO{

    public static function get_URLRedirect($contentID, $langID, $minisiteID){
    global $WEBSITE;
        if($contentID=="") return self::get_URLHome();

        $oContent   =CmsContentLang::getItem( $contentID, $langID, $minisiteID );
        if($oContent==NULL) return self::get_URLHome();
    
        if($WEBSITE["STATIC_URL"])
            return self::get_URLRoot().$oContent->staticURL.'.html';
        else
            return self::get_ContentPage()."?pID=".$oContent->contentID;

    }

    public static function get_URLContent($oContent, $params=NULL){
    global $WEBSITE;
    
        if($WEBSITE["STATIC_URL"] && $oContent->staticURL!="")
            return self::get_URLRoot().$oContent->staticURL.'.html'.($params!=NULL?'?'.$params:'');
        else
            return self::get_ContentPage()."?pID=".$oContent->contentID.($params!=NULL?'&'.$params:'');
    }
        
    public static function get_URLSection($oSection){
    global $WEBSITE;
        if($WEBSITE["STATIC_URL"] && $oSection->staticURL!="")
            return self::get_URLRoot().$oSection->staticURL.'.html';
        else
            return self::get_ContentPage()."?sID=".$oSection->sectionID;
    }

    public static function parse_URLRelative($urlRelative){
    
        return self::get_URLRoot().str_replace("../", "", $urlRelative);
    }
    
    public static function get_SiteName(){
    global $WEBSITE;
    
        return $WEBSITE["SITE_NAME"];
    }

    public static function get_URLRoot(){
    global $WEBSITE;
    
        return $WEBSITE["ROOT"];
    }

    public static function get_URLBase(){
    global $WEBSITE;
    
        return $WEBSITE["ROOT"]."site/";
    }

    public static function get_URLAssets(){
    global $WEBSITE;
    
        return $WEBSITE["ROOT"]."core/assets/".($WEBSITE["MINISITE"]!=""? $WEBSITE["MINISITE"]: "website/");
    }

    public static function get_URLHome(){
    global $WEBSITE;
    
        if($WEBSITE["STATIC_URL"])
            return self::get_URLRoot().$WEBSITE["MINISITE"];
        else
            return self::get_ContentPage();
    }
    
    public static function get_URLSite(){
    global $WEBSITE;
    
        return $WEBSITE["URL_HTTP"];
    }

    /*Private methods*/
    private static function get_ContentPage(){
        return self::get_URLBase()."index.php";
    }

    public static function get_ContentLink($oContentLang, $params=NULL){
        //Retrive properties
        $oLink=new eLink();
        $oLink->url='#';
        
        if($oContentLang==NULL) return $oLink;

        $oLink->text=$oContentLang->title;
        $oLink->title=$oContentLang->title;
        
        switch($oContentLang->linkType){
            case 0:
                //$relID=array(3, 4, 8, 10, 30); //Fix template IDs for redirections
                //$oLink->url=!in_array($oContentLang->templateID, $relID)? SEO::get_URLContent($oContentLang): '#';
                $oLink->url=$oContentLang->isPage? SEO::get_URLContent($oContentLang): '#';
                break;
            case 1:
                $oLink->url=SEO::get_URLRedirect($oContentLang->linkContentID, $oContentLang->langID, $oContentLang->minisiteID);
                break;
            case 2:
                $oLink->url=$oContentLang->linkURL;
                if(!in_array(strtolower($oLink->url), array('http://', 'https://', 'mailto:', 'javascript:'))) $oLink->url='http://'.$oLink->url;
                $oLink->target ='_blank';
                break;
            //case 3:
            //  $oLink->url="index.php?swID=".$oContentLang->linkContentID; break;
        }
        
        if($params!=NULL) $oLink->url.=(strstr($oLink->url, '?')?'&':'?').$params;

        return $oLink;
    }

}
?>