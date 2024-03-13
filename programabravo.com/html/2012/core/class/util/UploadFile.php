<?php
class UploadFile{

	public static $Config		=array();
	public static $ErrorMessage	="";
	
	private static $isFixed=false;

	public static function init()
	{
		self::$Config["max_filesize"]			=1012400;//1000 Kb;
		self::$Config["allowed_extensions"]		=array("txt","csv","htm","html","doc","docx","xls","xlsx","rtf","ppt","pptx","pdf","swf","avi","wmv","mov","jpg","jpeg","gif","png");
	}
	
	public static function fixArray($files)
	{
		$names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);
		
		foreach ($files as $key => $part) {
			// only deal with valid keys and multiple files
			$key = (string) $key;
			if (isset($names[$key]) && is_array($part)) {
				foreach ($part as $position => $value) {
					$files[$position][$key] = $value;
				}
				// remove old key reference
				unset($files[$key]);
			}
		}
		self::$isFixed=true;
		return $files;
	}
	
	public static function ValidateUpload($file){
		$tsize=0;
		$aFiles=explode(".", strtolower($file['name']));
		$tsize=$file['size'];
		if ($file['error']==4){
			continue;
		}
		if ($file['error'] > 0){
			self::$ErrorMessage="Ha ocurrido un error en la carga de archivos (error=".$file['error'].")";
			return false;
		}
		if (!in_array(end($aFiles), self::$Config["allowed_extensions"])){ 
			foreach( self::$Config["allowed_extensions"] as $it_ ) $ext_.=$it_ . ',' ;
			self::$ErrorMessage="El documento no cumple con los formatos de archivo permitidos (".$ext_.").";
			return false;
		}
		if($file['size']>self::$Config["max_filesize"]){
			self::$ErrorMessage="El documento a superado el límite de peso permitido (".round(self::$Config["max_filesize"]/1024)." Kb).";
			return false;
		}

		return true;
	}

	public static function MoveUploaded(&$file, $path){
		if(!self::$isFixed) self::fixArray($filel);
		return move_uploaded_file( $file['tmp_name'], $path.$file['name']);
	}

}

UploadFile::init();
?>