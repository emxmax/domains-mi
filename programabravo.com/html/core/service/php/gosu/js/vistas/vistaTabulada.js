function VistaTabulada(){
	var tabuladoCabecera = $("#tabuladoCabecera");
	var tabuladoCuerpo = $("#tabuladoCuerpo");
	this.mostrarResultado = function(datoConsulta){
		tabuladoCabecera.html("");
		tabuladoCuerpo.html("");
		var texto = datoConsulta;
		tipoVariable = getTipoVariable(datoConsulta);
		var array = datoConsulta;
		if(tipoVariable == "array"){
			array = datoConsulta;
		}
		else if(tipoVariable == "object"){
			array = [];
			array.push(datoConsulta)
		}
		else if(tipoVariable == "number" || tipoVariable == "string" || tipoVariable == "bolean"){
			var obj = {"resultado":datoConsulta};
			array = [];
			array.push(obj);
		}
		else{
			var obj = {"resultado":datoConsulta};
			array = [];
			array.push(obj);
		}
		var i,dato,propiedad;
		
		dato = array[0];
		var fila = $("<tr>");
		var arrayPropiedades = [];
		var valor,tipo;
		for( propiedad in dato) {
			celda = $("<th>");
			celda.html(propiedad);
			fila.append(celda);
			arrayPropiedades.push(propiedad);
		}
		tabuladoCabecera.append(fila);

		for ( i = 0; i < array.length; i++) {
			dato = array[i];
			fila = $("<tr>");
			tabuladoCuerpo.append(fila);
			for ( j = 0; j < arrayPropiedades.length; j++) {
				propiedad = arrayPropiedades[j];
				celda = $("<td>");
				valor = dato[propiedad];
				tipo = getTipoVariable(valor);
				if(tipo == "object"){
					valor = "{object}";
				}
				else if(tipo == "array"){
					valor = "[array]";
				}
				celda.html(valor);

				//console.log("sasa",dato,propiedad,dato[propiedad]);
				fila.append(celda);
			};
		};
	}
}