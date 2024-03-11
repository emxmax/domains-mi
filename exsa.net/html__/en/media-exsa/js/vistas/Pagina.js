function Pagina()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['txtTituloPagina','lstItemMenu'];
	this.iniciar=function()
	{
		cargar();
		$("#btnGrabarPagina").on('click',grabar);
		proceso.procesar('getItemMenuMin','',mostrarItems);
	}
	function mostrarItems(data)
	{
		$("#lstItemMenu").html('');
		$("#lstItemMenu").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstItemMenu").append('<option value="'+value.idItemMenu+'">'+value.descripcion+'</option>');
		});
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getPagina','',dibujarReporte);
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblPagina');
		var table = $("#tblPagina").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			pagina=data[i];
			estado=pagina.estado;
			var btnEditar='<button data-item="'+pagina.idItem_menu+'" data-index="'+i+'" data-id="'+pagina.idPagina+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarPagina"><span class="glyphicon glyphicon-pencil"></span></button>';
			if(estado==1){
				var btnAccion='<button data-id="'+pagina.idPagina+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarPagina" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					pagina.idPagina,
					pagina.titulo,
					pagina.descripcion,
					btnAccion+btnEditar
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+pagina.idPagina+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarPagina" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					pagina.idPagina,
					pagina.titulo,
					pagina.descripcion,
					btnAccion+btnEditar
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnEditarPagina").on('click',editar);
		$(".btnOcultarPagina").on('click',ocultar);
		$(".btnMostrarPagina").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);
	}
	function refreshPaginacion()
	{
		$(".btnEditarPagina").off('click');
		$(".btnOcultarPagina").off('click');
		$(".btnMostrarPagina").off('click');
		$(".btnEditarPagina").on('click',editar);
		$(".btnOcultarPagina").on('click',ocultar);
		$(".btnMostrarPagina").on('click',mostrar);
	}
	function editar()
	{
		$("#reportePagina").removeClass('active in');
		$("#opRepPagina").removeClass('active');
		$("#nuevaPagina").addClass('active in');
		$("#opNewPagina").addClass('active');
		grabando=0;
		index=$(this).attr('data-index');
		idEditar=$(this).attr('data-id');
		idItem=$(this).attr('data-item');
		var table = $("#tblPagina").DataTable()
		nombre=table.row( index ).data()[2];
		$("#txtTituloPagina").val(nombre);
		$("#lstItemMenu").val(idItem);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('pagina');
		$("#idCampoEliminar").val('idPagina');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('pagina');
		$("#idCampoRecuperar").val('idPagina');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		var objPagina=new Object();
		objPagina.titulo=$("#txtTituloPagina").val();
		objPagina.itemMenu=$("#lstItemMenu").val();
		if(grabando==1){
			funcion="savePagina";
		}else{
			funcion="updatePagina";
			objPagina.id=idEditar;
		}
		proceso.procesar(funcion,objPagina,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			grabando=1;
			idEditar=0;
			helper.limpiarCampos('nuevaPagina');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
}