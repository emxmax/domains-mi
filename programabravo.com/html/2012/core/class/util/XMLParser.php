<?php

class XMLParser{

	public static function parseXML_Parameter($arr){
		//Add Parameters
		$sxe = new SimpleXMLElement("<root></root>");
		if(is_array($arr)){
		  foreach($arr as $alias => $value){
			$listItem = $sxe->addChild('ListItem');
			$listItem->addAttribute('Alias', $alias);
			$listItem->addAttribute('Value', utf8_encode($value));
		  }
		}
		return $sxe->asXML();
	}

	public static function parseXML_Media($arr){
		//Add Parameters
		$sxe = new SimpleXMLElement("<root></root>");
		if(is_array($arr)){
		  foreach($arr as $alias => $value){
			$listItem = $sxe->addChild('ListItem');
			$listItem->addAttribute('Alias', $alias);
			$listItem->addAttribute('Value', utf8_encode($value));
			if($oMedia=CmsMedia::GetItem($value))
				$listItem->addAttribute('Url', $oMedia->basePath.$oMedia->mediaName);
		  }
		}
		return $sxe->asXML();
	}

	public static function parseXML_MaetaTag($arr){
		//Add Parameters
		$sxe = new SimpleXMLElement("<root></root>");
		if(is_array($arr)){
		  foreach($arr as $alias => $value){
			$listItem = $sxe->addChild('ListItem');
			$listItem->addAttribute('Alias', $alias);
			$listItem->addAttribute('Value', utf8_encode($value));
		  }
		}
		return $sxe->asXML();
	}


	public static function getArray_Media($xml){
		//Retrive Parameters
		$arr=array();
		if($xml!=''){
			$objXml = simplexml_load_string($xml, null, LIBXML_NOERROR);
			foreach ($objXml->ListItem as $item){
				$arr["$item[Alias]"]["Id"]=utf8_decode($item["Value"]);
				$arr["$item[Alias]"]["Url"]=$item["Url"];
			}
		}
		return $arr;
	}

	
	public static function getArray_Parameter($xml){
		//Retrive Parameters
		$arr=array();
		if($xml!=''){
			$objXml = simplexml_load_string($xml, null, LIBXML_NOERROR);
			foreach ($objXml->ListItem as $item)
				$arr["$item[Alias]"]=utf8_decode($item["Value"]);
		}
		return $arr;
	}
	
	
	public static function getArray_MetaTag($xml){
		//Retrive Parameters
		$arr=array('title'=>'', 'description'=>'', 'keywords'=>'');
		if($xml!=''){
			$objXml = simplexml_load_string($xml, null, LIBXML_NOERROR);
			foreach ($objXml->ListItem as $item)
				$arr["$item[Alias]"]=utf8_decode($item["Value"]);
		}
		return $arr;
	}

	public static function getArray_Option($xml){
		//Retrive Parameters
		$arr=array();
		if($xml!=''){
			$objXml = simplexml_load_string($xml, null, LIBXML_NOERROR);
			foreach ($objXml->ListItem as $item)
				$arr["$item[Value]"]=utf8_decode($item["Text"]);
		}
		return $arr;
	}

}

?>