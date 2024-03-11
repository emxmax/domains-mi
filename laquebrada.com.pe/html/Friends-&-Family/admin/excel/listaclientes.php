<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../phpexcel/Classes/PHPExcel.php';
/**
	Cargamos el objeto excel
**/
$objPHPExcel = new PHPExcel();
//Informacion del excel
$objPHPExcel->getProperties()
    ->setCreator("mediaimpact.pe")
    ->setLastModifiedBy("mediaimpact.pe")
    ->setTitle("Exportar excel desde mysql")
    ->setSubject("Listado de Referidos")
    ->setDescription("Documento generado con PHPExcel")
    ->setKeywords("mediaimpact.pe  con  phpexcel")
    ->setCategory("lista Referidos"); 
/**
	Guardamos la info en la Base de Datos
***/


/**$obpropie 		= new Propietario();**/


define("DB_SERVER","internal-db.s77722.gridserver.com");
define("DB_USER","db77722_sonrie");
define("DB_PASSWORD","50rie14n");
define("DB_DATABASE","db77722_ff");

function db_connect()
{
        $result = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
        if (!$result)
            return false;
        if (!mysql_select_db(DB_DATABASE))
            return false;
        return $result;
}
$result = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_selected = mysql_select_db(DB_DATABASE, $result);
$sqlClienteAdmin = "SELECT cli_id, cli_name, cli_codigo, cli_email FROM cliente";
///$rsClienteAdmin = mysql_query($sqlClienteAdmin);
$rsClienteAdmin = mysql_query($sqlClienteAdmin,$result);
//$obpropie = mysql_num_rows($rsClienteAdmin);

$main_arr = null;
while ($row = mysql_fetch_assoc($rsClienteAdmin)) {
    foreach($row as $key => $value)
    {    
        $arr[$key] = $value; 
    }
    $main_arr[] = $arr;
}

$item 			= count($main_arr) - 1;
/***
	indice del contador del excel,
	se empieza en la fila 2, 
	dado que la 1 fila es para la cabecera.
***/
$countexcel = 2;
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', "Nombre del Cliente")
		->setCellValue('B1', "Codigo")
		->setCellValue('C1', "Correo");
for ($i=0;$i<=$item;$i++){
	$data 			= $main_arr[$i];
	$name 	        = $data['cli_name']; 
	$codigo 		= $data['cli_codigo']; 
	$email 		    = $data['cli_email']; 
	/*** Llenamos el archivo *****/
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$countexcel, $name)
		->setCellValue('B'.$countexcel, $codigo)
		->setCellValue('C'.$countexcel, $email);
	$countexcel++;
}
if ((isset($_GET['id'])) and (!empty($_GET['id'])))
	$nameXls = sanear_string($propietario);
else
	$nameXls = "listadoclientes";
/*** Finalmente creamos el excel ****/

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$nameXls.'.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;  

//**********************
function sanear_string($string)
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
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":", " "),
        '',
        $string
    );


    return $string;
}
?>