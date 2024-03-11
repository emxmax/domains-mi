<?php

$contactGroupID =0; //Initialized
?>
<script type="text/javascript">
$(function(){
    $('#formID').change(function(){
        $('#contactID').val('');
        Search(document.forms[0]);
    });
    $('#contactID').change(function(){
        Search(document.forms[0]);
    });
});
function ViewModal(id){
    var url=document.forms[0].action+"&kID="+id+"&FormView=edit&callback=true";
    $('#divViewForm').modal({overlayClose:true, persist:true});

    $.ajax({
        url: url,
        success: function(data) {
            $('#divViewForm').html('<h2 class="subtitulo"><?php echo $MODULE->moduleName.": Detalle";?></h2>'+data);
        }
    });
}
</script>
<style type="text/css">
.trPendiente td{ font-weight:bold;}
</style>
    <fieldset id="fldFiltro" style="text-align: right; width:590px;">
        <legend accesskey="F">Filtros</legend>
        <table width="100%">
          <tr>
            <td width="260">Formulario:</td>
            <td width="180">Nombres / Apellidos / Email:</td>
                <td width="50" rowspan="2" valign="bottom" align="right"><input name="btnSearch" type="button" onclick="Search(this.form)" value="Buscar" class="admButton"></td>
          </tr>
          <tr>
            <td><select name="formID" id="formID" style="width:250px">
            <?php
            $list=CrmForm::getList();
            foreach ($list as $obj) {
                    if(!isset($oItem->formID)) $oItem->formID=$obj->formID;
                    echo "<option value=\"".$obj->formID."\"";
                    if($obj->formID==$oItem->formID){
                        $contactGroupID=$obj->contactGroupID;
                        echo " selected";
                    }
                    echo ">".$obj->formName."</option>";
            }
            ?>
                </select></td>
            <td><input name="txtsearch" type="text" class="text" value="<?php echo $txtsearch?>" style="width:220px" maxlength="255"> </td>
            </tr>
            <?php
            if($contactGroupID>0){
            ?>
            <tr>
                <td align="right">P&aacute;rametro:</td>
                <td><select name="contactID" id="contactID" style="width:225px">
                <?php
                    $list= CmsParameterLang::getList($contactGroupID, 1); //default language
                    foreach ($list as $obj) {
                        $selected=NULL;
                        if(!isset($oItem->contactID)) $oItem->contactID=$obj->parameterID;
                        if($obj->parameterID==$oItem->contactID) $selected =" selected";
                        echo "<option value=\"".$obj->parameterID."\"".$selected.">".$obj->parameterName."</option>";
                    }
                    if($selected==NULL && $list->getLength()>0) $oItem->contactID=$list->getItem(0)->parameterID;
                    ?>
                </select></td>
                </tr>
            <?php 
            }
            ?>
            </table>
        </fieldset>
          <table width="600" class="tblList" cellpadding="0" cellspacing="0">
                <tr>
                  <th width="35">&nbsp;</th>
                  <th width="120"><?php echo $MODULE->getSortingHeader("registerDate", "Fecha");?></th>
                  <th width="120"><?php echo $MODULE->getSortingHeader("name", "Nombre");?></th>
                  <th width="120"><?php echo $MODULE->getSortingHeader("phone", "Tel&eacute;fono");?></th>
                  <th width="120"><?php echo $MODULE->getSortingHeader("email", "E-mail");?></th>
                  <th width="60"><?php echo $MODULE->getSortingHeader("state", "Estado");?></th>
                </tr>
    <?php
	$list=CrmRegisterForm::getList_Paging($oItem->formID, $oItem->contactID, $txtsearch);
	foreach ($list as $oItem){
    ?>
                  <tr class="<?php echo ($oItem->state==2)?'trPendiente': ''; ?>">
                    <td nowrap="nowrap">
                        <a href="<?php echo "javascript:ViewModal(".$oItem->registerID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
                        <a href="<?php echo "javascript:Delete(".$oItem->registerID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
                    </td>
                    <td><?php echo $oItem->registerDate; ?></td>
                    <td><?php echo $oItem->name; ?></td>
                    <td><?php echo $oItem->phone; ?></td>
                    <td><?php echo $oItem->email; ?></td>
                    <td align="center"><?php echo CrmRegisterForm::getState($oItem->state);?></td>
                  </tr>
    <?php 
        } 
    ?>
            </table>
            <div id="divViewForm" style="display:none; height:420px; width:550px;">
            <img src="../core/assets/admin/images/i_loading.gif" align="absbottom" /> Cargando...
            </div>

            <table width="600">
               <tr height="30">
                    <td align="left">
                        <input type="button" class="admButton" value="exportar" name="btnExport" onClick="Export(this.form)"></td>
                        <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>">
                    </td>
                    <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
               </tr>
            </table>
