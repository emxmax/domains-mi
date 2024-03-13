function VistaResultado(){
	var contenedor = $("#resultado");
	
	this.mostrarResultado = function(datoConsulta){
		var lista = $("#graficoResultado");
		lista.html("");
		var texto = getEstructura(datoConsulta);
		
		
		lista.append(texto);
		//contenedor.append(lista);
		lista.find(".llave").on("click",function(){
			console.log("sdsd",this)
			var elemento = $(this);
			var invisile = elemento.data("invisile");
			var estructura = $(elemento.parent().find("ul")[0]);
			if(invisile){
				estructura.show();
				invisile = false;
			}
			else{
				estructura.hide();
				invisile = true;
			}
			elemento.data("invisile",invisile);
		});
	}
	function getEstruturaArray(array){
		var lista = $("<ul>");
		var llave = $("<label class='llave arreglo'>");
		llave.html("[");
		lista.append(llave);
		var i,dato,elemento;
		var liston = $("<ul>")
		for ( i = 0; i < array.length; i++) {
			dato = array[i];			
			elemento = getEstructura(dato);

			liston.append(elemento);
		};
		lista.append(liston);
		llave = $("<label class='arreglo'>");
		llave.html("]");
		lista.append(llave);
		return lista;
	}
	function getEstructuraObjecto(dato){
		var lista = $("<ul>");
		
		var llave = $("<label class='llave objecto'>");
		llave.html("{");
		lista.append(llave);

		var i,elemento;
		var liston = $("<ul>")
		for(propiedad in dato){
			elemento = $("<li>");
			elemento.html( propiedad +":" );
			valor = getEstructura(dato[propiedad]);
			elemento.append(valor);
			//console.log("objecto ",dato,propiedad,valor[0]);
			liston.append(elemento);
		}
		lista.append(liston);
		llave = $("<label class='objecto'>");
		llave.html("}");
		lista.append(llave);
		return lista;
	}
	function getEstruturaSimple(texto){
		return texto;
	}
	function getNumero(texto){
		return texto;
	}
	function getString(texto){
		return '"'+texto+'"';
	}
	function getBoolear(texto){
		return texto?1:0;
	}
	function getEstructuraNull(){
		return "null";
	}
	function getEstructura(dato){
		var tipoVariable = getTipoVariable(dato);
		var estructura;
		
		if(tipoVariable == "array"){
			estructura = getEstruturaArray(dato);
		}
		else if(tipoVariable == "object"){
			estructura = getEstructuraObjecto(dato);
		}
		else if(tipoVariable == "number" ){
			estructura = getNumero(dato);
		}
		else if(tipoVariable == "string"){
			estructura = getString(dato);
		}
		else if(tipoVariable == "boolean"){
			estructura = getBoolear(dato);
		}
		else if(tipoVariable == "null"){
			estructura = getEstructuraNull();
		}
		else{
			estructura = getEstruturaSimple(dato);
		}
		return estructura;
	}
}