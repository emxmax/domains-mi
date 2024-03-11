<?php 
	$check_tags   = s7upf_get_option('post_single_tags','on');
	if($check_tags == 'on'):
	$tags = get_the_tag_list(' ',' ',' ');
	if($tags):
?>
	<div class="single-data-tags tagcloud">
		<i class="title18 color la la-tag"></i><span class="font-bold black"><?php echo esc_html__('Tags:','skincare');?></span>
		<?php echo apply_filters('s7upf_output_content',$tags);?>
	</div>
<?php endif; endif;?>