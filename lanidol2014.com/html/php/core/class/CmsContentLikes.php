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

	public static function  getListTotal_Paging(){
		$query ="SELECT count(clk.personaID) as totalLikes, clk.contentID
		FROM cms_content_likes as clk
		INNER JOIN cms_content as cont
		ON cont.contentID=clk.contentID
		GROUP BY clk.contentID
		";

        if(self::$orderBy=="") self::$orderBy="totalLikes DESC";
        
        return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getTotalLikes($contentID){
		$query ="SELECT COUNT(*)
		FROM cms_content_likes
		WHERE contentID='$contentID'";
		
		return parent::fetchScalar(parent::GetResult($query));
	}

	public static function  getTotalLikesAll(){
		$query ="SELECT COUNT(*)
		FROM cms_content_likes
		";
		
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
		return parent::Execute($query);
	}

	public static function  Clear(){
		$query = "DELETE FROM cms_content_likes
				";
		return parent::Execute($query);
	}

}

?>