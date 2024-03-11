function Formularios()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['txtDescripcionFormulario','txtClaseFormulario'];
	var elementos2=['lstFormulario','lstElementoFormulario','txtNombreCampo','txtIdCampo'];
	var eliminar=0;
	this.iniciar=function()
	{
		cargar();
		$("#btnGrabarFromulario").on('click',grabar);
		proceso.procesar('getContenidoMin','',mostrarContenido);
		proceso.procesar('getElementosFormulario','',mostrarElementos);
		helper.vaciarDatatable('tblCamposFormulario');
		var table = $("#tblCamposFormulario").DataTable();
		$("#lstFormulario").on('change',function(){ $(this).attr('disabled','disabled') });
		$("#btnLimpiarCampos").on('click',function(){ $("#lstFormulario").removeAttr('disabled') });
		$("#btnAgregar").on('click',agregarFilaCampo);
	}
	function mostrarElementos(data)
	{
		$("#lstElementoFormulario").html('');
		$("#lstElementoFormulario").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstElementoFormulario").append('<option value="'+value.idElementoFormulario+'">'+value.descripcion+'</option>');
		});
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function mostrarContenido(data)
	{
		$("#lstContenidoForm").html('');
		$("#lstContenidoForm").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstContenidoForm").append('<option value="'+value.idContenido+'">'+value.nombre+'</option>');
		});
	}
	function cargar()
	{
		proceso.procesar('getFormularios','',dibujarReporte);
		proceso.procesar('getFormulariosMin','',mostrarFomularios);
	}
	function mostrarFomularios(data)
	{
		$("#lstFormulario").html('');
		$("#lstFormulario").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstFormulario").append('<option value="'+value.idFormulario+'">'+value.descripcion+'</option>');
		});
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblFormularios');
		var table = $("#tblFormularios").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			formulario=data[i];
			estado=formulario.estado;
			var btnEditar='<button data-cont="'+formulario.idContenido+'" data-index="'+i+'" data-id="'+formulario.idFormulario+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarFormulario"><span class="glyphicon glyphicon-pencil"></span></button>';
			if(estado==1){
				var btnAccion='<button data-id="'+formulario.idFormulario+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarFormulario" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					formulario.idFormulario,
					formulario.descripcion,
					formulario.claseFormulario,
					btnAccion+btnEditar
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+formulario.idFormulario+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarFormulario" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					formulario.idFormulario,
					formulario.descripcion,
					formulario.claseFormulario,
					btnAccion+btnEditar
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnEditarFormulario").on('click',editar);
		$(".btnOcultarFormulario").on('click',ocultar);
		$(".btnMostrarFormulario").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);
	}
	function refreshPaginacion()
	{
		$(".btnEditarFormulario").off('click');
		$(".btnOcultarFormulario").off('click');
		$(".btnMostrarFormulario").off('click');
		$(".btnEditarFormulario").on('click',editar);
		$(".btnOcultarPagina").on('click',ocultar);
		$(".btnMostrarFormulario").on('click',mostrar);
	}
	function editar()
	{
		$("#reporteFormulario").removeClass('active in');
		$("#opRepFormulario").removeClass('active');
		$("#nuevoFormulario").addClass('active in');
		$("#opNewFormulario").addClass('active');
		grabando=0;
		cont=$(this).attr('data-cont');
		index=$(this).attr('data-index');
		idEditar=$(this).attr('data-id');
		idItem=$(this).attr('data-item');
		var table = $("#tblFormularios").DataTable()
		descripcion=table.row( index ).data()[2];
		clase=table.row( index ).data()[3];
		$("#txtDescripcionFormulario").val(descripcion);
		$("#txtClaseFormulario").val(clase);
		$("#lstContenidoForm").val(cont);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('Formularios');
		$("#idCampoEliminar").val('idFormulario');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('Formularios');
		$("#idCampoRecuperar").val('idFormulario');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		var objFormulario=new Object();
		objFormulario.contenido=$("#lstContenidoForm").val();
		objFormulario.descripcion=$("#txtDescripcionFormulario").val();
		objFormulario.clase=$("#txtClaseFormulario").val();
		if(grabando==1){
			funcion="saveFormulario";
		}else{
			funcion="updateFormulario";
			objFormulario.id=idEditar;
		}
		proceso.procesar(funcion,objFormulario,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			grabando=1;
			idEditar=0;
			helper.limpiarCampos('nuevoFormulario');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
	function agregarFilaCampo()
	{
		validar2=helper.valida(elementos2);
		if(validar2==0){
			return;
		}
		var table = $("#tblCamposFormulario").DataTable()	
		filas=table.column( 0 ).data().length	
		idElemento=$("#lstElementoFormulario").val();
		elemento=$("#lstElementoFormulario option:selected").html();
		nombre=$("#txtNombreCampo").val();
		id=$("#txtIdCampo").val();
		clase=$("#txtClaseCampo").val();
		muestra=$("#txtPlaceHolder").val();
		longitud=$("#txtCaracteresCampo").val();
		btnEstado='<button type="button" class="btn btn-danger btn-sm btn-delete-item"><span class="glyphicon glyphicon-remove"></span></button>'
		table.row.add( [(filas+1),idElemento,elemento,nombre,id,clase,muestra,longitud,btnEstado] ).draw();
		resetClickQuitar();
	}
	function resetClickQuitar()
	{
		clean();
		$(".btn-delete-item").off('click')
		$(".btn-delete-item").on('click',eliminarFila)
	}
	function eliminarFila()
	{		
		var table = $('#tblCamposFormulario').DataTable();
		$('#tblCamposFormulario tbody').on( 'click', 'tr', function () {
		    eliminar=table.row( this ).remove() ;
		} );
	}
	function clean()
	{
		$("#lstElementoFormulario").val('');
		$("#txtNombreCampo").val('');
		$("#txtIdCampo").val('');
		$("#txtClaseCampo").val('');
		$("#txtPlaceHolder").val('');
		$("#txtCaracteresCampo").val('');
	}
}

