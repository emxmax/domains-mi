function Search()
{
	var noticiasHome="#pagina";
	this.iniciar=function()
	{
		$("#txtBuscar").on('keypress',buscar);
	}
	function buscar()
	{
		var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13') {
	    	busqueda=$(this).val();
			proceso.procesar('getPostsLike',busqueda,mostrarResultados);
	    }
	}
	function mostrarResultados(data)
	{
		$(noticiasHome).html('');
		$.each(data, function( index, value ) {
			console.log(value)
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
				$("#detalleUltimaNoticia"+idPost).append(htmlImagen);
				$("#detalleUltimaNoticia"+idPost).append('<h4>'+titulo+'</h4>');
				$("#detalleUltimaNoticia"+idPost).append(contenido);
				$("#ultimaNoticia"+idPost).append('</div>');
				$("#ultimaNoticia"+idPost).append('<span><a href="'+url+'" class="readMore">Leer más > </a></span>');
				$("#itemPost"+idPost).append('</div>');
				$(noticiasHome).append('</div>');
		});
	}
}