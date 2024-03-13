function Pagina()
{
	this.iniciar=function()
	{
		seccion=$("#container-change").attr('data-seccion');
		cargar(seccion);		
	}
	function cargar(seccion)
	{
		proceso.procesar('getContenido',seccion,mostrarSeccion);
	}
	function mostrarSeccion(data)
	{
		section=$("#container-change").attr('data-seccion');
		if(section == 'nosotros'){
			$("#pagina").load('secciones/'+section+'.php');
		}
		if(section == 'contacto'){
			$("#pagina").load('secciones/'+section+'.php');
		}
		if(data.seccion=='categoria'){
			retornoDetallePostCategoria(data.data);
		}
		if(data.seccion=='post'){
			retornoDetalle(data.data);
		}
		/*
		if(seccion=='categoria'){
			
		}else if(seccion=='post'){

		}else{
			
		}
		*/
	}
	function retornoDetallePostCategoria(data)
	{
		$("#pagina").html('');
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
			$("#pagina").append('<div class="div col-lg-4 col-md-4 col-sm-12 col-xs-12" id="itemPost'+idPost+'">');
			$("#itemPost"+idPost).append('<div id="ultimaNoticia'+idPost+'" class="elemento ultimaNoticia">');
			$("#ultimaNoticia"+idPost).append('<div class="detalleUltimaNoticia" id="detalleUltimaNoticia'+idPost+'">');
			$("#detalleUltimaNoticia"+idPost).append(htmlImagen);
			$("#detalleUltimaNoticia"+idPost).append('<h4>'+titulo+'</h4>');
			$("#detalleUltimaNoticia"+idPost).append(contenido);
			$("#ultimaNoticia"+idPost).append('</div>');
			$("#ultimaNoticia"+idPost).append('<span><a href="'+url+'" class="readMore">Leer más &gt; </a></span>');
			$("#itemPost"+idPost).append('</div>');
			$("#pagina").append('</div>');
		});
	}
	function retornoDetalle(data)
	{
		console.log(data);
		$("#pagina").html('');
		$.each(data, function( index, value ) {
			fecha=value.fecha;
			titulo=value.titulo;
			imagen=value.imagenPost;
			contenido=value.contenido;
			$("#pagina").append('<span class="fecha">'+fecha+'</span>');
			$("#pagina").append('<h3>'+titulo+'</h3>');
			$("#pagina").append('<figure><img src="imagenes/'+imagen+'" alt="Imagen Post" id="imagenPost"></figure>');
			$("#pagina").append(contenido);
		});
	}
}