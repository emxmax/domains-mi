<?php
	/**
	 * Object represents table 'cms_minisite'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eCmsMinisite{
		
		public $minisiteID;
		public $minisiteCode;
		public $minisiteName;
		public $domain;
		public $isDefault;
		public $active;

		public function __construct($minisiteID=null, $minisiteCode=null, $minisiteName=null, $domain=null, $isDefault=null, $active=null)
		{
			$this->minisiteID 		= $minisiteID;
			$this->minisiteCode 	= $minisiteCode;
			$this->minisiteName 	= $minisiteName;
			$this->domain 			= $domain;
			$this->isDefault 		= $isDefault;
			$this->active			= $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>