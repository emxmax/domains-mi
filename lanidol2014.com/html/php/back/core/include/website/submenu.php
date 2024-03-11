<?php
if( isset($oContentLang) || isset($oSectionLang) ){

$langID		=$PAGE->langID;
$minisiteID	=$PAGE->minisiteID;

$lSubMenu=isset($oContentLang)? CmsContentLang::getWebList_Menu(0, $oContentLang->sectionID, $oContentLang->langID, $oContentLang->minisiteID): CmsContentLang::getWebList_Menu(0, $oSectionLang->sectionID, $oSectionLang->langID, $oSectionLang->minisiteID);

$arrParent=isset($PAGE->arrParent)? $PAGE->arrParent: array();
$title=TextParser::UpperCase($oSectionLang->title);
?>
<div class="menu-izquierdo">
<div class="raiz"><a href="<?php echo SEO::get_URLSection($oSectionLang);?>" title="<?php echo $title;?>"><?php echo $title;?></a></div>
<?php
	foreach( $lSubMenu as $oSubMenu )
	{
		$selected	=(in_array($oSubMenu->contentID, $arrParent) || (isset($oContentLang) && $oSubMenu->contentID==$oContentLang->contentID));
		$html_link	=HtmlElement::get_LinkScript($oSubMenu, NULL, TextParser::UpperCase($oSubMenu->title));
		
		echo '<div '.($selected? 'class="selecto"': '').'>' .$html_link. '</div>'."\n";

		$lItem		=CmsContentLang::getWebList_Menu($oSubMenu->contentID, $oSubMenu->sectionID, $oSubMenu->langID, $oSubMenu->minisiteID);

		if($selected && $lItem->getLength()>0){
			echo '<ul>';

			foreach( $lItem as $oItem )
			{
				$selected	=($oContentLang!=NULL && $oItem->contentID==$oContentLang->contentID)? 'liselecto' : NULL;
				$html_link	=HtmlElement::get_LinkScript($oItem, $selected, TextParser::UpperCase($oItem->title));
				
				echo '<li>'.$html_link.'</li>'."\n";
			}

			echo '</ul>';
		}
	
	}
?>
</div>
<?php
}
?>