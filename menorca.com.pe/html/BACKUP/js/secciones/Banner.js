function Banner()
{
	var html="#header-banner #secImg";
	var controlador='service/index.php/BannersController';
	this.iniciar=function()
	{
		cargarData();
	}
	function cargarData()
	{
		proceso.procesar(controlador+'/mostrarBanner','',mostrarBanner);
	}
	function mostrarBanner(banners)
	{
		$(html).html('');
		cantidad=banners.length;
		for(i=0;i<cantidad;i++){
			banner=banners[i];
			$(html).append('<img src="imagenes/banners/'+banner.urlImagen+'" alt="'+banner.urlImagen+'" id="banner'+banner.idBanner+'">');
		}
	}
}