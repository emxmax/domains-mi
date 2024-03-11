(function($){
"use strict"; // Start of use strict
//Info Sticky
function gallery_fixed(){
	if($('.detail-gallery-sticky').length > 0){
		$('.detail-gallery-sticky').each(function(){
			var self = $(this);
			var info = self.parents('.product-detail').find('.detail-info');
			if($(window).width()>980){
				if($('.main-nav').hasClass('active')){
					self.parents('.product-detail').addClass('detail-on-sticky-menu');
				}else{
					self.parents('.product-detail').removeClass('detail-on-sticky-menu');
				}
				var st = $(window).scrollTop();
				var ot = self.offset().top;
				var sh = self.height();
				var dh = info.height();
				var stop = sh - dh;
				var top = st - ot;
				if(st < ot){
					info.css('top',0);
				}
				if(st > ot && st < ot+sh-dh){
					info.css('top',top+'px');
				}
				if(st > ot+sh-dh){
					info.css('top',stop+'px');
				}
			}else{
				info.css('top',0);
			}
		});
	}
}
//Add to Cart Sticky
function add_cart_sticky(){
	if($('.sticky-addcart').length > 0){
		$('.sticky-addcart').each(function(){
			var self = $(this);
			var cart = self.prev().find('form.cart');
			var st = $(window).scrollTop();
			var ot = cart.offset().top;
			var stop = $('#footer').offset().top - $(window).height();
			if( st > ot && st < stop){
				self.addClass('active');
			}else{
				self.removeClass('active');
			}
		});
	}
}
//Offset Menu
function offset_menu(){
	if($(window).width()>767){
		$('.main-nav .sub-menu').each(function(){
			var wdm = $(window).width();
			var wde = $(this).width();
			var offset = $(this).offset().left;
			var tw = offset+wde;
			if(tw>wdm){
				$(this).addClass('offset-right');
			}
		});
	}else{
		return false;
	}
}
//Document Ready
jQuery(document).ready(function(){
	gallery_fixed();
	offset_menu();
	//Tag Toggle
	if($('.toggle-tab').length>0){
		$('.toggle-tab').each(function(){
			$(this).find('.item-toggle-tab.active .toggle-tab-content').slideDown();
			$(this).find('.toggle-tab-title').on('click',function(event){
				if($(this).next().length>0){
					event.preventDefault();
					var self = $(this);
					self.parent().siblings().removeClass('active');
					self.parent().toggleClass('active');
					self.parents('.toggle-tab').find('.toggle-tab-content').slideUp();
					self.next().stop(true,false).slideToggle();
				}
			});
		});
	}
	//Video Custom
	if($('.block-video-custom').length > 0){
		$('.block-video-custom').each(function(){
			var self = $(this);
			self.find('.video-button').on('click', function (event) {
				event.preventDefault();
				self.addClass('clicked');
				var video = self.find('.video-custom').get(0);
				$(this).toggleClass('active');
				if (video.paused) {
					video.play();
				} else {
					video.pause();
				}
			});
		});
	}
	//Menu Fixed
	if($(window).width()>767){
		$('.close-main-nav').on('click',function(event){
			$('body').removeClass('overlay');
			$('.menu-fixed').removeClass('active');
		});
		$('.btn-menu-fixed').on('click',function(event){
			event.preventDefault();
			event.stopPropagation();
			$('body').addClass('overlay');
			$(this).parent().addClass('active');
		});
	}
	//Fancy Box
	if($('.fancybox').length>0){
		$('.fancybox').fancybox();
	}
	if($('.fancybox-media').length>0){
		$('.fancybox-media').attr('rel', 'media-gallery').fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',
			arrows : false,
			helpers : {
				media : {}
			}
		});
	}
});
//Window Load
jQuery(window).on('load',function(){
	add_cart_sticky();
	//Sidebar Fixed
	if($('.block-filter-extra').length>0){
		$('.show-sidebar').on('click',function(event){
			$(this).parent().addClass('active');
		});
		$('.close-sidebar').on('click',function(event){
			$(this).parent().parent().removeClass('active');
		});
		$('.toggle-filter-extra').on('click',function(event){
			$(this).toggleClass('active');
			$(this).next().slideToggle();
		});
	}
	//Animate
	if($('.wow').length>0){
		new WOW().init();
	}
	//Final Countdown
	if($('.final-countdown').length>0){
		$('.final-countdown').each(function(){
			var self = $(this);
			var finalDate = self.data('countdown');
			self.countdown(finalDate, function(event) {
				self.html(event.strftime(''
					+'<div class="clock day"><strong class="number">%D</strong><span class="text">DAYS</span></div>'
					+'<div class="clock hour"><strong class="number">%H</strong><span class="text">HUR</span></div>'
					+'<div class="clock min"><strong class="number">%M</strong><span class="text">MIN</span></div>'
					+'<div class="clock sec"><strong class="number">%S</strong><span class="text">SEC</span></div>'
				));
			});
		});
	}
});
//Window Resize
jQuery(window).on('resize',function(){
	gallery_fixed();
	offset_menu();
});
//Window Scroll
jQuery(window).on('scroll',function(){
	gallery_fixed();
	add_cart_sticky();
});

$(document).ready(function(){
	$('.ajax_login_enc').click(function(){
		$("#login_enc").toggle('slow');
		console.log('oloasasas');
	})

	$('.close_login_enc').click(function(){
		$("#login_enc").toggle('slow');
		console.log('oloasasas');
	})
})

})(jQuery); // End of use strict
