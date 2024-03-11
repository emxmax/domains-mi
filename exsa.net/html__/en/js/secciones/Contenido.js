function Contenido()
{
	var elementos=[];
	var nomElementos=[];
	var arrCt=[];
	var limpi="";
	this.cargarContenido=function()
	{
		var seccion=$("#pagina").attr('data-id');
		if(seccion=='news'){
			//alert("entro");
			proceso.procesar('getPost',seccion,mostrarNoticias);
		}else if(seccion==undefined){
			search.resultados();
		}else{
			proceso.procesar('getContenido',seccion,mostrarContenido);
		}
	}
	function mostrarContenido(data)
	{
		console.log(data)
		$("#contenidoPagina > #variable").html('');
		if(data.titulo != null){
			$("#contenidoPagina > #variable").append('<h1>'+data.titulo+'</h1>');
		}		
		contenidos=data.contenidos;
		if(contenidos.length > 0){
			$.each(contenidos, function( index, value ) {
				idC=value.idContenido;
				tit=value.titulo;
				sbTitt=value.subTitulo;
				content=value.texto;
				imagenes=value.imagenes;
				archivos=value.archivos;
				tabs=value.tabs;
				formulario=value.formulario;
				if((sbTitt!=null) || (sbTitt!="null")){
					$("#contenidoPagina > #variable").append('<div class="row contenido" id="ct'+idC+'">');
					if ((tit==null) || (tit=="null")) tit = "";
					if ((sbTitt==null) || (sbTitt=="null")) sbTitt = "";
					$("#ct"+idC).append('<h2>'+tit+'</h2><h3>'+sbTitt+'</h3>');
					$("#ct"+idC).append(content);
				}
				if(imagenes != null){
					$("#ct"+idC).append('<div class="imgsContenido">');
					$.each(imagenes, function( indexImg, valueImg ) {
						idImg=valueImg.idImagen;
						title=valueImg.title;
						url=valueImg.url;
						alt=valueImg.alt;
						$("#ct"+idC+" .imgsContenido").append('<figure><img id="img'+idC+idImg+'" src="imagenes/contenidos/'+url+'" alt="'+alt+'" title="'+title+'"/></figure>');
					});
					$("#ct"+idC).append('</div>');
				}
				if(archivos != null){
					$("#ct"+idC).append('<fieldset class="files"><legend>Descargar</legend>');
					$.each(archivos, function( indexFile, valueFile ) {
						nombre=valueFile.nombre;
						ruta=valueFile.ruta;
						$("#ct"+idC+" .files").append('<a href="archivos/'+ruta+'" target="_blank"><span class="download">'+nombre+'</span></a>');
					});
					$("#ct"+idC).append('</fieldset>');
				}
				if(tabs != null){
					$("#ct"+idC).append('<div class="tabs">');
					$.each(tabs, function( indexTab, valueTab ) {
						codTab=valueTab.idTab;
						idTab=valueTab.id;
						classTab=valueTab.class;
						paneles=valueTab.paneles;
						$("#ct"+idC+" .tabs").append('<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs" id="tb'+codTab+'">');
						$("#ct"+idC+" .tabs #tb"+codTab).append('<ul id="'+idTab+'" class="nav nav-tabs '+classTab+'" role="tablist">');
						if(paneles != null){
							$.each(paneles, function( indexPanel, valuePanel ) {
								if(indexPanel==0){
									aex='true';
									atv='active';
								}else{
									aex='false';
									atv='';
								}
								nombre=valuePanel.nombre;
								$("#ct"+idC+" .tabs #tb"+codTab+" #"+idTab).append('<li role="presentation" class="itemTab '+atv+'"><a href="#'+idTab+'-'+indexPanel+'" id="'+idTab+'-'+indexPanel+'-tab" role="tab" data-toggle="tab" aria-controls="'+idTab+'-'+indexPanel+'" aria-expanded="'+aex+'">'+nombre+'</a></li>');
							});
						}
						$("#ct"+idC+" .tabs #tb"+codTab).append('</ul>');
						$("#ct"+idC+" .tabs #tb"+codTab).append('<div id="content'+idTab+'" class="tab-content">');
						if(paneles != null){
							$.each(paneles, function( indexPanel, valuePanel ) {
								if(indexPanel==0){
									atv='active in';
								}else{
									atv='';
								}
								contenido=valuePanel.contenido;
								$("#ct"+idC+" .tabs #tb"+codTab+" #content"+idTab).append('<div role="tabpanel" class="tab-pane fade '+atv+'" id="'+idTab+'-'+indexPanel+'" aria-labelledby="'+idTab+'-'+indexPanel+'-tab">'+contenido+'</div>');
							});
						}
						$("#ct"+idC+" .tabs #tb"+codTab).append('<div>');
						$("#ct"+idC+" .tabs").append('<div>');
					});
					$("#ct"+idC).append('</div>');
				}
				if(formulario != null){
					
						idFormulario=formulario.idFormulario;
						descripcion=formulario.descripcion;
						clase=formulario.clase;
						campos=formulario.campos;
						$("#ct"+idC).append('<div class="form-horizontal ct-formulario" role="form" id="ct-formulario'+idFormulario+'">');
						if(campos!=null){
							$("#ct-formulario"+idFormulario).append('<div class="form '+clase+'" id="form'+idFormulario+'" title="'+descripcion+'">');							
							$.each(campos, function( indexcp, valuecp ) {
								idCampoFormulario=valuecp.idCampoFormulario;
								nombre=valuecp.nombre;
								idCampo=valuecp.idCampo;
								claseCampo=valuecp.claseCampo;
								placeholder=valuecp.placeholder;
								longitud=valuecp.longitud;
								valores=valuecp.valores;
								elementos.push(idCampo);
								nomElementos.push(nombre);
								limpi='ct-formulario'+idFormulario;
								$("#form"+idFormulario).append('<div class="form-group"><div class="col-sm-3"><label for="'+idCampo+'" class="control-label">'+nombre+'</label></div><div class="col-sm-9" id="ct-form'+idCampoFormulario+'">');
								if(claseCampo=="select"){
									$("#ct-form"+idCampoFormulario).append('<select class="form-control" id="'+idCampo+'">');
									$("#"+idCampo).append('<option value="">Seleccionar</option>')
									$.each(valores, function( indexIt, valueIt ) {
										valor=valueIt.valor;
										tx=valueIt.texto;
										$("#"+idCampo).append('<option value="'+valor+'">'+tx+'</option>')
									});
									$("#ct-form"+idCampoFormulario).append('</select>');
								}else if(claseCampo=="textarea"){									
									$("#ct-form"+idCampoFormulario).append('<textarea id="'+idCampo+'" rows="6" class="form-control" placeholder="'+placeholder+'"></textarea>');
								}else if(claseCampo=='reCaptcha'){
									$("#ct-form"+idCampoFormulario).append('<iframe style="width: 100%; padding-top:15px" src="http://www.mediaimpact.pe/demo/exsa/secciones/captcha.php" frameborder="0" scrolling="no" width="320"></iframe>');
								}else{
									$("#ct-form"+idCampoFormulario).append('<input type="'+claseCampo+'" class="form-control" id="'+idCampo+'" placeholder="'+placeholder+'" maxlength="'+longitud+'">');
								}								
								$("#form"+idFormulario).append('</div></div>');
								//$("#form"+idFormulario).append('</div>');
							});
							$("#ct-formulario"+idFormulario).append('<div class="row botonera"><button class="btn btn-primary" id="btnGrabarForm'+idFormulario+'">Submit</button><button class="btn btn-info limpiar" id="btnLimpiarForm'+idFormulario+'" data-section="ct-formulario'+idFormulario+'">Clean</button></div>');
							$("#ct-formulario"+idFormulario).append('</div>');
						}
					$("#ct"+idC).append('</div>');
				}
				$("#contenidoPagina > #variable").append('</div>');
				
			});
		}else{
			contenidos=data.imagenesMenu;
			var row=0;
			if(contenidos==null){
				//console.log(contenidos);
				noticias.verNoticia();
				//console.log(noticias);

			}
			$.each(contenidos, function( index, value ) {
				url=value.url;
				descripcion=value.descripcion;
				idItemMenu=value.idItemMenu;
				imagen=value.imagen;
				if(imagen==null){
					location.href=url;
					return false;
				}
				U.activaNoticia=0;
				if(index % 2 ==0){
					row=row+1;
					$("#contenidoPagina > #variable").append('<div class="row enlacesImg" id="enlaceImg'+row+'">');
					$("#enlaceImg"+row).append('<div class="col col-md-6 ctImg" id="contenedorImgSeccion'+idItemMenu+'">');
					$("#contenedorImgSeccion"+idItemMenu).append('<a href="'+url+'"><div class="titleEnlace""><span>'+descripcion+'</span></div><a/><a href="'+url+'"><img id="imgEnlace'+idItemMenu+'" src="imagenes/secciones/'+imagen+'" alt="'+descripcion+'" class="img-thumbnail"></a>');
					$("#enlaceImg"+row).append('</div>');
					$("#contenidoPagina > #variable").append('</div>');
				}else{
					$("#enlaceImg"+row).append('<div class="col col-md-6 ctImg" id="contenedorImgSeccion'+idItemMenu+'">');
					$("#contenedorImgSeccion"+idItemMenu).append('<a href="'+url+'"><div class="titleEnlace""><span>'+descripcion+'</span></div><a/><a href="'+url+'"><img id="imgEnlace'+idItemMenu+'" src="imagenes/secciones/'+imagen+'" alt="'+descripcion+'" class="img-thumbnail"></a>');
					$("#enlaceImg"+row).append('</div>');
				}
			});
		}
		if(formulario != null){
			$(".limpiar").on('click',limpiar);
			$("#btnGrabarForm"+idFormulario).on('click',grabarForm);
		}
			
		$(".containertm .timelineMajor h6").on('click',function(){
			sec=$(this).attr('data-togle');
			$("#"+sec).slideToggle( "slow" );
		})
	}
	function grabarForm()
	{
		validar=helper.valida(elementos);
		if(validar==0){
			return;
		}
		for(i=0;i<elementos.length;i++){
			item=elementos[i];
			arrCt.push($("#"+item).val());
		}
		$(this).attr('disabled','disabled');
		var objCorreo=new Object();
		objCorreo.data=arrCt;
		objCorreo.nombres=nomElementos;
		funcion="enviarCorreo";
		proceso.procesar(funcion,objCorreo,postCorreo);
	}
	function postCorreo(data)
	{
		if(data==1){
			alert('Mensaje enviado');
			helper.limpiarCampos(limpi);
			arrCt.length=0;
			return;
		}else{
			alert('Ocurrió un error inesperado');
			return;
		}
		$(".btn").removeAttr('disabled');
	}
	function limpiar()
	{
		helper.limpiarCampos($(this).attr('data-section'));
	}
	function mostrarNoticias(data)
	{
		$("#listaNoticias").html('');
		$.each(data, function( index, value ) {
			fecha=value.fecha;
			url=value.url;
			usuario=value.usuario;
			comentarios=value.comentarios;
			titulo=value.titulo;
			contenido=value.contenido.substring(0,540);
			idPost=value.idPost;
			estado=value.estado;
			$("#listaNoticias").append('<div class="row itemNoticia itemNoticia'+idPost+'">')
			$(".itemNoticia"+idPost).append('<div class="col-sm-12 col">')
			$(".itemNoticia"+idPost+" > .col").append('<a href="'+url+'"><h3 class="tituloNoticia">'+titulo+'</h3></a>');
			$(".itemNoticia"+idPost+" > .col").append('<div class="infoPost"><i class="fa fa-clock-o fa-1"></i>'+fecha+'<i class="fa fa-user fa-1"></i>'+usuario+'<i class="fa fa-comment fa-1"></i>'+comentarios+'</div>');
			$(".itemNoticia"+idPost+" > .col").append('<div class="contenidoPost">'+contenido+'</div>');
			$(".itemNoticia"+idPost+" > .col").append('<a href="'+url+'"><button class="tbn btnExsa btnVerMasNoticia" data-id="'+idPost+'">Read more</button></a>');
			$(".itemNoticia"+idPost).append('</div')
			$("#listaNoticias").append('</div>')
		});
	}
}