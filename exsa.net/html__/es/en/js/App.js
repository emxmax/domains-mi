var helper=new Helper();
var proceso=new Proceso();
var menu=new Menu();
var sidebar=new Sidebar();
var mapa=new MapadeSitio();
var contenido=new Contenido();
$(function() {
	menu.iniciar();
	sidebar.iniciar();
	mapa.iniciar();
	contenido.cargarContenido();
	
});