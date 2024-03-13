<?php
class Usuario extends Conexion{
	function listar(){
		$sql = "select tp2.id, tp2.user_id, tp2.person_id, tp2.profile_id as id_profile, ";
		$sql.= "tp2.deleted, tp2.active, tp2.username, tp2.password, tp1.movil,tp1.email, tp2.creation_date, ";
		$sql.= "tp2.modification_date, tp1.first_name, tp1.last_name ";
		$sql.= "From person tp1 inner join user tp2 ";
		$sql.= "on tp1.id = tp2.person_id ";
		$sql.= "Where tp2.deleted = 1";
		return $this->Sqlfetch_assoc($sql);	
	}
	function BuscarUsuario($user=NULL,$pass=NULL){
		$sql = "select tp2.id, tp2.user_id, tp2.person_id, tp2.profile_id as id_profile, ";
		$sql.= "tp2.deleted, tp2.active, tp2.username, tp2.password, tp2.creation_date, tp2.modification_date, ";
		$sql.= "tp1.first_name, tp1.last_name ";
		$sql.= "From person tp1 inner join user tp2 ";
		$sql.= "on tp1.id = tp2.person_id ";
		$sql.= "Where tp2.username = '".$user."' "; 
		$sql.= "and tp2.password = '".$pass."' ";
		$sql.= "and tp2.active = 1  ";
		return $this->Sqlfetch_assoc($sql);	
	}
	function InfoUser($id){
		$sql = "select tp2.id, tp2.user_id,  tp2.person_id, tp2.profile_id, ";
		$sql.= "tp2.deleted, tp2.active, tp2.username, tp2.password, tp2.creation_date, tp2.modification_date, ";
		$sql.= "tp1.first_name, tp1.last_name, tp1.email, tp1.movil, tp1.phone, ";
		$sql.= "(Select title From profile Where id = tp2.profile_id) as tipoperfil	";
		$sql.= "From person tp1 inner join user tp2	"; 
		$sql.= "on tp1.id = tp2.person_id "; 
		$sql.= "Where tp2.id = $id ";
		$consulta 	= $this->Sqlfetch_assoc($sql);
		return $this->Sqlfetch_assoc($sql);
	}
	function UpdateForm($codigo,$name,$lastname,$email,$phone,$movil,$pass){
		/*
			Obtenemos el id person
		*/
		$sql = "select person_id ";
		$sql.= "From user ";
		$sql.= "Where id = $codigo ";
		$arr = $this->Sqlfetch_assoc($sql);
		$idperson = $arr[0]['person_id'];

		/*
			Actualizamos la tabla persona
		*/
		$sql = "Update person Set first_name = '$name', ";
		$sql.= "last_name = '$lastname', ";
		$sql.= "email = '$email', ";
		$sql.= "phone = '$phone', movil = '$movil' ";
		$sql.= "Where id = $idperson";
		$this->Sqlall($sql);

		/*
			Actualizamos la tabla usuario
		*/
		$sql = "Update user Set password = '$pass' ";
		$sql.= "Where id = $codigo";
		$this->Sqlall($sql);
		return true;
	}

}
?>