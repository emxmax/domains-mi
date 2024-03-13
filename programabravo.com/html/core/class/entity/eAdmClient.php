<?php
	/**
	 * Object represents table 'adm_client'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-04-07 16:59	 
	 */
	class eAdmClient{
		
		public $clientID;
		public $clientCode;
		public $clientName;
		public $address;
		public $phone;
		public $email;
		public $state;

		public function __construct($clientID=null, $clientCode=null, $clientName=null, $address=null, $phone=null, $email=null, $state=null)
		{
			$this->clientID 	= $clientID;
			$this->clientCode 	= $clientCode;
			$this->clientName 	= $clientName;
			$this->address 		= $address;
			$this->phone 		= $phone;
			$this->email 		= $email;
			$this->state 		= $state;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}
		
	}
?>