<?php
	/**
	 * Object represents table 'cms_media_group'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-09 20:46	 
	 */
	class eCmsMediaGroup{
		
		var $groupID;
		var $groupName;
		var $alias;
		var $basePath;
		var $active;

		public function __construct($groupID=null, $groupName=null, $alias=null, $basePath=null, $active=null)
		{
			$this->groupID 		= $groupID;
			$this->groupName 	= $groupName;
			$this->alias 		= $alias;
			$this->basePath 	= $basePath;
			$this->active		= $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>