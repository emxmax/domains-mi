<script type="text/javascript">
function showCtl_Options(opt){
	$('#tdCtl_target').show();
	switch(opt){
		case '0':
			$('#tdCtl_target').hide();
			$('#trCtl_internal').hide();
			$('#trCtl_external').hide();
			break;
		case '1':
			$('#trCtl_internal').show();
			$('#trCtl_external').hide();
			break;
		case '2':
			$('#trCtl_internal').hide();
			$('#trCtl_external').show();
			break;
	}
}

$(document).ready(function(){
	$('#trCtl_internal').hide();
	$('#trCtl_external').hide();
	$('#tdCtl_target').hide();
	
	$('#linkType').change(function(){
		showCtl_Options($('#linkType').val());
	});
	
	showCtl_Options($('#linkType').val());
})
</script>
<table cellpadding="1" cellspacing="0" style="margin-top: 5px;">
  <tr>
    <td>Tipo de enlace:<br />
    	<select name="linkType" id="linkType" style="width:115px;">
            <option value="0">Sin Enlace</option>
            <option value="1" <?php if($oItem->linkType==1) echo "selected"; ?>>Enlace Interno</option>
            <option value="2" <?php if($oItem->linkType==2) echo "selected"; ?>>Enlace Externo</option>
<!--
            <option value="3" <?php if($oItem->linkType==3) echo "selected"; ?>>Secci&oacute;n Principal</option>
/-->
        </select>
	</td>
	<td id="tdCtl_target">Abrir en:<br />
        <select name="linkTarget" id="linkTarget" style="width:115px;">
            <option value="1" <?php if($oItem->linkTarget==1) echo "selected"; ?>>Misma Ventana</option>
            <option value="2" <?php if($oItem->linkTarget==2) echo "selected"; ?>>Nueva Ventana</option>
<!--
            <option value="3" <?php if($oItem->linkTarget==3) echo "selected"; ?>>Lightbox (800x600)</option>/-->
        </select>
    </td>
  </tr>
  <tr id="trCtl_internal">
    <td colspan="2">Seleccionar p&aacute;gina:<br />
    	<select name="linkContentID" id="linkContentID" style="width:235px;">
            <option value="0">Sin Enlace</option>
<?php
$list=CmsContentLang::getList_All($oItem->langID);
foreach($list as $obj){
?>
            <option value="<?php echo  $obj->contentID; ?>" <?php if($oItem->linkContentID==$obj->contentID) echo "selected"; ?>><?php echo  $obj->title; ?></option>
<?php
}
?>
        </select>
    </td>
  </tr>
  <tr id="trCtl_external">
    <td colspan="2">URL:
        <input name="linkURL" id="linkURL" type="text" class="hidden" size="45" value="<?php echo $oItem->linkURL; ?>">
    </td>
  </tr>
</table>