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
    ->setCreator("codegraph.pe")
    ->setLastModifiedBy("codegraph.pe")
    ->setTitle("Exportar excel desde mysql")
    ->setSubject("obpropie")
    ->setDescription("Documento generado con PHPExcel")
    ->setKeywords("codegraph.pe  con  phpexcel")
    ->setCategory("obpropie"); 
/**
	Guardamos la info en la Base de Datos
***/
$obpropie 		= new Propietario();
$consulta		= $obpropie->listar(1,1);
$item 			= count($consulta) - 1;
/***
	indice del contador del excel,
	se empieza en la fila 2, 
	dado que la 1 fila es para la cabecera.
***/
$countexcel = 2;
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', "Nombre y Apellido")
		->setCellValue('B1', "Teléfono")
		->setCellValue('C1', "DNI")
		->setCellValue('D1', "Fecha de la registro");
for ($i=0;$i<=$item;$i++){
	$data 		= $consulta[$i];
	$name 		= $data['name']; 
	$telefono 	= $data['telefono']; 
	$dni 		= $data['dni']; 
	$fecha_registro = $data['fecha_registro']; 
	/*** Llenamos el archivo *****/
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$countexcel, $name)
		->setCellValue('B'.$countexcel, $telefono)
		->setCellValue('C'.$countexcel, $dni)
		->setCellValue('D'.$countexcel, $fecha_registro);
	$countexcel++;
}

/*** Finalmente creamos el excel ****/

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="listadoobpropie.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;   
?>