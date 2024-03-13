function Ventana()
{	
	var seccion=".seccion";
	var container="#container";
	this.mostrarSeccion=function()
	{
		secActual=$(this).attr('data-link');
		$(seccion).hide();		
		$("#"+secActual).show();
	}
	this.ocultarSeccion=function()
	{
		secOcultar=$(this).attr('data-seccion');
		console.log(secOcultar);
		$("#"+secOcultar).hide();
	}
}