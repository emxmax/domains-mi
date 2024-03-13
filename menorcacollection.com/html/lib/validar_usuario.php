<?php


if(!empty($_SESSION['email_login']) && !empty($_SESSION['token_login']) && ($_SESSION['auth_login']==1)) {

    $_SESSION['email_login'] = mysql_real_escape_string($_SESSION['email_login']);
    $_SESSION['token_login'] = mysql_real_escape_string($_SESSION['token_login']);

    //checamos que exista
    
    $query = mysql_query(sprintf("SELECT * FROM usuarios WHERE email = '%s' AND token = '%s' AND estado='%d'",$_SESSION['email_login'],$_SESSION['token_login'],1));
                     /*
    $query = mysql_query("SELECT * FROM usuarios_admin ".
        "WHERE id_email = '{$_SESSION['id_email']}' AND ".
        "token = '{$_SESSION['token']}' ");     */

    if(mysql_num_rows($query) == 1) {
       //volvemos a calcular un token
        $_SESSION['token_login'] = md5(rand().$_SESSION['email_login']);
        
        mysql_query(sprintf("UPDATE usuarios SET token = '%s' WHERE email = '%s'",$_SESSION['token_login'],$_SESSION['email_login']));
         /*
        mysql_query("UPDATE usuarios_admin SET ".
        "token = '{$_SESSION['token']}' WHERE ".
        "id_email = '{$_SESSION['id_email']}' ");  */
       
        $tiempo_limite = tiempo_expiracion_login;
        $url_timeout = './';
        $ahora = time();

        if (!empty($_SESSION['ultimo_acceso_login'])) {
            if ($ahora - $_SESSION['ultimo_acceso_login'] > 60 * $tiempo_limite) {
            header('Location: '.$url_timeout);
            }
        }

        $_SESSION['ultimo_acceso_login'] = $ahora; 
       
       
        //session_write_close();   
          
    } else {
      
      unset($_SESSION['token_login']);
      unset($_SESSION['email_login']);
      unset($_SESSION['usuario_id']);
      unset($_SESSION['usuario_login']);
      unset($_SESSION['ultimo_acceso_login']);  
      unset($_SESSION['auth_login']);
      
      /*$_SESSION = array(); 
      $_POST = array();
      
      session_unset(); 
      session_destroy();
      
      $sessionPath = session_get_cookie_params();        
      setcookie(session_name(), "", 0, $sessionPath["path"], $sessionPath["domain"]);*/
       
    }
    mysql_free_result($query);
    
}else{
      
      unset($_SESSION['token_login']);
      unset($_SESSION['email_login']);
      unset($_SESSION['usuario_id']);
      unset($_SESSION['usuario_login']);
      unset($_SESSION['ultimo_acceso_login']);  
      unset($_SESSION['auth_login']);
   
      /*$_SESSION = array(); 
      $_POST = array();
   
      session_unset(); 
      session_destroy();
   
      $sessionPath = session_get_cookie_params();        
      setcookie(session_name(), "", 0, $sessionPath["path"], $sessionPath["domain"]);*/
}


?>