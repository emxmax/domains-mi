<?php
	/**
	 * Object represents table 'parameter'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eCmsParameter{
		
		public $parameterID;
		public $groupID;
		public $alias;
		public $position;

		public function __construct($parameterID=null, $groupID=null, $alias=null, $position=null)
		{
			$this->parameterID 	= $parameterID;
			$this->groupID 		= $groupID;
			$this->alias 		= $alias;
			$this->position		= $position;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>