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
    public function getDatos()
    {
        return $this->db;
    }
    public function getEmpleados()
    {
        $sql="SELECT * FROM crm_empleado";
        $res=$this->db->get_results($sql);
        return $res;
    }
    public function getEmpleadosMatch()
    {
        $sql="SELECT * FROM crm_empleado_sube WHERE codigoBP NOT IN (SELECT codigoBP FROM crm_empleado)";
        $res=$this->db->get_results($sql);
        return count($res);
    }
    public function getEmpleadosMatchExec()
    {
        $sql="SELECT * FROM crm_empleado_sube WHERE codigoBP NOT IN (SELECT codigoBP FROM crm_empleado)";
        $res=$this->db->get_results($sql);
        
        $sqlid="SELECT personaID FROM crm_empleado ORDER BY personaID DESC LIMIT 1";
        $ultimo=$this->db->get_var($sqlid);
        $i=0;
        $data = array();
        foreach ($res as $result) 
        {         
            $ultimo=intval($ultimo)+1;
            $codigoBP=$result->codigoBP;
            $dni=$result->dni;
            $clave=$result->clave;
            $apellido1=$result->apellido1;
            $apellido2=$result->apellido2;
            $nombres=$result->nombres;
            $fechaNacimiento=$result->fechaNacimiento;
            $posicion=$result->posicion;
            $unidadOrganizativa=$result->unidadOrganizativa;
            $superiorID=$result->superiorID;
            $superiorNombre=$result->superiorNombre;
            $gerencia=$result->gerencia;
            $email=$result->email;
            $estado=$result->estado;
            /*$sqlInserta="INSERT INTO crm_empleado (personaID,codigoBP,dni,clave,apellido1,apellido2,nombres,fechaNacimiento,posicion,unidadOrganizativa,
                superiorID,superiorNombre,gerencia,email,estado) VALUES ($ultimo,'$codigoBP','$dni','$clave','$apellido1','$apellido2','$nombres','$fechaNacimiento','$posicion','$unidadOrganizativa',
                $superiorID,'$superiorNombre','$gerencia','$email','$estado')";
            $state=$this->db->query($sqlInserta);*/
            $sqlUpdate="UPDATE crm_empleado SET codigoBP='$codigoBP',clave='$clave',apellido1='$apellido1',apellido2='$apellido2',nombres='$nombres',posicion='$posicion',unidadOrganizativa='$unidadOrganizativa',gerencia='$gerencia',email='$email' WHERE dni='$dni'";
            $state=$this->db->query($sqlUpdate);
            $data[]=$sqlUpdate;
            if($state){
                $i=$i+1;
            }
        }
        return $i;
    }
}
?>

