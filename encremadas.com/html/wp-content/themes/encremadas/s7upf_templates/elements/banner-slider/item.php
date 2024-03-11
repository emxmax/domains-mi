<div class="item-slider <?php echo esc_attr($el_class)?>">
    <div class="banner-thumb">
		<?php if(!empty($link)):?>
        <a href="<?php echo esc_url($link)?>">
		<?php endif;?>
			<?php echo wp_get_attachment_image($image,'full')?>
		<?php if(!empty($link)):?>
		</a>
		<?php endif;?>
    </div>
	<?php if(!empty($content)):?>
    <div class="banner-info">
        <div class="container">
            <div class="slider-content-text <?php echo esc_attr($info_class)?>">
                <?php echo wpb_js_remove_wpautop($content, true)?>
            </div>
        </div>
    </div>
	<?php endif;?>
</div>