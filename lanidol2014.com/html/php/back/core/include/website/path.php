<?php 
echo '<div class="direccion">Usted se encuentra en: <a href="'.SEO::get_URLHome().'">' . (isset($arrTerm['inicio'])? $arrTerm['inicio']: "Home Page") . '</a>';

if(isset($PAGE->lContentPath) && ($PAGE->lContentPath->getLength()>0 || isset($oContentLang))){
	if ($oSectionLang->parentSectionID==4) echo ' / <a href="' .SEO::get_URLSection($oSectionLang). '">' . $oSectionLang->title . '</a>';

	foreach($PAGE->lContentPath as $oParent){
		echo ' / <a href="' .SEO::get_URLContent($oParent) . '">' . $oParent->title . '</a>';
	}

	echo ' / <span class="ultimo">' . $oContentLang->title . '</span>';
}
else
	echo ' / <span class="ultimo">' . $oSectionLang->title . '</span>';
	
echo '</div>';
?>
