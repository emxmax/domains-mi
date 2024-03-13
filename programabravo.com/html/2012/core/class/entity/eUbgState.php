<?php
	/**
	 * Object represents table 'ubg_state'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eUbgState{
		
		public $countryID;
		public $stateID;
		public $stateCode;
		public $stateName;
		public $active;

		public function __construct($countryID=null, $stateID=null, $stateCode=null, $stateName=null, $active=null)
		{
			$this->countryID 	= $countryID;
			$this->stateID 		= $stateID;
			$this->stateCode 	= $stateCode;
			$this->stateName 	= $stateName;
			$this->active		= $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
?>