<?php

function _GetVideoIdFromUrl($url) {
    $parts = explode('?v=',$url);
    if (count($parts) == 2) {
        $tmp = explode('&',$parts[1]);
        if (count($tmp)>1) {
            return $tmp[0];
        } else {
            return $parts[1];
        }
    } else {
        return $url;
    }
}

function compararFechas($primera, $segunda){  

    $valoresPrimera = explode ("/", $primera);     
    $valoresSegunda = explode ("/", $segunda);   
    $diaPrimera    = $valoresPrimera[0];    
    $mesPrimera  = $valoresPrimera[1];    
    $anyoPrimera   = $valoresPrimera[2];   
    $diaSegunda   = $valoresSegunda[0];    
    $mesSegunda = $valoresSegunda[1];    
    $anyoSegunda  = $valoresSegunda[2];  
    $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);    
    $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);  
         
    if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){  
    // "La fecha ".$primera." no es válida";  
        return 0;  
    }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){  
    // "La fecha ".$segunda." no es válida";  
        return 0;  
    }else{  
        return  $diasPrimeraJuliano - $diasSegundaJuliano;  
    }   

}  

function comparaFechaHora($fecha){
	if($fecha != ""){
		$fecha_hora = explode(" ",$fecha);
		$bloque_fecha = $fecha_hora[0];
		$bloque_hora = $fecha_hora[1];
		
		#hora BD
		#extraemos la fecha
		$fecha_dma = explode("-",$bloque_fecha);
		$anio = $fecha_dma[0];
		$mes = $fecha_dma[1];
		$dia = $fecha_dma[2];
		
		#extraemos la hora
		$fecha_hms = explode(":",$bloque_hora);
		$hora = $fecha_hms[0];
		$min = $fecha_hms[1];
		$seg = $fecha_hms[2];
		
		#######################
		
		#hora Actual
		$anio2 = date("Y");
		$mes2 = date("m");
		$dia2 = date("d");
		
		$hora2 = date("H");
		$min2 = date("i");
		$seg2 = date("s");
		
		#calculo timestam(Cantidad de segundos) de las dos fechas
		$timestamp1 = mktime($hora,$min,$seg,$mes,$dia,$anio);
		$timestamp2 = mktime($hora2,$min2,$seg2,$mes2,$dia2,$anio2);
		
		#restamos los segundos
		
		$segundos_diferencia = $timestamp1 - $timestamp2;
		
		#convierto segundos en días
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
		$dias_diferencia = abs($dias_diferencia);
		$dias_diferencia = floor($dias_diferencia); 
	}else{
		$dias_diferencia = 8;
		}
	return $dias_diferencia;
	
}

/*
function generaPaises($estados = false){

    include 'adm/decon/connect.php';
    $query = sprintf('SELECT id, opcion FROM lista_paises');
    $result = mysql_query($query, $conn->getConectado());

    // Voy imprimiendo el primer select compuesto por los paises

    if($estados==false) echo "<select name='paises' id='paises' class='frm_combo comboTipo1' onchange='cargaContenido(this.id)'>";
    else echo "<select name='paises' id='paises'>";
    
    echo "<option value='0'>&nbsp;</option>";
    
    while($row=mysql_fetch_row($result)){
        echo "<option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
    }

    echo "</select>";

}
*/

function zerofill($entero, $largo){
    // Limpiamos por si se encontraran errores de tipo en las variables
    $entero = (int)$entero;
    $largo = (int)$largo;
     
    $relleno = '';
     
    /**
     * Determinamos la cantidad de caracteres utilizados por $entero
     * Si este valor es mayor o igual que $largo, devolvemos el $entero
     * De lo contrario, rellenamos con ceros a la izquierda del número
     **/
    if (strlen($entero) < $largo) {
        $relleno = str_repeat('0', $largo-strlen($entero));
    }
    return $relleno . $entero;
}

function limpiarCaracteres($str, $text = false){

    $chars1 = array('á','é','í','ó','ú','ñ','Á','É','Í','Ó','Ú','Ñ');
    $chars2 = array('a','e','i','o','u','n','A','E','I','O','U','N');
    $chars3 = array('&aacute;','&eacute;','&iacute;','&oacute;','&uacute;','&ntilde;','&Aacute;','&Eacute;','&Iacute;','&Oacute;','&Uacute;','&Ntilde;');
    return $text ? strip_tags(str_replace($chars1,$chars2,$str)) : str_replace($chars1,$chars3,$str);

}

