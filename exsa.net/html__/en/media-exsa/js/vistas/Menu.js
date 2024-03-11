function Menu()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['txtNombreMenu'];
	this.iniciar=function()
	{
		cargar();
		funciones();
		$("#btnGrabarMenu").on('click',grabar);
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
		$("#txtNombreMenu").on('keyup',generaUrl);
	}
	function generaUrl()
	{
		valor=$(this).val();
		texto=U.normalize((valor.toLowerCase()).replace(/ /g, "-"));
		$("#txtLink1Menu").val(texto);
		if(texto==""){
			$("#txtLink2Menu").val('');
		}else{
			$("#txtLink2Menu").val('?sec='+texto);
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
			if(menu.main=='Si'){
				main=1;
			}else{
				main=0;
			}
			var btnEditar='<button data-main="'+main+'" data-index="'+i+'" data-id="'+menu.idMenu+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarMenu"><span class="glyphicon glyphicon-pencil"></span></button>';
			var btnDetalle='<button data-id="'+menu.idMenu+'" title="Detalles" type="button" class="btn btn-success btn-xs btnDetalleMenu"><span class="glyphicon glyphicon-eye-open"></span></button>';		
			if(estado==1){
				var btnAccion='<button data-id="'+menu.idMenu+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarMenu" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					menu.idMenu,
					menu.nombre,
					menu.url1,
					menu.url2,
					menu.main,
					btnAccion+btnEditar+btnDetalle
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+menu.idMenu+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarMenu" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					menu.idMenu,
					menu.nombre,
					menu.url1,
					menu.url2,
					menu.main,
					btnAccion+btnEditar+btnDetalle
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
		$("#reporteMenu").removeClass('active in');
		$("#opRepMenu").removeClass('active');
		$("#nuevoMenu").addClass('active in');
		$("#opNewMenu").addClass('active');
		grabando=0;
		index=$(this).attr('data-index');
		idEditar=$(this).attr('data-id');
		opMain=$(this).attr('data-main');
		var table = $("#tblMenu").DataTable()
		nombre=table.row( index ).data()[2];
		link1=table.row( index ).data()[3];
		link2=table.row( index ).data()[4];
		mn=opMain;
		$("#txtNombreMenu").val(nombre);
		$("#txtLink1Menu").val(link1);
		$("#txtLink2Menu").val(link2);
		$("#lstTipoMenu").val(mn);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('menu');
		$("#idCampoEliminar").val('idMenu');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('menu');
		$("#idCampoRecuperar").val('idMenu');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		var objMenu=new Object();
		objMenu.nombre=$("#txtNombreMenu").val();
		objMenu.link1=$("#txtLink1Menu").val();
		objMenu.link2=$("#txtLink2Menu").val();
		objMenu.main=$("#lstTipoMenu").val();
		if(grabando==1){
			funcion="saveMenu";
		}else{
			funcion="updateMenu";
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
			helper.limpiarCampos('nuevoMenu');
			cargar();
			alert('Proceso realizado correctamente');
		}
	}
}