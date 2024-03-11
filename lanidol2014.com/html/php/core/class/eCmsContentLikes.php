<?php
	/**
	 * Object represents table 'cms_content_likes'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2013-05-01 20:58	 
	 */
	class eCmsContentLikes{
		
		var $contentID;
		var $personaID;
		var $fechaRegistro;

		var $totalLikes;

		public function __construct($contentID=null, $personaID=null, $fechaRegistro=null)
		{
			$this->contentID 		= $contentID;
			$this->personaID 		= $personaID;
			$this->fechaRegistro 	= $fechaRegistro;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>