<?php

include 'inc/decon/connect.php';
include 'inc/decon/librerias.php';
include 'lib/formulario.php';
include 'lib/class.phpmailer.php';


/* Modulo */

/*$modulo1 = "contenidos";
$rsCategorias1=$db->$modulo1()
						 ->select("{$modulo1}.id,{$modulo1}.titulo_contenido,{$modulo1}.contenido,{$modulo1}.cod_mod,{$modulo1}.url")
						 ->where(array("{$modulo1}.id_seccion"=>3,"{$modulo1}.id"=>$c,"{$modulo1}.estado"=>1,"{$modulo1}.perfil"=>$p))
						 ->fetch();

$titulo_categorias1 = $rsCategorias1['titulo_contenido'];
$contenido_categorias1 = $rsCategorias1['contenido'];
$id_categorias1 = $rsCategorias1['id'];*/


$thisPost = new Post_Block;
$estado = "inicio";

	if($_POST){

        $estado = "aprobado";

		if ($thisPost->postBlock($_POST['postID'])) {
		if((isset($_POST['id_nombre']))) $nombre= $_POST['id_nombre']; 
		if((isset($_POST['id_email']))) $email= $_POST['id_email'];
		if((isset($_POST['id_telefono']))) $telefono= $_POST['id_telefono'];
		if((isset($_POST['id_mensaje']))) $mensaje= $_POST['id_mensaje'];

		$mail = new PHPMailer();
		ob_start();
		require 'html/contactenos_html.php';
		$salida = ob_get_clean();
		$body =limpiarCaracteres($salida);


		/*$mail->CharSet = "UTF-8";
		$mail->IsSMTP();
		$mail->Mailer = "smtp";
		$mail->Host 	= host; 
		$mail->SMTPAuth = true;
		$mail->Port 	= port;
		$mail->Username = mail_postmaster;
		$mail->Password = pass_user;
		$mail->From 	= mail_postmaster;
		$mail->FromName = from_name;*/

        $mail->SetFrom(mail_to,"Portal - ".from_name);
        $mail->Timeout=30;
        $mail->AddAddress(mail_to,"Portal - ".from_name);
        $mail->AddCC(mail_postmaster,"Administrador");
        $mail->Subject = "Mensaje - ".from_name;
        $mail->AltBody = "Para ver el mensaje, por favor usa un correo compatible con HTML!";
        $mail->IsHTML(true);
        $mail->MsgHTML($body);

        if(!$mail->Send()) {
            $estado = "reprobado";
        }

        header("Refresh: 3; URL=".site);
	}else{
		session_unset('postID');
		header("Location: ".site);
	}
}

/***************************************/

/*$menuNivel = new Nivel($db,3,0);
$menuNivel->ejecutar($id_categorias1);
$menuVertical = $menuNivel->obtenerId();*/


/* Opcion seleccionado del menu vertical*/

/*$menuTitulo = $db->contenidos[array("id"=>$c)]["titulo"];
$menuId = $c;*/

//echo $menuTitulo;


/* Navegacion */

/*$navegacion = new Navegacion($db,site,3,$p,0);
$navegacion->ejecutar($id_categorias1);
$menuNavegacion = $navegacion->obtenerNavegacion();

$titulo_navegacion = $menuTitulo;
$titulo_principal = $titulo_categorias1;*/
//krsort($menuNavegacion);

/***************************************/

/*$rsCategorias6 = $db->categorias()->where(array("id"=>$menuId))->fetch();
$url_titulo = $urlSeo->tipoContenido($rsCategorias6["tipo_contenido"],$rsCategorias6["url"],$rsCategorias6["titulo"],$rsCategorias6["id"],$rsCategorias6["padre"],$rsCategorias6["nivel"],$p);*/


/* Datos */

/*$front_banner_principal1 = $id_categorias1;
$front_banner_secundario1 = $id_categorias1;
$front_seo = $c;
$cod_mod = (isset($cod_mod_categorias1))? $cod_mod_categorias1: 5;

include 'inc/front/datos_seo.php';*/

?>