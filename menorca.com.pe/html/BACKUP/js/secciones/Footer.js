function Footer()
{
	var html="#containerFooter";
	var controlador='service/index.php/FooterController';
	this.iniciar=function()
	{
		cargarData();
	}
	function cargarData()
	{
		proceso.procesar(controlador+'/mostrarFooter','',mostrarFooter);
	}
	function mostrarFooter(footers)
	{
		$(html).html('');
		cantidad=footers.length;
		for(i=0;i<cantidad;i++){
			footer=footers[i];
			$(html).append('<img src="imagenes/footer/'+footer.urlImagen+'" alt="'+footer.urlImagen+'" id="footer'+footer.idBanner+'">');
		}
	}
}