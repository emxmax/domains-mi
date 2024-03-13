<?php
include('../config/conexion.php');
include('../models/propietario.php');
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
$obpropie 		= new Propietario();
if ((isset($_GET['id'])) and (!empty($_GET['id'])))
	$consulta		= $obpropie->listarreferido($_GET['id'],1,1);
else
	$consulta		= $obpropie->listarreferidoAll();
$item 			= count($consulta) - 1;
/***
	indice del contador del excel,
	se empieza en la fila 2, 
	dado que la 1 fila es para la cabecera.
***/
$countexcel = 2;
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', "Nombre del Propietario")
		->setCellValue('B1', "Nombre del Referido")
		->setCellValue('C1', "Dirección")
		->setCellValue('D1', "Correo")
		->setCellValue('E1', "Teléfono");
for ($i=0;$i<=$item;$i++){
	$data 			= $consulta[$i];
	$propietario 	= $data['propietario']; 
	$name 			= $data['name']; 
	$direccion 		= $data['direccion']; 
	$email 			= $data['email']; 
	$phone 			= $data['phone']; 
	/*** Llenamos el archivo *****/
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$countexcel, $propietario)
		->setCellValue('B'.$countexcel, $name)
		->setCellValue('C'.$countexcel, $direccion)
		->setCellValue('D'.$countexcel, $email)
		->setCellValue('E'.$countexcel, $phone);
	$countexcel++;
}
if ((isset($_GET['id'])) and (!empty($_GET['id'])))
	$nameXls = sanear_string($propietario);
else
	$nameXls = "listadoreferidoall";
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