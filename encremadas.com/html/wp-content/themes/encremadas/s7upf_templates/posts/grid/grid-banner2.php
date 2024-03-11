<?php
if(empty($size)) $size = array(1920,700);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post text-center item-post-banner style2">
    <div class="post-thumb banner-advs">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
		<div class="post-info absolute flex-wrapper align_items-center justify_content-center flex_direction-column transition">
			<div class="info-post-banner">
				<h3 class="title60 post-title lora-font font-bold"><a class="white wobble-top" href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
				<?php s7upf_display_metabox('grid');?>
			</div>
		</div>
    </div>
</div>
<?php if(isset($column)):?></div><?php endif;?>