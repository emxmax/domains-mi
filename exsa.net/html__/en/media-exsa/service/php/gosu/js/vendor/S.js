function S(){

}
S.data = new Object();
S.disparar = function(evento,elemento){
	if(elemento == null)
		elemento = document;
	var evt = document.createEvent("Event");
	evt.initEvent(evento,true,true); 
	elemento.dispatchEvent(evt);
}
S.getFecha = function(fecha){
	var dia = fecha.getDate();
	var mes = fecha.getMonth();
	var anio = fecha.getFullYear();
	var hora = fecha.getHours();
	mes++;
	if(dia<10)
		dia = "0"+dia;
	if(mes<10)
		mes = "0"+mes;
	return dia+"/"+mes+"/"+anio+" "+hora+":00:00";
}
S.darFormatoNumero = function(num){

  if(num<1){
    return Math.round(num*100)/100;

  }else{
  	var n = Math.floor(num/1000);
    var r;
    if(num%1000/100>1){
      r =  num%1000;
    }else if(num%1000/10>1){
      r = "0"+(num%1000);
    }else{
      r = "00"+(num%1000);
    }
  	
  	if(n>=1){
  		
  		var mill= Math.floor(n/1000);
  		var miles = (n%1000)/100>1? n%1000:"0"+(n%1000);
  		if(mill>=1){  			
  			return Math.floor(mill)+","+miles+","+r;
  		}else{
  			return Math.floor(n)+","+r;
  		}

  	}else{
  		return num;
  	}
  }

}
S.controlTexto = function(elemento,texto,colorIncial,colocorReal,pass){
	elemento.val(texto);
	if(pass)
		elemento.attr({"type":"text"});
	elemento.focus(function(){
		if(elemento.val() == texto){
			elemento.val("");
			elemento.css({"color":colocorReal});
			if(pass)
				elemento.attr({"type":"password"});
		}
	});
	elemento.blur(function(){
		if(elemento.val() == ""){
			elemento.val(texto);
			elemento.css({"color":colorIncial});
			if(pass)
				elemento.attr({"type":"text"});
		}
	});
	elemento.iniciar = function(){
		elemento.val(texto);
		elemento.css({"color":colorIncial});
		if(pass)
			elemento.attr({"type":"text"});
	}
	elemento.escribio = function(){
		if(elemento.val() == "" || elemento.val() == texto){
			return false;
		}
		else
			return true;
	}
}
S.setLocalStorage = function (llave,valor){
	localStorage.setItem(llave, valor);
}
S.getLocalStorage = function (llave){
	return localStorage.getItem(llave);
}
S._GET = function(dato){
	var url = location.href;
	var ar = url.split("#");
	var obj;
	var aa;
	var resul = null;
	for (var i = 1; i < ar.length; i++) {
		obj = ar[i];
		aa = obj.split("=");
		if(aa[0]==dato){
			if(aa[1]){
				resul = aa[1];
			}
		}
	};
	return resul;
}
function trace(){
	if(local){
		for (var i = 0; i < arguments.length; i++) {
			console.log(i+1+" :",arguments[i]);
		};
	}
}
S.colocarVariable = function(dato,valor){
	var urlBase="";
	if(S._GET(dato)!=null){
		var url = location.href;
		var ar = url.split("#");
		var obj;
		var aa;
		var resul = null;
		var pos = null;
		for (var i = 1; i < ar.length; i++) {
			obj = ar[i];
			aa = obj.split("=");
			if(aa[0]==dato){
				if(aa[1] == valor)
					return;
				pos = i;
				break;
			}
		};
		if(pos!=null)
			ar.splice(pos,1);
		ar.splice(0,1);
		if(ar.length>0){
			urlBase = "#"+ar.join("#");
		}
			
	}	
	url =  urlBase+"#"+dato+"="+valor;
	location.href = url;
}
S.agregarDataCombobox = function(idCombobox,array){
	var combo = document.getElementById(idCombobox);
	var dato;
	var texto = "";
	var id;
	var nombre;
	for (var i = 0; i < array.length; i++) {
		dato = array[i];
		id = dato.id;
		nombre = dato.nombre;
		texto += "<option value='"+id+"'>"+nombre+"</option>";
	};
	combo.innerHTML = texto;
}
S.getDia = function (dia){
	var label;
	if(dia == 1)
		label = "domingo";	
	else if(dia == 2)
		label = "Lunes";	
	else if(dia == 3)
		label = "Martes";	
	else if(dia == 4)
		label = "Miercoles";	
	else if(dia == 5)
		label = "Jueves";	
	else if(dia == 6)
		label = "Viernes";	
	else if(dia == 7)
		label = "Sabado";	
	return label;
}
S.incluirJS = function (jsArchivo) {
    var js = document.createElement("script");
    js.type = "text/javascript";
    js.src = jsArchivo;
    document.body.appendChild(js);
    return js;
}

