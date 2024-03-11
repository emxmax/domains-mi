<?php
$oSectionLang=$PAGE->oSectionLang;
$oSectionLang->media=XMLParser::getArray_Media($oSectionLang->media);
$oSectionLang->parameter=XMLParser::getArray_Parameter($oSectionLang->parameter);
?>