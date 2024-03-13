function Asignacion()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['lstAsignaItemMenu','lstAsignaMenu'];
	this.iniciar=function()
	{
		cargar();
		$("#btnGrabarAsignacion").on('click',grabar);
		proceso.procesar('getItemMenuMin','',mostrarItemMenuAsignacion);
		proceso.procesar('getMenuMin','',mostrarMenuAsignacion);
	}
	function mostrarItemMenuAsignacion(data)
	{
		$("#lstAsignaItemMenu").html('');
		$("#lstAsignaItemMenu").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstAsignaItemMenu").append('<option value="'+value.idItemMenu+'">'+value.descripcion+'</option>');
		});
	}
	function mostrarMenuAsignacion(data)
	{
		$("#lstAsignaMenu").html('');
		$("#lstAsignaMenu").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstAsignaMenu").append('<option value="'+value.idMenu+'">'+value.descripcion+'</option>');
		});
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getAsignacionMenu','',dibujarReporte);
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblAsignacion');
		var table = $("#tblAsignacion").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			asignacion=data[i];
			estado=asignacion.estado;
			if(estado==1){
				var btnAccion='<button data-id="'+asignacion.id+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarAsignacion" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					asignacion.idItemMenu,
					asignacion.item,
					asignacion.idMenu,
					asignacion.menu,
					btnAccion
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+asignacion.id+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarAsignacion" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					asignacion.idItemMenu,
					asignacion.item,
					asignacion.idMenu,
					asignacion.menu,
					btnAccion
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnOcultarAsignacion").on('click',ocultar);
		$(".btnMostrarAsignacion").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);
	}
	function refreshPaginacion()
	{
		$(".btnOcultarAsignacion").off('click');
		$(".btnMostrarAsignacion").off('click');
		$(".btnOcultarAsignacion").on('click',ocultar);
		$(".btnMostrarAsignacion").on('click',mostrar);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('menu_has_item_menu');
		$("#idCampoEliminar").val('id');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('menu_has_item_menu');
		$("#idCampoRecuperar").val('id');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		var objPagina=new Object();
		objPagina.idItemMenu=$("#lstAsignaItemMenu").val();
		objPagina.idMenu=$("#lstAsignaMenu").val();
		funcion="saveAsignacionMenu";
		proceso.procesar(funcion,objPagina,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			helper.limpiarCampos('nuevaAsignacion');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
}