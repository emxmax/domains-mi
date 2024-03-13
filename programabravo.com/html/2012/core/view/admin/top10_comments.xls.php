<?php

if($personaID!=NULL){
?>
    <table>
        <tr> 
          <th>Fecha Registro</th>
          <th>Origen</th>
          <th>Mundo Origen</th>
          <th>Destino</th>
          <th>Mundo Destino</th>
          <th>Votos</th>
          <th>Estado</th>
        </tr>
    <?php
        $list = CrmPostIt::getList_User($personaID, $filtro_anio, $filtro_mes, true);
        foreach ($list as $oItem) {
        ?>
        <tr>
          <td><?php echo $oItem->fechaRegistro; ?></td>
          <td><?php echo $oItem->origen; ?></td>
          <td><?php echo $oItem->mundoOrigen; ?></td>
          <td><?php echo $oItem->destino; ?></td>
          <td><?php echo $oItem->mundoDestino; ?></td>
          <td align="center"><?php echo $oItem->votos; ?></td>
          <td align="center"><?php echo CrmPostIt::getEstado($oItem->estado);?></td>
        </tr>
        <?php } ?>
      </table>
<?php
}
else{
?>
<table border="1">
    <tr> 
      <th>Empleado</th>
      <th>DNI</th>
      <th>Mundo</th>
      <th>Total</th>
      <th>Estado</th>
    </tr>
  <?php
      $list=CrmPostIt::getList_TopUsers($filtro_anio, $filtro_mes, true);

      foreach ($list as $oItem) {
      ?>
      <tr>
        <td><?php echo $oItem->destino; ?></td>
        <td><?php echo $oItem->dniDestino; ?></td>
        <td><?php echo $oItem->mundoDestino; ?></td>
        <td align="center"><?php echo $oItem->votos; ?></td>
        <td align="center"><?php echo CrmPostIt::getEstado($oItem->estado);?></td>
      </tr>
      <?php } ?>
</table>
<?php
}
?>
