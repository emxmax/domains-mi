<?php
	/**
	 * Object represents table 'crm_user'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmUser{
		
		public $userID;
		public $userName;
		public $password;
		public $firstName;
		public $lastName;
		public $email;
		public $state;

		public function __construct($userID=NULL, $userName=NULL, $password=NULL, $firstName=NULL, $lastName=NULL, $email=NULL, $state=NULL)
		{
			$this->userID 		= $userID;
			$this->userName 	= $userName;
			$this->password 	= $password;
			$this->firstName	= $firstName;
			$this->lastName		= $lastName;
			$this->email		= $email;
			$this->state		= $state;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
?>