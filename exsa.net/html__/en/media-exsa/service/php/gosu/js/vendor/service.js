function Service(urlBase,production){	
	var url = urlBase;
	var tipo = "GET";;
	/*
	if(production == 0){
		url = url.replace("index","local");
		tipo = "GET";
	}
	else{
		tipo = "POST";
	}
	*/
	var bloquear = false;
	var pantallaBloqueo = $("#pantallaBloqueo");
	this.procesar = function (){
		var dato,i;
		var envio = new Object();
		envio.f = arguments[0];
		//envio.c = arguments[1];
		envio.a = new Array();
		envio.llave = this.llave;

		for (i = 1; i < arguments.length-1; i++) {
			dato = arguments[i];
			envio.a.push(dato);
		};
		var ejecutar = arguments[i];

		var data = {"data":$.toJSON(envio)};
		var urlConsulta = url;
		if(bloquear){
			bloquearPantalla();
		}
		$.ajax({		  
			dataType:"json",
			data:data,
			type:tipo,
		  url: urlConsulta,
		  success: function(evt,ss,aa){
		  		ejecutar(evt);
		  		if(bloquear){
		  			
		  			desbloquearPantalla();
				}
		  },
		  error:errorLectura
		});
	}
	this.activarBloqueo = function(){
		bloquear = true;
	}
	this.desactivarBloqueo = function(){
		bloquear = false;
	}
	function errorLectura(evt,ajvac,thown){
		if(bloquear){
			//pantallaBloqueo.remover();
		}
		console.log("error texto",evt.responseText);
		console.log("error",evt,ajvac,thown);
		//mostrarAlerta("Error de conexion con el servidor");
		//removerPreloader();
	}
	function bloquearPantalla(){
	//	pantallaBloqueo.show();
		pantallaBloqueo.fadeIn("slow");
		pantallaBloqueo.height($(document).height());
	}
	function desbloquearPantalla(){
		pantallaBloqueo.fadeOut("slow");
	}
}


	