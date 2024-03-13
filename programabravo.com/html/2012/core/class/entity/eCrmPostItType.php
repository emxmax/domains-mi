<?php
	/**
	 * Object represents table 'crm_postit_type'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2013-08-11 16:40	 
	 */
	class eCrmPostItType{
		
		public $typeID;
		public $typeName;
		public $description;
		public $active;

		public function __construct($typeID=NULL, $typeName=NULL, $description=NULL, $active=NULL)
		{
			$this->postitID     = $typeID;
			$this->typeName     = $typeName;
			$this->description  = $description;
			$this->active       = $active;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>