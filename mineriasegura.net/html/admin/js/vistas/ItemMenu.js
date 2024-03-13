function ItemMenu()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['txtNombreItemMenu','lstMenu','txtOrdenItemMenu'];
	this.iniciar=function()
	{
		cargar();
		funciones();
		$("#btnGrabarItemMenu").on('click',grabar);
		proceso.procesar('getMenuMin','',mostrarMenu);
	}
	function mostrarMenu(data)
	{
		$("#lstMenu").html('');
		$("#lstMenu").append('<option value="">Seleccionar</option>');
		$.each(data, function( index, value ) {
			$("#lstMenu").append('<option value="'+value.idMenu+'">'+value.descripcion+'</option>');
		});
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getItemMenu','',dibujarReporte);
	}
	function funciones()
	{
		$("#txtNombreItemMenu").on('keyup',generaUrl);
	}
	function generaUrl()
	{
		valor=$(this).val();
		texto=U.normalize((valor.toLowerCase()).replace(/ /g, "-"));
		$("#txtLink1ItemMenu").val(texto);
		if(texto==""){
			$("#txtLink2ItemMenu").val('');
		}else{
			$("#txtLink2ItemMenu").val('?sec='+texto);
		}
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblItemMenu');
		var table = $("#tblItemMenu").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			itemMenu=data[i];
			estado=itemMenu.estado;
			if(itemMenu.imagen != null){
				img='<a href="../imagenes/contenidos/'+itemMenu.imagen+'" target="_blank">Imagen</a>';
			}else{
				img='';
			}
			var btnEditar='<button data-menu="'+itemMenu.idMenu+'" data-index="'+i+'" data-id="'+itemMenu.idItemMenu+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarItemMenu"><span class="glyphicon glyphicon-pencil"></span></button>';
			if(estado==1){
				var btnAccion='<button data-id="'+itemMenu.idItemMenu+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarItemMenu" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					itemMenu.idItemMenu,
					itemMenu.nombre,
					itemMenu.url1,
					itemMenu.url2,
					itemMenu.menu,
					itemMenu.orden,
					img,
					btnAccion+btnEditar
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+itemMenu.idItemMenu+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarItemMenu" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					itemMenu.idItemMenu,
					itemMenu.nombre,
					itemMenu.url1,
					itemMenu.url2,
					itemMenu.menu,
					itemMenu.orden,
					img,
					btnAccion+btnEditar
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnEditarItemMenu").on('click',editar);
		$(".btnOcultarItemMenu").on('click',ocultar);
		$(".btnMostrarItemMenu").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);

	}
	function refreshPaginacion()
	{
		$(".btnEditarItemMenu").off('click');
		$(".btnOcultarItemMenu").off('click');
		$(".btnMostrarItemMenu").off('click');
		$(".btnEditarItemMenu").on('click',editar);
		$(".btnOcultarItemMenu").on('click',ocultar);
		$(".btnMostrarItemMenu").on('click',mostrar);
	}
	function editar()
	{
		$("#reporteItemMenu").removeClass('active in');
		$("#opRepItemMenu").removeClass('active');
		$("#nuevoItemMenu").addClass('active in');
		$("#opNewItemMenu").addClass('active');
		grabando=0;
		index=$(this).attr('data-index');
		idEditar=$(this).attr('data-id');
		men=$(this).attr('data-menu');
		var table = $("#tblItemMenu").DataTable()
		nombre=table.row( index ).data()[2];
		link1=table.row( index ).data()[3];
		link2=table.row( index ).data()[4];
		ord=table.row( index ).data()[6];
		$("#txtNombreItemMenu").val(nombre);
		$("#txtLink1ItemMenu").val(link1);
		$("#txtLink2ItemMenu").val(link2);
		$("#txtOrdenItemMenu").val(ord);
		$("#lstMenu").val(men);
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
		var objItemMenu=new Object();
		objItemMenu.nombre=$("#txtNombreItemMenu").val();
		objItemMenu.link1=$("#txtLink1ItemMenu").val();
		objItemMenu.link2=$("#txtLink2ItemMenu").val();
		objItemMenu.menu=$("#lstMenu").val();
		objItemMenu.orden=$("#txtOrdenItemMenu").val();
		objItemMenu.imagen=$("#prevImgItemMenu").attr('src');
		if(grabando==1){
			funcion="saveItemMenu";
		}else{
			funcion="updateItemMenu";
			objItemMenu.id=idEditar;
		}
		proceso.procesar(funcion,objItemMenu,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			grabando=1;
			idEditar=0;
			helper.limpiarCampos('nuevoItemMenu');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
}