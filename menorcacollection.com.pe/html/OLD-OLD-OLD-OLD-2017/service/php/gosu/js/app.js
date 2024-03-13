if(production == 0){
	var array = [
				//vendor				
				"js/vendor/service.js",


				//controles
				"js/ct/controlArchivos.js",
				"js/ct/controlFunciones.js",
				"js/ct/controlResultados.js",
				"js/ct/controlApp.js",

				//ventanas
				"js/ventanas/bloquearPantalla.js",
				"js/ventanas/popUpApp.js",


				//vistas
				"js/vistas/vistaInformacion.js",
				"js/vistas/vistaFormulario.js",
				"js/vistas/vistaResultado.js",
				"js/vistas/vistaJSON.js",
				"js/vistas/vistaTabulada.js"
				
				];
	var link,i,elemento;
	var cargadas = 0;
	
	function cargarScript(){
		link = array[cargadas];
		elemento = S.incluirJS(link);
		$(elemento).on("load",function(){
			cargadas++;
			if(cargadas == array.length){
				inisciarApp();
			}
			else{
				cargarScript();
			}
		});
		$(elemento).on("faild",function(){
			
		})
	}
	cargarScript();
}
else{
	$(window).on("load",inisciarApp);
}
var datosApp; 
var controlApp;
function inisciarApp(){
	controlApp = new ControlApp();
}

