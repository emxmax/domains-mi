/************************************************************/
$(function(){
    $('.defaultInputValue').defaultInputValue();
    
    $('#frmLogin').submit(function(){
        if($('#dni').val()==$('#dni').attr('title') || $('#clave').val()==$('#clave').attr('title')){
            ShowAlert("Debes ingresar todos los datos requeridos!");
            return false;
        }else
            return true;
    });
    $("#lnkLogin").click(function(){
        return $('#frmLogin').submit();
    });
    $("#clave").keydown(function(event){
      if ( event.which == 13 ) {
            return $('#frmLogin').submit();
       }
    });
    
    $('#frmSearch').submit(function(){
        if($('#criterio').val()==$('#criterio').attr('title')){
            ShowAlert("Debes ingresar un texto a buscar!");
            return false;
        }else
            return true;
    });
    $("#lnkSearch").click(function(){
        return $('#frmSearch').submit();
    });
    $("#criterio").keydown(function(event){
      if ( event.which == 13 ) {
            return $('#frmSearch').submit();
       }
    });
    
});
/************************************************************/

$.fn.defaultInputValue = function() {
    // Loops over all specified elements and sets default value
    // from the title attribule.
    this.each(function() {
            $(this).val($(this).attr('title'));
    });

    // If the value equals the title
    // it will be cleared when input is clicked.
    $(this).click(function(){
    if ($(this).attr('title') == $(this).val()) {
            $(this).val('');
    }
    });

    // When input lose its focus
    // and if the value is empty the default text specified in the title
    // will be set as value.
    $(this).blur(function(){
        if ($(this).val() == '') {
                $(this).val($(this).attr('title'));
        }
    });
};

$.fn.extend({  
    limit: function(limit,element) {
        var interval, f;
        var self = $(this);

        $(this).focus(function(){
                interval = window.setInterval(substring,100);
        });

        $(this).blur(function(){
                clearInterval(interval);
                substring();
        });

        substringFunction = "function substring(){ var val = $(self).val();var length = val.length;if(length > limit){$(self).val($(self).val().substring(0,limit));}";
        if(typeof element != 'undefined')
                substringFunction += "if($(element).html() != limit-length){$(element).html((limit-length<=0)?'0':limit-length);}"
        substringFunction += "}";

        eval(substringFunction);

        substring();
   } 
}); 

function ShowAlert(msg){
   $.fancybox({
       padding: 20,
       content: '<div id="divAlerta"><p>'+msg+'</p><div align="center"><a href="javascript:;" onclick="jQuery.fancybox.close();" class="alert">Aceptar</a></div></div>',
       openEffect  : 'fade',
       closeEffect : 'fade'
   });
}

function ShowConfirm(msg, onConfirm){
   $.fancybox({
       padding: 20,
       content: '<div id="divAlerta"><p>'+msg+'</p><div align="center"><a href="javascript:;" onclick="jQuery.fancybox.close();" class="alert"> No </a> <a href="javascript:;" class="alert confirm"> Si </a></div></div>',
       openEffect  : 'fade',
       beforeShow: function() {
           $('#divAlerta .confirm').click(onConfirm);
       }
});
}
