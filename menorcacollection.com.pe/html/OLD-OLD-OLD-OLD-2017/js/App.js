var helper=new Helper();
var proceso=new Proceso();
var contacto=new Contacto();

var anchoSlide=230;
var margenLeft=-20;
var margenLeft2=-20;
var diferencia=1;
var diferencia2=0;
var activar=false;
var ini=0;
$(function() {
	contacto.iniciar();
	$(".itemProyectoHome").hide();
	activarPrimero();
	$(".itemMenu").on('click',activarMenu);
	ancho=$(window).width();
	if(ancho < 400){
		cx=1;
	}else{
		cx=2;
	}
    $(".oculto > .opciones > ul > li.colResponsive").on('click',activarSlide);
    $(".oculto > .opciones > ul > li.colResponsive").hover(evHover);
    $(".oculto > .opciones > ul > li.colResponsive").mouseleave(noHover);
    $(".colResponsive2").on('click',activarSlide);
    $(".colResponsive2").hover(evHover);
    $(".colResponsive2").mouseleave(noHover);
    $(".btnIzq").on('click',backSlide);
    $(".btnDer").on('click',forwardSlide);
    $("#example1").on('click',function(){ $("#popup1").modal('show'); });
    $("#example2").on('click',function(){ $("#popup2").modal('show'); });
    $("#bannerGana").on('click',function(){ $("#popup3").modal('show'); });
    setTimeout(togle,50);
    setInterval(gana,800);

    $(".btn1").on('click',clickPlano);
});
function clickPlano()
{
	elemento=$(this).attr('data-id');
	$(".imagenPlano").hide();
	$("#"+elemento).show();
}
function activarMenu()
{
	$("itemMenu").removeClass('active');
	$(this).addClass('active');
}
function evHover()
{
	$(this).children('.normal').hide();
	$(this).children('.encima').show();
}
function noHover()
{
	if($(this).hasClass('activo')){
		$(this).children('.normal').hide();
		$(this).children('.encima').show();
	}else{
		$(this).children('.encima').hide();
		$(this).children('.normal').show();
	}
}
function backSlide()
{
	elementos=$(".oculto > .opciones > ul > li.colResponsive").size();
	ocultos=elementos-4;
	margenTope=(anchoSlide*ocultos)-margenLeft2;
	if(diferencia > 0){
		margenLeft=margenLeft-anchoSlide;
		diferencia=margenTope+margenLeft;
		console.log(diferencia)
		$(".oculto > .opciones > ul").css('margin-left',margenLeft);
	}else{
		diferencia=0;
	}
	diferencia2=1;
}
function forwardSlide()
{
	elementos=$(".oculto > .opciones > ul > li.colResponsive").size();
	ocultos=elementos-4;
	margenTope=margenLeft2;
	if(diferencia2 > 0){
		margenLeft=margenLeft+anchoSlide;
		diferencia2=margenTope-margenLeft;
		console.log(diferencia)
		$(".oculto > .opciones > ul").css('margin-left',margenLeft);
	}else{
		diferencia2=0;
	}
	diferencia=1;
}
function activarPrimero()
{
	elemento=$(".oculto > .opciones > ul > li.colResponsive.activo").attr('data-target');
	$("#"+elemento).show();
}
function activarSlide()
{
	$(".oculto > .opciones > ul > li.colResponsive > .encima").hide();
	$(".oculto > .opciones > ul > li.colResponsive > .normal").show();
	$(".oculto > .opciones > ul > li.colResponsive").removeClass('activo');
	$(".colResponsive2 > .encima").hide();
	$(".colResponsive2 > .normal").show();
	$(".colResponsive2").removeClass('activo');
	$(this).addClass('activo');
	$(".itemProyectoHome").hide();
	target=$(this).attr('data-target');
	console.log(target)
	$("#"+target).show();
}
function togle()
{
   	setInterval(function(){
    	$("#popuptransparente").fadeToggle(50);
    },400)     
}
$(document).ready(function(){

    /* default settings */
    $('.venobox').venobox(); 


    /* custom settings */
    $('.venobox_custom').venobox({
        framewidth: '400px',        // default: ''
        frameheight: '300px',       // default: ''
        border: '10px',             // default: '0'
        bgcolor: '#5dff5e',         // default: '#fff'
        titleattr: 'data-title',    // default: 'title'
        numeratio: true,            // default: false
        infinigall: true            // default: false
    });

    /* auto-open #firstlink on page load */
    $("#firstlink").venobox().trigger('click');
});
function gana()
{
	var imagenes = ['estrella1.png', 'estrella2.png'];
	ini=ini+1;
	if(ini>1){
		ini=0;
	}
	$('.gana').css({'background-image': 'url(imagenes/' + imagenes[ini] + ')'});
}
