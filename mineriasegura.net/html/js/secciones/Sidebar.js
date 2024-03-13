function Sidebar()
{
	this.iniciar=function()
	{
		cargar();
	}
	function cargar()
	{
		proceso.procesar('getMenu','',mostrarSide);
	}
	function mostrarSide(data)
	{
		seccion=helper.url2("sec");
		//seccion=helper.url1();
		$("#list-group").html('');
		menu=data.items;
		$.each(menu, function( index, value ) {
			d1=value.descripcion;
			h1=value.hijos;
			id1=value.idItemMenu;
			url1=value.url;
			guiaLink1=value.guiaLink;
			path1='<li><a href="index.php">Exsa</a></li><li class="active">'+d1+'</li>';
			compara1=guiaLink1;
			if(seccion==compara1){
				$("#breadcrumb").html('');
				$("#breadcrumb").html(path1);
			}
			indice=index+1;
			if(h1 != null){
				c1=h1.length;
				if(c1>0){
					//bd1='<span class="badge badge-default">'+c1+'</span>';
					bd1='';
					if(seccion==compara1){
						$("#list-group").append('<button data-toggle="collapse" href="#collapse'+indice+'" type="button" class="list-group-item exp btnLvl1">'+d1+bd1+'</button>');				
						$("#list-group").append('<div id="collapse'+indice+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+indice+'"><div class="panel-body"><div class="list-group" id="lvl1'+indice+'">');
					}else{
						$("#list-group").append('<button data-toggle="collapse" href="#collapse'+indice+'" type="button" class="list-group-item noexp btnLvl1">'+d1+bd1+'</button>');				
						$("#list-group").append('<div id="collapse'+indice+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+indice+'"><div class="panel-body"><div class="list-group" id="lvl1'+indice+'">');
					}			
					//$("#list-group").append('<button data-toggle="collapse" href="#collapse'+indice+'" type="button" class="list-group-item noexp btnLvl1">'+d1+bd1+'</button>');				
					//$("#list-group").append('<div id="collapse'+indice+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+indice+'"><div class="panel-body"><div class="list-group" id="lvl1'+indice+'">');		
					$.each(h1, function( index1, value1 ) {
						d2=value1.descripcion;
						h2=value1.hijos;
						id2=value1.idItemMenu;
						url2=value1.url;
						guiaLink2=value1.guiaLink;
						path2='<li><a href="index.php">Exsa</a></li><li><a href="'+url1+'">'+d1+'</a></li><li class="active">'+d2+'</li>';
						compara2=guiaLink2;
						if(seccion==compara2){
							$("#breadcrumb").html('');
							$("#breadcrumb").html(path2);
						}								
						indice2=index1+1;
						if(h2 != null){
							c2=h2.length;
							if(c2>0){
								//bd2='<span class="badge badge-primary">'+c2+'</span>';
								bd2='';
								if(seccion==compara2){
									$("#lvl1"+indice).append('<button data-toggle="collapse" href="#collapse'+indice+indice2+'" type="button" class="list-group-item exp">'+d2+bd2+'</button>');
									$("#lvl1"+indice).append('<div id="collapse'+indice+indice2+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+indice+indice2+'"><div class="panel-body"><div class="list-group" id="lvl2'+indice+indice2+'">')
								}else{
									$("#lvl1"+indice).append('<button data-toggle="collapse" href="#collapse'+indice+indice2+'" type="button" class="list-group-item noexp">'+d2+bd2+'</button>');
									$("#lvl1"+indice).append('<div id="collapse'+indice+indice2+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+indice+indice2+'"><div class="panel-body"><div class="list-group" id="lvl2'+indice+indice2+'">')
								}			
								//$("#lvl1"+indice).append('<button data-toggle="collapse" href="#collapse'+indice+indice2+'" type="button" class="list-group-item noexp">'+d2+bd2+'</button>');
								//$("#lvl1"+indice).append('<div id="collapse'+indice+indice2+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+indice+indice2+'"><div class="panel-body"><div class="list-group" id="lvl2'+indice+indice2+'">')						
								$.each(h2, function( index2, value2 ) {
									d3=value2.descripcion;
									h3=value2.hijos;
									id3=value2.idItemMenu;	
									url3=value2.url;
									guiaLink3=value2.guiaLink;
									path3='<li><a href="index.php">Exsa</a></li><li><a href="'+url1+'">'+d1+'</a></li><li><a href="'+url2+'">'+d2+'</a></li><li class="active">'+d3+'</li>';			
									compara3=guiaLink3;
									if(seccion==compara3){
										$("#breadcrumb").html('');
										$("#breadcrumb").html(path3);
									}
									if(h3 != null){
										c3=h3.length;
										indice3=index2+1;
										if(c3>0){
											//bd3='<span class="badge badge-success">'+c3+'</span>';	
											bd3='';							
											$("#lvl2"+indice+indice2).append('<button data-toggle="collapse" href="#collapse'+indice+indice2+indice3+'" type="button" class="list-group-item noexp">'+d3+bd3+'</button>');
											$("#lvl2"+indice+indice2).append('<div id="collapse'+indice+indice2+indice3+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+indice+indice2+indice3+'"><div class="panel-body"><div class="list-group" id="lvl3'+indice+indice2+indice3+'">')
											$.each(h3, function( index3, value3 ) {
												d4=value3.descripcion;
												h4=value3.hijos;
												id4=value3.idItemMenu;
												url4=value3.url;
												guiaLink4=value3.guiaLink;
												path4='<li><a href="index.php">Exsa</a></li><li><a href="'+url1+'">'+d1+'</a></li><li><a href="'+url2+'">'+d2+'</a></li><li><a href="'+url3+'">'+d3+'</a></li><li class="active">'+d4+'</li>';
												compara4=guiaLink4;
												//console.log(compara4+"---"+seccion)
												/*if(seccion==compara4){
													$("#breadcrumb").html('');
													$("#breadcrumb").html(path4);
												}*/
												if(seccion==compara4){
													$("#breadcrumb").html('');
													$("#breadcrumb").html(path4);

													$("#collapse"+indice).addClass('in');
													$(".list-group-item[href='#collapse"+indice+"']").removeClass('noexp');
													$(".list-group-item[href='#collapse"+indice+"']").addClass('exp');

													$("#collapse"+indice+indice2).addClass('in');
													$(".list-group-item[href='#collapse"+indice+indice2+"']").removeClass('noexp');
													$(".list-group-item[href='#collapse"+indice+indice2+"']").addClass('exp');

													$("#collapse"+indice+indice2+indice3).addClass('in');
													$(".list-group-item[href='#collapse"+indice+indice2+indice3+"']").removeClass('noexp');
													$(".list-group-item[href='#collapse"+indice+indice2+indice3+"']").addClass('exp');

												}
												if(h4 != undefined){

												}else{
													$("#lvl3"+indice+indice2+indice3).append('<button type="button" class="list-group-item noexp lgia"><a href="'+url4+'">'+d4+'</a></button>');
												}										
											});
											$("#lvl2"+indice+indice2).append('</div></div></div>');
										}else{
											bd3='';
											$("#lvl2"+indice+indice2).append('<button type="button" class="list-group-item noexp lgia"><a href="'+url3+'">'+d3+bd3+'</a></button>');
										}
									}else{
										bd3='';
										if(seccion==compara3){
											$("#collapse"+indice).addClass('in');
											$(".list-group-item[href='#collapse"+indice+"']").removeClass('noexp');
											$(".list-group-item[href='#collapse"+indice+"']").addClass('exp');

											$("#collapse"+indice+indice2).addClass('in');
											$(".list-group-item[href='#collapse"+indice+indice2+"']").removeClass('noexp');
											$(".list-group-item[href='#collapse"+indice+indice2+"']").addClass('exp');
										}
										$("#lvl2"+indice+indice2).append('<button type="button" class="list-group-item noexp lgia"><a href="'+url3+'">'+d3+bd3+'</a></button>');
									}
								});
								$("#lvl1"+indice).append('</div></div></div>');
							}else{
								bd2='';
								$("#lvl1"+indice).append('<button type="button" class="list-group-item noexp lgia"><a href="'+url2+'">'+d2+bd2+'</a></button>');	
							}
						}else{
							bd2='';
							if(seccion==compara2){
								$("#collapse"+indice).addClass('in');
								$(".btnLvl1[href='#collapse"+indice+"']").removeClass('noexp')
								$(".btnLvl1[href='#collapse"+indice+"']").addClass('exp')
							}
							$("#lvl1"+indice).append('<button type="button" class="list-group-item noexp lgia"><a href="'+url2+'">'+d2+bd2+'</a></button>');							
						}
					});
					$("#list-group").append('</div></div></div>');
				}else{
					bd1='';
					$("#list-group").append('<button type="button" class="list-group-item noexp lgia"><a href="'+url1+'">'+d1+bd1+'</a></button>');
				}
			}				
		});
	
	$(".btnLvl1").on('click',clickPrimero);
	$(".noexp").on('click',expandir);
	}
	function expandir()
	{
		$(this).removeClass('noexp');
		$(this).addClass('exp');
		$(".exp").on('click',contraer);
	}
	function contraer()
	{
		$(this).removeClass('exp');
		$(this).addClass('noexp');
	}
	function clickPrimero()
	{
		$(".list-group-item").removeClass('exp');
		$(".list-group-item").addClass('noexp');
		$(".list-group-item").attr('aria-expanded',false);
		$(".list-group-item").addClass('collapsed');
		$(".panel-collapse").removeClass('in');
		$(this).addClass('exp');
		$(".noexp").on('click',expandir);
	}
}