function fecha($fecha,$perfil){

    if ($fecha){

        $f=explode("-",$fecha);
        $nummes=(int)$f[1];
        
        if($perfil==0){
        	$nombremes = "0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
        	$mes=explode("-",$nombremes);
        	$desfecha="$f[2] de $mes[$nummes] del $f[0]";
        }elseif($perfil==1){
        	$nombremes = "0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
        	$mes=explode("-",$nombremes);
        	$desfecha="$f[2] of1 $mes[$nummes] of1 $f[0]";
        }elseif($perfil==2){
        	$nombremes = "0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
        	$mes=explode("-",$nombremes);
        	$desfecha="$f[2] of2 $mes[$nummes] of1 $f[0]";
        }
        
        return $desfecha;

   } 

}

function mes($mes,$perfil){

	$mes_esp= array(null,'ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SET','OCT','NOV','DIC');
	$mes_eng= array(null,'ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SET','OCT','NOV','DIC');
	$mes_chi= array(null,'ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SET','OCT','NOV','DIC');
	
	if($perfil==0){
		$dato=$mes_esp[$mes];
	}elseif($perfil==1){
		$dato=$mes_eng[$mes];
	}elseif($perfil==2){
		$dato=$mes_chi[$mes];
	}
	
	return $dato;
    
}

/* consulta mysql */
/*
function recogerDatos($sql){

    $rs=mysql_query($sql);
    $num=mysql_num_rows($rs);

    if($num>0) while($fila = mysql_fetch_assoc($rs)) $arreglo[] = $fila;
    else $arreglo = false;

    return $arreglo;

    mysql_free_result($rs);

}

   
function numDatos($sql){

    $rs=mysql_query($sql);
    $num=mysql_num_rows($rs);

    return $num;

    mysql_free_result($rs);

}



function enviar($dato){

    return urlencode(base64_encode($dato));

}



function recibir($dato){

    return base64_decode(urldecode($dato));

}

*/



/* convertir datos */



function parseArrayToObject($array) {

    $object = new stdClass();

    if (is_array($array) && count($array) > 0) {

        foreach ($array as $name=>$value) {

            $name = strtolower(trim($name));

            if (!empty($name)) {

                $object->$name = $value;

            }

        }

    }

    return $object;

}


function parseObjectToArray($object) {

    $array = array();

    if (is_object($object)) {

        $array = get_object_vars($object);

    }

    return $array;

}



/* convertir a UTF8 */

function convertirUTF8($cadena){

    $cur_encoding = mb_detect_encoding($cadena) ;

    if($cur_encoding == "UTF-8" && mb_check_encoding($cadena,"UTF-8")){

        return $cadena;

    }else{

        return utf8_encode($cadena);

    }

}



function currency_convert($from, $to, $amount = 1){

    $options = array(

        CURLOPT_RETURNTRANSFER => true, // return web page

        CURLOPT_HEADER         => false,// don't return headers

        CURLOPT_CONNECTTIMEOUT => 5     // timeout on connect

    );


    $ch = curl_init( "http://www.google.com/ig/calculator?hl=en&q=$amount$from=?$to" );

    curl_setopt_array( $ch, $options );

    $result = curl_exec( $ch ); //let's fetch the result using cURL

    curl_close( $ch );


    if( $result === FALSE )

    return $result;


    $result = explode('"',$result);

    $result = (float) substr( $result[3], 0, strpos($result[3], ' ') );

    return ( $result == 0 ) ? FALSE : $result;

}



function currency($from_Currency,$to_Currency,$amount) {

    $amount = urlencode($amount);

    $from_Currency = urlencode($from_Currency);
 
    $to_Currency = urlencode($to_Currency);
 
    $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
 
    $ch = curl_init();
 
    $timeout = 0;
 
    curl_setopt ($ch, CURLOPT_URL, $url);
 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
 
    curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
 
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
 
    $rawdata = curl_exec($ch);
 
    curl_close($ch);
 
    $data = explode('"', $rawdata);
 
    $data = explode(' ', $data['3']);
 
    $var = $data['0'];
 
    return round($var,2);

}


/* seo */

