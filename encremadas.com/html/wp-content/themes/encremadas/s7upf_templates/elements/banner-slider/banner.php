<div class="banner-slider <?php echo esc_attr($el_class)?>">
    <div class="wrap-item sv-slider owl-carousel owl-theme <?php echo esc_attr($navigation.' '.$pagination)?>" 
        data-item="1" data-speed="<?php echo esc_attr($speed)?>" 
        data-itemres="0:1" data-animation_in="<?php echo esc_attr($animation_in)?>"  data-animation_out="<?php echo esc_attr($animation_out)?>" 
        data-navigation="<?php echo esc_attr($navigation)?>" data-pagination="<?php echo esc_attr($pagination)?>" 
        data-prev="<?php echo esc_attr($nav_prev)?>" data-next="<?php echo esc_attr($nav_next)?>">
		
		<?php echo wpb_js_remove_wpautop($content, false);?>
		
    </div>
</div>