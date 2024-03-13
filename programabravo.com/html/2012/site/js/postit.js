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
