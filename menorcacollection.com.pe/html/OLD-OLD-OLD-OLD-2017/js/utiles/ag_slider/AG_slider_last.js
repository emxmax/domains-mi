(function($) {
	
	$.AG_slider = function(el, opc) {
		
		var base = this;

		base.$el = $(el).addClass('AG_slider');
		base.$el.data('AG_slider', base); // elemento para acceder a metodos publicos

		base.init = function(){

			base.opc = $.extend({}, $.AG_slider.porDefecto, opc);
			
			base.total = base.opc.numDesplazamiento;
			base.totalElementos = base.$el.find('> li').length;
			
			
			base.$el.find('> li').first().addClass('ini');
   			base.$el.find('> li').last().addClass('fin');
   			
   			base.$el.find('> li.ini').clone().removeAttr('class').appendTo(base.$el);//clone the first image and put it at the end
   			base.$el.find('> li.fin').clone().removeAttr('class').prependTo(base.$el);//clone the last image and put it at the front
   			
   			base.totalElementos=base.totalElementos+parseFloat(2);
			
			
			base.anchoImagen = base.opc.anchoElemento;
			base.desplazamiento = Number(base.total * base.anchoImagen);
			base.totalDesplazamiento = parseFloat(Math.ceil(parseFloat(base.totalElementos / base.total)));
			base.elementosRestantes = Number(base.totalElementos - base.opc.area);
		
			base.contador = parseFloat(0);
			base.datos = new Array();
			base.posicion = parseFloat(0);
			base.movIzq=parseFloat(1);
			base.movDer=parseFloat(1);
			base.delay=parseFloat(0);
			base.moviendo = false;
			
			base.$el.find('> li').filter(function(i) {base.datos[i] = i+1; });
			
			
			
			//if (!$.isFunction($.easing[base.opc.easing])) { base.opc.easing = "swing"; }
			
			base.A_efectos=['jswing','easeInQuad','easeOutQuad','easeInOutQuad','easeInCubic','easeOutCubic','easeInOutCubic','easeInQuart','easeOutQuart','easeInOutQuart','easeInQuint','easeOutQuint','easeInOutQuint','easeInSine','easeOutSine','easeInOutSine','easeInExpo','easeOutExpo','easeInOutExpo','easeInCirc','easeOutCirc','easeInOutCirc','easeInElastic','easeOutElastic','easeInOutElastic','easeInBack','easeOutBack','easeInOutBack','easeInBounce','easeOutBounce','easeInOutBounce'];
		
			//31 efectos
		
			if(base.opc.easing==true) jQuery.easing.def = base.A_efectos[base.opc.efecto];
			
			if(base.totalElementos>1){ 
				base.$el.bind('click',function(){
					base.posicion=$(this).index();
					base.conteoSlide();
				})
			}
			
			if(base.opc.activarPaginacion==true){
				
				for(i=0;i<base.totalDesplazamiento;i++){
					$('<a href="#0'+(i+1)+'"><span> 0'+(i+1)+' </span></a>').appendTo(base.opc.paginador);
				}
				
				if(base.totalDesplazamiento>0){
				
					$(base.opc.paginador).find('a').bind('click',function(e){ 
						e.preventDefault();
						base.contador=$(this).index();
						base.moverSlide();
						
						if (base.contador == 0) {
							base.movIzq=0;
							base.movDer=1;
							if(base.opc.botones==true){
								$(base.opc.botonIzq).addClass(base.opc.botonIzqInactivo);
								$(base.opc.botonDer).removeClass(base.opc.botonDerInactivo);
							}
							
							//alert("izq -> "+contador);
							
						}else if (base.contador==(base.totalDesplazamiento-1)) {
							base.movDer=0;
							base.movIzq=1;
							if(base.opc.botones==true){
								$(base.opc.botonIzq).removeClass(base.opc.botonIzqInactivo);
								$(base.opc.botonDer).addClass(base.opc.botonDerInactivo);
							}
							
							//alert("der -> "+contador);
							
						}else{
						
							base.movIzq=1;
							base.movDer=1;
							
							if(base.opc.botones==true){
								$(base.opc.botonIzq).removeClass(base.opc.botonIzqInactivo);
								$(base.opc.botonDer).removeClass(base.opc.botonDerInactivo);
							}
							
							//alert("ambos -> "+contador);
							
						}
						
						
					})
				
				}
				
				if(base.opc.paginadorCentrado==true){
				
					$('<br />').appendTo(base.opc.paginador);
		
					base.anchoElementoPaginador=$(base.opc.paginador).find('a').width();
					$(base.opc.paginador).css('width',base.anchoElementoPaginador*base.totalDesplazamiento);
				
				}
				
			}
		
			base.aDesplazar = (base.opc.numDesplazamiento == 1) ? base.elementosRestantes: parseFloat(base.totalDesplazamiento) - 1;
			
			if (base.totalElementos > base.opc.area) {
				if(base.opc.botones==true){
					$(base.opc.botonIzq).addClass(base.opc.botonIzqInactivo);
					$(base.opc.botonDer).removeClass(base.opc.botonDerInactivo);
				}
				base.movIzq=0;
				if(base.opc.activarPaginacion==true) $(base.opc.paginador).find('a').eq(base.contador).addClass('activo');
				
			} else {
				if(base.opc.botones==true){
					//$(base.opc.botonIzq).addClass(base.opc.botonIzqInactivo);
					//$(base.opc.botonDer).addClass(base.opc.botonDerInactivo);
					$(base.opc.botonIzq).remove();
					$(base.opc.botonDer).remove();
				}
				base.movDer=0;
				base.movIzq=0;
			}

			if(base.opc.botones==true && base.totalElementos>1){ 
				$(base.opc.botonIzq).bind('click',base.moverIzq);
				$(base.opc.botonDer).bind('click',base.moverDer);
			}
			
			if(base.opc.titulo != '') base.tituloSlide();
			if(base.opc.conteo != '') base.conteoSlide();
			
			if(base.opc.auto==true && base.total==1 && base.totalElementos>1){ 
				$(base.opc.elementoBloqueo).bind('mouseover mouseout',function(o){
					if(o.type=="mouseover") base.desactivarDelay();
					if(o.type=="mouseout"){ 
						base.activarDelay(true);
					}
				})

				base.activarDelay(true);
			}

			if(base.opc.teclado==true) {
			
				$(document).keyup(function (e) {
					if(e.which==37){
						base.moverIzq(true);
					}else if(e.which==39){
						base.moverDer(true);
					}
					
					return false;
				});

			}
			
		}
		
		base.moverIzq = function(){
			//alert('id_nombre_centro -> '+base.contador)
			
			if (base.opc.auto==true) base.activarDelay(false);
			
				
		
			//alert("si");
			//alert('si -> '+ base.contador);
			
			
			
			if(base.movIzq==1) {
				base.contador--;	
				base.movDer=1;
				base.moverSlide();
				if(base.opc.botones==true){
					$(base.opc.botonDer).removeClass(base.opc.botonDerInactivo);
				}
			}
	
			if (base.contador == 0) {
				base.movIzq=0;
				base.movDer=1;
				//base.contador = 0
				if(base.opc.botones==true){
					$(base.opc.botonIzq).addClass(base.opc.botonIzqInactivo);
				}
				
			}
			
			//alert(base.contador);
	
			/*
			if(contador >= 0) {
				moverSlide();
				$(opc.botonDer).css('visibility','visible');
			}else {
				contador = 0;
				$(opc.botonDer).css('visibility','visible');
			}
	*/
			/* if(contador >= 0){
			moverSlide()
			} else {
			contador = totalDesplazamiento-1;
			moverSlide();
			} */
	
			if (base.opc.titulo != '') base.tituloSlide();
			if (base.opc.conteo != '') base.conteoSlide();
		}
		
		base.moverDer = function(){
			
			if (base.opc.auto==true) base.activarDelay(false);
			//alert('id_nombre_centro -> '+contador)
			
			/*
			if(contador >= totalDesplazamiento-1){
				$(this).css('visibility','hidden');
			}*/
	
			//alert('si -> '+ contador);
	
			if(base.movDer==1) {
				base.contador++;
				base.movIzq=1;
				base.moverSlide();
				if(base.opc.botones==true){
					$(base.opc.botonIzq).removeClass(base.opc.botonIzqInactivo);
				}
			}
			
			if (base.aDesplazar == base.contador) {
				base.movDer=0;
				base.movIzq=1;
				if(base.opc.botones==true){
					$(base.opc.botonDer).addClass(base.opc.botonDerInactivo);
				}
				
				//alert(base.contador);
			}
			
			
	
			/*
			if(totalDesplazamiento > contador){
				moverSlide();
				$(opc.botonIzq).css('visibility','visible');
			}else {
				alert('si');
				contador = totalDesplazamiento-1;
				$(opc.botonIzq).css('visibility','visible');
			}*/
	
			/* if(totalDesplazamiento > contador){
			moverSlide()
			} else {
			contador = 0;
			moverSlide();
			} */
	
			if (base.opc.titulo != '') base.tituloSlide();
			if (base.opc.conteo != '') base.conteoSlide();
			
			
		}
		
		
		
		base.tituloSlide = function(){
			$(base.opc.titulo).html(base.datos[base.posicion]);
		}
	
		base.conteoSlide = function() {
			$(base.opc.conteo).html(base.datos[base.posicion] + ' de ' + base.totalElementos);
		}
		
		base.moverSlide = function(){
			
			if(base.opc.mensajeModo2==true){
				$(base.opc.elementoMensajeModo2).hide();
				$(base.opc.elementoMensajeModo2).eq(base.contador).slideDown(1000);
			}
	
			if(base.opc.popup==true){
				var href=base.$el.find('> li').eq(base.contador).attr('title');
				$(base.opc.elementoPopup).attr('href',href);
			}
	
			base.$el.stop('true','true').filter(':not(:animated)').animate(
				{ 	left: -(base.desplazamiento * base.contador)},
				{ 	queue: false, 
				  	duration: base.opc.velocidadSlide, 
				  	//easing: base.A_efectos[0], 
					complete: function(){
					  	if(base.opc.auto==true && base.moviendo==false){ 
							base.activarDelay(true);
						}
					} 
				}
				
			);
			
			if(base.opc.activarPaginacion==true){
				$(base.opc.paginador).find('a').removeAttr('class');
				$(base.opc.paginador).find('a').eq(base.contador).addClass('activo');
			}
		
		}
		
		base.activarDelay = function(moviendo){
			
			if (moviendo !== true) { moviendo = false; }
			
			base.moviendo = moviendo;
			
			if (moviendo){
				base.desactivarDelay();
				base.delay = window.setInterval(function() {
					
					base.contador++;
	
					if(base.movDer==1) {
						base.movIzq=1;
						base.moverSlide();
						if(base.opc.botones==true){
							$(base.opc.botonIzq).removeClass(base.opc.botonIzqInactivo);
						}
					}
			
					if (base.aDesplazar == base.contador) {
			
						base.movIzq=1;
						base.movDer=0;
						
						base.moverSlide();
						
						if(base.opc.botones==true){
							$(base.opc.botonIzq).removeClass(base.opc.botonIzqInactivo);
							$(base.opc.botonDer).addClass(base.opc.botonDerInactivo);
						}
						
					}
					
					if(base.contador>base.aDesplazar){
						base.contador = 0;
						base.moverSlide();
						
						base.movIzq=0;
						base.movDer=1;
						if(base.opc.botones==true){
							$(base.opc.botonIzq).addClass(base.opc.botonIzqInactivo);
							$(base.opc.botonDer).removeClass(base.opc.botonDerInactivo);
						}
					}
					
					
				}, base.opc.temporizador);
			} else {
				base.desactivarDelay();
			}
			
		}
		
		base.desactivarDelay = function(){
			if (base.delay) { window.clearInterval(base.delay); }
		}
		
		/* Publico */
		
		base.obtenerTotalElementos=function(){
			return base.totalElementos;
		}
		
		base.obtenerPosicion=function(){
			return base.posicion;
		}
		
		base.modificarPosicion=function(x){
			base.posicion=x;
		}
		
		base.verPosicion=function(){
			base.conteoSlide();
		}
		
		base.botonIzqSlider=function(){
			if(base.opc.movIzq==1){
				base.opc.moverIzq();
				if (base.opc.movIzq== 0) {
					if(base.opc.botones==true){
						$(base.opc.botonIzq).addClass(base.opc.botonIzqInactivo);
					}
				}
			}
			
		}
		
		base.botonDerSlider=function(){
			if(base.opc.movDer==1){
				base.opc.moverDer();
				if(base.opc.movDer==0){
					if(base.opc.botones==true){
						$(base.opc.botonDer).addClass(base.opc.botonDerInactivo);
					}
				}
			}
			
		}
		
		base.mostrarResumen=function(dato){
			if(base.opc.mensajeModo1==true){
				$(base.opc.elementoMensajeModo1).hide();
				$(base.opc.elementoMensajeModo1).eq(dato).slideDown(1000);
			}
		}

		
		base.init();
		
	}
	
	$.AG_slider.porDefecto = {
		
		numDesplazamiento		: 1,
		anchoElemento			: 100,
		area					: 3,
		botonIzq				: '.btnIzquierdo1',
		botonDer				: '.btnDerecho1',
		botonIzqInactivo		: 'btnIzquierdo1Inactivo',
		botonDerInactivo		: 'btnDerecho1Inactivo',
		botones					:true,
		teclado					:false,
		velocidadSlide			:500,
		easing					:false,
		efecto					:0,
		activarPaginacion		:false,
		paginador				:'.paginacion',
		paginadorCentrado		:true,
		auto					: false,
		elementoBloqueo			:'#ban_bloque',
		temporizador			:3000,
		mensajeModo1			:false,
		elementoMensajeModo1	:'#ban_bloque',
		mensajeModo2			:false,
		elementoMensajeModo2	:'#ban_bloque',
		popup					:false,
		elementoPopup			:'#ban_bloque',
		titulo					: '',
		conteo					: ''
			
	};
	
	$.fn.AG_slider = function(opc) {

		if ((typeof(opc)).match('object|undefined')){
			return this.each(function(i){
				(new $.AG_slider(this, opc));
			});
		}

	};
	
	

})(jQuery);