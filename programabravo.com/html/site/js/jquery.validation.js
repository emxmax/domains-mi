function addError(input, message){
    $(input).addClass("inputErr");
    //$(input).parent().append("<span class='error'><br />"+message+"</span>");
}

function valRequired(input){
    $(input).removeClass("inputErr");
    $(input).parent().find("span").remove();
    attr=$(input).attr('class').split(" ");
    valid=true;
    $.each(attr, function(i, type) {
        if(!valid) return false;
        switch (type){
            case "required":
                    if($(input).val()==""){
                            addError(input, "campo requerido.");
                            valid=false; break;}
                    break;
            case "email": 
                    var regExp = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])","");
                    if(!regExp.test($(input).val())){
                            addError(input, "el email no es valido!");
                            valid=false; break;}
                    break;
        }
    });

    return valid;
}

function prepareForm(formID){
    $(formID+" :input").each(function() {
        var input=this;
        if($(input).attr('class') != undefined){
            $(input).bind('keyup', function(){ valRequired(input); });
            $(input).blur('keyup', function(){ valRequired(input); });
        }
    });
}

function isValidate(formID){
    var isValid=true;
    $(formID+" :input").each(function() {
        var input=this;
        if($(input).attr('class') != undefined && !valRequired(input)){
                isValid=false;
        }
    });

    return isValid;
}