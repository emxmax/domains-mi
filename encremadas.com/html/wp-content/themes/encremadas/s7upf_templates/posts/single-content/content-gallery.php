<?php
$data = '';
$gallery = get_post_meta(get_the_ID(), 'format_gallery', true);
if (!empty($gallery)){
    $array = explode(',', $gallery);
    if(is_array($array) && !empty($array)){
        
        $data .= '<div class="post-gallery single-post-thumb banner-advs">
                    <div class="wrap-item smart-slider owl-carousel owl-theme" 
                    data-item="" data-speed="" 
                    data-itemres="0:1" 
                    data-prev="" data-next="" 
                    data-pagination="" data-navigation="true">';
        foreach ($array as $key => $item) {
            $thumbnail_url = wp_get_attachment_url($item);
            $data .= '<div class="image-slider">';
            $data .=    '<img src="' . esc_url($thumbnail_url) . '" alt="'.esc_attr__("Image slider","skincare").'">';           
            $data .= '</div>';
        }
        $data .='</div></div>';
    }
}
?>

<div class="content-single-blog <?php echo (is_sticky()) ? 'sticky':''?>">
	<?php   if(get_post_meta(get_the_ID(),'show_title_page',true) != 'off'):?>
	<h1 class="title-page title36 lora-font font-bold">
		<?php the_title()?>
		<?php echo (is_sticky()) ? '<i class="fa fa-star"></i>':''?>
	</h1>
	 <?php   endif;?>
    <?php if(!empty($data)) echo apply_filters('s7upf_output_content',$data);?>
    <div class="content-post-default">
        <div class="detail-content-wrap clearfix"><?php the_content(); ?></div>
    </div>
</div>