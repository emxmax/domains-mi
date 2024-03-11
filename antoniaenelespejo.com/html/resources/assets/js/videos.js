$(document).ready(function(){
	$(".capa-video").click(function(){
		var code = $(this).data("code");
		$("#videoGral").attr("src", "https://www.youtube.com/embed/" + code);
	});

	$('.capa-video').click(function(){

		setTimeout(ancla, 500);
		// e.preventDefault();
	    // enlace  = $(this).attr('.ancla');
	    
	});

	function ancla(){
		$('html, body').animate({
	        scrollTop: $("#videoGral").offset().top
	    }, 1500);
	}
});