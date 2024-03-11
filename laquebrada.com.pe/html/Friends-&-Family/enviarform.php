<?php

include "util/fns_db.php";
$cn = db_connect();

//Importamos los datos del formulario
@$name_cliente = addslashes($_POST['name_cliente']);
@$codigo_cliente = addslashes($_POST['codigo_cliente']);
@$email = addslashes($_POST['email_cliente']);

@$name_1 = addslashes($_POST['name_1']);
@$dir_1 = addslashes($_POST['dir_1']);
@$email_1 = addslashes($_POST['email_1']);
@$tel_1 = addslashes($_POST['tel_1']);

@$name_2 = addslashes($_POST['name_2']);
@$dir_2 = addslashes($_POST['dir_2']);
@$email_2 = addslashes($_POST['email_2']);
@$tel_2 = addslashes($_POST['tel_2']);

@$name_3 = addslashes($_POST['name_3']);
@$dir_3 = addslashes($_POST['dir_3']);
@$email_3 = addslashes($_POST['email_3']);
@$tel_3 = addslashes($_POST['tel_3']);

@$name_4 = addslashes($_POST['name_4']);
@$dir_4 = addslashes($_POST['dir_4']);
@$email_4 = addslashes($_POST['email_4']);
@$tel_4 = addslashes($_POST['tel_4']);

@$name_5 = addslashes($_POST['name_5']);
@$dir_5 = addslashes($_POST['dir_5']);
@$email_5 = addslashes($_POST['email_5']);
@$tel_5 = addslashes($_POST['tel_5']);

//Preparo el correo
$cabecemail = "From: $email\n"
        . "Reply-To: $email\n";
$asunto = "Mensaje desde el formulario de contacto de LA QUEBRADA"; //asunto del mensaje
$contenido = "$name_cliente ha enviado un mensaje desde el FORMULARIO DE REFERIDOS , estos son sus datos:"
        . "\n"
        . "\n"
        . "Nombres y Apellidos: $name_cliente\n"
        . "Codigo de cliente: $codigo_cliente\n"
        . "E-mail del cliente: $email\n"
        . "\n"
        . "\n"
        . "LISTA DE REFERIDOS:\n"
        . "Referido 1\n"
        . "Nombres y Apellidos: $name_1\n"
        . "Dirección: $dir_1\n"
        . "E-mail: $email_1\n"
        . "Teléfono: $tel_1\n"
        . "\n"
        . "Referido 2\n"
        . "Nombres y Apellidos: $name_2\n"
        . "Dirección: $dir_2\n"
        . "E-mail: $email_2\n"
        . "Teléfono: $tel_2\n"
        . "\n"
        . "Referido 3\n"
        . "Nombres y Apellidos: $name_3\n"
        . "Dirección: $dir_3\n"
        . "E-mail: $email_3\n"
        . "Teléfono: $tel_3\n"
        . "\n"
        . "Referido 4\n"
        . "Nombres y Apellidos: $name_4\n"
        . "Dirección: $dir_4\n"
        . "E-mail: $email_4\n"
        . "Teléfono: $tel_4\n"
        . "\n"
        . "Referido 5\n"
        . "Nombres y Apellidos: $name_5\n"
        . "Dirección: $dir_5\n"
        . "E-mail: $email_5\n"
        . "Teléfono: $tel_5\n"
        . "\n";


//Enviamos el correo

$email_to = "lescobedo@menorca.com.pe,mgomi@menorca.com.pe,etaboada@menorca.com.pe,bozasboza@menorca.com.pe"; 
//cambiar por tu email 

//Inserción en utf8
mysql_query("SET NAMES 'utf8");

// Registrar datos a la tabla
$sql_cli = "INSERT INTO cliente (cli_name,cli_codigo,cli_email) VALUES('$name_cliente','$codigo_cliente','$email')";

$sql1 = "INSERT INTO referido (re_name,re_dir,re_email,re_telf,re_posicion,cli_email) VALUES('$name_1','$dir_1','$email_1','$tel_1',1,'$email')";
$sql2 = "INSERT INTO referido (re_name,re_dir,re_email,re_telf,re_posicion,cli_email) VALUES('$name_2','$dir_2','$email_2','$tel_2',2,'$email')";
$sql3 = "INSERT INTO referido (re_name,re_dir,re_email,re_telf,re_posicion,cli_email) VALUES('$name_3','$dir_3','$email_3','$tel_3',3,'$email')";
$sql4 = "INSERT INTO referido (re_name,re_dir,re_email,re_telf,re_posicion,cli_email) VALUES('$name_4','$dir_4','$email_4','$tel_4',4,'$email')";
$sql5 = "INSERT INTO referido (re_name,re_dir,re_email,re_telf,re_posicion,cli_email) VALUES('$name_5','$dir_5','$email_5','$tel_5',5,'$email')";

mysql_query($sql_cli,$cn);

mysql_query($sql1,$cn);
mysql_query($sql2,$cn);
mysql_query($sql3,$cn);
mysql_query($sql4,$cn);
mysql_query($sql5,$cn);

if (@mail($email_to, $asunto, $contenido, $cabecemail)) {
 header ("Location: index.php");
}
?>