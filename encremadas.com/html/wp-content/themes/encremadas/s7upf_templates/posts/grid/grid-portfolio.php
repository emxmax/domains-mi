<?php
if(empty($size)) $size = array(540,540);
$size = s7upf_size_random($size);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-portfolio">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
            <span class="post-info">
                <i class="la la-eye icon"></i>
                <span class="title18 post-title lora-font font-bold white"><?php the_title()?></span>
            </span>
        </a>
    </div>
    
</div>
<?php if(isset($column)):?></div><?php endif;?>