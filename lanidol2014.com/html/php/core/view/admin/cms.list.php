<?php
$lnkEditParent="EditSection(".$oItem->sectionID.")";
$parentSchemeID	=null;
$parentContentID=null;
$topContentID	=null;

$oSection=CmsSection::getItem($oItem->sectionID);

if($oItem->parentContentID>0){
    $obj=CmsContentLang::getItem($oItem->parentContentID, $oItem->langID);
    if($obj!=null){
        $parentSchemeID=$obj->schemeID;
        $parentContentID=$obj->contentID;
        $topContentID=$obj->parentContentID;
    }
    $lnkEditParent="Edit(".$parentContentID.")"; 
}

$url_lightbox='lightbox.php?moduleID='.$MODULE->moduleID.'&sectionID='.$oItem->sectionID.'&parentContentID='.$parentContentID.'&FormView=sort';
//Get Lang List
$lLang=CmsLang::getList_Active();
if(CmsLang::getErrorMsg()!="") $MODULE->addError(CmsLang::getErrorMsg());
if(!isset($oItem->langID) && $lLang->getLength()>0) $oItem->langID=$lLang->getItem(0)->langID;

//echo "($parentContentID, $oItem->sectionID, $oItem->langID)";
$lContent=CmsContentLang::getList_Paging($parentContentID, $oItem->sectionID, $oItem->langID);
?>
<script type="text/javascript">
jQuery(function ($) {
    // Load dialog on click
    xform=document.forms[0];
    $('#btnNew').click(function (e) {
        schemeID = document.getElementsByName('schemeID');
        if(schemeID.length==1 && !schemeID[0].disabled){
            schemeID[0].checked=true;
            addNew(xform);
        }
        else
            $('#divTemplateList').modal({overlayClose:true, persist:true});

        return false;
    });

    $('#btnClose').click(function (e) {
        $.modal.close();
        return true;
    });	

    $('#btnSelect').click(function(e){
        schemeID = document.getElementsByName('schemeID');
        if(typeof(schemeID)=="object"){
            valid=false;
            for(i=0;i<schemeID.length;i++){
                if(schemeID[i].checked) valid=true;
            }
        }

        if(!valid){
            alert("Debe seleccionar una plantilla");
            return false;
        }

        $.modal.close();
        addNew(xform);
        return true;
    });	
    
    $('.ordenar a').click(function(){
        $('#divLigthBox').html('<iframe frameborder="0" marginwidth="0" marginheight="0" src="<?php echo $url_lightbox;?>" width="100%" height="100%"></iframe>');
        $('#divLigthBox').modal({overlayClose:false, persist:true, onClose: LB_Close});
    });
});
var set_reload=false;
function LB_Close(){
    if(set_reload) Search();
    //if(set_reload){ location.href="<?php echo $_SERVER['REQUEST_URI'];?>"; }
    $.modal.close();
}
function selectParent(parentID){
    xform=document.forms[0];

    xform.Page.value='';
    xform.parentContentID.value=parentID;
    xform.submit();
}
function EditSection(sectionID){
    xform=document.forms[0];

    xform.kID.value=sectionID;
    xform.FormView.value="section";
    xform.submit();
}
</script>

<input type="hidden" name="parentContentID" value="<?php echo $parentContentID; ?>" />
<p>Seleccione un art&iacute;culo de la lista para editar su contenido o haga clic en el menu lateral para seleccionar otra secci&oacute;n.
<br />
Si desea editar el contenido del nivel superior, haga <a href="<?php echo "javascript:$lnkEditParent"; ?>;"><strong>clic aqu&iacute;</strong></a>.</p>

<fieldset id="fldFiltro" style="text-align: right; width:490px;">
<legend accesskey="F">Filtros</legend>

<table width="100%">
  <tr>
    <td align="right">Idioma: 
        <select name="langID" onChange="Search(this.form);">
    <?php
    foreach($lLang as $obj){
        echo "<option value=\"$obj->langID\"";
        if($obj->langID==$oItem->langID) echo " selected";
        echo ">$obj->alias</option>";
    }
    ?>
        </select>
    </td>
    <td align="right" style="width:155px">
        <input name="filtro" type="text" id="filtro" placeholder="Buscar por t&iacute;tulo" style="width:150px;" value="<?php echo $filtro;?>" />
    </td>
    <td align="right" style="width:60px">
        <input type="button" name="btnSearch" value="Buscar" id="btnSearch" class="admButton" onclick="Search(this.form);" />
    </td>
  </tr>
