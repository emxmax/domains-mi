function ControlApp(){
	this.ctArchivos = new ControlArchivos();
	this.ctFunciones = new ControlFunciones();
	this.ctResultados = new ControlResultados();
	this.altoWindow = 0;
	this.anchoWindow = 0;
	var instance = this;
	$(window).on("resize",acomodarPantallas);
	var btnEnviarMensaje = $("#btnEnviarMensaje");
	btnEnviarMensaje.on("click",verFomulario);
	function verFomulario(){
		new VistaFormulario();
	}
	var inicio = false;
	function acomodarPantallas(){
		if(!inicio){
			$("#preloader").fadeOut("slow",function(){
				//$("body").css("background","#aaa");
				$("#app").fadeIn("slow");
			})
			
		}
		inicio = true;
		var ventana = $(window);
		instance.altoWindow = ventana.height();
		instance.anchoWindow = ventana.width();
		instance.ctArchivos.acomodar();
		instance.ctFunciones.acomodar();
		instance.ctResultados.acomodar();
	}
	setTimeout(acomodarPantallas,200);
}
function mostrarError(seccion,menaje){
	alert("mesanje",menaje);
}
function getTipoVariable(obj) {
  return ({}).toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
}