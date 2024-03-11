function Control()
{
	var arrFiltro=[] 
	this.presEnter=function(event)
	{
		if(arrFiltro.length>0){
			arrFiltro.length=0
		}
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13') {
	        funcion=$(this).attr('data-funcion')
	        parametro=$(this).val()
	        if(U.seccionActiva=="espacio_administradores"){
	        	var tamanos=[25,25,15,15,15]
				var campos=['nombre','apellido','usuario','clave','tipoUsuario']
				var tabla='tblDetalleAdministradores'
	        }else{
	        	var tamanos=[10,23,13,13,10,10,8,8]
				var campos=['ruc','nombreEmpresa','nombreContacto','apellidoContacto','usuario','clave','estado','plan']
				var tabla='tblDetalleClientes'
	        }
			tablas.reportesApi(funcion,tamanos,campos,tabla,parametro)
	    }
		
	}
	this.limpiarCampos=function(textos,combos,checks)
	{
		$("#"+textos).val('')
		$("#"+combos).val('')
		$("#"+checks).removeAttr('checked')
	}
	this.valida=function(datos)
	{
		cantidad=datos.length
		for(i=0;i<cantidad;i++){
			if($("#"+datos[i]).val()==""){
				alert('Faltan datos')
				return 0
			}
		}
		return datos.length
	}
	this.imagenes=function(evt,img) {
	  	//alert(img);
	    var files = evt.target.files; // FileList object
	    // Loop through the FileList and render image files as thumbnails.
	    for (var i = 0, f; f = files[i]; i++) {
	      // Only process image files.
	      	if (!f.type.match('image.*')) {
	        	continue;
	      	}
	      	var reader = new FileReader();
	      	// Closure to capture the file information.
	      	reader.onload = (function(theFile) {
	        	return function(e) {
	          		// Render thumbnail.
	          		$("#"+img).attr("src",e.target.result);
	        	};
	      	})(f);
	      	// Read in the image file as a data URL.
	      	reader.readAsDataURL(f);
	    }
	}
}