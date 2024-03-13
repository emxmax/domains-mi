<table border="1">
      <tr> 
        <th>Fecha Registro</th>
        <th>Origen</th>
        <th>DNI</th>
        <th>Mundo Origen</th>
        <th>Destino</th>
        <th>DNI</th>
        <th>Mundo Destino</th>
        <th>Categor&iacute;a</th>
        <th>Mensaje</th>
        <th>Votos</th>
        <th>Estado</th>
      </tr>
    <?php
	$list=CrmPostIt::getList_TopLikes($filtro_anio, $filtro_mes, true);
	
	foreach ($list as $oItem) {
	?>
        <tr>
          <td><?php echo $oItem->fechaRegistro; ?></td>
          <td><?php echo $oItem->origen; ?></td>
          <td><?php echo $oItem->dniOrigen; ?></td>
          <td><?php echo $oItem->mundoOrigen; ?></td>
          <td><?php echo $oItem->destino; ?></td>
          <td><?php echo $oItem->dniDestino; ?></td>
          <td><?php echo $oItem->mundoDestino; ?></td>
          <td><?php echo utf8_decode($oItem->typeName); ?></td>
          <td><?php echo utf8_decode($oItem->mensaje); ?></td>
          <td align="center"><?php echo $oItem->votos; ?></td>
          <td align="center"><?php echo CrmPostIt::getEstado($oItem->estado);?></td>
        </tr>
        <?php } ?>
  </table>
