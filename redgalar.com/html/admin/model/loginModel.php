<?php 
class Login extends Conectar
{
	
	public function logeo()
	{

		if(empty($_POST["user"]) or empty($_POST["pass"])){
			echo "error";
			exit;
		}
		else {
			$user=utf8_decode($_POST["user"]);
			$pass=md5($_POST["pass"]);
			//$pass=$_POST["pass"];
			
			$sql="SELECT
				admin.user_id,
				admin.user_name,
				admin.user_email,
				admin.user_pass,
				admin.user_estado,
				admin.user_foto,
				admin.user_representante,
				tipo_user.descripcion as perfil,
				admin.user_tipo
				FROM
				admin
				INNER JOIN tipo_user ON admin.user_tipo = tipo_user.id_tipo_user
				WHERE admin.user_dni ='".$user."' and admin.user_pass='".$pass."'";
			//print_r($sql);
			$res=mysql_query($sql,parent::con());
			if(mysql_num_rows($res) == 0){
				echo "error";
				exit;
			}
			else{
				if ($resl=mysql_fetch_array($res)) {
					if($resl["user_estado"] == "I"){
						echo "I";
						exit;
					}
					else{
						$_SESSION["ses_id"]=$resl["user_id"];
						$_SESSION["ses_login"]=$resl["user_name"];
						$_SESSION["ses_nombre"]=$resl["user_name"];
						$_SESSION["ses_apellidos"]=$resl["apellidos"];
						$_SESSION["ses_perfil"]=$resl["perfil"];
						$_SESSION["ses_avatar"]=$resl["user_foto"];
						$_SESSION["ses_idperfil"]=$resl["user_tipo"];
						echo "exito";
						exit;
					}
				}
			}
		}
	}

	public function salir(){
		session_destroy();
		header("Location:".Conectar::ruta()."");
		exit;
	}
}
?>