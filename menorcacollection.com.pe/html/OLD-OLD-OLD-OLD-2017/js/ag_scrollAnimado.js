jQuery.fn.ag_scrollAnimado = function(configuracion) {

	var A_efectos=['jswing','easeInQuad','easeOutQuad','easeInOutQuad','easeInCubic','easeOutCubic','easeInOutCubic','easeInQuart','easeOutQuart','easeInOutQuart','easeInQuint','easeOutQuint','easeInOutQuint','easeInSine','easeOutSine','easeInOutSine','easeInExpo','easeOutExpo','easeInOutExpo','easeInCirc','easeOutCirc','easeInOutCirc','easeInElastic','easeOutElastic','easeInOutElastic','easeInBack','easeOutBack','easeInOutBack','easeInBounce','easeOutBounce','easeInOutBounce'];

 	configuracion = jQuery.extend({
		velocidad : 1100,
		espaciado:200,
		easing:false,
		efecto:0
	}, configuracion);	
	if(configuracion.easing==true) jQuery.easing.def = A_efectos[configuracion.efecto];
	
	return this.each(function(){
		var obj = this;
		$(obj).click(function (event) {	
			event.preventDefault()
			var objTemp = $(obj).attr("rel");
			var destino = $(objTemp).offset().top-configuracion.espaciado;
			
			$("html,body").stop().animate({ scrollTop: destino}, configuracion.velocidad,A_efectos[configuracion.efecto], function() {
				//window.location.hash = objTemp;
			});
		  	return false;
		})
	})
}