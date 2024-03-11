<?php
class Usuario extends Conexion{
	function CerrarSession($id){
		$sql = "UPDATE tsu_sessusuario ";
		$sql.= "SET ses_activo = 0 ";
		$sql.= "WHERE usu_id_usuario = ".$id ;

		return $this->update_sql($sql);	
	}
	function BuscarUsuario($user=NULL,$pass=NULL){
		$user = $this->limpiacadena($user);
		$pass = $this->limpiacadena($pass);

		$sql = "Select tmp1.usu_id, tmp1.usu_usuario, tmp1.usu_contrasena, ";
		$sql.= "tmp2.per_nombre, tmp2.per_apellidopaterno, tmp1.usu_tipousuario ";
		$sql.= "From tus_usuario tmp1 inner join tpe_persona tmp2 ";
		$sql.= "Where tmp1.usu_usuario = '".$user."' ";
		$sql.= "and tmp1.usu_contrasena = '".$pass."' ";
		$sql.= "and tmp1.usu_tipousuario =  1";

		return $this->Sqlfetch_assoc($sql);	
	}
	function nuevaSession($id=NULL,$token=NULL){
		$ses_activo = 1;
		$ses_remoteaddr = $_SERVER['REMOTE_ADDR'];
		$ses_useragent = $_SERVER['HTTP_USER_AGENT'];
		$ses_serveraddr = $_SERVER['SERVER_ADDR'];
		$ses_scriptname = $_SERVER['SCRIPT_NAME'];
		$ses_requesturi = $_SERVER['REQUEST_URI'];
		$ses_iniciosession = date("Y-m-d H:m:s");
		$ses_finsession = date("Y-m-d H:m:s");
		
		$sql = "Insert into tsu_sessusuario ";
		$sql.= "(usu_id_usuario, ses_llavesession,ses_activo, ses_remoteaddr, ses_useragent, ";
		$sql.= "ses_serveraddr,ses_scriptname,ses_requesturi, ses_iniciosession,ses_finsession) ";
		$sql.= "Values ";
		$sql.= "('$id','$token',$ses_activo, '$ses_remoteaddr', '$ses_useragent', ";
		$sql.= "'$ses_serveraddr','$ses_scriptname','$ses_requesturi','$ses_iniciosession','$ses_finsession') ";
		return $this->insert_id($sql);
	}
}
?>