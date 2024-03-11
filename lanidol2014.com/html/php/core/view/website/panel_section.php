<!-- section-content -->
<div class="section-content">
	<div class="section">
		<?php
        include("../core/include/website/submenu.php");
		?>
        <div class="content-big">
			<?php
            include("../core/include/website/path.php");
            ?>
			<?php
			switch($oSectionLang->sectionID){
			case 5:
				$file_view ='../core/view/website/section/acercade.php';
				break;
			case 6:
				$file_view ='../core/view/website/section/porque.php';
				break;
			case 9:
				$file_view ='../core/view/website/section/servicio.php';
				break;
			case 11:
				$file_view ='../core/view/website/section/trabaje.php';
				break;
			default:
				$file_view ='../core/view/website/section/' . $PAGE->getFormView() ;
				break;
			}
			
            if( file_exists( $file_view ) )
                include $file_view ;
            else
                $PAGE->addError("No se puede cargar el archivo => ".$file_view) ;
            ?>            
        </div>
    </div>
</div>