S.leerUrl = function (url,fun){
	var link = url;
	var JSONObject;
	var http_request = new XMLHttpRequest(); 
	http_request.open("GET",link,true); 
	http_request.onreadystatechange = function () 
	{ 
	    if ( http_request.readyState == 4 ){ 
	        if ( http_request.status == 200 ){ 
	        	try{
	        		//console.log(http_request.responseText);
	        		JSONObject = $.evalJSON( http_request.responseText);
	        	}
	            catch(er){
	            	JSONObject = http_request.responseText;
	            }
	            fun(JSONObject);
	        } 
	        else{ 
	         //   alert( "Problemas al leer esta url" ); 
	            fun("error cargando la pagina");
	        } 
	        http_request = null; 
	    } 
	}; 
	http_request.send();
}
S.esCorreo = function(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
S.quitarTildes = function(r){
	r = r.replace(new RegExp("[àáâãäå]", 'g'),"a");
	r = r.replace(new RegExp("æ", 'g'),"ae");
	r = r.replace(new RegExp("ç", 'g'),"c");
	r = r.replace(new RegExp("[èéêë]", 'g'),"e");
	r = r.replace(new RegExp("[ìíîï]", 'g'),"i");
	r = r.replace(new RegExp("ñ", 'g'),"n"); 
	r = r.replace(new RegExp("[òóôõö]", 'g'),"o");
	r = r.replace(new RegExp("œ", 'g'),"oe");
	r = r.replace(new RegExp("[ùúûü]", 'g'),"u");
	r = r.replace(new RegExp("[ýÿ]", 'g'),"y");
	return r;
}
S.limpiarPalabra = function (lbl){
	lbl = lbl.toLowerCase();
	return S.quitarTildes(lbl);
}
S.ordenarArreglo = function(array,asc,campo){
	var aux,i,j;
	if(asc){
		if(campo){
			for ( i = 0; i < array.length-1; i++) {
				array[i];
				for ( j = i+1; j < array.length; j++) {
					if(array[j][campo]<array[i][campo]){
						aux = array[i];		array[i] = array[j];	array[j] = aux;
					}
				};
			};
		}
		else{
			for ( i = 0; i < array.length-1; i++) {
				array[i];
				for ( j = i+1; j < array.length; j++) {
					if(array[j]<array[i]){
						aux = array[i];		array[i] = array[j];	array[j] = aux;
					}
				};
			};
		}
	}
	else{
		if(campo){
			for ( i = 0; i < array.length-1; i++) {
				array[i];
				for ( j = i+1; j < array.length; j++) {
					if(array[j][campo]>array[i][campo]){
						aux = array[i];		array[i] = array[j];	array[j] = aux;
					}
				};
			};
		}
		else{
			for ( i = 0; i < array.length-1; i++) {
				array[i];
				for ( j = i+1; j < array.length; j++) {
					if(array[j]>array[i]){
						aux = array[i];		array[i] = array[j];	array[j] = aux;
					}
				};
			};
		}
	}
}
S.filtrarArreglo = function (array,valor,campo){
	var resul = new Array();
	var obj,comparativo,arPos,arValor,arProvisional,encontro,i,j,k;
	arValor = S.limpiarPalabra(valor);
	arValor = arValor.split(" ");
	while(arValor[arValor.length-1]==""){
		arValor.splice(-1,1);
	}
	if(arValor.length == 0)
		return array;
	if(campo){
		for (i = 0; i < array.length; i++) {
			obj = array[i];
			comparativo = obj[campo];
			comparativo = S.limpiarPalabra(comparativo);
			arPos = comparativo.split(" ");
			encontro = 0;
			arProvisional = arValor.concat(new Array());
			for (j = 0; j < arPos.length; j++) {
				comparativo = arPos[j];				
				for ( k = 0; k < arProvisional.length; k++) {
					valor = arProvisional[k];
					if(comparativo.indexOf(valor) == 0){
						arProvisional.splice(k,1);
						encontro++;
						break;
					}
				};								
			};
			if(encontro >= arValor.length){
				resul.push(obj);
			}			
		};
	}
	else{
		for (i = 0; i < array.length; i++) {
			obj = array[i];
			comparativo = obj;
			comparativo = S.limpiarPalabra(comparativo);
			arPos = comparativo.split(" ");
			encontro = 0;
			arProvisional = arValor.concat(new Array());
			for (j = 0; j < arPos.length; j++) {
				comparativo = arPos[j];				
				for ( k = 0; k < arProvisional.length; k++) {
					valor = arProvisional[k];
					if(comparativo.indexOf(valor) == 0){
						arProvisional.splice(k,1);
						encontro++;
						break;
					}
				};								
			};
			if(encontro >= arValor.length){
				resul.push(obj);
			}		
		};
	}
	return resul;
}
S.utf8_encode = function(argString) {
  if (argString === null || typeof argString === "undefined") {
    return "";
  }

  var string = (argString + ''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
  var utftext = '',
    start, end, stringl = 0;

  start = end = 0;
  stringl = string.length;
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
         (c1 >> 6)        | 192,
        ( c1        & 63) | 128
      );
    } else if (c1 & 0xF800 != 0xD800) {
      enc = String.fromCharCode(
         (c1 >> 12)       | 224,
        ((c1 >> 6)  & 63) | 128,
        ( c1        & 63) | 128
      );
    } else { // surrogate pairs
      if (c1 & 0xFC00 != 0xD800) { throw new RangeError("Unmatched trail surrogate at " + n); }
      var c2 = string.charCodeAt(++n);
      if (c2 & 0xFC00 != 0xDC00) { throw new RangeError("Unmatched lead surrogate at " + (n-1)); }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000;
      enc = String.fromCharCode(
         (c1 >> 18)       | 240,
        ((c1 >> 12) & 63) | 128,
        ((c1 >> 6)  & 63) | 128,
        ( c1        & 63) | 128
      );
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end);
      }
      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl);
  }

  return utftext;
}
S.utf8_decode = function(str_data) {
  var tmp_arr = [],
    i = 0,
    ac = 0,
    c1 = 0,
    c2 = 0,
    c3 = 0,
    c4 = 0;

  str_data += '';

  while (i < str_data.length) {
    c1 = str_data.charCodeAt(i);
    if (c1 <= 191) {
      tmp_arr[ac++] = String.fromCharCode(c1);
      i++;
    } else if (c1 <= 223) {
      c2 = str_data.charCodeAt(i + 1);
      tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
      i += 2;
    } else if (c1 <= 239) {
      // http://en.wikipedia.org/wiki/UTF-8#Codepage_layout
      c2 = str_data.charCodeAt(i + 1);
      c3 = str_data.charCodeAt(i + 2);
      tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
      i += 3;
    } else {
      c2 = str_data.charCodeAt(i + 1);
      c3 = str_data.charCodeAt(i + 2);
      c4 = str_data.charCodeAt(i + 3);
      c1 = ((c1 & 7) << 18) | ((c2 & 63) << 12) | ((c3 & 63) << 6) | (c4 & 63);
      c1 -= 0x10000;
      tmp_arr[ac++] = String.fromCharCode(0xD800 | ((c1>>10) & 0x3FF));
      tmp_arr[ac++] = String.fromCharCode(0xDC00 | (c1 & 0x3FF));
      i += 4;
    }
  }

  return tmp_arr.join('');
}
S.str_replace = function(search, replace, subject, count) {
  	var i = 0,
    j = 0,
    temp = '',
    repl = '',
    sl = 0,
    fl = 0,
    f = [].concat(search),
    r = [].concat(replace),
    s = subject,
    ra = Object.prototype.toString.call(r) === '[object Array]',
    sa = Object.prototype.toString.call(s) === '[object Array]';
  	s = [].concat(s);
  	if (count) {
    	this.window[count] = 0;
  	}

  	for (i = 0, sl = s.length; i < sl; i++) {
    	if (s[i] === '') {
     		continue;
	    }
	    for (j = 0, fl = f.length; j < fl; j++) {
	      	temp = s[i] + '';
	      	repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
	      	s[i] = (temp).split(f[j]).join(repl);
	      	if (count && s[i] !== temp) {
	        	this.window[count] += (temp.length - s[i].length) / f[j].length;
	      	}
	    }
  	}
  return sa ? s : s[0];
}
S.hexToRgb = function(hex){
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}
S.shuffleArray = function (array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}