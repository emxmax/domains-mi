<?php
	/**
	 * Object represents table 'adm_module'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eAdmModule{
		
		public $moduleID;
		public $menuID;
		public $moduleName;
		public $alias;
		public $moduleForm;
		public $moduleParams;
		public $position;
		public $active;

		public function __construct($moduleID=null, $menuID=null, $moduleName=null, $alias=null, $alias=null, $moduleForm=null, $moduleParams=null, $position=null, $active=null)
		{
			$this->moduleID 	= $moduleID;
			$this->menuID 		= $menuID;
			$this->moduleName 	= $moduleName;
			$this->alias 		= $alias;
			$this->moduleForm 	= $moduleForm;
			$this->moduleParams = $moduleParams;
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