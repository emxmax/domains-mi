<?php
if(empty($size)) $size = array(270,180);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post item-post-flex flex-wrapper align_items-center">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
    <div class="post-info">
        <h3 class="title24 post-title lora-font font-bold"><a class="black" href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
        <?php s7upf_display_metabox('grid');?>
		<a href="<?php echo esc_url(get_the_permalink()) ?>" class="shop-button black"><?php esc_html_e("Read more","skincare")?></a>
		<?php
			$tags = get_the_tag_list(' ',', ',' ');
			if(!empty($tags)):
		?>
		<div class="list-cats">
		<?php echo apply_filters('s7upf_output_content',$tags);?>
		</div>
		<?php endif;?>
    </div>
</div>
<?php if(isset($column)):?></div><?php endif;?>