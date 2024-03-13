<?php
class adm_top{
var $userAdmin;

	function adm_top(){
		$this->userAdmin	=AdmLogin::getUserSession();
	}
}

$cTop=new adm_top();
?>
    <div class="panel">
	    <div id="logo">
	        <a href="index.php"><img alt="Ir al Inicio" src="../core/assets/admin/images/logo.png" border="0" /></a>
	    </div>
	    <div class="info">
	    	<p>
	        <span><strong>usuario:</strong> <?php echo strtolower($cTop->userAdmin["fullName"]);?></span> |
			<span><a href="logoff.php"><strong>cerrar sesi&oacute;n</strong></a></span>
			</p>
		</div>
		<?php require_once('../core/include/admin/menu.php'); ?>
    </div>
