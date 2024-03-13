<?php
class Conexion{
	private $dbconn	    = null;
	private $stmt = ""; 
	private $dbhost 	= "localhost";
	private $database	= "xxqitbn_db77722_menolotes";
	private $user 		= "xxqitbn_db77722_usrlotes";
	private $password 	= "XPGr1MAojXh3Ot&K";

    /***
	private $dbhost 	= "internal-db.s77722.gridserver.com";
	private $database	= "db77722_menolotes";
	private $user 		= "db77722_usrlotes";
	private $password 	= "kb48zKV[[p+";
    ***/

	function __construct(){
		/****Pasamos los datos de conexion******/
		$this->NewConexion();
	}
	function NewConexion(){
		// Conectarse a la base de datos
		$this->dbconn = mysql_connect($this->dbhost, $this->user,$this->password);
		mysql_select_db($this->database,$this->dbconn);
		mysql_query("utf8",$this->dbconn);
	}
	function cerrarconexion(){
		//$this->stmt->close();
		//$this->dbconn->close();
		mysql_close($this->dbconn);
	}
	function limpiacadena($cadena = NULL){
		return mysql_real_escape_string($cadena);
	}
	function Sqlall($sql){
		$result = mysql_query($sql,$this->dbconn);
	}
	function Sqlfetch_assoc($sql){
		$result = mysql_query($sql,$this->dbconn);
		$main_arr = null;
		while ($row = mysql_fetch_assoc($result)) {
			foreach($row as $key => $value)
			{    
				$arr[$key] = $value; 
			}
			$main_arr[] = $arr;
		}
		//$this->cerrarconexion();
		return $main_arr;
	}
	function insert_newid_sql($sql){
		$result = mysql_query($sql,$this->dbconn);
		$newId = mysql_insert_id();
		return $newId;
	}
}
?>