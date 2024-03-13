var root = {
	inicio1:{
		plugins:function(){
			$('#banner_principal ul').cycle({ 
			    fx:     'fade', 
			    speed:  1000, 
			    timeout: 3000, 
			    pause:   1 ,
			    next:   '.web_cabecera .bloque .btnDer', 
			    prev:   '.web_cabecera .bloque .btnIzq' 
			});
		}
	},
	inicio2:{
		plugins:function(){
			$("#frm_form").validationEngine(
	            {promptPosition : "topRight", scroll: false,autoHidePrompt: true,autoHideDelay: 4000}
	        );
	        $("#frm_form").find('label').inFieldLabels({fadeOpacity: 0.2});
		}
	},
	inicio3:{
		plugins:function(){
			$("#frm_form").validationEngine(
	            {promptPosition : "topRight", scroll: false,autoHidePrompt: true,autoHideDelay: 4000}
	        );
			$(".boton").ag_scrollAnimado({velocidad: 1000,espaciado:0,easing:true,efecto:6});
			$("#frm_form").find('label').inFieldLabels({fadeOpacity: 0.2});
			Shadowbox.init();
		}
	}
}