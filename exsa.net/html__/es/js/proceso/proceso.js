function Proceso()
{
	var tipo='POST'
	this.procesar=function(funcion,dato,retorno)
	{
		$("#nube2").show()
		url=U.apiObjPost(funcion);
		var obj={"datos":dato};
		$.ajax({		  
			dataType:"json",
			data:obj,
			type:tipo,
		  url: url,
		  success: function(evt,ss,aa){
		  		/*
		  		console.log(">>>");
		  		console.log(aa);
		  		console.log(">>>");
		  		*/
		  		retorno(evt);
		  		$("#nube2").hide()
		  },
		  error:errorLectura
		});
	}
	function errorLectura(evt,ajvac,thown){
		console.log("error texto",evt.responseText);
		console.log("error",evt,ajvac,thown);
		//mostrarAlerta("Error de conexion con el servidor");
		//removerPreloader();
	}
	this.procesarArchivo=function(grabaDatos)
	{
    	var formData=new FormData($("#formul")[0]);
    	var ruta="upload.php";
    	//alert(ruta)
    	$.ajax({
        	url:ruta,
        	type:"POST",
        	data:formData,
        	processData:false,
        	contentType:false,
        	success: function(datos)
        	{
           		grabaDatos(datos);
        	}
    	});
	}
}