function Inicio()
{	
	this.iniciar=function()
	{	
		solicitarModulos()		
		tamanos()		
		marcas.iniciar()
		categorias.iniciar()
		productos.iniciar()
		locales.iniciar()
		usuarios.iniciar()
		kardex.iniciar()
		ingresos.iniciar()
		proveedores.iniciar()	
		proformas.iniciar()
		clientes.iniciar()	
		ventas.iniciar()	
		gremision.iniciar()
		tipoCliente.iniciar()
		factura.iniciar()
		boleta.iniciar()
		nc.iniciar()
		nd.iniciar()
		documentos.iniciar()
		roles.iniciar()
		setTimeout(function(){
			$("#nube").hide()
		},5000)
	}	
	function tamanos()
	{
		anchoVentana=parseInt($(window).width())
		altoVentana=parseInt($(window).height());		
		menuVertical=altoVentana-51;
		if(anchoVentana>991){
			$("#navegacionVertical").css('height',menuVertical);
		}else{
			$("#navegacionVertical").css('height','inherit');
			$("#navegacionVertical").css('padding-bottom','10px');
		}		
	}
	function solicitarModulos()
	{
		proceso.procesar('obtenerInfoInicial',"",cargarHtml)
	}		
	function cargarHtml(data)
	{
		cantidad=data.length;
		var space=$("#seccionesNavegacion")
		for(i=0;i<cantidad;i++){
			seccion=data[i].seccion
			space.append('<a href="#opt'+seccion+'" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">'+seccion+'</a>')
			space.append('<div class="collapse" id="opt'+seccion+'">')
			modulos=data[i].modulos
			if(modulos==null){
				continue
			}
			cantidadModulos=modulos.length
			var colapse=$("#opt"+seccion)
			for(e=0;e<cantidadModulos;e++){
				modulo=modulos[e].modulo
				html=modulos[e].html
				colapse.append('<a class="list-group-item ui-open-section" data-openSection="'+html+'">'+modulo+'</a>')
			}
			space.append('</div>')
		}
		interactividad()
		cargarCss()
	}
	function interactividad()
	{
		$(".ui-close-section").on('click',ventana.ocultarSeccion)
		$(".ui-open-section").on('click',ventana.mostrarSeccion)
		$(".optionTab").on('click',ventana.seccionActiva)
	}
	function cargarCss()
	{
		var arrayCss = [
					'css/normalize.css',
					'css/bootstrap-datetimepicker.min.css',
					'css/bootstrap.css',
					'css/bootstrap-theme.css',
					'css/jquery-ui.css',
					'dataTable/media/css/jquery.dataTables.css',
					'dataTable/media/css/dataTables.bootstrap.css',
					'dataTable/extensions/Responsive/css/dataTables.responsive.css',
					'css/utility.css',
					'css/style.css'
				];
		arrayCss.forEach(function( elemento) {
			ar=U.incluirCSS(elemento)
		});
	}
	$(window).on("resize",tamanos);
}