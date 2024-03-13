<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Lima');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once '../lib/config.php';

//consultando a la base

$sql = "SELECT
	pedido.pe_id,
	pedido.pe_fecha,
	producto.pro_name,
	usuario.user_name,
	usuario.user_email,
	pedido.pe_fecha_pe,
	pedido.pe_horario,
	estado_pedido.es_name AS estado,
	pedido.es_id,
	pedido.pe_telf_tu,
	pedido.pe_direccion,
	pedido.pe_referencia,
	distrito.dis_name,
	pedido.pe_cant,
	pedido.pe_subtotal,
	pedido.pe_p_delivery,
	pedido.pe_p_adicional
	FROM
	pedido
	INNER JOIN producto ON pedido.pro_id = producto.pro_id
	INNER JOIN estado_pedido ON pedido.es_id = estado_pedido.es_id
	INNER JOIN usuario ON pedido.user_id = usuario.user_id
	INNER JOIN distrito ON pedido.pe_distrito = distrito.dis_id
	WHERE pedido.es_id <> 1";
	
$res = mysql_query($sql,Conectar::con());
$data = mysql_fetch_array($res);

while($resl=mysql_fetch_array($res)){
		$prores[]=$resl;
}
require_once dirname(__FILE__) . '/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Redgalar")
							 ->setLastModifiedBy("Redgalar")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Pedidos pendientes");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'N')
            ->setCellValue('B1', 'FECHA')
            ->setCellValue('C1', 'PRODUCTO')
            ->setCellValue('D1', 'COMPRADOR')
            ->setCellValue('E1', 'TELF. COMPRADOR')
            ->setCellValue('F1', 'EMAIL')
            ->setCellValue('G1', 'FECHA ENVIO')
            ->setCellValue('H1', 'DISTRITO')
            ->setCellValue('I1', 'DIRECCION')
            ->setCellValue('J1', 'REFERENCIA')
            ->setCellValue('K1', 'CANTIDAD')
            ->setCellValue('L1', 'TOTAL')
            ->setCellValue('M1', 'SUBTOTAL')
            ->setCellValue('N1', 'DELIVERY')
            ->setCellValue('O1', 'ESTADO');

// Miscellaneous glyphs, UTF-8
$n = 1;
$i = 2;
foreach($prores as $a){

$sub_p = $a["pe_subtotal"]*$a["pe_cant"];
$total = $sub_p;

if($a["pe_p_adicional"] > 0){
	$total = $total + $a["pe_p_adicional"];
}
if($a["pe_p_delivery"] >0){
	$total = $total + $a["pe_p_delivery"];
}						
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $n)
            ->setCellValue('B'.$i, $a["pe_fecha"])
            ->setCellValue('C'.$i, $a["pro_name"])
            ->setCellValue('D'.$i, $a["user_name"])
            ->setCellValue('E'.$i, $a["pe_telf_tu"])
            ->setCellValue('F'.$i, $a["user_email"])
            ->setCellValue('G'.$i, $a["pe_fecha_pe"].' '.$a["pe_horario"])
            ->setCellValue('H'.$i, $a["dis_name"])
            ->setCellValue('I'.$i, $a["pe_direccion"])
            ->setCellValue('J'.$i, $a["pe_referencia"])
            ->setCellValue('K'.$i, $a["pe_cant"])
            ->setCellValue('L'.$i, $total)
            ->setCellValue('M'.$i, $sub_p)
            ->setCellValue('N'.$i, $a["pe_p_delivery"])
            ->setCellValue('O'.$i, $a["estado"]);
$i= $i + 1;
$n= $n + 1;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Pedidos Redgalar');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>