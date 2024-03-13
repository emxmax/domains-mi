<?php
$stats = CrmPostIt::getArray_Stats($filtro_mes, $filtro_anio);
?>
<div align="right">
    <table>
        <tr>
            <td>Filtros: 
        <select name="filtro_mes" id="stats_mes" onchange="FilterStats()">
            <option value="">Todos los meses</option>
<?php
    $arrMes = Fecha::getArray_Meses();
    for($i=0;$i<count($arrMes);$i++){
        $selected=($filtro_mes==($i+1))? 'selected="true"': '';
        echo '<option value="'.($i+1).'" '.$selected.'>'.$arrMes[$i].'</option>';
    }
?>
        </select>
        <select name="filtro_anio" id="stats_anio" onchange="FilterStats()">
<?php
    for($i=2013; $i<=date("Y"); $i++){
        $selected=($filtro_anio==$i)? 'selected="true"': '';
        echo '<option value="'.$i.'" '.$selected.'>A&ntilde;o '.$i.'</option>';
    }
?>
        </select>
            </td>
            <td width="30">&nbsp;</td>
        </tr>
    </table>
</div>
<table class="tblForm" width="420">
  <tr>
    <td width="100">&Aacute;rea con mas ingresos:</td>
    <td width="320"><strong><?php echo $stats["area"]; ?></strong><br />
    (<?php echo $stats["area_total"]; ?> visitas)</td>
  </tr>
  <tr>
    <td>Usuario con mas notas recibidas</td>
    <td><strong><?php echo $stats["destino"]; ?></strong><br />
    (<?php echo $stats["destino_total"]; ?> notas)</td>
  </tr>
  <tr>
    <td>Usuario con mas notas enviadas:</td>
    <td><strong><?php echo $stats["origen"]; ?></strong><br />
    (<?php echo $stats["origen_total"]; ?> notas)</td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>Nota mas valorada:</td>
    <td bgcolor="#eee">
        <p><?php echo utf8_decode($stats["nota_mensaje"]); ?></p>
        Categor&iacute;a: <strong><?php echo strtoupper($stats["nota_categoria"]); ?></strong><br />
        Para: <strong><?php echo $stats["nota_destino"]; ?></strong><br />
        De: <strong><?php echo $stats["nota_origen"]; ?></strong><br />
        Votos: <strong><?php echo $stats["nota_total"]; ?></strong>
    </td>
   </tr>
   <tr> 
      <td colspan="2">&nbsp;</td>
   </tr>
   <tr> 
      <td colspan="2"><input type="button" class="admButton" name="btnCancel" value="regresar" onClick="javascript:Back();"></td>
   </tr>
</table>
