<?php 
if($MODULE->FormView=="section"){
	$obj=CmsSectionLang::getItem($oItem->sectionID, $oItem->langID);
	if($obj!=NULL){

		if (!isset($oItem->sectionID)) 		$oItem->sectionID=$obj->sectionID;
		if (!isset($oItem->langID)) 		$oItem->langID=$obj->langID;
		if (!isset($oItem->minisiteID)) 	$oItem->minisiteID=$obj->minisiteID;
		if (!isset($oItem->title)) 			$oItem->title=$obj->title;
		if (!isset($oItem->subTitle)) 		$oItem->subTitle=$obj->subTitle;
		if (!isset($oItem->description)) 	$oItem->description=$obj->description;
		if (!isset($oItem->resumen)) 		$oItem->resumen=$obj->resumen;
		if (!isset($oItem->showContent)) 	$oItem->showContent=$obj->showContent;
		if (!isset($oItem->staticURL)) 		$oItem->staticURL=$obj->staticURL;

		if (!isset($oItem->media)) 			$oItem->media=XMLParser::getArray_Media($obj->media);
		if (!isset($oItem->parameter)) 		$oItem->parameter=XMLParser::getArray_Parameter($obj->parameter);
		if (!isset($oItem->metaTag)) 		$oItem->metaTag=XMLParser::getArray_MetaTag($obj->metaTag);

		if (!isset($oItem->parentSectionID))$oItem->parentSectionID=$obj->parentSectionID;
		if (!isset($oItem->sectionName)) 	$oItem->sectionName=$obj->sectionName;
		if (!isset($oItem->showInMenu)) 	$oItem->showInMenu=$obj->showInMenu;
		if (!isset($oItem->position)) 		$oItem->position=$obj->position;
		if (!isset($oItem->isMinisite)) 	$oItem->isMinisite=$obj->isMinisite;
		if (!isset($oItem->isEditable)) 	$oItem->isEditable=$obj->isEditable;
		if (!isset($oItem->active)) 		$oItem->active=$obj->active;

		}
	else
		$MODULE->addError(CmsSectionLang::GetErrorMsg());
}

if(!isset($oItem->media['seccion_imagen'])) $oItem->media['seccion_imagen']=NULL;
if(!isset($oItem->media['imagen_portada'])) $oItem->media['imagen_portada']=NULL;

//Get MediaGroup
$media_group=array();
$list=CmsMediaGroup::getList();
foreach($list as $obj) $media_group["$obj->alias"]=$obj->groupID;

//Predefined Fields
$oItem->title=($oItem->title!="") ? $oItem->title : $oItem->sectionName;
?>
<script type="text/javascript" src="../core/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../core/plugins/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	CKFinder.setupCKEditor( null, '../core/plugins/ckfinder/' );
	
	$("#btnSave").click(function(){

		if($("#title").val() ==""){
			alert("Por favor, ingrese el campo [Título]");
			$("#title").focus();
			return false;
		}
	
		$("#Command").val("update");
		$("form").submit();

	});
});
</script>
<input type="hidden" name="minisiteID" value="<?php echo $oItem->minisiteID; ?>" />
<input type="hidden" name="langID" value="<?php echo $oItem->langID; ?>" />

    <table width="100%">
    <tr>
    <td valign="top">
        <table class="tblForm" width="600">
              <tr>
                <td>Título</td>
                <td><input name="title" type="text" class="text" id="title" value="<?php echo $oItem->title; ?>" size="45" maxlength="255"></td>
              </tr>
              <tr>
                <td>Subtítulo</td>
                <td><input name="subTitle" type="text" class="text" id="subTitle" value="<?php echo $oItem->subTitle; ?>" size="45" maxlength="255"></td>
              </tr>
              <tr>
                <td>Descripci&oacute;n</td>
                <td>
                    <textarea class="ckeditor" name="description" cols="40" id="description"><?php echo $oItem->description; ?></textarea>
                </td>
              </tr>

			<?php 
			if($oItem->sectionID==6 || $oItem->sectionID==9) include("../core/include/admin/cms/section/animacion.php");
			?>

              <tr> 
                <td>&nbsp;</td>
                <td><input type="checkbox" name="showContent" id="showContent" value="1" <?php if($oItem->showContent==1) print 'checked="checked"';?> />
                  Mostrar Página de Sección </td>
              </tr>
              <tr> 
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="2">
                    <input type="button" class="admButton" value="guardar" id="btnSave" name="btnSave">
                    <input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
              </tr>
            </table>
    </td>
    <td valign="top">
        <table class="cmsRight" width="250">
              <tr>
                <th class="thParametro">Meta-tags de p&aacute;gina</th>
              </tr>
              <tr>
                <td>Title<br />
                <textarea name="metaTag[title]" rows="4" cols="20" style="width:200px;" class="mceNoEditor"><?php echo $oItem->metaTag["title"];?></textarea>
                <div class="tagleyend">(*) Título de la página</div>
                </td>
              </tr>
              <tr>
                <td>Description<br />
                <textarea name="metaTag[description]" rows="4" cols="20" style="width:200px;" class="mceNoEditor"><?php echo $oItem->metaTag["description"];?></textarea>
                <div class="tagleyend">(*) Breve resumen de la página</div>
                </td>
              </tr>
              <tr>
                <td>Keywords<br />
                <textarea name="metaTag[keywords]" rows="4" cols="20" style="width:200px;" class="mceNoEditor"><?php echo $oItem->metaTag["keywords"];?></textarea>
                <div class="tagleyend">(*) Palabras relacionadas a la página, separadas por comas</div>
                </td>
              </tr>
        </table>
        <br />
        <table class="cmsRight" width="250">
              <tr>
                <th class="thParametro">URL Estática</th>
              </tr>
              <tr>
                <td><input type="text" name="staticURL" id="staticURL" size="45" value="<?php echo $oItem->staticURL;?>" />
                <div class="tagleyend">(*) Nombre de ruta amigable, sin espacios ni caracteres especiales.</div>
                </td>
              </tr>
        </table>
     </td>
</tr>
</table>