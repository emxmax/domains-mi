<?php
	/**
	 * Object represents table 'adm_profile_event'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eAdmProfileEvent{
		
		public $profileID;
		public $eventID;

		public $moduleID; //external
		public $command;

		public function __construct($profileID=null, $eventID=null)
		{
			$this->profileID= $profileID;
			$this->eventID 	= $eventID;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>