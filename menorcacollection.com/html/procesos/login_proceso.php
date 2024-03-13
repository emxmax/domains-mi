<?php

    
      require_once("../adm/decon/connect.php");
    
      session_start();  
    
	switch ($_POST['tipo']) {
			case "logueo":
            
                if(isset($_POST['id_email']) && isset($_POST['id_password']) ) {   
            
                    //quitamos el posible SQLInjection del usuario                   
                    $_POST['id_email'] = mysql_real_escape_string($_POST['id_email']);  

                    //sacamos el hash del password para que se compare ya encriptado
                    $_POST['id_password'] = md5(mysql_real_escape_string($_POST['id_password']));

                    //vemos si existen registros que coincidan
                    $query = mysql_query(sprintf("SELECT * FROM usuarios WHERE email = '%s' AND MD5(password) = '%s' AND estado='%d'",$_POST['id_email'],$_POST['id_password'],1));
                    
                    /*$query = mysql_query("SELECT * FROM usuarios_admin ".
                        "WHERE correo = '{$_POST['correo']}' AND ".
                        "MD5(password) = '{$_POST['password']}' ");    */

                    if(mysql_num_rows($query) == 1) {
			$_SESSION['email_login'] = $_POST['id_email'];
                        //generamos un token aleatorio para el usuario
                        $_SESSION['token_login'] = md5(rand().$_SESSION['email_login']);
                        
			$id_usuario=mysql_result($query,0,'id');
			$nombre=mysql_result($query,0,'nombre');
			$paterno=mysql_result($query,0,'paterno');
			
                        $_SESSION['auth_login']=1;
			$_SESSION['usuario_id']=$id_usuario; 
                        $_SESSION['usuario_login']=$nombre." ".$paterno; 

                        //actualizamos el token para que sean iguales el de la db
                        //y el de la sesión
                        
                        mysql_query(sprintf("UPDATE usuarios SET token = '%s' WHERE email = '%s'",$_SESSION['token_login'],$_SESSION['email_login']));
                        
                        /*mysql_query("UPDATE usuarios_admin SET ".
                        "token = '{$_SESSION['token']}' WHERE ".
                        "correo = '{$_SESSION['correo']}' ");*/
                        
                        //todo bien
                        //header("Location: panel.php");
                        //exit;
                        echo "true";

                    } else {
                        //session_destroy();
                       //usuario incorrecto o password incorrecto
                        echo "false";  
                    }

                    mysql_free_result($query);
                }
	       break;

            case "cerrar":    
                
                unset($_SESSION['token_login']);
                unset($_SESSION['email_login']);
	        unset($_SESSION['usuario_id']);
                unset($_SESSION['usuario_login']);
                unset($_SESSION['ultimo_acceso_login']);  
                unset($_SESSION['auth_login']);

                $_SESSION = array(); 
                $_POST = array();

                session_unset(); 
                session_destroy();

                $sessionPath = session_get_cookie_params();        
                setcookie(session_name(), "", 0, $sessionPath["path"], $sessionPath["domain"]);
                
                
                
                break;
                
	    	default:
	        	break;
    }
          

?>