<?php
$oAdmUser = AdmLogin::getUserSession();

?>
    <div class="panel">
	    <div id="logo">
	        <a href="index.php"><img alt="Ir al Inicio" src="../core/assets/admin/images/logo.png" border="0" /></a>
	    </div>
	    <div class="info">
	    	<p>
	        <span><strong>usuario:</strong> <?php echo strtolower($oAdmUser->fullName);?></span> |
			<span><a href="logoff.php"><strong>cerrar sesi&oacute;n</strong></a></span>
			</p>
		</div>
		<?php require_once('../core/include/admin/menu.php'); ?>
    </div>
