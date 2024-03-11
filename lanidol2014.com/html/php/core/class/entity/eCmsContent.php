<?php
/**
 * Object represents table 'cms_content'
 *
 * @author: Fischer Tirado
 * @date: 2011-04-09 20:46	 
 */
class eCmsContent{

    var $contentID;
    var $parentContentID;
    var $schemeID;
    var $contentName;
    var $position;

    //Aditional parameters to load list
    var $sectionID; //from cms_section

    public function __construct($contentID=null, $parentContentID=null, $schemeID=null, $contentName=null, $position=null)
    {
        $this->contentID        = $contentID;
        $this->parentContentID  = $parentContentID;
        $this->schemeID         = $schemeID;
        $this->contentName      = $contentName;
        $this->position         = $position;
    }

    public function append($sectionID)
    {
        $this->sectionID = $sectionID;
    }

    public function __toString()
    {
        return Collection::objectToString($this);
    }

}
?>