function Menu()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['txtNombre','txtOrden'];
	this.iniciar=function()
	{
		cargar();
		funciones();
		$("#btnGrabar").on('click',grabar);
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getMenuAdmin','',dibujarReporte);
	}
	function funciones()
	{
		$("#txtNombre").on('keyup',generaUrl);
	}
	function generaUrl()
	{
		valor=$(this).val();
		texto=U.normalize((valor.toLowerCase()).replace(/ /g, "-"));
		$("#txtLink1").val(texto);
		if(texto==""){
			$("#txtLink2").val('');
		}else{
			$("#txtLink2").val('?sec='+texto);
		}
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblMenu');
		var table = $("#tblMenu").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			menu=data[i];
			estado=menu.estado;
			if(menu.nuevaPestana==0){
				ps='No';
			}else{
				ps='Si';
			}
			var btnEditar='<button data-index="'+i+'" data-id="'+menu.idItemMenu+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarMenu"><span class="glyphicon glyphicon-pencil"></span></button>';			
			if(estado==1){
				var btnAccion='<button data-id="'+menu.idItemMenu+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarMenu" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					menu.nombre,
					menu.url1,
					menu.url2,
					menu.orden,
					ps,
					btnAccion+btnEditar
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+menu.idItemMenu+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarMenu" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					menu.nombre,
					menu.url1,
					menu.url2,
					menu.orden,
					ps,
					btnAccion+btnEditar
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnEditarMenu").on('click',editar);
		$(".btnOcultarMenu").on('click',ocultar);
		$(".btnMostrarMenu").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);
	}
	function refreshPaginacion()
	{
		$(".btnEditarMenu").off('click');
		$(".btnOcultarMenu").off('click');
		$(".btnMostrarMenu").off('click');
		$(".btnEditarMenu").on('click',editar);
		$(".btnOcultarMenu").on('click',ocultar);
		$(".btnMostrarMenu").on('click',mostrar);
	}
	function editar()
	{
		$("#reporte").removeClass('active in');
		$("#opRep").removeClass('active');
		$("#nuevo").addClass('active in');
		$("#opNuevo").addClass('active');
		grabando=0;
		idEditar=$(this).attr('data-id');
		proceso.procesar('getMenuItem',idEditar,mostrarDatos);
	}
	function mostrarDatos(data)
	{
		$("#txtNombre").val(data[0].nombre);
		$("#txtLink1").val(data[0].url1);
		$("#txtLink2").val(data[0].url2);
		$("#txtOrden").val(data[0].orden);
		$("#lstNuevaPestana").val(data[0].nuevaPestana);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('item_menu');
		$("#idCampoEliminar").val('idItemMenu');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('item_menu');
		$("#idCampoRecuperar").val('idItemMenu');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		var objMenu=new Object();
		objMenu.nombre=$("#txtNombre").val();
		objMenu.link1=$("#txtLink1").val();
		objMenu.link2=$("#txtLink2").val();
		objMenu.orden=$("#txtOrden").val();
		objMenu.pestana=$("#lstNuevaPestana").val();
		if(grabando==1){
			funcion="saveItemMenu";
		}else{
			funcion="updateItemMenu";
			objMenu.id=idEditar;
		}
		proceso.procesar(funcion,objMenu,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			grabando=1;
			idEditar=0;
			helper.limpiarCampos('nuevo');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
}