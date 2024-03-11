<?php
class adm_top{
var $userAdmin;

	function adm_top(){
		$this->userAdmin	=AdmLogin::getUserSession();
	}
}

$cTop=new adm_top();
?>
<div id="divHeader">
    <div id="webInfo">
        <p align="right">
        <strong>dominio:</strong> <?php echo $WEBSITE["DOMAIN"];?><?php echo $WEBSITE["ROOT"];?>
        </p>
        <p align="right">
        <strong>usuario:</strong>
		<?php echo strtolower($cTop->userAdmin["fullName"]);?>
         <span>&nbsp;|&nbsp;</span>
		<a href="logoff.php"><strong>cerrar sesi&oacute;n</strong></a>
        </p>
    </div>
    <div id="logo">
        <a href="index.php"><img alt="Ir al Inicio" src="../core/assets/admin/images/logo_small.jpg" border="0" vspace="5" /></a>
    </div>
</div>
