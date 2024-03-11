<?php
if(empty($size)) $size = array(270,180);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post text-center item-post-inner item-post-category">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
		<div class="post-info absolute flex-wrapper align_items-center justify_content-center flex_direction-column transition">
			<h3 class="title24 post-title lora-font font-bold"><a class="white wobble-top" href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
			<?php s7upf_display_metabox('grid');?>
			<a href="<?php echo esc_url(get_the_permalink()) ?>" class="shop-button black"><?php echo esc_html__('Read More','skincare');?></a>
		</div>
    </div>
	<?php 
		global $post;
		$cats = get_the_terms( $post->ID, 'category' );
		if(!empty($cats)):
		$max = sizeof($cats)-1;
		$index = rand(0,$max);
		$cat_id = $cats[$index]->term_id;
	?>
	<a class="cat-parent" href="<?php echo esc_url(get_category_link($cat_id));?>"><?php echo get_cat_name($cat_id);?></a>
	<?php endif;?>
</div>
<?php if(isset($column)):?></div><?php endif;?>