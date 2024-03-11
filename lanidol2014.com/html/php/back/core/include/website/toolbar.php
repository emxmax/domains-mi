<?php
$sectionID=2; //Secciones Principales
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;


$links=NULL;
$oAccesorios=NULL;
$oClienteZona=NULL;
$lContent=CmsContentLang::getWebList(0, $sectionID, $langID, $minisiteID);
foreach($lContent as $oItem){
	if(in_array($oItem->templateID, array(3, 61))){
		switch($oItem->templateID){
			case 3:
				$oAccesorios=$oItem; break;
			case 61:
				$oClienteZona=$oItem; break;
		}
		continue;
	}
	
	$links.='<li>'.HtmlElement::get_LinkScript($oItem, NULL, TextParser::UpperCase($oItem->title)).'</li>';
}

if($oClienteZona!=NULL){

?>
        <div id="zona-clientes">
        	<?php echo HtmlElement::get_LinkScript($oClienteZona, NULL, TextParser::UpperCase('<span>'.$oClienteZona->title).'</span>'); ?>
        </div>
<?php
}

if($links!=NULL){
?>
        <div id="links-header">
            <ul>
            <?php
            echo $links;
			?>
            </ul>
        </div>
<?php
}
?>
      <div id="logo"><a href="<?php echo SEO::get_URLHome();?>"><img src="<?php echo $URL_BASE;?>images/logointeligosab.png" /></a></div>
<?php
if($oAccesorios!=NULL){
?>
        <div id="buscar">
	<?php
	$lItems=CmsContentLang::getWebList($oAccesorios->contentID, $oAccesorios->sectionID, $oAccesorios->langID, $oAccesorios->minisiteID);
    foreach($lItems as $oItem){
		
		switch($oItem->templateID){
			case 62: //Acceso al Contactenos
				$lContacto=CmsContentLang::getWebList_Template(47, 9, $PAGE->langID, $PAGE->minisiteID);
				$url=($lContacto->getLength()>0)? SEO::get_URLContent($lContacto->getItem(0)): '#';
				echo '<div id="contacto"><a href="'.$url.'" title="'.$oItem->title.'"><img src="'.$URL_BASE.'images/ico_contacto.png" /></a></div>';
				break;
			case 63: //Formulario Recomienda
				echo '<div id="nube"><a href="javascript:;" title="'.$oItem->title.'"><img src="'.$URL_BASE.'images/nube.png" base="'.$URL_BASE.'" /></a>';
				include('../core/include/website/recomienda.php');
				echo '</div>';
				break;
			case 64: //Opción de Imprimir
				echo '<div id="imprimir"><a href="javascript:window.print();" title="'.$oItem->title.'" ><img src="'.$URL_BASE.'images/imprimir.png"/></a></div>';
				break;
			case 36: //Buscador
				echo '<div id="lupa"><a id="cse_btn" href="#"><img src="'.$URL_BASE.'images/lupa.png" /></a><input id="cse_search" placeholder="BUSCAR" rel="'.SEO::get_URLContent($oItem).'" /></div>';
				break;
		}
		
    ?>
            
	<?php
    }
	?>
<script type="text/javascript">
$(document).ready(function(){
	$("#cse_btn").click(function(){
		if($("#cse_search").val()!='') location.href=$("#cse_search").attr('rel')+'?q='+$("#cse_search").val();
	});
	$("#cse_search").keypress(function(event){
		if ( event.which == 13 && $(this).val()!='') location.href=$(this).attr('rel')+'?q='+$(this).val();
	});
});
</script>
        </div>
<?php
}
?>