/************************************************************/
$(function() {  
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
        limit: function(limit, element) {
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
});
