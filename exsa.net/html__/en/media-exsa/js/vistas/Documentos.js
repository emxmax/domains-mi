function Documentos()
{
	var grabando=1;
	var idEditar=0;
	var elementos=['txtTituloDocumento','imgPortadaDoc','fileCarga','txtDescripcionDocumento'];
	this.iniciar=function()
	{
		$( 'textarea#txtDescripcionDocumento' ).ckeditor();
		cargar();
		$("#btnGrabarDocumento").on('click',grabar);
		$("#fileCarga").on('change',file);
		$(".prevFormat").hide();
	}
	function file()
	{
		valor=$(this).val();
		palabras = valor.split(".");
		ext=palabras[1];
		if(ext=='xls' || ext=='xlsx'){
			imagen="imagenes/excel.png";
		}else if(ext=='doc' || ext=='docx'){
			imagen="imagenes/word.png";
		}else if(ext=='ppt' || ext=='pptx'){
			imagen="imagenes/ppt.png";
		}else if(ext=='jpg' || ext=='png' || ext=='bmp' || ext=='ico'){
			imagen="imagenes/img.png";
		}else if(ext=='pdf'){
			imagen="imagenes/pdf.png";
		}else{
			imagen="imagenes/unknow.png";
		}
		$(".prevFormat").show();
		$(".prevFormat img").attr('src',imagen);
	}
	this.foreignReporte=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getDocumentos','',dibujarReporte);
	}
	function dibujarReporte(data)
	{
		helper.vaciarDatatable('tblDocumentos');
		var table = $("#tblDocumentos").DataTable();
		if(data==null){
			return;
		}
		cantidad=data.length;
		for(i=0;i<cantidad;i++){
			documentos=data[i];
			estado=documentos.estado;
			if(documentos.urlImagen != ""){
				imagen='<a href="../'+documentos.urlImagen+'" target="_blank">Imagen</a>';
			}else{
				imagen='';
			}
			if(documentos.link != ""){
				link='<a href="../'+documentos.link+'" target="_blank">Archivo</a>';
				enlace=documentos.link;
			}else{
				link='';
				enlace='';
			}
			var btnEditar='<button data-index="'+i+'" data-id="'+documentos.idDocumento+'" title="Editar" type="button" class="btn btn-info btn-xs btnEditarDocumento" data-toggle="modal" data-target="#nuevoDocumento"><span class="glyphicon glyphicon-pencil"></span></button>'		
			if(estado==1){
				var btnAccion='<button data-id="'+documentos.idDocumento+'" title="Ocular" type="button" class="btn btn-danger btn-xs btnOcultarDocumento" data-toggle="modal" data-target="#alertaEliminar"><span class="glyphicon glyphicon-remove"></span></button>'
				table.row.add( [
					(i+1),
					documentos.idDocumento,
					documentos.titulo,
					imagen,
					documentos.tipo,
					documentos.peso,
					documentos.descripcion,
					link,
					enlace,
					btnAccion+btnEditar
				] ).draw();
			}else{
				var btnAccion='<button data-id="'+documentos.idDocumento+'" title="Mostrar" type="button" class="btn btn-primary btn-xs btnMostrarDocumento" data-toggle="modal" data-target="#alertaRecuperar"><span class="glyphicon glyphicon-ok"></span></button>'
				var rowNode = table.row.add( [
					(i+1),
					documentos.idDocumento,
					documentos.titulo,
					imagen,
					documentos.tipo,
					documentos.peso,
					documentos.descripcion,
					link,
					enlace,
					btnAccion+btnEditar
				] ).draw().node();
				$( rowNode ).addClass( 'danger' )
			}					
		}
		$(".btnEditarDocumento").on('click',editar);
		$(".btnOcultarDocumento").on('click',ocultar);
		$(".btnMostrarDocumento").on('click',mostrar);
		$(".paginate_button").on('click',refreshPaginacion);
	}
	function refreshPaginacion()
	{
		$(".btnEditarDocumento").off('click');
		$(".btnOcultarDocumento").off('click');
		$(".btnMostrarDocumento").off('click');
		$(".btnEditarDocumento").on('click',editar);
		$(".btnOcultarDocumento").on('click',ocultar);
		$(".btnMostrarDocumento").on('click',mostrar);
	}
	function editar()
	{
		grabando=0;
		index=$(this).attr('data-index');
		idEditar=$(this).attr('data-id');
		var table = $("#tblDocumentos").DataTable()
		titulo=table.row( index ).data()[2];
		descripcion=table.row( index ).data()[2];
		$("#txtTituloDocumento").val(titulo);
		$("textarea#txtDescripcionDocumento").val(descripcion);
	}
	function ocultar()
	{
		id=$(this).attr('data-id');
		$("#idEliminar").val(id);
		$("#seccionEliminar").val('documentos');
		$("#idCampoEliminar").val('idDocumento');
	}
	function mostrar()
	{
		id=$(this).attr('data-id');
		$("#idRecuperar").val(id);
		$("#seccionRecuperar").val('documentos');
		$("#idCampoRecuperar").val('idDocumento');
	}
	function grabar()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		proceso.procesarArchivo(grabaDatos);
	}
	function grabaDatos(data)
	{
		data = jQuery.parseJSON(data)
		tamano=data[0];
		ext=data[1];
		nombre=data[2];
		var objDocumentos=new Object();
		objDocumentos.titulo=$("#txtTituloDocumento").val();
		objDocumentos.descripcion=$("textarea#txtDescripcionDocumento").val();
		objDocumentos.imagen=$("#imgPrevPortada").attr('src');
		objDocumentos.tamano=tamano;
		objDocumentos.ext=ext;
		objDocumentos.nombreArchivo=nombre;
		if(grabando==1){
			funcion="saveDocumento";
		}else{
			funcion="updateDocumento";
			objDocumentos.id=idEditar;
		}
		console.log(objDocumentos)
		proceso.procesar(funcion,objDocumentos,postGrabar);
	}
	function postGrabar(info)
	{
		if(info==0){
			alert('Ocurrieron problemas');
			return;
		}else{
			grabando=1;
			idEditar=0;
			helper.limpiarCampos('nuevoDocumento');
			dibujarReporte(info);
			alert('Proceso realizado correctamente');
			$('#nuevoDocumento').modal('hide');
		}
	}
}