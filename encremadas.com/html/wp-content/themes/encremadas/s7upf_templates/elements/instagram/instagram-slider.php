<?php
    if(empty($itemres)) $itemres = '0:1,480:3,768:4,990:5';
?>
<div class="block-element instagram-slider follow-instagram <?php echo esc_attr($el_class);?>">
<?php
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
?>
    <div class="wrap-item smart-slider owl-carousel owl-theme navi-nav-style" 
        data-item="" data-speed="<?php echo esc_attr($speed);?>" 
        data-itemres="<?php echo esc_attr($itemres)?>" 
        data-prev="" data-next="" 
        data-pagination="" data-navigation="true">
    <?php
        if(!empty($data)){
            foreach ($data as $value) {
                echo '<div class="item-instagram banner-advs zoom-image overlay-image">
						<a class="adv-thumb-link" target="_blank" href="'. esc_url( $value['link'] ) .'">
							<img src="'. esc_url($value['image_url']) .'" alt="'.esc_attr__("instagram-image","skincare").'">
							<div class="instagram-info transition absolute flex-wrapper align_items-center justify_content-center">
								<ul class="list-inline-block">
									<li class="like-count"><i class="title24 white fa fa-heart-o"></i><sub class="white">'.esc_html($value['like']).'</sub></li>
									<li class="comment-count"><i class="title24 white fa fa-comment-o"></i><sub class="white">'.esc_html($value['comment']).'</sub></li>
								</ul>
							</div>
						</a>
					</div>';
            }              
        }
    ?>
    </div>
</div>