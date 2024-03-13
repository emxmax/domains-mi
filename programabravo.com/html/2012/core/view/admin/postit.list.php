<?php
require("../core/include/admin/ordering.php");
?>
<script type="text/javascript">
function ViewStats(xform){
    filtro='&filtro_mes='+$('#filtro_mes').val()+'&filtro_anio='+$('#filtro_anio').val();
    url=xform.action+"&FormView=stats&callback=true"+filtro;
    $('#divViewForm').modal({overlayClose:true, persist:true});

    $.ajax({
            url: url,
            success: function(data) {
                    $('#divViewForm').html('<div class="subtitulo"><?php echo $MODULE->moduleName.": Estad&iacute;sticas";?></div>'+data);
            }
    });
}
function FilterStats(){
    xform=document.forms[0];
    filtro='&filtro_mes='+$('#stats_mes').val()+'&filtro_anio='+$('#stats_anio').val();
    url=xform.action+"&FormView=stats&callback=true"+filtro;
    $('#divViewForm').modal({overlayClose:true, persist:true});

    $.ajax({
            url: url,
            success: function(data) {
                    $('#divViewForm').html('<div class="subtitulo"><?php echo $MODULE->moduleName.": Estad&iacute;sticas";?></div>'+data);
            }
    });
}
</script>
<fieldset id="fldFiltro" style="text-align: right; width:785px;">
  <legend accesskey="F">Filtros</legend>
  <table width="100%">
  <tr>
    <td align="right" valign="middle">
        <select name="filtro_tipo" id="filtro_tipo" onchange="Search(this.form)">
            <option value="">Todas las categorias</option>
<?php
$lPostitTipo = CrmPostItType::getList();
foreach ($lPostitTipo as $oType){
        $selected=($filtro_tipo==$oType->typeID)? 'selected="true"': '';
        echo '<option value="'.$oType->typeID.'" '.$selected.'>'.$oType->typeName.'</option>';
}
?>
        </select>
        <select name="filtro_mes" id="filtro_mes" onchange="Search(this.form)">
            <option value="">Todos los meses</option>
<?php
    $arrMes = Fecha::getArray_Meses();
    for($i=0;$i<count($arrMes);$i++){
        $selected=($filtro_mes==($i+1))? 'selected="true"': '';
        echo '<option value="'.($i+1).'" '.$selected.'>'.$arrMes[$i].'</option>';
    }
?>
        </select>
        <select name="filtro_anio" id="filtro_anio" onchange="Search(this.form)">
<?php
    for($i=2013; $i<=date("Y"); $i++){
        $selected=($filtro_anio==$i)? 'selected="true"': '';
        echo '<option value="'.$i.'" '.$selected.'>A&ntilde;o '.$i.'</option>';
    }
?>
        </select>
        <input name="criterio" id="criterio" type="text" class="text" value="<?php echo $criterio?>" onkeypress="if(event.keyCode==13)Search(this.form);" placeholder="Nombres o Apellidos" size="35" maxlength="255">
    </td>
    <td width="70">
        <input name="btnSearch" type="button" value="Buscar" class="admButton" onclick="Search(this.form)">
    </td>
  </tr>
  </table>
</fieldset>

    <table width="800" class="tblList" cellpadding="0" cellspacing="0">
        <tr> 
          <th width="50">&nbsp;</th>
          <th width="60"><b><?php echo showHeader('fechaRegistro', 'Fecha Registro')?></b></th>
          <th width="170"><b><?php echo showHeader('origen', 'Origen')?></b></th>
          <th width="120"><b><?php echo showHeader('mundoOrigen','Mundo Origen')?></b></th>
          <th width="170"><b><?php echo showHeader('destino','Destino')?></b></th>
          <th width="120"><b><?php echo showHeader('mundoDestino','Mundo Destino')?></b></th>
          <th width="30"><b><?php echo showHeader('votos','Votos')?></b></th>
          <th width="40"><b><?php echo showHeader('estado','Estado')?></b></th>
        </tr>
<?php
    $list = CrmPostIt::getList_Reporte($criterio, $filtro_tipo, $filtro_anio, $filtro_mes);
    foreach ($list as $oItem) {
?>
        <tr>
          <td><a href="<?php echo "javascript:Edit(".$oItem->postitID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
              <a href="<?php echo "javascript:Delete(".$oItem->postitID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
          </td>
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
      <div id="divViewForm" style="display:none; height:400px; width:450px;">
          <img src="../core/assets/admin/images/i_loading.gif" align="absbottom" /> Cargando...
      </div>
      <table width="800">
        <tr height="30">
            <td align="left">
                <input type="button" class="admButton" value="ver estad&iacute;sticas" name="btnStats" onClick="ViewStats(this.form)">
                <input type="button" class="admButton" value="exportar excel" name="btnStats" onClick="Export(this.form)">
            </td>
            <td align="right"><?php echo $MODULE->getPaging();?></td>
        </tr>
      </table>
