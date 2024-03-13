<?php
/** Include PHPExcel */
require_once '../lib/config.php';

//consultando a la base
$iu=$_SESSION["ses_id"];
//$iu= 5;
$sql = "SELECT
	pedido.pe_id,
	pedido.pe_fecha,
	producto.pro_name as nomproduc,
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
	pedido.pe_p_adicional,
	pedido.id_empresa
	FROM
	pedido
	INNER JOIN producto ON pedido.pro_id = producto.pro_id
	INNER JOIN estado_pedido ON pedido.es_id = estado_pedido.es_id
	INNER JOIN usuario ON pedido.user_id = usuario.user_id
	INNER JOIN distrito ON pedido.pe_distrito = distrito.dis_id
	WHERE pedido.id_empresa=".$iu;
	
$res = mysql_query($sql,Conectar::con());

$registros = mysql_num_rows ($res);
  
if ($registros > 0) {
	
// while($resl=mysql_fetch_array($res)){
		// $prores[]=$resl;
// }
date_default_timezone_set('America/Lima');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

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
							 ->setCategory("Todos los Pedidos");

$tituloReporte = "LISTA DE PEDIDOS DE: ".$_SESSION["ses_nombre"];

$objPHPExcel->setActiveSheetIndex(0)
->mergeCells('A1:O1');
// Add some data
$objPHPExcel->setActiveSheetIndex()
			->setCellValue('A1',$tituloReporte)
            ->setCellValue('A3', 'N')
            ->setCellValue('B3', 'FECHA')
            ->setCellValue('C3', 'PRODUCTO')
            ->setCellValue('D3', 'COMPRADOR')
            ->setCellValue('E3', 'TELF. COMPRADOR')
            ->setCellValue('F3', 'EMAIL')
            ->setCellValue('G3', 'FECHA ENVIO')
            ->setCellValue('H3', 'DISTRITO')
            ->setCellValue('I3', 'DIRECCION')
            ->setCellValue('J3', 'REFERENCIA')
            ->setCellValue('K3', 'CANTIDAD')
            ->setCellValue('L3', 'TOTAL')
            ->setCellValue('M3', 'SUBTOTAL')
            ->setCellValue('N3', 'DELIVERY')
            ->setCellValue('O3', 'ESTADO');

// Miscellaneous glyphs, UTF-8
$n = 1;
$i = 4;
while ($a = mysql_fetch_object ($res)){

$sub_p = $a->pe_subtotal*$a->pe_cant;
$total = $sub_p;

if($a->pe_p_adicional > 0){
	$total = $total + $a->pe_p_adicional;
}
if($a->pe_p_delivery >0){
	$total = $total + $a->pe_p_delivery;
}						
$objPHPExcel->setActiveSheetIndex()
            ->setCellValue('A'.$i, $n)
            ->setCellValue('B'.$i, $a->pe_fecha)
            ->setCellValue('C'.$i, utf8_encode($a->nomproduc))
            ->setCellValue('D'.$i, $a->user_name)
            ->setCellValue('E'.$i, $a->pe_telf_tu)
            ->setCellValue('F'.$i, $a->user_email)
            ->setCellValue('G'.$i, $a->pe_fecha_pe.' '.$a->pe_horario)
            ->setCellValue('H'.$i, $a->dis_name)
            ->setCellValue('I'.$i, $a->pe_direccion)
            ->setCellValue('J'.$i, $a->pe_referencia)
            ->setCellValue('K'.$i, $a->pe_cant)
            ->setCellValue('L'.$i, $total)
            ->setCellValue('M'.$i, $sub_p)
            ->setCellValue('N'.$i, $a->pe_p_delivery)
            ->setCellValue('O'.$i, $a->estado);
	$i= $i + 1;
	$n= $n + 1;
}

$styleArray = array(
    'font' => array(
        'bold' => true,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startcolor' => array(
            'argb' => 'FFA0A0A0',
        ),
        'endcolor' => array(
            'argb' => 'FFFFFFFF',
        ),
    ),
);
 
$objPHPExcel->getActiveSheet()->getStyle('A1:O1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A3:O3')->applyFromArray($styleArray);

$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('F')->setWidth(34);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('G')->setWidth(25);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('I')->setWidth(45);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('J')->setWidth(35);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('K')->setWidth(12);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('L')->setWidth(12);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('M')->setWidth(12);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('N')->setWidth(12);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension('O')->setWidth(21);

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Pedidos Redgalar');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="AllPedidos.xls"');
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
}
else{
	echo '<script language="javascript">window.location="https://www.redgalar.com/admin/?accion=error"</script>';
}
?>