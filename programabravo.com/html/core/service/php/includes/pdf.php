<?php
		include ('fpdf/fpdf.php');
		$fuente='Helvetica';
		$fecha = new DateTime();
        $fecha=$fecha->format("Y-m-d");
        $devolucion="2014-06-23";
        $encargado="Judith Arroyo";
        $motivo="Estudio";
        $estudio="PE:0846.06.14.07";
        //tenemos que generar una instancia de la clase 
        $pdf = new FPDF();
        $pdf->AddPage();
        //seleccionamos el tipo, estilo y tamaño de la letra a utilizar 
        $pdf->Image('../../../imagenes/logo.jpg' , 8 ,7, 70 ,'JPG');
        $pdf->SetFont($fuente, 'B', 14);
        $pdf->SetTextColor('0','0','128');//para imprimir en AZUL
        $pdf->Write (25,'Consolidado de entrega de tablets - IMD');
        $pdf->Ln(10);
        
        $pdf->Ln(8);
        $pdf->SetFont($fuente, 'B', 10);
        $pdf->SetTextColor('0','0','0');//para imprimir en AZUL
        $pdf->setFillColor(238,229,222);
        $pdf->Cell(40,5,"Fecha de entrega",1,0,'L',true);
        $pdf->setFillColor(255,255,255);
        $pdf->SetTextColor('0','0','128');
        $pdf->Cell(80,5,$fecha,1,1,'L',true);

        $pdf->Ln(0);
        $pdf->SetFont($fuente, 'B', 10);
        $pdf->SetTextColor('0','0','0');//para imprimir en AZUL
        $pdf->setFillColor(238,229,222);
        $pdf->Cell(40,5,utf8_decode("Fecha de devolución"),1,0,'L',true);
        $pdf->setFillColor(255,255,255);
        $pdf->SetTextColor('0','0','128');
        $pdf->Cell(80,5,$devolucion,1,1,'L',true);        

        $pdf->Ln(0);
        $pdf->SetFont($fuente, 'B', 10);
        $pdf->SetTextColor('0','0','0');//para imprimir en AZUL
        $pdf->setFillColor(238,229,222);
        $pdf->Cell(40,5,"Recepciona",1,0,'L',true);
        $pdf->setFillColor(255,255,255);
        $pdf->SetTextColor('0','0','128');
        $pdf->Cell(80,5,$encargado,1,1,'L',true);

        $pdf->Ln(0);
        $pdf->SetFont($fuente, 'B', 10);
        $pdf->SetTextColor('0','0','0');//para imprimir en AZUL
        $pdf->setFillColor(238,229,222);
        $pdf->Cell(40,5,"Motivo",1,0,'L',true);
        $pdf->setFillColor(255,255,255);
        $pdf->SetTextColor('0','0','128');
        $pdf->Cell(80,5,$motivo,1,1,'L',true);

        $pdf->Ln(0);
        $pdf->SetFont($fuente, 'B', 10);
        $pdf->SetTextColor('0','0','0');//para imprimir en AZUL
        $pdf->setFillColor(238,229,222);
        $pdf->Cell(40,5,"Estudio",1,0,'L',true);
        $pdf->setFillColor(255,255,255);
        $pdf->SetTextColor('0','0','128');
        $pdf->Cell(80,5,$estudio,1,1,'L',true);                        
        
        $pdf->Ln(5);//ahora salta 15 lineas 
        $pdf->SetFont($fuente, 'B', 11);
        $pdf->SetTextColor('205','0','0');
        $pdf->setFillColor(220,220,220);
        $pdf->Cell(15,5,"Item",1,0,'C',true);
        $pdf->Cell(42,5,utf8_decode("Código"),1,0,'C',true);
        $pdf->Cell(42,5,"Marca",1,0,'C',true);
        $pdf->Cell(42,5,"Modelo",1,0,'C',true);
        $pdf->Cell(42,5,"Serie",1,1,'C',true);

        $arr='["S001","S002","S003"]';
        $canArr=count($arr);
        for($i=0;$i<$canArr;$i++){
        	$cod=$arr[$i];
        	$sql="SELECT M.marca,T.modelo,T.serie FROM tablets T join marcas M on T.idMarca=M.idMarca WHERE T.codigo='$cod'";
        	$res = $this->db->get_results($sql);
        	$marca=$res[0]->marca;
        	$modelo=$res[0]->modelo;
        	$serie=$res[0]->serie;

            $pdf->SetFont($fuente, 'B', 9);
            $pdf->SetTextColor('0','0','128');
            $pdf->Cell(15,5,$i+1,1,0,'C');
            $pdf->Cell(42,5,$cod,1,0,'C');
            $pdf->Cell(42,5,$marca,1,0,'C');
            $pdf->Cell(42,5,$modelo,1,0,'C');  
            $pdf->Cell(42,5,$serie,1,1,'C');       	
        }

        $ruta="../../pdfs/".$estudio.".pdf";
        $pdf->Output($ruta,'F');

        return $ruta; 
?>