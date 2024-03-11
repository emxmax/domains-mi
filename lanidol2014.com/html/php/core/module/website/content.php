<?php
$oContentLang=$PAGE->oContentLang;
$oContentLang->media=XMLParser::getArray_Media($oContentLang->media);
$oContentLang->parameter=XMLParser::getArray_Parameter($oContentLang->parameter);

$oSectionLang=$PAGE->oSectionLang;
$oSectionLang->media=XMLParser::getArray_Media($oSectionLang->media);
$oSectionLang->parameter=XMLParser::getArray_Parameter($oSectionLang->parameter);

?>