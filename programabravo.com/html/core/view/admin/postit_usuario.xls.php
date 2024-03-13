<table border="1">
    <tr> 
      <th>DNI</th>
      <th>Apellido P.</th>
      <th>Apellido M.</th>
      <th>Nombres</th>
      <th>Mundo</th>
      <th>Enviados</th>
      <th>Recibidos</th>
    </tr>
<?php
    $list = CrmEmpleado::getList_ReporteUsuario($criterio, $gerencia, $filtro_tipo, $filtro_anio, $filtro_mes, true);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><?php echo $oItem->dni; ?></td>
      <td><?php echo $oItem->apellido1; ?></td>
      <td><?php echo $oItem->apellido2; ?></td>
      <td><?php echo $oItem->nombres; ?></td>
      <td><?php echo $oItem->gerencia;?></td>
      <td align="right"><?php echo $oItem->enviados;?></td>
      <td align="right"><?php echo $oItem->recibidos;?></td>
    </tr>
<?php 
    }
?>
</table>
