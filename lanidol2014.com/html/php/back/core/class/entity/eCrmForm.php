<?php
	/**
	 * Object represents table 'crm_form'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-05-17 18:35	 
	 */
	class eCrmForm{
		
		public $formID;
		public $formName;
		public $registerDate;
		public $active;

		public function __construct($formID=null, $formName=null, $registerDate=null, $active=null)
		{
			$this->formID 		= $formID;
			$this->formName 	= $formName;
			$this->registerDate = $registerDate;
			$this->active		= $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>