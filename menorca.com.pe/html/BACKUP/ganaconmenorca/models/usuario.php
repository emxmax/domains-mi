<?php
class Usuario extends Conexion{
	function listarUser(){
		$sql = "select * ";
		$sql.= "From user ";
		return $this->Sqlfetch_assoc($sql);	
	}
	function BuscarUsuario($user=NULL,$pass=NULL){
		$sql = "select tp2.id, tp2.usercreated_id, tp2.id_profile, tp2.codigo, tp2.person_id, ";
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
		$sql = "select tp2.id, tp2.usercreated_id, tp2.id_profile, tp2.codigo, tp2.person_id, ";
		$sql.= "tp2.deleted, tp2.active, tp2.username, tp2.password, tp2.creation_date, tp2.modification_date, ";
		$sql.= "tp1.first_name, tp1.last_name, ";
		$sql.= "(Select title From profile Where id = tp2.id_profile) as tipoperfil	";
		$sql.= "From person tp1 inner join user tp2	"; 
		$sql.= "on tp1.id = tp2.person_id "; 
		$sql.= "Where tp2.id = $id ";
		$consulta 	= $this->Sqlfetch_assoc($sql);
		$nombre 	= $consulta[0]['first_name']; 	
		$apellido 	= $consulta[0]['last_name']; 	
		$perfil 	= $consulta[0]['tipoperfil']; 	
		$usuario 	= $consulta[0]['username'];
		$html = "<table>";
		$html.= "<tr>";
		$html.= "<td>";
		$html.= "Nombre Completo : ";
		$html.= "<td>";
		$html.= "<td>";
		$html.= $nombre." ".$apellido;
		$html.= "<td>";
		$html.= "</tr>";
		$html.= "<tr>";
		$html.= "<td>";
		$html.= "Perfil : ";
		$html.= "<td>";
		$html.= "<td>";
		$html.= $perfil;
		$html.= "<td>";
		$html.= "</tr>";
		$html.= "<tr>";
		$html.= "<td>";
		$html.= "Usuario : ";
		$html.= "<td>";
		$html.= "<td>";
		$html.= $usuario;
		$html.= "<td>";
		$html.= "</tr>";
		$html.= "</table>";
		return $html;
	}

}
?>