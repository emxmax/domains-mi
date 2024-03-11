<?php
require_once("base/Database.php");

class CmsSectionLang extends Database
{
	var $mediaList;
	var $paramList;
	var $metaList;

	public static function  getItem($sectionID, $langID){
		$query = "
		SELECT 
			sec.sectionID, slan.langID, slan.minisiteID, slan.title, slan.subTitle, slan.description, slan.resumen, slan.media, slan.parameter, slan.metaTag, slan.showContent, slan.staticURL, sec.parentSectionID, sec.sectionName, sec.showInMenu, sec.position, sec.isMinisite, sec.isEditable, sec.active
		FROM 
			cms_section AS sec
		LEFT JOIN cms_section_lang AS slan
			ON slan.sectionID=sec.sectionID
			AND IFNULL(slan.langID, 0) 		= '$langID'
		WHERE
			sec.sectionID 					= '$sectionID'
		";

		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getWebItem($sectionID, $langID){
		$query = "
		SELECT 
			sec.sectionID, slan.langID, slan.minisiteID, slan.title, slan.subTitle, slan.description, slan.resumen, slan.media, slan.parameter, slan.metaTag, slan.showContent, slan.staticURL, sec.parentSectionID, sec.sectionName, sec.showInMenu, sec.position, sec.isMinisite, sec.isEditable, sec.active
		FROM 
			cms_section AS sec
		LEFT JOIN cms_section_lang AS slan
			ON slan.sectionID=sec.sectionID
			AND IFNULL(slan.langID, 0) 		= '$langID'
		WHERE
			sec.sectionID 					= '$sectionID' 
		";

		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getWebItem_StaticURL($staticURL){
		$query = "
		SELECT 
			sec.sectionID, slan.langID, slan.minisiteID, slan.title, slan.subTitle, slan.description, slan.resumen, slan.media, slan.parameter, slan.metaTag, slan.showContent, slan.staticURL, sec.parentSectionID, sec.sectionName, sec.showInMenu, sec.position, sec.isMinisite, sec.isEditable, sec.active
		FROM 
			cms_section AS sec
		LEFT JOIN cms_section_lang AS slan
			ON slan.sectionID=sec.sectionID
		WHERE
			slan.staticURL 					= '$staticURL' 
		";

		return parent::GetObject(parent::GetResult($query));
	}
	
	public static function  getList($langID){
		$query ="
		SELECT 
			sec.sectionID, slan.langID, slan.minisiteID, slan.title, slan.subTitle, slan.description, slan.resumen, slan.media, slan.parameter, slan.metaTag, slan.showContent, slan.staticURL, sec.parentSectionID, sec.sectionName, sec.showInMenu, sec.position, sec.isMinisite, sec.isEditable, sec.active
		FROM 
			cms_section AS sec
		LEFT JOIN cms_section_lang AS slan
			ON slan.sectionID=sec.sectionID
			AND IFNULL(slan.langID, 0) 		= '$langID'
		";
		
        $result = parent::GetResult($query);

		$list=new Collection();
        while ($row = parent::fetchArray($result)) {
			$oItem= new eCmsSectionLang($row['sectionID'], $row['langID'], $row['minisiteID'], $row['title'], $row['subTitle'], $row['description'], $row['resumen'], $row['media'], $row['parameter'], $row['metaTag'], $row['showContent']);
			$oItem->append($row['parentSectionID'], $row['sectionName'], $row['showInMenu'], $row['position'], $row['isMinisite'], $row['isEditable'], $row['active']);
            $list->addItem($oItem);
        }
	return $list;
	}

	public static function  getWebList($parentSectionID, $langID, $minisiteID){
		$query ="
		SELECT 
			sec.sectionID, slan.langID, slan.minisiteID, slan.title, slan.subTitle, slan.description, slan.resumen, slan.media, slan.parameter, slan.metaTag, slan.showContent, slan.staticURL, sec.parentSectionID, sec.sectionName, sec.showInMenu, sec.position, sec.isMinisite, sec.isEditable, sec.active
		FROM 
			cms_section AS sec
		LEFT JOIN cms_section_lang AS slan
			ON slan.sectionID=sec.sectionID
			AND IFNULL(slan.langID, 0) 		= '$langID'
		WHERE
			sec.active='1' AND
			IFNULL(sec.parentSectionID, 0)	='$parentSectionID' AND
			IFNULL(slan.minisiteID, 0) 		= '$minisiteID'
			and sec.showInMenu				=1
		";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  Update($oSectionLang){
	
		$query = "
		SELECT COUNT(*) FROM cms_section_lang
		WHERE
			sectionID 					= '$oSectionLang->sectionID'
			AND IFNULL(langID, 0) 		= '$oSectionLang->langID'
		";
		$result=parent::GetResult($query);
        if(parent::fetchScalar($result)>0){
			//Update data to table
			$query = "UPDATE cms_section_lang SET 
						title		='$oSectionLang->title',
						subTitle	='$oSectionLang->subTitle',
						description ='$oSectionLang->description',
						resumen		='$oSectionLang->resumen',
						media		='".XMLParser::parseXML_Media($oSectionLang->media)."',
						parameter	='".XMLParser::parseXML_Media($oSectionLang->parameter)."',
						metaTag		='".XMLParser::parseXML_Media($oSectionLang->metaTag)."',
						showContent	='$oSectionLang->showContent',
						staticURL	='$oSectionLang->staticURL'
					WHERE 
						sectionID	='$oSectionLang->sectionID' AND
						langID		='$oSectionLang->langID'";
			return parent::Execute($query);
		}
		else
			return self::AddNew_SectionLang($oSectionLang);

	}

	public static function  AddNew_SectionLang($oSectionLang){
		//Insert data to table
		$query = "INSERT INTO cms_section_lang (sectionID, langID, minisiteID, title, description, resumen, media, parameter, metaTag, showContent, staticURL)
					VALUES ('$oSectionLang->sectionID','$oSectionLang->langID','$oSectionLang->minisiteID','$oSectionLang->title','$oSectionLang->description','$oSectionLang->resumen','".XMLParser::parseXML_Media($oSectionLang->media)."','".XMLParser::parseXML_Media($oSectionLang->parameter)."','".XMLParser::parseXML_Media($oSectionLang->metaTag)."','$oSectionLang->showContent', '$oSectionLang->staticURL')
		";
		return parent::Execute($query);
	}
	
	/**/
	public static function getWebListParam($p){
		$query = "
		SELECT 
			sec.sectionID, slan.title";
		
		if( isset( $p['fields'] ) && $p['fields']!='' )	
			$query .="," . $p['fields'] ;

		$query .="
		FROM 
			cms_section AS sec
		LEFT JOIN cms_section_lang AS slan
			ON slan.sectionID=sec.sectionID";

		if( isset( $p['langID'] ) && $p['langID']!='' )	
			$query .=" AND IFNULL(slan.langID, 0) = '" . $p['langID'] . "'";

		$query .=
		"WHERE
			sec.active ='1' 
			and sec.showInMenu =1";

		if( isset( $p['sectionsID'] ) && $p['sectionsID']!='' )	
			$query .=" AND sec.sectionID in (" . $p['sectionsID'] . ")";

//echo $query;
		return parent::GetCollection(parent::GetResult($query));
	}
}
?>