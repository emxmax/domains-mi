<div class="banner-ads-caption <?php echo esc_attr($el_class);?> <?php echo esc_attr($caption);?>">
	<figure class="banner-advs transition <?php echo esc_attr($animation);?>">
		<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="adv-thumb-link">';?>
		<?php 
			echo wp_get_attachment_image($image,$size);
			echo wp_get_attachment_image($image2,$size);
		?>
		<?php if(!empty($link)) echo '</a>';?>
	</figure> 
	<?php if(!empty($title)):?>
	<figcaption class="title-vertical title14 font-italic text-uppercase"><?php echo esc_html($title);?></figcaption>
	<?php endif;?>
</div>