function Search()
{
	this.resultados=function()
	{
		busqueda=$("#busqueda").attr('data-id');
		proceso.procesar('getBusquedas',busqueda,mostrarResultados);
	}
	function mostrarResultados(data)
	{
		$("#listadoBusquedas").html('');
		$.each(data, function( index, value ) {
			titulo=value.titulo;
			nombre=value.nombre;
			texto=value.texto.substring(0,540);
			url=value.url;
			var currentURL = window.location.href;
			$("#listadoBusquedas").append('<div class="row itemSearch itemSearch'+index+'">')
			$(".itemSearch"+index).append('<div class="col-sm-12 col">')
			$(".itemSearch"+index+" > .col").append('<h3 class="tituloSearch">'+nombre+'</h3>');
			$(".itemSearch"+index+" > .col").append('<div class="contenidoSearch">'+texto+'</div>');
			$(".itemSearch"+index).append('</div')
			$(".itemSearch"+index).append('<a href="'+url+'"><button class="tbn btnExsa">Leer Más</button></a>');
			$("#listadoBusquedas").append('</div>')
		});
	}
}