<?php
	/**
	 * Object represents table 'cms_section_lang'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-09 20:46	 
	 */
	class eCmsSectionLang{
		
		var $sectionID;
		var $langID;
		var $minisiteID;
		var $title;
		var $subTitle;
		var $description;
		var $resumen;
		var $media;
		var $parameter;
		var $metaTag;
		var $showContent;
		var $staticURL;

		//Aditional parameters to load list
		var $parentSectionID;
		var $sectionName;
		var $showInMenu;
		var $position;
		var $isMinisite;
		var $isEditable;
		var $active;
		
		public function __construct($sectionID=NULL, $langID=NULL, $minisiteID=NULL, $title=NULL, $subTitle=NULL, $description=NULL, $resumen=NULL, $media=NULL, $parameter=NULL, $metaTag=NULL, $showContent=NULL, $staticURL=NULL)
		{
			$this->sectionID 		= $sectionID;
			$this->langID 			= $langID;
			$this->stateCode 		= $minisiteID;
			$this->title 			= $title;
			$this->subTitle 		= $subTitle;
			$this->description 		= $description;
			$this->resumen	 		= $resumen;
			$this->media			= $media;
			$this->parameter		= $parameter;
			$this->metaTag			= $metaTag;
			$this->showContent 		= $showContent;
			$this->staticURL 		= $staticURL;
		}

		public function append($parentSectionID=NULL, $sectionName=NULL, $showInMenu=NULL, $position=NULL, $isMinisite=NULL, $isEditable=NULL, $active=NULL)
		{
			//Aditional parameters to load list
			$this->parentSectionID	= $parentSectionID;
			$this->sectionName		= $sectionName;
			$this->showInMenu		= $showInMenu;
			$this->position			= $position;
			$this->isMinisite		= $isMinisite;
			$this->isEditable		= $isEditable;
			$this->active			= $active;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}
		
	}
?>