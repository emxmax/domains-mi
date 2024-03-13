<?php
    /**
     * Object represents table 'cms_content_lang'
     *
         * @author: Fischer Tirado
         * @date: 2011-04-09 20:46   
     */
    class eCmsContentLang{
        
        var $contentID;
        var $langID;
        var $title;
        var $subTitle;
        var $subTitle2;
        var $description;
        var $description2;
        var $description3;
        var $resumen;
        var $date;
        var $linkType;
        var $linkContentID;
        var $linkURL;
        var $linkTarget;
        var $staticURL;
        var $parameter;
        var $media;
        var $metaTag;
        var $registerDate;
        var $showInHome;
        var $active;
        
        //Aditional parameters to load list
        var $parentContentID;   //from cms_content
        var $schemeID;          //from cms_content
        var $minisiteID;        //from cms_content
        var $contentName;       //from cms_content
        var $position;          //from cms_content
        var $sectionID;         //from cms_section
        var $templateID;        //from cms_section
        var $isPage;            //from cms_scheme
        var $childScheme;       //from fcms_childScheme
        var $childContentLang;  //from fcms_childContentLang
        
        public function __construct($contentID=null, $langID=null, $title=null, $subTitle=null, $subTitle2=null, $description=null, $description2=null, $resumen=null, $date=null, $linkType=null, $linkContentID=null, $linkURL=null, $linkTarget=null, $staticURL=null, $media=null, $parameter=null, $metaTag=null, $registerDate=null, $showInHome=null, $active=null,$description3=null)
        {
            $this->contentID        = $contentID;
            $this->langID           = $langID;
            $this->title            = $title;
            $this->subTitle         = $subTitle;
            $this->subTitle2        = $subTitle2;
            $this->description      = $description;
            $this->description2     = $description2;
            $this->description3     = $description3;
            $this->resumen          = $resumen;
            $this->date             = $date;
            $this->linkType         = $linkType;
            $this->linkContentID    = $linkContentID;
            $this->linkURL          = $linkURL;
            $this->linkTarget       = $linkTarget;
            $this->staticURL        = $staticURL;
            $this->media            = $media;
            $this->parameter        = $parameter;
            $this->metaTag          = $metaTag;
            $this->registerDate     = $registerDate;
            $this->showInHome       = $showInHome;
            $this->active           = $active;
            
        }

        public function append($parentContentID, $schemeID, $minisiteID, $contentName, $position, $sectionID, $templateID, $childScheme=null, $childContentLang=null)
        {
            //Aditional parameters to load list
            $this->parentContentID  = $parentContentID;
            $this->schemeID         = $schemeID;
            $this->minisiteID       = $minisiteID;
            $this->contentName      = $contentName;
            $this->position         = $position;
            
            $this->sectionID        = $sectionID;
            $this->templateID       = $templateID;
            $this->childScheme      = $childScheme;
            $this->childContentLang = $childContentLang;
        }
        
        public function __toString()
        {
            return Collection::objectToString($this);
        }

    }
?>