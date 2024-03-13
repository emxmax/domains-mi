function VistaInformacion(){
	var lblTiempoTotal = $("#lblTiempoTotal");
	var lblTiempoConsulta = $("#lblTiempoConsulta");
	var lblTiempoDecodificacion = $("#lblTiempoDecodificacion");
	var lblDatosEnviados = $("#lblDatosEnviados");
	var lblDatosRecibidos = $("#lblDatosRecibidos");


	// var informacion = {};
	// 			   		informacion.tiempoConsulta = tiempoConsulta;
	// 			   		informacion.tiempoParseo = tiempoParseo;
	// 			   		informacion.tiempoTotal = tiempoTotal;
	// 			   		informacion.datosRecibidos = datosRecibidos;
	// 			   		informacion.datosEnviadoss = datosEnviados;

	this.mostrarResultado = function(dato){
		var recibidos = dato.datosRecibidos;
		var enviados = dato.datosEnviados;
		if(recibidos > 10000){
			recibidos = Math.round(recibidos/1024)+" KB";
		}
		else{
			recibidos = recibidos+" bytes";
		}

		if(enviados > 10000){
			enviados = Math.round(enviados/1024)+" KB";
		}
		else{
			enviados = enviados+" bytes";
		}
		lblTiempoTotal.html(dato.tiempoTotal+"ms");
		lblTiempoConsulta.html(dato.tiempoConsulta+"ms");
		lblTiempoDecodificacion.html(dato.tiempoParseo+"ms");
		lblDatosEnviados.html( enviados );
		lblDatosRecibidos.html( recibidos );
	}	
}