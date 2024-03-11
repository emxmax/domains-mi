<?php
$sectionID=2; //Secciones Principales
$langID=$PAGE->langID;


$lContent=CmsContentLang::getWebList(0, $sectionID, $langID);
foreach($lContent as $oItem){

    echo '<li>'.HtmlElement::get_LinkScript($oItem, NULL, TextParser::UpperCase($oItem->title)).'</li>';
}
?>
