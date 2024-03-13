var root = {
	inicio1:{
		$opciones: $('#proyectos1 .opciones ul').find('li'),
		eventos:function(){
			var _self = this;

			_self.$opciones.filter(function(){
				var $li = $(this);
				
				$li.not('.activo').on('mouseenter',function(e){
					$(this).find('img').stop(false,false).animate(
			    		{
				    		top: -10,
	        				left: -20,
					        width: 205,
					        height: 170
				    	},200,"easeInBack", function() {
				    		$(this).parent('li').find('img.normal').hide();
						}
				    	
				    );
				});
				$li.not('.activo').on('mouseleave',function(e){
					$(this).find('img').stop(false,false).animate(
			    		{
				    		top: 0,
	        				left: 0,
					        width: 160,
					        height: 132
				    	},200,"easeOutBack", function() {
						  	$(this).parent('li').find('img.normal').show();
						}
				    );
				});
			});
		},
		habilitar:function(pos){
			var _self = this;

			_self.$opciones.eq(pos).find('img').stop(false,false).animate({top: -10,
        				left: -20,
				        width: 205,
				        height: 170},200,"easeOutBack");

			_self.$opciones.eq(pos).find('img.normal').hide();

		},
		deshabilitar:function(pos){
			var _self = this;

			_self.$opciones.removeAttr('class');
			_self.$opciones.off('mouseenter');
			_self.$opciones.off('mouseleave');
			
			_self.$opciones.eq(pos).addClass('activo');

			_self.$opciones.not('.activo').find('img').stop(false,false).animate({top: 0,
        				left: 0,
				        width: 160,
				        height: 132},200,"easeOutBack");

			_self.$opciones.not('.activo').find('img.normal').show();

		},
		tabs:function($dato){
			var _self = this;

			_self.$opciones.filter(function(i){
				var $li = $(this);

				$li.on('click',{pos: i},function(e){

					$dato.data('ag_slider').mover(e.data.pos);

					_self.deshabilitar(e.data.pos);

					_self.eventos();
				});

				_self.eventos();
			});


		},
		plugins:function(){
			var _self = this;

			$('#banner_principal ul').cycle({ 
			    fx:     'fade', 
			    speed:  1000, 
			    timeout: 3000, 
			    cleartypeNoBg:true,
			    pause:   1 ,
			    next:   '.web_cabecera .bloque .btnDer', 
			    prev:   '.web_cabecera .bloque .btnIzq' 
			});

			$('#testimoniales .listado ul').cycle({ 
			    fx:     'scrollVert', 
			    speed:  1000, 
			    timeout: 3000, 
			    cleartypeNoBg:true,
			    pause:   1,
			    next:   '#testimoniales .paginador .btnArriba',
    			prev:   '#testimoniales .paginador .btnAbajo'
			});

			var dato1 = $('#proyectos1 .listado ul').ag_slider({
				numDesplazamiento:1,
				anchoElemento:960,
				area:1,
				velocidadSlide:500,
				easing:true,
				efecto:12,
				botonIzq:'#proyectos1 .btnIzq',
				botonDer:'#proyectos1 .btnDer',
				botonIzqInactivo:'btnIzqInactivo',
				botonDerInactivo:'btnDerInactivo',
				botones:false,
				objeto: root,
				auto:false,
				temporizador:5000,
				elementoBloqueo:'#proyectos1 .listado ul'
			});

			_self.tabs(dato1);

			var dato2 = $('#proyectos1 .opciones ul').ag_slider({
				numDesplazamiento:1,
				anchoElemento:235,
				area:4,
				velocidadSlide:500,
				easing:true,
				efecto:12,
				botonIzq:'#proyectos1 .btnIzq',
				botonDer:'#proyectos1 .btnDer',
				botonIzqInactivo:'btnIzqInactivo',
				botonDerInactivo:'btnDerInactivo',
				botones:true,
				//objeto: root,
				auto:false,
				temporizador:5000,
				elementoBloqueo:'#proyectos1 .opciones ul'
			});

			var dato3 = $('#proyectos2 .listado ul').ag_slider({
				numDesplazamiento:1,
				anchoElemento:220,
				area:2,
				velocidadSlide:200,
				easing:true,
				efecto:12,
				botonIzq:'#proyectos2 .btnIzq',
				botonDer:'#proyectos2 .btnDer',
				botonIzqInactivo:'btnIzqInactivo',
				botonDerInactivo:'btnDerInactivo',
				botones:true,
				auto:true,
				temporizador:3000,
				elementoBloqueo:'#proyectos2 .listado ul'
			});
		}
	},
	inicio2:{
		plugins:function(){
			var dato2 = $('#proyectos2 .listado ul').ag_slider({
				numDesplazamiento:1,
				anchoElemento:220,
				area:2,
				velocidadSlide:500,
				easing:true,
				efecto:12,
				botonIzq:'#proyectos2 .btnIzq',
				botonDer:'#proyectos2 .btnDer',
				botonIzqInactivo:'btnIzqInactivo',
				botonDerInactivo:'btnDerInactivo',
				botones:true,
				auto:false,
				temporizador:5000,
				elementoBloqueo:'#proyectos2 .listado ul'
			});

			$("#frm_form").validationEngine(
	            {promptPosition : "topRight", scroll: false,autoHidePrompt: true,autoHideDelay: 4000}
	        );
	        $("#frm_form").find('label').inFieldLabels({fadeOpacity: 0.2});
		}
	},
	inicio3:{
		plugins:function(){
			var dato2 = $('#proyectos2 .listado ul').ag_slider({
				numDesplazamiento:1,
				anchoElemento:220,
				area:2,
				velocidadSlide:500,
				easing:true,
				efecto:12,
				botonIzq:'#proyectos2 .btnIzq',
				botonDer:'#proyectos2 .btnDer',
				botonIzqInactivo:'btnIzqInactivo',
				botonDerInactivo:'btnDerInactivo',
				botones:true,
				auto:false,
				temporizador:5000,
				elementoBloqueo:'#proyectos2 .listado ul'
			});
			
			$("#frm_form").validationEngine(
	            {promptPosition : "topRight", scroll: false,autoHidePrompt: true,autoHideDelay: 4000}
	        );
			$(".boton").ag_scrollAnimado({velocidad: 1000,espaciado:0,easing:true,efecto:6});
			$("#frm_form").find('label').inFieldLabels({fadeOpacity: 0.2});
			Shadowbox.init();
		}
	},
	inicio4:{
		$areas: $('#testimonios map').find('area'),
		$opciones: $('#opciones').find('.opcion'),
		$mapa: $('#mapa_testimonio'),
		testimonios:function(){
			var _self = this;

			_self.$areas.each(function() {
				var $this = $(this);
		        var datos = $this.data('maphilight') || {};

		        datos.alwaysOn = !_self.$areas.eq(0).is($this);
		        datos.neverOn = _self.$areas.eq(0).is($this);

		        $this.data('maphilight', datos ).trigger('alwaysOn.maphilight');
		    });

			_self.$areas.filter(function(i){
				var $area = $(this);

				$area.on('click',{pos:i},function(e){

					e.preventDefault();

					var $elemento = $(this);

					_self.$areas.each(function() {
						var $this = $(this);
				        var dato = $this.data('maphilight') || {};

				        dato.alwaysOn = !$this.is($elemento);
				        dato.neverOn = $this.is($elemento);

				        $this.data('maphilight', dato ).trigger('alwaysOn.maphilight');

				    });

					_self.$opciones.hide();
					_self.$opciones.eq(e.data.pos).fadeIn();

					return false;

				});

			});
		},
		plugins:function(){
			var _self = this;

			_self.$mapa.maphilight({ stroke: false, fillColor: '00973c', fillOpacity: 0.5, fade: true });
			_self.testimonios();

		}
	}
}