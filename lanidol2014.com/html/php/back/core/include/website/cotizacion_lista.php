<link rel="stylesheet" type="text/css" media="all" href="<?php echo $URL_BASE;?>css/jScrollPane.css" />
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript">
    $(function()
    {
        // this initialises the demo scollpanes on the page.
        $('.scroll-pane').jScrollPane({showArrows:true});
		$('#btnRefreshCot').click(function(){
			$('#codigo_accion').val('');
			$('#frmCotiza').submit();
		});
    });
</script>
    <form method="post" id="frmCotiza">
        <table  border="0" cellspacing="0" cellpadding="0" id="tablaBuscar">
          <tr>
            <td width="90" height="45">C&oacute;digo de acci&oacute;n</td>
            <td width="175"><input name="codigo_accion" id="codigo_accion" type="text" class="txt-buscar" value="<?php echo $codigo_accion; ?>"></td>
            <td><input name="btnSearchCot" type="submit" class="btnBuscar" id="btnSearchCot" value="BUSCAR"></td>
            <td width="35" align="right"><a id="btnRefreshCot" href="#"><img src="<?php echo $URL_BASE;?>images/ico-refresh.png" title="Refrescar"></a></td>

        </tr>
        </table>
    </form>
      <div class="tCotizacion">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th width="100">acciones</th>
          <th width="50">precio actual</th>
          <th width="70">% var día</th>
          <th width="60">fecha</th>
          <th width="40">hora</th>
          <th width="40">compra</th>
          <th width="40">venta</th>
          <th width="70">precio anterior</th>
          <th width="90">monto negociado</th>
        </tr>
        </thead>
      </table>
       <div class="scroll-pane" style="height:<?php echo ($codigo_accion!='')?'100px': '480px';?>">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tbody>
<?php
    $i=0;
    foreach($arr_cotiza as $row){
    if($codigo_accion!='' && preg_match('/'.$codigo_accion.'/i', $row[0])==FALSE) continue;
    $valor		=$row[0];
    $anterior	=$row[1];
    $fecha		=$row[2];
    $ultima		=$row[6];
    $compra		=$row[7];
    $venta		=$row[8];
    $var		=$row[19];
    $vol_dolar	=$row[23];
    $vol_sol	=$row[24];
    $mon		=$row['moneda'];

    $mon_lbl	=($mon=='D')? 'US$ ': 'S/. ';
    $var_lbl	=($var==0)? '<img src="'.$URL_BASE.'images/indicadorraya.png" alt="indicador"> 0.00': '<span class="'.($var>0? 'iSubir': 'iBajar').'"><img src="'.$URL_BASE.'images/'.($var>0? 'indicadorverde.png': 'indicadorrojo.png').'" alt="indicador">'.$var.'</span>';
	
	$vol_lbl	=($mon=='D' && $vol_dolar>0) ? $mon_lbl.$vol_dolar: (($mon=='S' && $vol_sol>0)? $mon_lbl.$vol_sol: '');
?>
             <tr <?php if($i%2==1) echo 'class="tFondo"'; ?>>
               <th width="90"><a href="<?php echo SEO::get_URLContent($oContentLang).'?valor='.$valor;?>"><?php echo $valor;?></a></th>
               <td width="60"><?php echo $ultima;?></td>
               <td width="60"><?php echo $var_lbl;?></td>
               <td><?php echo date('d/m/Y', $fecha);?></td>
               <td><?php echo date('h:i', $fecha);?></td>
               <td><?php echo $compra;?></td>
               <td><?php echo $venta;?></td>
               <td><?php echo $anterior;?></td>
               <td width="90" align="right"><?php echo $vol_lbl;?></td>
             </tr>
<?php
    $i++;
    }
?>
           </tbody>
         </table>
       </div>
      </div>
    <div class="clear"></div>           
<div class="tAcciones">           
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th colspan="2" class="Titular">CARACTER&Iacute;STICAS DEL MERCADO</th>
        </tr>
        <tr>
          <th>mayores alzas</th>
          <th>mayores bajas</th>
        </tr>
        </thead>
        <tbody>
<?php
//ordenar por criterio (3)
$arr_sub = array();
$arr_baj = array();
foreach($arr_cotiza as $row){
if($row[19]==0) continue;
    $var		=$row[19];
    $valor		=$row[0];
	$arr_sub[]	=($var>0)? array($var, $valor): array(0, '');
	$arr_baj[]	=($var<0)? array($var, $valor): array(0, '');
}

rsort($arr_sub);
sort($arr_baj);
for($i=0; $i<count($arr_sub); $i++){
	if($arr_sub[$i][0]==0 && $arr_baj[$i][0]==0) continue;
	$sub_var	=$arr_sub[$i][0];
	$sub_valor	=$arr_sub[$i][1];
	$sub_var	=($sub_var==0)? '': '<span class="'.($sub_var>0? 'iSubir': 'iBajar').'"><img src="'.$URL_BASE.'images/'.($sub_var>0? 'indicadorverde.png': 'indicadorrojo.png').'" alt="indicador">'.$sub_var.'%</span>';

	$baj_var	=$arr_baj[$i][0];
	$baj_valor	=$arr_baj[$i][1];
	$baj_var	=($baj_var==0)? '': '<span class="'.($baj_var>0? 'iSubir': 'iBajar').'"><img src="'.$URL_BASE.'images/'.($baj_var>0? 'indicadorverde.png': 'indicadorrojo.png').'" alt="indicador">'.$baj_var.'%</span>';

?>
          <tr <?php if($i%2==1) echo 'class="tFondo"'; ?>>
            <td><span class="txtAcciones"><a href="<?php echo SEO::get_URLContent($oContentLang).'?valor='.$sub_valor;?>"><?php echo $sub_valor;?></a></span><?php echo $sub_var; ?></td>
            <td><span class="txtAcciones"><a href="<?php echo SEO::get_URLContent($oContentLang).'?valor='.$baj_valor;?>"><?php echo $baj_valor;?></a></span><?php echo $baj_var; ?></td>
<?php
	if($i>=4) break;
}
?>
        </tbody>
      </table>
</div>
