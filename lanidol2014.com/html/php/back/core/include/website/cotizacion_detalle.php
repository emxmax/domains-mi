<?php

$flg_found	=false;
foreach($arr_cotiza as $row){
    if(strtoupper($valor)==strtoupper($row[0])){
		$flg_found	=true;
		$valor		=$row[0];
		$anterior	=$row[1];
		$fecha		=strtotime($row[2]);
		$ultima		=$row[6];
		$compra		=$row[7];
		$venta		=$row[8];
		$apert		=$row[15];
		$max		=$row[16];
		$min		=$row[17];
		$prom		=$row[18];
		$var		=floatval($row[19]);
		$vol_dolar	=$row[23];
		$vol_sol	=$row[24];
		$cant_oper	=$row[25];
		
		
		$var_lbl	=($var==0)? '<img src="'.$URL_BASE.'images/indicadorraya_gr.png" alt="indicador">0.00': '<span class="'.($var>0? 'iSubir': 'iBajar').'"><img src="'.$URL_BASE.'images/'.($var>0? 'indicadorverde_gr.png': 'indicadorrojo_gr.png').'" alt="indicador">'.$var.'%</span>';
		
		break;
	}

}    

?>
<div class="clear"></div>           
		<div class="tReporte">
<?php
if($flg_found){
?>               
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="5" class="Titular">RESUMEN DEL DÍA</th>
                </tr>
                <tr>
                  <th class="txtAzul18"><div align="left"><?php echo $valor;?></div></th>
                  <th class="txt24"><div align="right"><?php echo $ultima;?></div></th>
                  <th class="txt24"><div align="left"><?php echo $var_lbl;?></div></th>
                  <th colspan="2" valign="bottom"><div align="right"><?php echo date('h:i / d-m-Y', $fecha);?></div></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <th width="150">Precio de Apertura</th>
                    <td width="80"><?php echo $apert;?></td>
                    <th width="140">Monto negociado</th>
                    <td width="180">US$ <?php echo $vol_dolar;?> &nbsp; S/.<?php echo $vol_sol;?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>Precio de Cierre Anterior</th>
                    <td><?php echo $anterior;?></td>
                    <th>Var (%)</th>
                    <td><?php echo $var;?>%</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>Precio M&aacute;ximo</th>
                    <td><?php echo $max;?></td>
                    <th><strong>Mejores ofertas</strong></th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>Precio Promedio</th>
                    <td><?php echo $prom;?></td>
                    <th>Venta</th>
                    <td><?php echo $venta;?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>Precio M&iacute;nimo</th>
                    <td><?php echo $min;?></td>
                    <th>Compra</th>
                    <td><?php echo $compra;?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>Nro. Acciones Negociadas</th>
                    <td><?php echo $cant_oper;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
<?php
}
else
	echo "<h3>No se han encontrado resultados en la búsqueda.</h3>";
?>

			</div>
