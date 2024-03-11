<?php
$imagen=isset($oContentLang->media['imagen']['Url'])? '<span class="texto-imagen-big"><img src="'.$URL_ROOT.$oContentLang->media['imagen']['Url'].'" /></span>': NULL;

$arrLetter=TextParser::GetLetters();
$arrMatch=CmsContentLang::getWebList_Letter($oContentLang->contentID, $oContentLang->sectionID, $oContentLang->langID, $oContentLang->minisiteID);

$letter=isset($_REQUEST['l'])? $_REQUEST['l']: '';
if($letter=='' && count($arrMatch)>0) $letter=$arrMatch[0];
?>
<div class="titulo"><?php echo TextParser::UpperCase($oContentLang->title);?></div>
<div class="texto">
<?php
	echo $oContentLang->description;
?>
</div>
<div id="divVademecum">

	<div id="divFichavademecum">
	  <?php
      foreach($arrLetter as $l){
		$class=($letter==$l)?'selecto':'';
		$url=SEO::get_URLContent($oContentLang, 'l='.$l);
		$link=in_array($l, $arrMatch)? '<a href="'.$url.'">'.$l.'</a>': '<span>'.$l.'</span>';
      ?>
            <div class="<?php echo $class;?>"><?php echo $link;?></div>
      <?php
      }
	  ?>
          </div>
          <div class="clear"></div>
          <div id="tab" class="tab_Vademecum" style="display:block">
       <?php
       $lGlosario=CmsContentLang::getWebList_Glosario($oContentLang->contentID, $oContentLang->sectionID, $oContentLang->langID, $oContentLang->minisiteID, $letter);
	   foreach($lGlosario as $obj){
	   ?>
			<div class="tab_Vademecum_titulo"><?php echo $obj->title;?></div>
            <div class="tab_Vademecum_contenido"><?php echo $obj->description;?></div>
        <br />
		<?php
        }
		?>
          </div>
    </div>
    <div class="clear"></div>       
