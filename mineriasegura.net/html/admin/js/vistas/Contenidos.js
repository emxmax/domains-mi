function Contenido()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['textarea#txtContenido','txtNombreContenido'];
	this.iniciar=function()
	{
		$( 'textarea#txtContenido' ).ckeditor();
		cargar();
		$("#btnGrabarContenido").on('click',grabar);
		$("#btnGrabarAsignacionContenido").on('click',grabarAsignacion);
		proceso.procesar('getPaginaMin','',mostrarPaginas);
	}
	function mostrarPaginas(data)
	{
		$("#lstPagina").html('');
		$("#lstPagina").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstPagina").append('<option value="'+value.idPagina+'">'+value.titulo+'</option>');
		});
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getContenidos','',dibujarReporte);
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblContenidos');
		var table = $("#tblContenidos").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			contenido=data[i];
			estado=contenido.estado;
			var btnEditar='<button data-index="'+i+'" data-id="'+contenido.idContenido+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarContenido"><span class="glyphicon glyphicon-pencil"></span></button>';
			var btnAsignar='<button data-id="'+contenido.idContenido+'" data-title="'+contenido.titulo+'" title="Asignar" class="btn btn-default btn-xs btnAsignarContenido" data-toggle="modal" data-target="#asignarContenido"><span class="glyphicon glyphicon-th-list"></span></button>'
			if(estado==1){
				var btnAccion='<button data-id="'+contenido.idContenido+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarContenido" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					contenido.idContenido,
					contenido.nombre,
					contenido.titulo,
					contenido.subTitulo,
					contenido.texto,
					btnAccion+btnEditar+btnAsignar
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+contenido.idContenido+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarContenido" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					contenido.idContenido,
					contenido.nombre,
					contenido.titulo,
					contenido.subTitulo,
					contenido.texto,
					btnAccion+btnEditar+btnAsignar
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnAsignarContenido").on('click',asignar);
		$(".btnEditarContenido").on('click',editar);
		$(".btnOcultarContenido").on('click',ocultar);
		$(".btnMostrarContenido").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);
	}
	function refreshPaginacion()
	{
		$(".btnAsignarContenido").off('click');
		$(".btnEditarContenido").off('click');
		$(".btnOcultarContenido").off('click');
		$(".btnMostrarContenido").off('click');
		$(".btnAsignarContenido").on('click',asignar);
		$(".btnEditarContenido").on('click',editar);
		$(".btnOcultarContenido").on('click',ocultar);
		$(".btnMostrarContenido").on('click',mostrar);
	}
	function asignar()
	{
		idAsignar=$(this).attr('data-id');
		titulo=$(this).attr('data-title');
		$("#txtContenidoAsignar").val(titulo);
		$("#txtContenidoAsignar").attr('data-id',idAsignar);
	}
	function editar()
	{
		$("#reporteContenidos").removeClass('active in');
		$("#opRepContenido").removeClass('active');
		$("#nuevoContenido").addClass('active in');
		$("#opNewContenido").addClass('active');
		grabando=0;
		index=$(this).attr('data-index');
		idEditar=$(this).attr('data-id');;
		var table = $("#tblContenidos").DataTable()
		nombre=table.row( index ).data()[2];
		titulo=table.row( index ).data()[3];
		subtitulo=table.row( index ).data()[4];
		texto=table.row( index ).data()[5];
		$("#txtNombreContenido").val(nombre);
		$("#txtTituloContenido").val(titulo);
		$("#txtSubTituloContenido").val(subtitulo);
		$( 'textarea#txtContenido' ).val(texto);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('contenido');
		$("#idCampoEliminar").val('idContenido');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('contenido');
		$("#idCampoRecuperar").val('idContenido');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		var objContenido=new Object();
		objContenido.nombre=$("#txtNombreContenido").val();
		objContenido.titulo=$("#txtTituloContenido").val();
		objContenido.subTitulo=$("#txtSubTituloContenido").val();
		objContenido.texto=$( 'textarea#txtContenido' ).val();
		if(grabando==1){
			funcion="saveContenido";
		}else{
			funcion="updateContenido";
			objContenido.id=idEditar;
		}
		proceso.procesar(funcion,objContenido,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			grabando=1;
			idEditar=0;
			helper.limpiarCampos('nuevoContenido');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
	function grabarAsignacion()
	{
		var objAsignar=new Object();
		objAsignar.idContenido=$("#txtContenidoAsignar").attr('data-id');
        objAsignar.idPagina=$("#lstPagina").val();
		proceso.procesar('asignaContenido',objAsignar,postGrabarAsignacion);
	}
	function postGrabarAsignacion(data)
	{
		if(data==1){
			alert('Grabado correctamente');
			$('#asignarContenido').modal('hide');
		}else if(data==2){
			alert('El contenido ya fué asignado a esta página');
		}else{
			alert('Ocurrió un error');
			return;
		}
	}
}