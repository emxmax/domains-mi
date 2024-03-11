function U(){

}
U.activaNoticia=1;
U.logeado=0;
U.idCliente=0;
setTimeout(tamanoPrecarga,500);
U.micx=function()
{
      $('#btnIngresar').css("display", 'block');
      $("#txtUser").attr("disabled", false);
      $("#txtClave").attr("disabled", false);
}
U.oicx=function()
{
      $('#btnIngresar').css("display", 'none');
      $("#txtUser").attr("disabled", true);
      $("#txtClave").attr("disabled", true);
}
U.ajustarTamanoPrecarga=function(){
    tamanoPrecarga()
}
function tamanoPrecarga(){
  var Ancho_Documento =$(window).width();
    var Alto_Documento = $(window).height();    
    $("#bloqueo").css("width",Ancho_Documento)
    $("#bloqueo").css("height",Alto_Documento)
    margenSuperior=(Alto_Documento-200)/2
    $("#carga").css('margin-top',margenSuperior)  
}

  U.mostrarPrecarga= function(){ 
    tamanoPrecarga()   
    $("#bloqueo").show()
  }
  U.ocultarPrecarga= function(){
    $("#bloqueo").hide()
  }

U.incluirCSS = function (cssArchivo) {
    var css = document.createElement("link");
    css.type = "text/css";
    css.href = cssArchivo;
    css.rel = "stylesheet";
    document.body.appendChild(css);
    return css;
}
U.incluirJS = function (jsArchivo) {
    var js = document.createElement("script");
    js.type = "text/javascript";
    js.src = jsArchivo;
    document.body.appendChild(js);
    return js;
}
U.paginacion=function(){
  
      entero=parseInt(U.cantidadRegistros)/2
      decimal=U.cantidadRegistros%2
      if(decimal==0){
        entero=entero
      }else{
        entero=parseInt(entero)+1
      }
      $("#"+U.nombreCombo).html('')

        for(i=0;i<entero;i++){
          x=i+1
          $("#"+U.nombreCombo).append('<option value="'+x+'">'+x+'</option>')
        } 
      /*$("#"+U.nombreCombo).change(function(){
        alert(this.value)
      }*/
}

U.disparar = function(evento,elemento){
  if(elemento == null)
    elemento = document;
  var evt = document.createEvent("Event");
  evt.initEvent(evento,true,true); 
  elemento.dispatchEvent(evt);
}

U.limpiar=function(){
  $(":input").val('');
  $("#respuestasDetalleCuestionario img").attr('src','')
  $("#respuestasDetalleCuestionario label").text('')
  $("#detail-question-2 img").attr('src','')  
  //$("#selectLocalClienteAdm").html('');
}

U.replaceAll = function( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
      text = text.toString().replace(busca,reemplaza);
  return text;
}
U.api = function(){
    var url = "service/api.php";
    var variable;
    var obj = new Object();
    obj.f = arguments[0];
    obj.a = new Array();
  obj.o = "";
    for (var i = 1; i < arguments.length; i++) {
        variable = arguments[i];
        obj.a.push(variable);
    };
    var texto = JSON.stringify(obj);
  //console.log(url+"?data="+texto)
    return url+"?data="+texto;
}

U.apiObj = function(funcion,objeto){
  var url = "https://exsa.net/admin/service/api.php";
  var obj = new Object();
  obj.f = funcion;
  obj.o = objeto;
  obj.a = "";

  var texto = JSON.stringify(obj);
  //console.log(texto+"devuelto");
  return url+"?data="+texto;
}

U.apiObjPost = function(funcion){
  //var url = "admin/service/apipost.php";
  var url = "https://www.mediaimpact.pe/demo/exsa/admin/service/apipost.php";
  //var url = "https://logistikcourier.com.pe/logiService/service/apipost.php";
  //var url = "https://scdsistemas.com/proyectos/logistik/logiService/service/apipost.php";
  var obj = new Object();
  obj.f = funcion;
  obj.a = "";

  var texto = JSON.stringify(obj);
  //alert(texto+"devuelto");
  return url+"?data="+texto;
}


