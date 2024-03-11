<?php
$parentSectionID=4; //Secciones Principales
$langID			=$PAGE->langID;
$minisiteID		=$PAGE->minisiteID;
$oSectionHC		=NULL;
$arrSitemap		=NULL;

$lSectionMenu=CmsSectionLang::getWebList($parentSectionID, $langID, $minisiteID);
if( $lSectionMenu->getLength()>0 ){
?>
	<nav>
    	<ul id="menu" class="menu">
<?php
	foreach( $lSectionMenu as $oSection )
	{
		if($oSection->sectionID==10){
			$oSectionHC=$oSection;
			$arrSitemap[$oSection->sectionID]['title']	=$oSection->title;

			$lContent=CmsContentLang::getWebList_Menu(0, $oSection->sectionID, $oSection->langID, $oSection->minisiteID);
			foreach( $lContent as $oSubMenu ){
				$html_link=HtmlElement::get_LinkScript($oSubMenu);
				$arrSitemap[$oSection->sectionID]['submenu'][]	=$html_link;
			}
			continue;
		}

		$lContent=CmsContentLang::getWebList_Menu(0, $oSection->sectionID, $oSection->langID, $oSection->minisiteID);
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
				
				$lSubMenu=CmsContentLang::getWebList_Menu($oSubMenu->contentID, $oSection->sectionID, $oSection->langID, $oSection->minisiteID);
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
    </nav>
<?php
}
?>
<?php
if($oSectionHC!=NULL){
		
		$oSection=$oSectionHC;
		$lContent=CmsContentLang::getWebList_Menu(0, $oSection->sectionID, $oSection->langID, $oSection->minisiteID);

		$divClienteHC=isset($oContentLang)? "hagase-cliente-internas": "hagase-cliente";
		$url_text='<span>'.TextParser::UpperCase($oSection->title).'</span>';

		$oLink=new eLink();
		if( $oSection->showContent==0 && $lContent->getLength()>0)
			$oLink=SEO::get_ContentLink($lContent->getItem(0));
		else
			$oLink->url =SEO::get_URLSection($oSection);
		
		$oLink->title=$oSection->title;
		echo '<div id="'.$divClienteHC.'"><a href="' .$oLink->url. '" target="' .$oLink->target. '" title="' .$oLink->title. '">' . $url_text . "</a></div>\n" ;
		
}
?>