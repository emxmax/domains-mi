function Menu()
{
	this.iniciar=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getMenu','',mostrarMenu);
	}
	function mostrarMenu(data)
	{
		$("#mainMenu").html('');
		menu=data.items;
		$.each(menu, function( index, value ) {
			d1=value.descripcion;
			h1=value.hijos;
			id1=value.idItemMenu;
			url1=value.url;
			if(h1 != null){
				$("#mainMenu").append('<li class="dropdown" id="it'+id1+'"><a href="'+url1+'" class="dropdown-toggle">'+d1+' <b class="caret"></b></a><ul id="sb'+id1+'" class="dropdown-menu">');
				$.each(h1, function( index1, value1 ) {
					d2=value1.descripcion;
					h2=value1.hijos;
					id2=value1.idItemMenu;
					url2=value1.url;
					if(h2 != null){
						$("#sb"+id1).append('<li class="dropdown" id="it'+id2+'"><a class="dropdown-toggle" href="'+url2+'">'+d2+' <b class="caret right"></b></a><ul id="sb'+id2+'" class="dropdown-menu">');
						$.each(h2, function( index2, value2 ) {
							d3=value2.descripcion;
							h3=value2.hijos;
							id3=value2.idItemMenu;
							url3=value2.url;
							if(h3 != null){
								$("#sb"+id2).append('<li id="it'+id3+'"><a href="'+url3+'">'+d3+'</a></li>');
							}else{
								$("#sb"+id2).append('<li id="it'+id3+'"><a href="'+url3+'">'+d3+'</a></li>');
							}
						});
						$("#sb"+id1).append('</ul></li>');
					}else{
						$("#sb"+id1).append('<li id="it'+id2+'"><a href="'+url2+'">'+d2+'</a></li>');
					}
				});
			}else{
				$("#mainMenu").append('<li id="it'+id1+'"><a href="'+url1+'">'+d1+'</a>');
			}
			$("#mainMenu").append('</ul></li>');
		});
	}
}