U.darFormatoNumero = function(num){

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
U.getDia = function(d){
  if(d=="1") return "Lunes";
  if(d=="2") return "Martes";
  if(d=="3") return "Miércoles";
  if(d=="4") return "Jueves";
  if(d=="5") return "Viernes";
  if(d=="6") return "Sábado";
  if(d=="7") return "Domingo";
}
U.getMes = function(d){
  if(d=="1") return "Enero";
  if(d=="2") return "Febrero";
  if(d=="3") return "Marzo";
  if(d=="4") return "Abril";
  if(d=="5") return "Mayo";
  if(d=="6") return "Junio";
  if(d=="7") return "Julio";
  if(d=="8") return "Agosto";
  if(d=="9") return "Setiembre";
  if(d=="10") return "Octubre";
  if(d=="11") return "Noviembre";
  if(d=="12") return "Diciembre";
}

U.getHorasPub = function(h,m,s){
  if(h<10){
    h="0"+h;
  }
  if(m<10){
    m="0"+m;
  }


  if(h==1) return " a la "+h+":"+m+" am";
  if(h<12) return " a las "+h+":"+m+" am";
  if(h==13) return " a la "+h+":"+m+" pm";
  if(h>12) return " a las "+parseInt(h-12)+":"+m+" pm";
  if(h==12) return " a las 12:"+m+" pm";

}
U.getHora = function(h){
  if(h<12) return "entre las " + parseInt(h) + ":00 y "+ parseInt(parseInt(h)+1) + ":00 am";
  if(h==12) return "entre las 12:00 y la 1:00pm";
  if(h>12) return "entre las " + parseInt(h-12) + ":00 y "+ parseInt(h-11) + ":00 pm";
}

U.normalize = function(str) {

  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç",
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
   
  var ret = [];
  for( var i = 0, j = str.length; i < j; i++ ) {
      var c = str.charAt( i );
      if( mapping.hasOwnProperty( str.charAt( i ) ) )
          ret.push( mapping[ c ] );
      else
          ret.push( c );
  }
  return ret.join( '' ); 
}


U.utf8_decode = function (str_data) {
  // https://kevin.vanzonneveld.net
  // +   original by: Webtoolkit.info (https://www.webtoolkit.info/)
  // +      input by: Aman Gupta
  // +   improved by: Kevin van Zonneveld (https://kevin.vanzonneveld.net)
  // +   improved by: Norman "zEh" Fuchs
  // +   bugfixed by: hitwork
  // +   bugfixed by: Onno Marsman
  // +      input by: Brett Zamir (https://brett-zamir.me)
  // +   bugfixed by: Kevin van Zonneveld (https://kevin.vanzonneveld.net)
  // +   bugfixed by: kirilloid
  // *     example 1: utf8_decode('Kevin van Zonneveld');
  // *     returns 1: 'Kevin van Zonneveld'

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
      // https://en.wikipedia.org/wiki/UTF-8#Codepage_layout
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

U.utf8_encode = function (argString) {
  // https://kevin.vanzonneveld.net
  // +   original by: Webtoolkit.info (https://www.webtoolkit.info/)
  // +   improved by: Kevin van Zonneveld (https://kevin.vanzonneveld.net)
  // +   improved by: sowberry
  // +    tweaked by: Jack
  // +   bugfixed by: Onno Marsman
  // +   improved by: Yves Sucaet
  // +   bugfixed by: Onno Marsman
  // +   bugfixed by: Ulrich
  // +   bugfixed by: Rafal Kukawski
  // +   improved by: kirilloid
  // +   bugfixed by: kirilloid
  // *     example 1: utf8_encode('Kevin van Zonneveld');
  // *     returns 1: 'Kevin van Zonneveld'

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

U.esCorreo = function (email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
U.esNumero = function(numero){
  var array = new Array("0123456789");
  var i;
  for ( i = 0; i < numero.length; i++) {
    letra = numero.substr(i,1);
    if(isNaN( parseInt(letra)) ){
      return false;
    }     
  };
  return true;
}
