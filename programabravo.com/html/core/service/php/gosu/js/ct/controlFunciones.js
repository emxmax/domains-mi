function ControlFunciones(){
	$(document).on("eligioArchivo",verFunciones);
	var lblNombreArchivo = $("#lblNombreArchivo");
	var urlBase = "estructuraArchivo.php?link=";
	var contenedor = $("#contenedorFunciones");
	var lblNombreMetoto = $("#lblNombreMetoto");
	var listaParametros = $("#listaParametros");
	var btnConsultar = $("#btnConsultar");
	btnConsultar.on("click",consultarCaso);
	var consultaApta = false;
	var linkActual;
	var nombreClase;
	var funcionActual;
	var urlBaseConsulta = "ejecutarMetodo.php";
	var ultimoDatoLLegado;
	$("#btnRecargarFunciones").on("click",function(){
		if(ultimoDatoLLegado)
			verFunciones(null,ultimoDatoLLegado);
	});

	function verFunciones(evt,dato){
		//console.log("data",dato);
		ultimoDatoLLegado = dato;
		lblNombreArchivo.html("Service: "+dato.nombre);
		linkActual = dato.link;
		nombreClase = dato.nombre.replace(".php","");
		getArchivos(linkActual,nombreClase);
		contenedor.html("");
	}
	function getArchivos(link,nombre){
		lblNombreMetoto.html("");
		listaParametros.html("");
		var urlConsulta = urlBase+link+"&nombre="+nombre;
		//console.log(urlConsulta);
		var jqxhr = $.ajax( urlConsulta )
				  	.done(function(evt) {
				  		try{
				  			var array = JSON.parse(evt);
				    		colocandoFunciones(array);
				  		}
				  		catch(err){
				  			listaParametros.html(evt);
				  		}
				   		
				  	})
				  	.fail(function(evt) {
				    	//alert( "error" );
				    	mostrarError("archivos",evt);
				  	})
				  	.always(function(evt) {
				    	//alert( "complete" );
				  	});
	}
	function colocandoFunciones(array){
		var i,elemento,dato;
		for ( i = 0; i < array.length; i++) {
			dato = array[i];
			elemento = $("<div class='col-xs-12 col-sm-6 col-md-3 pregunta'>");
			elemento.html(dato.nombre);
			contenedor.append(elemento);
			elemento.data("dato",dato);
			elemento.on("click",verMetodo);
		};

	}
	function verMetodo(){
		consultaApta = true;
		listaParametros.html("");
		var elemento = $(this);
		elemento.parent().find(".pregunta").removeClass("bg-primary");
		elemento.addClass("bg-primary");
		var dato =elemento.data("dato");
		funcionActual = dato.nombre;
		lblNombreMetoto.html("Medoto: "+dato.nombre);
		var i,parametro;
		for ( i = 0; i < dato.parametros.length; i++) {
			parametro = dato.parametros[i];
			fila = $("<tr>");
			celda = $("<td>");
			celda.html(parametro);
			fila.append(celda);

			celda = $("<td>");
			textoIngreso = $("<input class='form-control' placeholder='Ingresa valor'>");
			celda.append(textoIngreso);
			fila.append(celda);

			listaParametros.append(fila);
		};
	}
	function consultarCaso(){
		if(!consultaApta)
			return;
		var arrayEnvio = [];
		listaParametros.find("input").each(function(pos,ele){
			//console.log(pos,ele);
			var valor = $(ele).val();
			try{
				valorJSON = JSON.parse(valor);
			}
			catch(error){
				valorJSON = valor;
			}
			arrayEnvio.push( valorJSON );
		});
		arrayEnvio = $.toJSON(arrayEnvio);
		var textoEnvio = "?link="+linkActual+"&nombre="+nombreClase+"&funcion="+funcionActual+"&parametros="+arrayEnvio;
		var urlConsulta = urlBaseConsulta+textoEnvio;
		var fechaInicial = new Date();
		$(document).trigger("consultando");
		var jqxhr = $.ajax( urlConsulta )
				  	.done(function(evt) {
				   		//var dato = JSON.parse(evt);
				   		var fechaConsulta = new Date();
				   		var tiempoConsulta = fechaConsulta.getTime() - fechaInicial.getTime();
				   		var datoJson;
				   		try{
				   			datoJson = JSON.parse(evt);
				   		}
				   		catch(error){
				   			datoJson = evt;
				   		}
				   		
				   		
				   		fechaParseo = new Date();
				   		var tiempoParseo = fechaParseo.getTime() - fechaConsulta.getTime();
				   		var tiempoTotal = fechaParseo.getTime() - fechaInicial.getTime();
				   		var datosRecibidos = evt.length*8;
				   		var datosEnviados = textoEnvio.length*8;
				   		
				   		var informacion = {};
				   		informacion.tiempoConsulta = tiempoConsulta;
				   		informacion.tiempoParseo = tiempoParseo;
				   		informacion.tiempoTotal = tiempoTotal;
				   		informacion.datosRecibidos = datosRecibidos;
				   		informacion.datosEnviados = datosEnviados;

				   		var datosFinales = {};
				   		datosFinales.resultado = evt;
				   		datosFinales.json = datoJson;
				   		datosFinales.informacion = informacion;
				   		
				    	$(document).trigger("consultaTerminada",datosFinales);
				  	})
				  	.fail(function(evt) {
				    	

				    	mostrarError("archivos",evt);
				  	})
				  	.always(function(evt) {
				    	
				  	});
	}
	this.acomodar = function(){
		
		var alto = controlApp.altoWindow;
		var ancho = controlApp.anchoWindow;
		$("#panelFunciones").height(alto-41);
		$("#cuerpoFunciones").height(alto-111);
	}
}	