if (typeof (hide_alert) != 'boolean') hide_alert = false;
if (typeof (campo_requerido)!='string') campo_requerido = "campo requerido";
if (typeof (email_invalido) != 'string') email_invalido = "el email no es v\xE1lido";
if (typeof (ingrese_numeros) != 'string') ingrese_numeros = "ingrese s\xF3lo n\xFAmeros";
if (typeof (ingrese_fecha) != 'string') ingrese_fecha = "fecha no v\xE1lida";
if (typeof (ingrese_ruc) != 'string') ingrese_ruc = "RUC no v\xE1lido";

function validateEmail(value) {
    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return pattern.test(value);
}
function validateNumber(value) {
    var pattern = /^[-+]?\d*$/; //numeros ex. 0001
    return pattern.test(value);
}
function validateDecimal(value){
    var pattern = /^(\d*\.)?\d*$/; //decimales ex. 1.74
    return pattern.test(value);
}
function validateIP(value){
    var pattern = /^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/; //IPv4 ex. 200.25.190.38
    return pattern.test(value);
}
function validateDate(value){
    var pattern = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g; //Fecha ex. 05/10/2012
    return pattern.test(value);
}
function validatePhone(value) {
    var pattern = /^[0-9\-]*$/; //numeros ex. 1052-2212-55-565
    return pattern.test(value);
}
function validateRUC(value){
if(value.length == 0) return true;
if(value.length != 11) return false;

var size=(value.substring(0, 1)*5)+(value.substring(1, 2)*4)+(value.substring(2, 3)*3)+(value.substring(3, 4)*2)+(value.substring(4, 5)*7)+(value.substring(5, 6)*6)+(value.substring(6, 7)*5)+(value.substring(7, 8)*4)+(value.substring(8, 9)*3)+(value.substring(9, 10)*2);
var rest=11-(size%11);
var digk=(rest==11)?1:((rest==10)?0:rest);
var last=value.substring(10, 11);

return digk==last;
}
function valRequired(input) {
    $(input).parent().removeClass("inputErr");
    if(!hide_alert) $('#' + $(input).attr('id') + '_err').remove();

    attr = $(input).attr('class').split(" ");
    valid = true;
    $.each(attr, function(i, type) {
        if (!valid) return false;
        err = "";
        switch (type) {
            case "required":
                if ($(input).val() == "") {
                    err = campo_requerido;
                    valid = false; break;
                }
                break;
            case "email":
                if ($(input).val() != "" && !validateEmail($(input).val())) {
                    err = email_invalido;
                    valid = false; break;
                }
                break;
            case "numeric":
                if (!validateNumber($(input).val())) {
                    err = ingrese_numeros;
                    valid = false; break;
                }
                break;
            case "decimal":
                if (!validateDecimal($(input).val())) {
                    err = ingrese_numeros;
                    valid = false; break;
                }
                break;
            case "date":
                if (!validateDate($(input).val())) {
                    err = ingrese_fecha;
                    valid = false; break;
                }
                break;
            case "ip":
                if ($(input).val() != "" && !validateIP($(input).val())) {
                    err = ingrese_numeros+' ej. 200.25.190.38';
                    valid = false; break;
                }
                break;
            case "phone":
                if (!validatePhone($(input).val())) {
                    err = ingrese_numeros+' ej. 446-2122-4555';
                    valid = false; break;
                }
                break;
            case "ruc":
                if (!validateRUC($(input).val())) {
                    err = ingrese_ruc;
                    valid = false; break;
                }
                break;
        }
        if (err != "") {
            $(input).parent().addClass("inputErr");
            if(!hide_alert) $(input).parent().after("<div id='" + $(input).attr('id') + "_err' class='error'>" + err + "</div>");
        }

    });

    return valid;
}

function prepareForm(formID) {
    $(formID + " :input").each(function() {
        var input = this;
        var defval = $(input).attr('default');
        if (defval != undefined) {
            $(input).val(defval);
        }

        if ($(input).attr('class') != undefined) {
            //$(input).keyup(function() { valRequired(input); });
            $(input).blur(function() { valRequired(input); });
        }
    });
}

function isValidate(formID) {
    var isValid = true;
    $(formID + " :input").each(function() {
        var input = this;
        if ($(input).attr('class') != undefined && !valRequired(input)) {
            isValid = false;
        }
    });

    return isValid;
}