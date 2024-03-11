$(document).ready(function(){
	
	$("#mostrar-menu-movil").click(function() {
		modo = $("#menu-drop").css("display");
		if (modo == "none")
			$("#menu-drop").css("display","flex");
		else
			$("#menu-drop").css("display","none");
		console.log(modo);
	});
	$('select').change(function(){
	    var url = $(this).val();
	    window.location = url;
	});
	$('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
});