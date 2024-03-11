<?php
?>
<!-- section-content -->
<div class="section-content">
	<div class="section">
		<?php
		if($oSectionLang->parentSectionID!=0)
	        include("../core/include/website/submenu.php");
		?>
        <div>
			<?php
            include("../core/include/website/path.php");
            ?>
			<?php
            $file_view ='../core/view/website/' . $PAGE->getFormView() ;
            if( file_exists( $file_view ) )
                include $file_view ;
            else
                $PAGE->addError("No se puede cargar el archivo => ".$file_view) ;
            ?>
        </div>
    </div>
</div>
