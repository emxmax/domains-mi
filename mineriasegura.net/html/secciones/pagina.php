<?php
	if(isset($_GET['sec'])){
		$seccion=$_GET['sec'];
	}else{
		$seccion="";
	}
?>
<section id="container-change" data-seccion="<?php echo $seccion; ?>">
	<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12" id="pagina">
		<?php
			if($seccion=='inicio' OR $seccion==""){
				include('inicio.php');
			}
		?>
	</div>
</section>