function MapadeSitio()
{
	this.iniciar=function()
	{
		cargar()
	}
	function cargar()
	{
		proceso.procesar('getMenu','',mostrarMapa);
	}
	function mostrarMapa(data)
	{
		$("#mapaDeSitio").html('');
		menu=data.items;
		$("#mapaDeSitio").append('<ul>');
		$.each(menu, function( index, value ) {
			d1=value.descripcion;
			h1=value.hijos;
			id1=value.idItemMenu;
			url1=value.url;
			indice=index+1;
			$("#mapaDeSitio > ul").append('<li id="itemMap1-'+id1+'"><a href="'+url1+'">'+d1+'</a>');
			if(h1 != null){
				c1=h1.length;
				if(c1>0){
					$("#itemMap1-"+id1).append('<ul>');
					$.each(h1, function( index1, value1 ) {
						d2=value1.descripcion;
						h2=value1.hijos;
						id2=value1.idItemMenu;
						url2=value1.url;
						indice2=index1+1;
						$("#itemMap1-"+id1+" > ul").append('<li id="itemMap2-'+id2+'"><a href="'+url2+'">'+d2+'</a>');	
						if(h2 != null){
							c2=h2.length;
							if(c2>0){
								$("#itemMap2-"+id2).append('<ul>');
								$.each(h2, function( index2, value2 ) {
									d3=value2.descripcion;
									h3=value2.hijos;
									id3=value2.idItemMenu;	
									url3=value2.url;
									$("#itemMap2-"+id2+" > ul").append('<li id="itemMap3-'+id3+'"><a href="'+url3+'">'+d3+'</a>');
									if(h3 != null){
										c3=h3.length;
										if(c3>0){
											$("#itemMap3-"+id3).append('<ul>');
											$.each(h3, function( index3, value3 ) {
												d4=value3.descripcion;
												h4=value3.hijos;
												id4=value3.idItemMenu;	
												url4=value3.url;
												$("#itemMap3-"+id3+" > ul").append('<li id="itemMap4-'+id4+'"><a href="'+url4+'">'+d4+'</a>');
											});
											$("#itemMap3-"+id3).append('</ul>');
										}
									}
									$("#itemMap2-"+id2+" > ul").append('</li>');
								});
								$("#itemMap2-"+id2).append('</ul>');
							}
						}
						$("#itemMap1-"+id1+" > ul").append('</li>');					
					});
					$("#itemMap1-"+id1).append('</ul>');
				}
			}
			$("#mapaDeSitio > ul").append('</li>');
		});
		$("#mapaDeSitio").append('</ul>');
	}
}