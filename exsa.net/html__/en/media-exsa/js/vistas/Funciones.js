function Funciones()
{
	var elementos=['txtNombreUsuarioCambio','txtClaveUsuarioCambio'];
	this.iniciar=function()
	{
		$("#optExit").on('click',salir);
		$(".file").on('change',function(){
			id=$(this).attr('data-img');
			helper.imageenes(event,id)
		})
		$("#btnSiOcultar").on('click',eliminar);
		$("#btnSiRecuperar").on('click',recuperar);
		$(".limpiar").on('click',limpiar);
		setTimeout(function(){
			activa()
		},1000)
		$(".mayus").keyup(function(){
	    	this.value=$(this).val().toUpperCase() 
	    });
	}
	function limpiar()
	{
		helper.limpiarCampos($(this).attr('data-section'));
	}
	function activa()
	{
		seccion=getUrlParameter('sec');
		if(seccion==undefined){
			$('.item-li').removeClass('active');
			$('.item-menu').addClass('active');
		}else{
			$('.item-li').removeClass('active');
			$('.item-'+seccion).addClass('active');
		}
	}
	function getUrlParameter(sParam)
	{
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++) 
	    {
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam) 
	        {
	            return sParameterName[1];
	        }
	    }
	}          
	function salir()
	{
	    var conf=confirm("¿Desea salir del sistema? ");
	    if(conf){
	        location.href='salir.php';
	    }
	}
	function eliminar()
	{
		var objEliminar=new Object();
		objEliminar.id=$("#idEliminar").val();
		objEliminar.tabla=$("#seccionEliminar").val();
		objEliminar.campo=$("#idCampoEliminar").val();
		proceso.procesar('eliminar',objEliminar,postEliminar);
	}
	function postEliminar(seccion)
	{
		switch (seccion) {
		    case 'menu':
		        menus.foreignReporte();
		        break;
		    case 'item_menu':
		        imenu.foreignReporte();
		        break;
		    case 'pagina':
		        page.foreignReporte();
		        break;
		    case 'contenido':
		        cont.foreignReporte();
		        break;
		    case 'menu_has_item_menu':
		        asigna.foreignReporte();
		        break;
		    case 'Formularios':
		        formul.foreignReporte();
		        break;
		    case 0:
		        alert('Ocurrió un error');
		        break;
		}
		$('#alertaEliminar').modal('hide');
	}
	function recuperar()
	{
		var objRecuperar=new Object();
		objRecuperar.id=$("#idRecuperar").val();
		objRecuperar.tabla=$("#seccionRecuperar").val();
		objRecuperar.campo=$("#idCampoRecuperar").val();
		proceso.procesar('recuperar',objRecuperar,postRecuperar);
	}
	function postRecuperar(seccion)
	{
		switch (seccion) {
		    case 'menu':
		        menus.foreignReporte();
		        break;
		    case 'item_menu':
		        imenu.foreignReporte();
		        break;
		    case 'pagina':
		        page.foreignReporte();
		        break;
		    case 'contenido':
		        cont.foreignReporte();
		        break;
		    case 'menu_has_item_menu':
		        asigna.foreignReporte();
		        break;
		    case 'Formularios':
		        formul.foreignReporte();
		        break;
		    case 0:
		        alert('Ocurrió un error');
		        break;
		}
		$('#alertaRecuperar').modal('hide');
	}
}