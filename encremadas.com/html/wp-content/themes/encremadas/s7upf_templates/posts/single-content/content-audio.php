<?php
$data = '';
if (get_post_meta(get_the_ID(), 'format_media', true)) {
    $media_url = get_post_meta(get_the_ID(), 'format_media', true);
    $data .= '<div class="audio single-post-thumb banner-advs">' . s7upf_remove_w3c(wp_oembed_get($media_url, array('height' => '176'))) . '</div>';
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