/*
function prepararUrl($cadena){

    $tabla = array('Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c','À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E','Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O','Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e','ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o','ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b','ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r');
    $cadena= strtr($cadena, $tabla);
    $patron = '#[^-a-zA-Z0-9_ ]#';
    $cadena = preg_replace($patron, '', strtolower($cadena));
    $cadena = trim($cadena); 
    $cadena = preg_replace('#[-_ ]+#', '-', $cadena); 

    return $cadena;

}


function verificarUrlSeo($url){  

    if (site . $_SERVER['REQUEST_URI'] != $url){ 
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $url);
        exit();     
    }

}


function crearUrlSeo($perfil,$tipo=0,array $datos){
    $seccion = $datos['seccion'];
    
    if($tipo==0){
        $url = site .'/'.$seccion.'/'.$perfil;

    }else if($tipo==1){
        $url = site .'/'.$seccion.'/'.$perfil . '-'.$datos['id'];
        if(isset($datos['id_paginador'])) $url= $url. '-'.$datos['id_paginador'];
        if(isset($datos['nombre_detalle'])) {
            $nombre1 = prepararUrl($datos['nombre_detalle']);
            $url= $url. '/'.$nombre1;
        }
    
    }else if($tipo==2){
        $nombre1 = prepararUrl($datos['nombre_detalle']);
        $url = site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle']. '/' . $nombre1;
    
    }else if($tipo==3){
        $nombre1 = prepararUrl($datos['nombre_detalle']);
        $url = site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle']. '-' . $datos['id_subdetalle']. '/' .$nombre1;
    
    }else if($tipo==4){
        $url = site .'/'.$seccion.'/'.$perfil . '-' .$datos['id_registro'];
    
    }else if($tipo==5){
        $url = site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle'];
        if(isset($datos['id_paginador'])) $url= $url. '-'.$datos['id_paginador'];
        if(isset($datos['nombre_detalle'])) {
            $nombre1 = prepararUrl($datos['nombre_detalle']);
            $url= $url. '/'.$nombre1;
        }
        
    }else if($tipo==6){
        $url = site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle']. '-' . $datos['id_subdetalle'];
        if(isset($datos['id_paginador'])) $url= $url. '-'.$datos['id_paginador'];
        if(isset($datos['nombre_detalle'])) {
            $nombre1 = prepararUrl($datos['nombre_detalle']);
            $url= $url. '/'.$nombre1;
        }
    
    }else if($tipo==7){
        $url = site .'/'.$perfil;     
    
    }

    return $url;
}

*/

function paginaNoEncontrada(){

    header('HTTP/1.x 404 Not Found');

    echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">

            <html><head>

            <title>404 Not Found</title>

            </head><body>

            <h1>Not Found</h1>

            <p>The requested URL '.$_SERVER['REQUEST_URI'].' was not found on this server.</p>

            </body></html>';

    exit();

}



function verificarURL($datosInfo,$p,$tipo,array $datosSeo){

    if($datosInfo==false){
        paginaNoEncontrada();
    }

    verificarUrlSeo(crearUrlSeo($p,$tipo,$datosSeo));

}

// elimina los espacios en blanco
//function compress_page($buffer) { $search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'); $replace = array('> ',' <','\\1'); return preg_replace($search, $replace, $buffer); }
//ob_gzhandler(ob_start("compress_page"));

function compress_page($buffer){

//original  $search = array(“/ +/” => ” “,“/<!–\{(.*?)\}–>|<!–(.*?)–>|[\t\r\n]|<!–|–>|\/\/ <!–|\/\/ –>|<!\[CDATA\[|\/\/ \]\]>|\]\]>|\/\/\]\]>|\/\/<!\[CDATA\[/" => "");
	$search = array("/ +/" => " ","/<!–\{(.*?)\}–>|<!–(.*?)–>|[\t\r\n]|<!–|–>|\/\/ <!–|\/\/ –>|<!\[CDATA\[|\/\/ \]\]>|\]\]>|\/\/\]\]>|\/\/<!\[CDATA\[/" => "");	
	$buffer = preg_replace(array_keys($search), array_values($search), $buffer);
	return $buffer;
}

function compress_styles($buffer) {

//original	$search = array("/\/\*(.*?)\*\/|[\t\r\n]/s” => “”,“/ +\{ +|\{ +| +\{/” => “{“,“/ +\} +|\} +| +\}/” => “}”,“/ +: +|: +| +:/” => “:”,“/ +; +|; +| +;/” => “;”,“/ +, +|, +| +,/” => “,”);
	$search = array("/\/\*(.*?)\*\/|[\t\r\n]/s" => "","/ +\{ +|\{ +| +\{/" => "{","/ +\} +|\} +| +\}/" => "}","/ +: +|: +| +:/" => ":","/ +; +|; +| +;/" => ";","/ +, +|, +| +,/" => ",");
	$buffer = preg_replace(array_keys($search), array_values($search), $buffer);
	return $buffer;
}

