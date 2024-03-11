<?php
$parentSectionID=4; //Secciones Principales
$langID	=$PAGE->langID;
$arrSitemap =NULL;

$lSectionMenu=CmsSectionLang::getWebList($parentSectionID, $langID);
if( $lSectionMenu->getLength()>0 ){
?>
    <ul>
<?php
	foreach( $lSectionMenu as $oSection )
	{
		$lContent=CmsContentLang::getWebList_Menu(0, $oSection->sectionID, $oSection->langID);
		$url_text=TextParser::UpperCase($oSection->title);
		$url_class=(isset($oSectionLang) && $oSection->sectionID==$oSectionLang->sectionID) ? 'selecto' : NULL;
		$arrSitemap[$oSection->sectionID]['title']	=$oSection->title;

		$oLink=new eLink();
		if( $oSection->showContent==0 && $lContent->getLength()>0)
			$oLink=SEO::get_ContentLink($lContent->getItem(0));
		else
			$oLink->url =SEO::get_URLSection($oSection);
		
		$oLink->title=$oSection->title;
		echo '<li><a href="' .$oLink->url. '" target="' .$oLink->target. '" class="' .$url_class. '" title="' .$oLink->title. '">' . $url_text . "</a>\n" ;
		
		if($lContent->getLength()>0){
			echo '<ul>';
			foreach( $lContent as $oSubMenu ){
				$html_link=HtmlElement::get_LinkScript($oSubMenu);
				$arrSitemap[$oSection->sectionID]['submenu'][]	=$html_link;
				echo '<li>'.$html_link.'<ul>';
				
				$lSubMenu=CmsContentLang::getWebList_Menu($oSubMenu->contentID, $oSection->sectionID, $oSection->langID);
				foreach( $lSubMenu as $oPage ){
					$html_link=HtmlElement::get_LinkScript($oPage);
					echo '<li>'.$html_link.'</li>'."\n";
				}
				echo '</ul>';
				echo '</li>'."\n";
			}
			echo '</ul>'."\n";
		}
		echo '</li>'."\n";
	}
	?>
    </ul>
<?php
}
?>
