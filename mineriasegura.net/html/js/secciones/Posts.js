function Posts()
{
	var noticiasHome="#noticiasTop-2";
	var noticiasUltimo="#noticiasUltimas";
	var footerNoticias="#footerListaEntradas";
	var categoriasRight="#categorias > ul";
	var postCategoria="#postsXcategorias";
	var dtpost="#detallePost";
	var dtPostCat="#detallePostCategoria";
	this.iniciar=function()
	{
		cargarData();
	}
	function cargarData()
	{
		proceso.procesar('getPosts','',mostrarPostsIniciales);
		proceso.procesar('getCategorias','',mostrarCategorias);
		proceso.procesar('getAllCategorias','',mostrarCategoriasRight);
	}
	function mostrarPostsIniciales(data)
	{
		var contador=0;
		$(noticiasHome).html('');
		$.each(data, function( index, value ) {
			if(contador < 2){
				idPost=value.idPost;
				imagen=value.imagenPortada;
				titulo=value.titulo;
				contenido=value.contenido;
				url=value.url;
				if(imagen =="" || imagen==null){
					htmlImagen='';
				}else{
					htmlImagen='<figure><img src="imagenes/'+imagen+'" alt="" class="imgPortadaNoticia"></figure>';
				}
				$(noticiasHome).append('<div class="div col-lg-6 col-md-6 col-sm-12 col-xs-12" id="itemPost'+idPost+'">');
				$("#itemPost"+idPost).append('<div id="ultimaNoticia'+idPost+'" class="elemento ultimaNoticia">')
				$("#ultimaNoticia"+idPost).append('<div class="detalleUltimaNoticia" id="detalleUltimaNoticia'+idPost+'">');
				$("#detalleUltimaNoticia"+idPost).append('<a href="'+url+'">'+htmlImagen+'</a>');
				$("#detalleUltimaNoticia"+idPost).append('<a href="'+url+'"><h4>'+titulo+'</h4></a>');
				$("#detalleUltimaNoticia"+idPost).append(contenido);
				$("#ultimaNoticia"+idPost).append('</div>');
				$("#ultimaNoticia"+idPost).append('<span><a href="'+url+'" class="readMore">Leer más > </a></span>');
				$("#itemPost"+idPost).append('</div>');
				$(noticiasHome).append('</div>');
			}
			contador=contador+1;
		});
		mostrarPostUltimos(data);
	}
	function mostrarPostUltimos(data)
	{
		var contador2=2;
		$(noticiasUltimo).html('');
		$.each(data, function(index, value){
			if(contador2 < 7){
				if (index==contador2) {
					idPost=value.idPost;
					imagen=value.imagenPortada;
					titulo=value.titulo;
					url=value.url;
					if(imagen =="" || imagen==null){
						htmlImagen='';
					}else{
						htmlImagen='<img src="imagenes/'+imagen+'" class="iconNoticia">';
					}
					$(noticiasUltimo).append('<li role="presentation" id="lstUltimas"><a href="'+url+'" id="sgtNoticia'+idPost+'">');
					$("#sgtNoticia"+idPost).append('<div class="row" id="entradasRecientes'+idPost+'">');
					$("#entradasRecientes"+idPost).append('<div class="col-xs-2">'+htmlImagen+'</div>');
					$("#entradasRecientes"+idPost).append('<div class="col-xs-8 txtIconNoticia"><span>'+titulo+'</span></div>');
					$("#entradasRecientes"+idPost).append('<div class="col-xs-2 comentIconNoticia"><i class="fa fa-comment-o fa-1"></i><span class="fa-count">1</span></div>');
					$("#sgtNoticia"+idPost).append('</div>');
					$(noticiasUltimo).append('</a></li>');
					contador2=contador2+1;
				}else{
					return true;
				}
			}
		})
		mostrarTresUltimosPost(data);
	}
	function mostrarTresUltimosPost(data)
	{
		var contador3=7;
		$(footerNoticias).html('');
		$.each(data,function(index,value){
			if(index==contador3){
				idPost=value.idPost;
				imagen=value.imagenPortada;
				titulo=value.titulo;
				url=value.url;
				if(imagen =="" || imagen==null){
					htmlImagen='';
				}else{
					htmlImagen='<img src="imagenes/'+imagen+'" class="iconNoticia">';
				}
				$(footerNoticias).append('<li role="presentation" id="footerEntradas"><a href="'+url+'" id="pieNoticia'+idPost+'">');
				$("#pieNoticia"+idPost).append('<div class="row" id="entradasFooter'+idPost+'">');
				$("#entradasFooter"+idPost).append('<div class="col-xs-3">'+htmlImagen+'</div>');
				$("#entradasFooter"+idPost).append('<div class="col-xs-9 txtIconNoticia"><span>'+titulo+'</span></div>');
				$("#pieNoticia"+idPost).append('</div>');
				$(footerNoticias).append('</a></li>');
				contador3=contador3+1;
			}else{
				return true;
			}
		})
	}
	function mostrarCategoriasRight(data)
	{
		$(categoriasRight).html('');
		$.each(data,function(index,value){
			idCategoria=value.idCategoria;
			descripcion=value.categoria;
			url=value.url;
			cPost=value.posts;
			$(categoriasRight).append('<li class="itemCategoria" data-id="'+idCategoria+'"><a class="categoriaTamano" href="'+url+'">'+descripcion+'</a><span class="badge">'+cPost+'</span></li>');
		
		})
	}
	function mostrarCategorias(data)
	{
		$.each(data,function(index,value){
			categoria=value.categoria;
			idCategoria=value.idCategoria;
			posts=value.post;
			contenido=posts[0].contenido;
			idPost=posts[0].idPost;
			imagen=posts[0].imagenPortada;
			titulo=posts[0].titulo;
			url=posts[0].url;
			if(imagen =="" || imagen==null){
				htmlImagen='';
			}else{
				htmlImagen='<figure><img src="imagenes/'+imagen+'" alt="" class="imgPortadaNoticia"></figure>';
			}
			$(postCategoria).append('<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="categoriaPost'+idCategoria+'">');
			$("#categoriaPost"+idCategoria).append('<div id="ultimaNoticiaCategoria'+idCategoria+'" class="elemento ultimaNoticia">');
			$("#ultimaNoticiaCategoria"+idCategoria).append('<h3>'+categoria+'</h3>');
			$("#ultimaNoticiaCategoria"+idCategoria).append('<div class="detalleUltimaNoticia" id="detalleUltimaNoticiaCategoria'+idCategoria+'">');
			$("#detalleUltimaNoticiaCategoria"+idCategoria).append('<a href="'+url+'">'+htmlImagen+'</a>');
			$("#detalleUltimaNoticiaCategoria"+idCategoria).append('<a href="'+url+'"><h4>'+titulo+'</h4></a>');
			$("#detalleUltimaNoticiaCategoria"+idCategoria).append(contenido);
			$("#ultimaNoticiaCategoria"+idCategoria).append('</div>');
			$("#ultimaNoticiaCategoria"+idCategoria).append('<span><a href="'+url+'" class="readMore">Leer más > </a></span>');
			$("#categoriaPost"+idCategoria).append('</div>');
			$(postCategoria).append('</div>');
		});
	}
	this.cargarDetallePost=function()
	{
		seccion=$("#container-change").attr('data-seccion');
		proceso.procesar('getPostId',seccion,retornoDetalle);
	}
	function retornoDetalle(data)
	{
		console.log(data);
		$(dtpost).html('');
		$.each(data, function( index, value ) {
			fecha=value.fecha;
			titulo=value.titulo;
			imagen=value.imagenPost;
			contenido=value.contenido;
			$(dtpost).append('<span class="fecha">'+fecha+'</span>');
			$(dtpost).append('<h3>'+titulo+'</h3>');
			$(dtpost).append('<figure><img src="imagenes/'+imagen+'" alt="Imagen Post" id="imagenPost"></figure>');
			$(dtpost).append(contenido);
		});
	}
	this.cargarPostCategoria=function()
	{
		seccion=$("#container-change").attr('data-seccion');
		proceso.procesar('getPostCategoria',seccion,retornoDetallePostCategoria);
	}
	function retornoDetallePostCategoria(data)
	{
		$(dtPostCat).html('');
		$.each(data, function( index, value ) {
			idPost=value.idPost;
			imagen=value.imagenPortada;
			titulo=value.titulo;
			contenido=value.contenido;
			url=value.url;
			if(imagen =="" || imagen==null){
				htmlImagen='';
			}else{
				htmlImagen='<figure><img src="imagenes/'+imagen+'" alt="" class="imgPortadaNoticia"></figure>';
			}
			$(dtPostCat).append('<div class="div col-lg-4 col-md-4 col-sm-12 col-xs-12" id="itemPost'+idPost+'">');
			$("#itemPost"+idPost).append('<div id="ultimaNoticia'+idPost+'" class="elemento ultimaNoticia">');
			$("#ultimaNoticia"+idPost).append('<div class="detalleUltimaNoticia" id="detalleUltimaNoticia'+idPost+'">');
			$("#detalleUltimaNoticia"+idPost).append(htmlImagen);
			$("#detalleUltimaNoticia"+idPost).append('<h4>'+titulo+'</h4>');
			$("#detalleUltimaNoticia"+idPost).append(contenido);
			$("#ultimaNoticia"+idPost).append('</div>');
			$("#ultimaNoticia"+idPost).append('<span><a href="'+url+'" class="readMore">Leer más &gt; </a></span>');
			$("#itemPost"+idPost).append('</div>');
			$(dtPostCat).append('</div>');
		});
	}
}