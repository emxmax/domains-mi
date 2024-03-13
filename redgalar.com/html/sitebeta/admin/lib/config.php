<?php 
session_start();

class Conectar
{
	public function con()
	{
		$con=mysql_connect("internal-db.s77722.gridserver.com","db77722_demor","Qt}Ho27#)bh");
		mysql_query("set NAME 'utf8'");
		mysql_select_db("db77722_demoredgalar");
		return $con;
	}
	public static function ruta(){
		return "https://www.redgalar.com/sitebeta/admin/";
	}
}
?>