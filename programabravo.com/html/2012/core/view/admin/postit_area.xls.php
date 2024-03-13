<table border="1">
    <tr> 
      <th>Mundo</th>
      <th>Enviados</th>
      <th>Recibidos</th>
    </tr>
<?php
    $list = CrmEmpleado::getList_ReporteArea($criterio, $filtro_tipo, $filtro_anio, $filtro_mes, true);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><?php echo $oItem->gerencia; ?></td>
      <td align="right"><?php echo $oItem->enviados;?></td>
      <td align="right"><?php echo $oItem->recibidos;?></td>
    </tr>
<?php } ?>
</table>