function Inicio()
{
	var nro=1;
	var linkIcon="#lnkIcono";
	var description="#metaDesc";
	var tituloApp="#titleApp";
	var menu="#menuNav";
	var controlador='service/index.php/InicioController';
	var space=("#main-menu");
	var space2=("#menuResponsive");
	this.iniciar=function()
	{
		cargarData();
		$(window).on('resize',anchoMenu);
		$(".exit").on('click',salir);
	}
	function cargarData()
	{
		proceso.procesar(controlador+'/mostrarMenu','',cargaSec);
	}
	function cargaSec(data)
	{
		data=data[0];
		descripcion=data.descripcion;
		fondoLogin=data.fondoLogin;
		icono=data.icono;
		menu=data.menu;
		titulo=data.titulo;
		$(linkIcon).attr('href','imagenes/'+icono);
		$(tituloApp).html(titulo);
		$(description).attr('content',descripcion);
		if(menu==1){
			$("#menuNav").load('menu.php',function(){
				mostrarMenu(data);
			});
		}
	}
	function mostrarMenu(data)
	{
		descripcion=data.descripcion;
		fondoLogin=data.fondoLogin;
		icono=data.icono;
		menu=data.menu;
		titulo=data.titulo;
		menus=data.menus;
		$(linkIcon).attr('href','imagenes/'+icono);
		$(tituloApp).html(titulo);
		$(description).attr('content',descripcion);
		cantidad=menus.length;
		for(i=0;i<cantidad;i++){
			menu=menus[i];
			idMenu=menu.idMenu;
			link=menu.link;
			nombre=menu.nombre;
			tipo=parseInt(menu.tipo);
			subMenus=menu.subMenus;
			if(tipo==1){
				$(space).append('<li class="sb-menu-dir"><a href="'+link+'">'+nombre+'<span class="icon-sb-menu"></span></a></li>');
			}else{
				cantidad2=subMenus.length;
				$(space).append('<li data-id="'+idMenu+'" class="sb-menu-dir drp">'+
				'<a href="'+link+'">'+nombre+'<span class="icon-sb-menu"></span>'+
				'<ul id="menu-lvl-1-'+(i+1)+'" class="menu-lvl-1">');
				for(x=0;x<cantidad2;x++){
					subMenu=subMenus[x];
					idSubMenu=subMenu.idSubMenu;
					linkSmenu=subMenu.link;
					nombreSmenu=subMenu.nombre;
					$("#menu-lvl-1-"+(i+1)).append('<li><a href="'+linkSmenu+'">'+nombreSmenu+'</a></li>');
				}
				$(space).append('</ul></a></li>');
			}				
		}
		for(i=0;i<cantidad;i++){
			menu=menus[i];
			idMenu=menu.idMenu;
			link=menu.link;
			nombre=menu.nombre;
			tipo=parseInt(menu.tipo);
			subMenus=menu.subMenus;
			if(tipo==1){				
				$(space2).append('<li><a href="'+link+'&code='+idMenu+'">'+nombre+'</a></li>');
			}else{
				cantidad2=subMenus.length;
				$(space2).append('<li data-id="'+idMenu+'" class="dropdown">'+
				'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'+nombre+' <span class="caret"></span></a>'+
				'<ul id="menu-rsp-lvl-1-'+(i+1)+'" class="dropdown-menu" role="menu">');
				for(x=0;x<cantidad2;x++){
					subMenu=subMenus[x];
					idSubMenu=subMenu.idSubMenu;
					linkSmenu=subMenu.link;
					nombreSmenu=subMenu.nombre;
					$("#menu-rsp-lvl-1-"+(i+1)).append('<li><a href="'+linkSmenu+'&code='+idSubMenu+'">'+nombreSmenu+'</a></li>');
				}
				$(space2).append('</ul></li>');
			}				
		}

		colorFondoMenu=data.colorFondoMenu;
		colorTextoMenu=data.colorTextoMenu;
		colorFondoMenuHover=data.colorFondoMenuHover;
		colorFondoSubMenu=data.colorFondoSubMenu;
		colorTextoSubMenu=data.colorTextoSubMenu;
		colorFondoSubMenuHover=data.colorFondoSubMenuHover;
		colorBody=data.colorBody;
		disenoMenu(colorFondoMenu,colorTextoMenu,colorFondoMenuHover,colorFondoSubMenu,colorTextoSubMenu,colorFondoSubMenuHover,colorBody);
		anchoMenu();
	}
	function anchoMenu()
	{
		/*
		anchoVentana=$(window).width();
		if(anchoVentana<=637){
			var elemento=$(".main-menu .sb-menu-dir");
			elemento.css('width','100%');
			$(".nav#menuNav > ul > li > a > .menu-lvl-1").css('width','100%');
		}else{
		*/
			var elemento=$(".main-menu .sb-menu-dir");
			var elementos=$("#menuNav .main-menu").children("li").size()
			//var widUl=$("#menuNav .main-menu").width();
			var tamano=100/elementos;
			tamano=tamano+'%';
			elemento.css('width',tamano);
			$("nav#menuNav > ul > li > a > .menu-lvl-1").css('width',tamano);
		//}
	}
	function disenoMenu(colorFondoMenu,colorTextoMenu,colorFondoMenuHover,colorFondoSubMenu,colorTextoSubMenu,colorFondoSubMenuHover,colorBody)
	{
		$("nav#menuNav > ul > li").css('background',colorFondoMenu);
		$("nav#menuNav > ul > li > a").css('color',colorTextoMenu);
		$("nav#menuNav > ul > li > a").hover(function(){
			$(this).css('background',colorFondoMenuHover);
		});
		$("#body").css('background',colorBody);
		$("nav#menuNav > ul > li > a").mouseleave(function(){
			$(this).css('background',colorFondoMenu);
		});
		$("nav#menuNav > ul > li > a > .menu-lvl-1 li").css('background',colorFondoSubMenu);
		$("nav#menuNav > ul > li > a > .menu-lvl-1 li a").css('color',colorTextoSubMenu);
		$(".navbar-default").css('background',colorFondoSubMenu);
		$("nav#menuNav > ul > li > a > .menu-lvl-1 li a").hover(function(){
			$(this).css('background',colorFondoSubMenuHover);
		});
		$("nav#menuNav > ul > li > a > .menu-lvl-1 li a").mouseleave(function(){
			$(this).css('background',colorFondoSubMenu);
		});
		var jsonCssNormal=new Object();
		jsonCssNormal.background=colorFondoMenu;
		jsonCssNormal.color=colorTextoSubMenu;

		var jsonCss=new Object();
		jsonCss.background=colorFondoSubMenuHover;
		jsonCss.color=colorTextoSubMenu;
		$(".navbar-default .navbar-nav > li > a").css(jsonCssNormal);
		$(".navbar-default .navbar-nav > li > a:focus").css(jsonCss);
		$(".navbar-default .navbar-nav > li > a").hover(function(){
			$(this).css(jsonCss);
		});
		$(".navbar-default .navbar-nav > li > a").mouseleave(function(){
			$(this).css(jsonCssNormal);
		});

		$(".main-menu .sb-menu-dir.drp .icon-sb-menu").html('&nbsp;<i class="fa fa-caret-down fa-1"></i>');
	}
	function salir()
	{
	    var conf=confirm("¿Desea salir de la aplicación? ");
	    if(conf){
	        location.href='salir.php';
	    }
	}
}