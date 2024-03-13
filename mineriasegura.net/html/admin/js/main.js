var proceso=new Proceso()
var funciones=new Funciones()
var helper=new Helper()
$(function(){
	funciones.iniciar();
	/*
	tamanos();
	$(window).on('resize',tamanos);
	*/
})

function tamanos()
{
	height=$(window).height();
	altoSeccion=height-51;
	$("#page-wrapper").css('height',altoSeccion);
	$("#nube2").css('position','absolute');
	$("#nube2").css('z-index',10000);
	$("#nube2").css('background',"#fff");
	$("#nube2").css('opacity',"0.5");
	$("#nube2").css('top',"0");
	$("#nube2").css('left',"0");
	ventanaW=$(window).width();
	ventanaH=$(window).height();
	$("#nube2").css('width',ventanaW);
	$("#nube2").css('height',ventanaH);
	margen=(ventanaH-45)/2;
	$("#precarga2").css('margin-top',margen);
}