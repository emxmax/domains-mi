<?php
//ini_set('max_execution_time', 6000);

require_once(INCDIR.'uc_functions.php');
require_once(INCDIR.'ez_sql/ez_sql_core.php');
require_once(INCDIR.'ez_sql/ez_sql_mysql.php');
require_once(INCDIR.'swiftmailer/swift_required.php');
require_once(INCDIR.'phpexcel/PHPExcel.php');
require_once(INCDIR.'fpdf/fpdf.php');
class Service
{
    private $db;
    private $log;
    private $excels_dir;
    private $campoLink;
    private $pub;

    function __construct() 
    {
        $GLOBALS['amfphp']['encoding'] = 'amf3';
        $this->db = new ezSQL_mysql(DB_USER,DB_PASS,DB_NAME,DB_HOST);
        
        if(PRODUCTION_SERVER) $this->db->hide_errors();
        $this->excels_dir = PHPDIR.'../excels' ;


        $this->pub=false;
        if($this->pub){
            $this->campoLink = 'url1';
        }else{
            $this->campoLink = 'url2';
        }
    }    

    private function codificarPalabra($label){
        return mb_check_encoding ( $label ,  'UTF-8' )  ? $label : utf8_encode ( $label);
    }
    
    private function cerosIzquierda($n,$l){
        $retorno= str_pad($n, $l, "0", STR_PAD_LEFT);
        return $retorno;
    }
    private function guardarExcel( $objPHPExcel, $name )
    {
        $objPHPExcel->setActiveSheetIndex(0);       
        date_default_timezone_set('America/Lima');
        $fecha = new DateTime();
        $llave = $fecha->getTimestamp();
        $filename = $name . "_".$llave.".xls";        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $carpeta=$this->excels_dir."/".$fecha->format("Y-m-d");
        if(!file_exists($carpeta)){
            mkdir($carpeta);
        }
        $objWriter->save( $carpeta . "/" . $filename );    
        return $filename;
    }
    private function cabezerasExcel($title,$descripcion='',$keywords='',$category='')
    {        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("registro de horas de trabajo")
                                     ->setTitle($title)
                                     ->setSubject($title)
                                     ->setDescription($descripcion)
                                     ->setKeywords($keywords)
                                     ->setCategory($category);
        return $objPHPExcel;
    }
//CLASES GENERALES
    private function guardarImagen($imagen,$directorio,$nombre){
        $Base64Img=$imagen;
        //eliminamos data:image/png; y base64, de la cadena que tenemos
        //hay otras formas de hacerlo                   
        list(, $Base64Img) = explode(';', $Base64Img);
        list(, $Base64Img) = explode(',', $Base64Img);        
        //Decodificamos $Base64Img codificada en base64.
        $Base64Img = base64_decode($Base64Img);
        //return $Base64Img;
        //escribimos la información obtenida en un archivo llamado 
        //unodepiera.png para que se cree la imagen correctamente
        $ruta=$directorio.$nombre;     
        file_put_contents($ruta, $Base64Img);
    }
    private function sanear_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "°", "~",
                 "#", "@", "|", "!", "\"",
                 "·", "$", "%", "&", "/",
                 "(", ")", "?", "'", "¡",
                 "¿", "[", "^", "`", "]",
                 "+", "}", "{", "¨", "´",
                 ">", "< ", ";", ",", ":",
                  " "),
            '',
            $string
        );


        return $string;
    }
    public function enviarCorreo($data)
    {
        $data=json_decode($data);
        $nombre=$this->codificarPalabra($data->nombre);
        $telefono=$data->telefono;
        $dni=$data->dni;
        $mail=$data->correo;
        $proyecto=$data->proyecto;
        $consulta=$this->codificarPalabra($data->consulta);
        $direccion=$this->codificarPalabra($data->direccion);
        date_default_timezone_set('America/Lima');
        $lpd_mail = "web";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: Contacto - Menorca Collection <$lpd_mail>\r\n";
        $headers .= "Reply-To: $lpd_mail\r\n";
        $message = '<html>
                    <head>
                        <meta charset="UTF-8">
                        <style type="text/css">td img {display: block;}
                            body{
                                font-family: verdana;
                                font-size:50px;
                            }
                            .etiqueta{
                                font-family: verdana;
                                font-size:15px;
                                font-weight:bold;
                                color:#FFF;
                            }
                            .valor{
                                font-family: verdana;
                                font-size:18px;
                                color:#0072bc;
                            }
                            h2{
                                color:#0072bc;
                            }
                        </style>
                        <title>Contacto</title>
                    </head>
                    <body style=" font-family: "courier";">
                        <div id="container" style="margin: 0 10%; width: 80%;">
                            <div id="imagen" style="text-align: center;">
                                <img src="http://mediaimpact.pe/demo/menorcacollection/imagenes/logo_empresa.png" width="200px">
                            </div>
                            <div id="contenido" style="background: #ffffff; border-radius: 5px; color: #ffffff; padding: 30px;">
                                <h2 style="color:black;">Nuevo Mensaje recibido</h2>
                                <table width="100%" border="0" cellspacing="5" cellpadding="1">
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">Nombre</td>
                                        <td colspan="2" class="valor" style="color:black;">'.strtoupper($nombre).'</td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">DNI</td>
                                        <td colspan="2" class="valor" style="color:black;">'.$dni.'</td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">Telefono</td>
                                        <td colspan="2" class="valor" style="color:black;">'.$telefono.'</td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">Correo</td>
                                        <td colspan="2" class="valor" style="color:black;">'.$mail.'</td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">Proyecto</td>
                                        <td colspan="2" class="valor" style="color:black;">'.$proyecto.'</td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">Dirección</td>
                                        <td colspan="2" class="valor" style="color:black;">'.$direccion.'</td>
                                    </tr>
                                    <tr>
                                        <td height="40" align="center" bgcolor="#3a3a3a" class="etiqueta">Consulta</td>
                                        <td colspan="2" class="valor" style="color:black;">'.$consulta.'</td>
                                    </tr>
                                </table>
                            </div>
                            <div id="footer" style="background: #3a3a3a; color: #ffffff; text-align: center;">
                                <p>MENORCA COLLECTION</p>
                            </div>
                        </div>
                    </body>
                    </html>';
       // $resultado=mail('sboza@menorca.com.pe,acarozzi@menorca.com.pe,lescobedo@menorca.com.pe,acanales@menorca.com.pe',"Contacto - Menorca",$message,$headers);
                   // $resultado=mail('sc@mediaimpactperu.com',"Contacto - Menorca",$message,$headers);
                    $resultado=mail('sboza@menorca.com.pe,acarozzi@menorca.com.pe,lescobedo@menorca.com.pe,amonge@menorca.com.pe',"Contacto - Menorca Collection",$message,$headers);
                    //$resultado=mail('jfalcon910@gmail.com',"Contacto - Menorca Collection",$message,$headers);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }
 
}
?>