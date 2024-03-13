function Posts()
{
	var lstCategoria="#lstCategoriaPost";
	var btnGrabar="#btnGrabarPost";
	var elementos=['txtFechaPublicacion','txtTituloPost','txtContenido','txtContenidoMuestra'];
	var grabando=1;
	var idEditar=0;
	this.foreignReporte=function()
	{
		cargarDatos();
	}
	this.iniciar=function()
	{
		$( 'textarea#txtContenido' ).ckeditor();
		$( 'textarea#txtContenidoMuestra' ).ckeditor();
		$(btnGrabar).on('click',grabar);
		funciones();
		cargarDatos();		
	}
	function funciones()
	{
		$("#txtTituloPost").on('keyup',generaUrl);
	}
	function generaUrl()
	{
		valor=$(this).val();
		texto=U.normalize((valor.toLowerCase()).replace(/ /g, "-"));
		$("#txtLink1Post").val(texto);
		$("#txtLink2Post").val(texto);
		if(texto==""){
			$("#txtLink1Post").val('');
		}else{
			$("#txtLink2Post").val('?sec='+texto);
		}
	}
	function cargarDatos()
	{
		proceso.procesar('getAllCategorias','',mostrarCategorias);
		proceso.procesar('getPosts2','',mostrarPosts);
	}
	function mostrarCategorias(data)
	{
		$(lstCategoria).html('');
		$.each(data, function( index, value ) {
			$(lstCategoria).append('<option value="'+value.idCategoria+'">'+value.categoria+'</option>');
		});
	}
	function grabar()
	{
		if(grabando==1){
			if($("#imgPostPrwPortada").attr('src')=="" || $("#imgPostPrwPrincipal").attr('src')==""){
				alert('Ingrese las imágenes');
				return;
			}
		}
		validado=helper.valida(elementos);
		if(validado==0){
			return;
		}else{
			var objPosts=new Object();
			objPosts.fecha=$("#txtFechaPublicacion").val();
			objPosts.idCategoria=$("#lstCategoriaPost").val();
			objPosts.titulo=$("#txtTituloPost").val();
			objPosts.url1=$("#txtLink1Post").val();
			objPosts.url2=$("#txtLink2Post").val();
			objPosts.contenido=$("#txtContenido").val();
			objPosts.contenidoMuestra=$("#txtContenidoMuestra").val();
			objPosts.imagen1=$("#imgPostPrwPortada").attr('src');
			objPosts.imagen2=$("#imgPostPrwPrincipal").attr('src');
			if(grabando==1){
				$("#btnGrabarPost").attr('disabled','disabled');
				proceso.procesar('savePost',objPosts,retornoPost);
			}else{
				$("#btnGrabarPost").attr('disabled','disabled');
				objPosts.id=idEditar;
				proceso.procesar('editarPost',objPosts,retornoEditarPost);
			}
				
		}
	}
	function retornoEditarPost(data)
	{
		$("#btnGrabarPost").removeAttr('disabled');
		if(data==0){
			alert('Ocurrió un error');
			return;
		}else{
			alert('Se editó con éxito');
			helper.limpiarCampos('nuevo');
			cargar()
		}
	}
	function retornoPost(data)
	{
		if(data==0){
			alert('Ocurrió un error');
			return;
		}else{
			alert('Se grabó con éxito');
			helper.limpiarCampos('nuevoPost');
		}
	}
	function mostrarPosts(data)
	{
		helper.vaciarDatatable('tblPosts');
		var table = $("#tblPosts").DataTable();
		if(data==null){
			return;
		}
		$.each(data,function(index,value){
			var btnEditar='<button data-index="'+index+'" data-id="'+value.idPost+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditar"><span class="glyphicon glyphicon-pencil"></span></button>';
			if(value.estado==1){
				var btnAccion='<button data-id="'+value.idPost+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultar" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [(index+1),value.idPost,value.titulo,value.url,btnAccion+btnEditar] ).draw();
			}else{
				var btnAccion='<button data-id="'+value.idPost+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrar" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [(index+1),value.idPost,value.titulo,value.url,btnAccion+btnEditar] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}
		});
		$(".btnEditar").on('click',editar);
		$(".btnOcultar").on('click',ocultar);
		$(".btnMostrar").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);	
	}
	function refreshPaginacion()
	{
		$(".btnEditar").off('click');
		$(".btnOcultar").off('click');
		$(".btnMostrar").off('click');
		$(".btnOcultar").on('click',ocultar);
		$(".btnMostrar").on('click',mostrar);
		$(".btnEditar").on('click',editar);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('post');
		$("#idCampoEliminar").val('idPost');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('post');
		$("#idCampoRecuperar").val('idPost');
	}
	function editar()
	{
		$("#reporte").removeClass('active in');
		$("#opRep").removeClass('active');
		$("#nuevo").addClass('active in');
		$("#opNuevo").addClass('active');
		grabando=0;
		idEditar=$(this).attr('data-id');
		proceso.procesar('getPostId2',idEditar,mostrarPost);
	}
	function mostrarPost(data)
	{
		$.each(data,function(index,value){
			$("#txtFechaPublicacion").val(value.fechaPublicacion);
			$("#lstCategoriaPost").val(value.idCategoria);
			$("#txtTituloPost").val(value.titulo);
			$("#txtLink1Post").val(value.url1);
			$("#txtLink2Post").val(value.url2);
			$("#txtContenido").val(value.contenido);
			$("#txtContenidoMuestra").val(value.contenidoMuestra);
		});		
	}
}