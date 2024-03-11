function Helper()
{
	this.limpiarCampos=function(seccion)
	{		
		$("#"+seccion+" input[type=text]").val('')
		$("#"+seccion+" input[type=file]").val('')
		$("#"+seccion+" input[type=email]").val('')
		$("#"+seccion+" input[type=number]").val('')
		$("#"+seccion+" input[type=password]").val('')
		$("#"+seccion+" select").val('')
		$("#"+seccion+" checkbox").removeAttr('checked')
		$("#"+seccion+" textarea").val('')
		$("#"+seccion+" img").attr('src','')
		$("#"+seccion+" img").hide();
	}
	this.limpiarCampos2=function(seccion)
	{
		$("#"+seccion+" input[type=text]").val('')
		$("#"+seccion+" input[type=file]").val('')
		$("#"+seccion+" select").val('')
		$("#"+seccion+" checkbox").removeAttr('checked')
		$("#"+seccion+" textarea").val('')
		$("#"+seccion+" img").attr('src','')
		$("#"+seccion+" img").hide();
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
	this.vaciarCombo=function(combo,textoInicial)
	{
		$("#"+combo).html('')
		$("#"+combo).append(textoInicial)
		console.log(1)
	}
	this.cambioPagina=function(seccion)
	{
		//$( ":mobile-pagecontainer" ).pagecontainer( "change", "index.html", { role: seccion } );
		$.mobile.changePage( "#"+seccion, { transition: "flip", changeHash: false });
	}
	this.validarArray=function(arr)
	{
		console.log(arr)
		if(arr.length<1){
			return 0
		}else{
			return 1
		}
	}
	this.confirmacion=function(dato)
	{
		if(dato!=0){
			alert('Se realizó con éxito')
		}else{
			alert('Ocurrió un error')
		}
	}
	this.vaciarDatatable=function(tabla)
	{
		var table = $("#"+tabla).DataTable()
		table.clear().draw();
	}
	this.descargar=function(dato)
	{
		location.href='service/excels/'+dato;
	}
	this.pdf=function(dato)
	{
		abre('RPDF',750,550)
		$( "#rpt" ).load( "service/pdfs/rep.php?archivo="+dato);
	}
	function abre(div,width,height){
		abrirVentana(div,width,height)
	}
	function abrirVentana(div,width,height)
	{
	    $("#"+div).dialog({ show: "fast",
	    	beforeClose: function (event, ui) { return cerrarVentana(div); },
	    	closeOnEscape: true,
			hide: "fold",
			width: width,
			modal:false,
			resizable:false,
			height: height
		});	
	}
	function cerrarVentana(div)
	{
		$("#ad"+div).hide()
		$("#opt"+div).attr('data-oculto','si')		
	}
	this.activa=function(a)
	{
		$("#mensaje").show()
		setTimeout(function(){
			$('#idPaneles li').each(function(indice, elemento) {
			  	$(elemento).removeClass('active')
			});
			$(".ventana").hide()
			$(".optionTab[data-openSection='"+a+"']").show()
			$(".optionTab[data-openSection='"+a+"']").addClass('active')
			$("#"+a).show()
			$("#mensaje").hide()		
		},4000)	
	}
	this.reiniciarApp=function()
	{
		helper.vaciarDatatable('tblReporte');
		helper.limpiarCampos('panel input','panel select');
		helper.limpiarCampos('recojos input','recojos select');
		$("#txtFdesde").val(obtenerFecha);
		$("#txtFhasta").val(obtenerFecha);
		$("#txtFrecojo").val(helper.obtenerFecha);
		helper.cambioPagina('menu');
	}
	this.salirApp=function()
	{
		var conf=confirm("¿Desea salir de la aplicación? ");
		if(conf){		
	        navigator.app.exitApp();
		}
	}
	this.obtiene_fecha=function()
	{
    	fecha=obtenerFecha();
    	return fecha;
	}
	function obtenerFecha()
	{
		var fecha_actual = new Date();
    	var dia = fecha_actual.getDate(); 
    	var mes = fecha_actual.getMonth() + 1; 
    	var anio = fecha_actual.getFullYear(); 
    	if (mes < 10) 
        	mes = '0' + mes; 
    	if (dia < 10) 
        	dia = '0' + dia; 
    	return (dia + "/" + mes + "/" + anio) ;
	}
	this.obtiene_hora=function()
	{
    	hora=obtenerHora();
    	return hora;
	}
	function obtenerHora()
	{
		var fecha_actual = new Date();
    	var hora = fecha_actual.getHours(); 
    	var minuto = fecha_actual.getMinutes() ; 
    	var segundo = fecha_actual.getSeconds(); 
    	if (hora < 10) 
        	hora = '0' + hora; 
    	if (minuto < 10) 
        	minuto = '0' + minuto; 
        if (segundo < 10) 
        	segundo = '0' + segundo; 
    	return (hora+ ":" + minuto ) ;
	}
	this.url1=function()
	{
		rute=window.location.pathname;
		rute=rute.substring(1);
		return rute;
	}
	this.url2=function(key)
	{
		key = key.replace(/[\[]/, '\\[');  
	    key = key.replace(/[\]]/, '\\]');  
	    var pattern = "[\\?&]" + key + "=([^&#]*)";  
	    var regex = new RegExp(pattern);  
	    var url = unescape(window.location.href);  
	    var results = regex.exec(url);  
	    if (results === null) {  
	        return null;  
	    } else {  
	        return results[1];  
	    }  
	}
}