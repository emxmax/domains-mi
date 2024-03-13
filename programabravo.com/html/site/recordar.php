<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");

$email      = OWASP::RequestString('email');
$message    = NULL;

if($email!=NULL){
    $oEmpleado = CrmEmpleado::getWebItem_email($email);
    if ($oEmpleado!=NULL){
        //Send email
        Email::Send_Recordar($oEmpleado);
        
        $message = 'Tu clave ha sido enviada a tu direcci&oacute;n de correo.';
    }
    else{
        $message = 'El correo ingresado no existe en el sistema o est&aacute; bloqueado.';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Recordar</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFF;
	background-repeat: no-repeat;
	background-position: center top;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #666;
}
.input3 {
	background-color: #FFF;
	border: 1px solid #999;
	width: 230px;
	height: 22px;
	border-radius: 3px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #666;
}
</style>
</head>

<body>
<table width="400" height="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
<?php
if($message!=NULL){
    echo '<p>'.$message.'</p>';
}
else
{
?>
    <form id="frmRemember" name="frmRemember" method="post" onsubmit="return onSubmit(this);">
      <p>Enviaremos tu clave a tu correo electrónico,<br />
        por favor ingresa tu dirección:<br />
      </p>
      <p>
        <input name="email" type="text" class="input3" id="email" />
      </p>
      <p>
        <input name="button" type="submit" id="button" value="Enviar" />
      </p>
    </form>
    <script type="text/javascript">
        function onSubmit(form){
            if(form['email'].value==''){
                return false;
            }
            return true;
        }
    </script>
<?php
}
?>
    </td>
  </tr>
</table>
</body>
</html>
