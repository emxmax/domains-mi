<div class="banner-title-vertical <?php echo esc_attr($el_class);?>">
	<div class="banner-advs <?php echo esc_attr($animation);?>">
		<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="adv-thumb-link">';?>
		<?php 
			echo wp_get_attachment_image($image,$size);
			echo wp_get_attachment_image($image2,$size);
		?>
		<?php if(!empty($link)) echo '</a>';?>
	</div> 
    <div class="advs-info <?php echo esc_attr($el_class2);?>">
		<?php if(!empty($title)):?>
		<h2 class="title-vertical title48 lora-font font-bold"><?php echo esc_html($title);?></h2>
		<?php endif;?>
		<?php if(!empty($content)):?>
			<?php echo wpb_js_remove_wpautop($content, true);?>
		<?php endif;?>
    </div>
</div>