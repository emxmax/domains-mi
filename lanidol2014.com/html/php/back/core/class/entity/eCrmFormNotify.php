<?php
	/**
	 * Object represents table 'crm_form_notify'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-05-18 10:10	 
	 */
	class eCrmFormNotify{
		
		public $formID;
		public $userID;
		public $recipients;
		public $active;

		public $firstName;
		public $lastName;
		public $email;

		public function __construct($formID=null, $userID=null, $recipients=null, $active=null)
		{
			$this->formID 		= $formID;
			$this->userID		= $userID;
			$this->recipients	= $recipients;
			$this->active		= $active;
			
			return $this;
		}

		public function append($firstName=null, $lastName=null, $email=null)
		{
			$this->firstName	= $firstName;
			$this->lastName		= $lastName;
			$this->email		= $email;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>