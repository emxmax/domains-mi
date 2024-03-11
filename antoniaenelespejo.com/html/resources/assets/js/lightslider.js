$(document).ready(function() {
	$("#public").lightSlider({
		item: 1,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        // addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
 
        speed: 400, //ms'
        loop: true,
        slideEndAnimation: true,
        pause: 2000,
 
        pager: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
 
        // enableTouch:false,
        // enableDrag:false,
        freeMove:false,

		responsive : [
			{	breakpoint: 992,
				settings: {
				item: 1,
				},
			},
			{	breakpoint: 768,
				settings: {
					item: 1,
				},
			},
			{	breakpoint: 425,
				settings: {
					item: 1,
				}
			}
		],
	});
});