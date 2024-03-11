<?php
	/**
	 * Object represents table 'cms_section'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eCmsSection{
		
		public $sectionID;
		public $parentSectionID;
		public $sectionName;
		public $showInMenu;
		public $position;
		public $isMinisite;
		public $isEditable;
		public $active;

		public function __construct($sectionID=null, $parentSectionID=null, $sectionName=null, $showInMenu=null, $position=null, $isMinisite=null, $isEditable=null, $active=null)
		{
			$this->sectionID 		= $sectionID;
			$this->parentSectionID 	= $parentSectionID;
			$this->sectionName 		= $sectionName;
			$this->showInMenu 		= $showInMenu;
			$this->position 		= $position;
			$this->isMinisite 		= $isMinisite;
			$this->isEditable 		= $isEditable;
			$this->active			= $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>