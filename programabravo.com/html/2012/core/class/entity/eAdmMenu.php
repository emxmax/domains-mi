<?php
	/**
	 * Object represents table 'adm_menu'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eAdmMenu{
		
		public $menuID;
		public $parentMenuID;
		public $menuName;
		public $position;
		public $active;

		public function __construct($menuID=null, $parentMenuID=null, $menuName=null, $position=null, $active=null)
		{
			$this->menuID 		= $menuID;
			$this->parentMenuID = $parentMenuID;
			$this->menuName 	= $menuName;
			$this->position 	= $position;
			$this->active		= $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>