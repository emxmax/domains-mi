<?

// Fonction parse pour l'encodage des caractere en UTF8
function parse($valeur){
        return stripslashes(nl2br(utf8_decode($valeur)));
}


// Récupération des variable dans flash.
$sujetmsg = parse($_POST['sujet']);
$nomprenom = parse($_POST['nomprenom']);
$mail = parse($_POST['mail']);
$message = parse($_POST['msg']);
$contentmsg = "<b>Nombre: </b>".$nomprenom."<b><br />e-mail: </b>".$mail."<b><br />Teléfono: </b>".$sujetmsg."<b><br /><br />Mensaje: <br /></b>".$message;


// Datos relativos al correo electronico
$email="rominaremy@heladosanelare.com"; //Cambia tu correo aqui
$sujet="Correo Nuevo de".$nomprenom." "; 
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
$headers .= "From: ".$mail."\n";

//Header Reception
$headers2 = "MIME-Version: 1.0\n";
$headers2 .= "Content-type: text/html; charset=iso-8859-1\n"; 
$headers2 .= "From: ".$email."\n";


mail($email,$sujet,$contentmsg,$headers);
mail($mail,$sreception,$creception,$headers2);

?>