/*
function mostrarCanal($accion="agregar", $id=0){
	include 'adm/decon/connect.php';
    
    $query = sprintf('SELECT id, titulo FROM canales order by prioridad');
    $result = mysql_query($query, $conn->getConectado());

    echo "<select name='canal' id='canal' class='frm_combo comboTipo1'>";
	if($accion=="agregar"){    
		echo "<option value='0'>&nbsp;</option>";
		
		while($row=mysql_fetch_row($result)){
			echo "<option value='".$row[0]."'>".($row[1])."</option>";
		}
	}else{
		echo "<option value='0'>&nbsp;</option>";
		
		while($row=mysql_fetch_row($result)){
			$option="<option value='".$row[0]."'";
			if($row[0]==$id) $option.= " selected='selected'>";
			else $option.= " >";
			
			echo $option.($row[1])."</option>";
			
		}
	}
    echo "</select>";

}
*/

/*
function tipoContenido($tipo,$url,$titulo,$id,$padre,$nivel,$p){
	
	$seo_url="";
		  
	if($tipo==0){
		
		$url = explode(".", $url);
		
		if($nivel > 1) {
			$datos_seo = array("seccion" => $url[0],"id" => $padre,"id_detalle" => $id , "nombre_detalle" => $titulo);
			$seo_url = crearUrlSeo($p, 2,$datos_seo);
		}else{
			$datos_seo = array("seccion" => $url[0],"id" => $id, "nombre_detalle" => $titulo);
			$seo_url = crearUrlSeo($p, 1,$datos_seo);	
		}


		//$datos_seo = array("seccion" => $url[0],"id" => $id,"nombre_detalle" => $titulo);
		//$seo_url = crearUrlSeo($p, 1,$datos_seo);

	}else if($tipo==1){
		
		$seo_url = $url;
	
	}else if($tipo==2){

		$seo_url = "";
		
	}else if($tipo==3){
		  
		$url = explode(".", $url);
		$datos_seo = array("seccion" => $url[0],"id" => $id);
		$seo_url = crearUrlSeo($p, 1,$datos_seo);
		
	}else if($tipo==4){
		  
		$url = explode(".", $url);
		$datos_seo = array("seccion" => $url[0],"id" => $id);
		$seo_url = crearUrlSeo($p, 1,$datos_seo);

	}else if($tipo==5){
								  
		$url = explode(",", $url);
		$seo_url = site.$url[1];

	}	
	
	return $seo_url;
}
*/
function sendEmail($aTo, $aFrom, $aSubject, $mailcontent){
	$mail = new PHPMailer();
	$mail->PluginDir = "lib/";
	$mail->SetLanguage("es","include/language");
	$mail->IsSMTP();
	
	$mail->Mailer = "smtp";
	$mail->Host 	= "ssl://smtp.gmail.com"; 
	$mail->SMTPAuth = true;
	$mail->Port 	= 465;
	$mail->Username = "jorge.asalde@gmail.com";
	$mail->Password = "*****";
	$mail->From 	= $aFrom;
	$mail->FromName = $aFrom;

    
	$mail->Timeout=30;
	$mail->AddAddress($aTo);
	$mail->Subject = $aSubject;
	$mail->IsHTML(true);
	$mail->Body = $mailcontent;
	$exito = $mail->Send();
    
	return $exito;
}

function mostrarZonas($db,$id_zona_listado){
	return $db->zonas()
			  ->select("zonas.id,zonas.contenido")
			  ->where(array("id_zonas_listado"=>$id_zona_listado,"estado"=>1))
			  ->order("zonas.prioridad, zonas.fecha desc")
			  ->limit("1")
			  ->fetch();
}

function strleft($s1, $s2) {
	return substr($s1, 0, strpos($s1, $s2));
}


function selfURL() {
	$s = empty($_SERVER["HTTPS"]) ? ''
		: ($_SERVER["HTTPS"] == "on") ? "s"
		: "";
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
		: (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}

function submitSitemap($site){

    $url = 'http://www.google.com/webmasters/sitemaps/ping?sitemap='.htmlentities($site.'/sitemap.xml');

    $response = file_get_contents($url);

    if($response){

        echo $response;

    }else{

        echo "Failed to submit sitemap";

    }

}

function mostrarFondo($db,$p,$complementoId){
    return $db->complementos()->where(array("complementos.estado"=>1,"complementos.perfil"=>$p,"complementos.id_interno"=>$complementoId))->fetch();
}

?>