function ControlResultados(){
	$(document).on("consultando",mostrarConsultando);
	$(document).on("consultaTerminada",mostrarResultado);
	var vistaInformacion = new VistaInformacion();
	var vistaResultado = new VistaResultado();
	var vistaTabulada = new VistaTabulada();
	var vistaJSON = new VistaJSON();
	var datoConsulta;
	function mostrarResultado(evt,datosFinales){
		
		var datoConsulta = datosFinales.resultado;
		var json = datosFinales.json;
		var informacion = datosFinales.informacion;
		$('#resultadosApp a[href="#resultado"]').tab('show');
		vistaResultado.mostrarResultado(json);
		vistaInformacion.mostrarResultado(informacion);
		vistaTabulada.mostrarResultado(json);
		vistaJSON.mostrarResultado(datoConsulta);
	}
	function mostrarConsultando(){
		
		
	}
	this.acomodar = function(){
		
		var alto = controlApp.altoWindow;
		var ancho = controlApp.anchoWindow;
		//contenedor.height(alto - 60);
		$("#resultadosApp").height(alto-40);
		$("#textoJSON").height(alto-120);
		$("#resultadosApp .tab-pane").height(alto-90);
	}
}