</table>
</fieldset>
<?php
if($lContent->getLength()>1) echo '<div class="ordenar"><a href="javascript:;">Ordenar lista</a></div>';
?>
<table width="500" class="tblList" cellpadding="0" cellspacing="0">
  <tr> 
    <th width="30">&nbsp;</th>
    <th width="275"><?php echo $MODULE->getSortingHeader("title", "T&iacute;tulo");?></th>
    <th width="60"><?php echo $MODULE->getSortingHeader("registerDate", "Fecha Registro");?></th>
    <th width="50"><?php echo $MODULE->getSortingHeader("active", "Estado");?></th>
    <th width="40"><?php echo $MODULE->getSortingHeader("position", "Orden");?></th>
  </tr>
<?php
foreach ($lContent as $oItem) {
    $title=($oItem->title=="" ? $oItem->contentName : $oItem->title);
    $delete='<a href="javascript:Delete('.$oItem->contentID.');"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" />';
    if($oItem->childScheme>0){
        $title="<a href=\"javascript:selectParent(".$oItem->contentID.")\">".$title."</a>";
        if($oItem->childContentLang>0) $delete='';
    }
    if($oItem->langID==0) $delete='<img title="Incompleto" src="../core/assets/admin/images/i_broken.gif" border="0" />';
?>
    <tr>
      <td nowrap="nowrap" height="22"><a href="<?php echo "javascript:Edit(".$oItem->contentID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
          <?php echo $delete; ?></a>
      </td>
      <td><?php echo $title;?></td>
      <td align="center"><?php echo CmsContentLang::getFormatDate($oItem->registerDate, "d/m/Y"); ?></td>
      <td align="center"><?php echo CmsContentLang::getActive($oItem->active);?></td>
      <td align="center">
      <?php if(isset($bMoveUp) || $MODULE->Page>1){ ?>
      <a href="<?php echo "javascript:moveUp(".$oItem->contentID.");";?>"><img src="../core/assets/admin/images/i_upto.gif" title="Mover Arriba" border="0" /></a>
      <?php } ?>
      </td>
    </tr>
<?php 
    $bMoveUp=true;
} ?>
</table>

<div id="divTemplateList">
    <h3 class="subtitulo">Seleccione una plantilla:</h3>
    <div class="body">
    <?php
    $lScheme=CmsScheme::getList($parentSchemeID, $oItem->sectionID, $oItem->langID);
    if(CmsScheme::getErrorMsg()!="") $MODULE->addError(CmsScheme::getErrorMsg());

        foreach ($lScheme as $obj) {
            $enabled="";
            $style="";
            $cnt=CmsContentLang::getCount_ChildScheme($obj->schemeID, $oItem->parentContentID, $oItem->langID);

            if($obj->iterations>0 && $cnt>=$obj->iterations){
                $enabled="disabled='true'";
                $style="class='option-disabled'";
            }
            echo "<div class=\"item\"><table width='100%'><tr><td width='12' valign='top'><input type=\"radio\" name=\"schemeID\" id=\"scheme_".$obj->schemeID."\" value=\"".$obj->schemeID."\" ".$enabled." /></td><td><label for=\"scheme_".$obj->schemeID."\" ".$style." >".$obj->alias."</label></td></tr></table></div>\n";
        }
    ?>
    </div>
    <div class="footer">
        <input type="button" class="admButton" value="continuar" id="btnSelect" name="btnSelect">
        <input type="button" class="admButton" value="cancelar" id="btnClose" name="btnClose">
    </div>
</div>
<div id="divLigthBox" style="display:none; height:530px; width:530px;"></div>

<table width="500">
  <tr height="30"> 
    <td align="left">
    <?php
    if($lScheme->getLength()>0){
    ?>
      <input type="button" class="admButton" value="nuevo &iacute;tem" id="btnNew" name="btnNew">
    <?php
    }
    if($parentContentID>0){
    ?>
      <input type="button" class="admButton" value="regresar" id="btnBack" name="btnBack" onclick="<?php echo "selectParent($topContentID)";?>">
    <?php
    }
    ?>
    </td>
    <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
  </tr>
</table>
