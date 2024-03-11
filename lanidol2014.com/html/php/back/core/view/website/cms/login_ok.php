<script type="text/javascript">
$(document).ready(function(){
	$("#getfile").click(function(){
		url='<?php echo $URL_ROOT;?>content/get_file.php?pID='+$("#pID").val()+'&lID='+$("#lID").val()+'&type='+$("#type").val();
		window.parent.closeFancy();
		window.open(url, '_blank');
	});
});
</script>
<h1>Usted se encuentra registrado en Inteligo SAB</h1>
Haga <a href="#" id="getfile"><strong>click aquí</strong></a> para descargar el documento.
