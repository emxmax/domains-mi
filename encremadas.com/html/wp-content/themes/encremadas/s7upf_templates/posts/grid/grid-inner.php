<?php
if(empty($size)) $size = array(270,180);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post text-center item-post-inner">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
		<div class="post-info absolute flex-wrapper align_items-center justify_content-center flex_direction-column transition">
			<h3 class="title18 post-title lora-font font-bold"><a class="white wobble-top" href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
      <a href="<?php echo esc_url(get_the_permalink()) ?>" class="shop-button black">Leer más</a>
      <?php
      // gg mi
      // s7upf_display_metabox('grid');
      ?>
		</div>
    </div>
</div>
<?php if(isset($column)):?></div><?php endif;?>
