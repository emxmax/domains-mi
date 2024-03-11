<?php
require_once("base/Database.php");

class CmsContentLikes extends Database
{

	public static function  getItem($contentID, $personaID){
		$query = "SELECT contentID, personaID, fechaRegistro
				FROM cms_content_likes
				WHERE contentID='$contentID' AND personaID='$personaID'";

		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($personaID){
		$query ="SELECT contentID, personaID, fechaRegistro
		FROM cms_content_likes
		WHERE personaID='$personaID'
		ORDER BY contentID";

		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getTotalLikes($contentID){
		$query ="SELECT COUNT(*)
		FROM cms_content_likes
		WHERE contentID='$contentID'";
		
		return parent::fetchScalar(parent::GetResult($query));
	}

	public static function  AddNew($oLike){
		//Insert data to table
		$query = "INSERT INTO cms_content_likes(contentID, personaID, fechaRegistro)
				VALUES('$oLike->contentID', '$oLike->personaID', NOW())";
		return parent::Execute($query);
	}

	public static function  Delete($oCLike){
		$query = "DELETE FROM cms_content_likes
				WHERE contentID='$oCLike->contentID' AND personaID='$oCLike->personaID'";
		parent::Execute($query);
	}

}

?>