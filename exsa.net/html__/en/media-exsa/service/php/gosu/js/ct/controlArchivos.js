function ControlArchivos(){
	var contenedor = $("#contendorArchivos");
	
	var archivoActual;
	$("#btnRecargarArchivos").on("click",function(){
		contenedor.fadeOut("slow",function(){
			consultarArchivos();
		})
	});
	function consultarArchivos(){
		var jqxhr = $.ajax( "listaArchivos.php" )
		  	.done(function(evt) {
			    var dato = JSON.parse(evt);
			    mostrarArchivos(dato);
		  	})
		  	.fail(function(evt) {
		    	//alert( "error" );
		    	mostrarError("archivos",evt);
		  	})
		  	.always(function(evt) {
		    	//alert( "complete" );
		  	});
	}
	consultarArchivos();
	function mostrarArchivos(dato){
		contenedor.fadeIn("slow");
		//console.log("array",dato);
		var i,directorio,espacioCarpeta,elemento,archivo;
		var arrayDirectoriosTotales = dato.arrayDirectorios;
		var arrayArchivosTotales = dato.arrayArchivos;
		var lista = $("<ul>");
		contenedor.html("");
		contenedor.append(lista);
		for ( i = 0; i < arrayDirectoriosTotales.length; i++) {
			directorio = arrayDirectoriosTotales[i];
			elemento = $("<li>");
			directorio.dibujo = false;
			directorio.visible = false;
			elemento.data("dato",directorio);
			espacioCarpeta = $("<label>");
			espacioCarpeta.html('<span class="glyphicon glyphicon-chevron-right"></span> '+directorio.nombre);
			elemento.append(espacioCarpeta);
			lista.append(elemento);
			espacioCarpeta.on("click",verContenido);
		};
		for ( i = 0; i < arrayArchivosTotales.length; i++) {
			archivo = arrayArchivosTotales[i];
			elemento = $("<li>");
			espacioArchivo = $("<span>");
			espacioArchivo.html(archivo.nombre);
			elemento.append(espacioArchivo);
			elemento.data("dato",archivo);
			lista.append(elemento);
			elemento.on("click",verArchivo);
		};
	}
	function verContenido(){
		var elemento = $(this).parent();
		var datoElemento = elemento.data("dato");
		var arrayDirectorios = datoElemento.arrayDirectorios;
		var arrayArchivos = datoElemento.arrayArchivos;
		var i,directorio,elemento,espacioCarpeta,archivo;
		var lista;
		if(!datoElemento.dibujo){
			lista = $("<ul>");
			elemento.append(lista);
			for ( i = 0; i < arrayDirectorios.length; i++) {
				directorio = arrayDirectorios[i];
				elemento = $("<li>");
				directorio.dibujo = false;
				elemento.data("dato",directorio);
				espacioCarpeta = $("<label>");
				espacioCarpeta.html('<span class="glyphicon glyphicon-chevron-right"></span> '+directorio.nombre);
				elemento.append(espacioCarpeta);
				lista.append(elemento);
				espacioCarpeta.on("click",verContenido);
			};
			for ( i = 0; i < arrayArchivos.length; i++) {
				archivo = arrayArchivos[i];
				elemento = $("<li>");

				espacioArchivo = $("<span>");
				espacioArchivo.html(archivo.nombre);
				elemento.append(espacioArchivo);
				elemento.data("dato",archivo);
				lista.append(elemento);
				elemento.on("click",verArchivo);
			};
		}
		else{
			lista = $(elemento.find("ul")[0]);
		}
		datoElemento.visible = !datoElemento.visible;
		if(datoElemento.visible){
			lista.show();
		}
		else{
			lista.hide();
		}
		datoElemento.dibujo = true;
	}
	this.acomodar = function(){
		
		var alto = controlApp.altoWindow;
		var ancho = controlApp.anchoWindow;
		contenedor.height(alto - 105);
		$("#seccionArchivos").height(alto-40);
	}
	function verArchivo(){
		
		if(archivoActual == this){
			return;
		}
		archivoActual = this;
		contenedor.find("li").removeClass("bg-primary");
		var elemento = $(this);
		elemento.addClass("bg-primary");
		var datoArchivo = elemento.data("dato");
		$(document).trigger("eligioArchivo",datoArchivo);
	}

}