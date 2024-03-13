<?php

class TextParser{

	private static function parseSqlQuote($str){
		
		return str_replace("'", "\'", $str);
	}

	public static function ParseEntityQuotes($obj){
		$vars=get_object_vars($obj);
		foreach($vars as $key=>$val){
			//if(is_string($val)) $obj->$key=htmlentities($val, ENT_QUOTES);
			if(is_string($val)) $obj->$key=self::parseSqlQuote($val);
		}
	}
	
	public static function ParseQuotes($str){
		return str_replace( array('�','�','�','�','�', '�', '�','�','�','�', '�','�','�','�', '�', '�','�','�','�','�', '�','�','�','�', '�','�', '�','�','�','�','�', '�', '�','�','�','�', '�','�','�','�', '�', '�','�','�','�','�', '�','�','�','�', '�'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $str); 
		//return iconv('UTF-8', 'US-ASCII//TRANSLIT', $str);
	}
	
	public static function CleanText($str){
		return strip_tags($str);
	}

	public static function nl2BR($str){
		$str=nl2br($str);
		return str_replace(array("\r\n", "\n", "\r"), '', $str);
	}
	
	public static function UpperCase($str){
	  return strtr(strtoupper($str), array( "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", "�" => "�", ));
	}

	public static function GetLetters(){
	  return array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z' );
	}

	public static function parseFileName($fileName){
		$fileName=self::ParseQuotes($fileName);
		$fileName=str_replace(" ", "_", $fileName);
		$fileName=strtolower($fileName);
		return $fileName;
	}

}

?>