<?php
$check_share = s7upf_get_option('post_single_share',array());
$check_share_page = s7upf_get_value_by_id('post_single_page_share');
$post_type = get_post_type();
if(in_array($post_type, $check_share) || $check_share_page == 'on'):
	$list_default = array(
		array(
			'title'  => esc_html__('Facebook',"skincare"),
		    'social' => 'facebook',
			),
		array(
			'title'  => esc_html__('Twitter',"skincare"),
		    'social' => 'twitter',
			),
		array(
			'title'  => esc_html__('Google',"skincare"),
		    'social' => 'google',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Pinterest',"skincare"),
		    'social' => 'pinterest',
			),
		array(
			'title'  => esc_html__('Linkedin',"skincare"),
		    'social' => 'linkedin',
			),
		array(
			'title'  => esc_html__('Tumblr',"skincare"),
		    'social' => 'tumblr',
			),
		array(
			'title'  => esc_html__('Email',"skincare"),
		    'social' => 'envelope',
			),
		);
	$list = s7upf_get_option('post_single_share_list',$list_default);

?>
<div class="single-list-social" data-id="<?php echo esc_attr(get_the_ID())?>">
	<ul class="list-inline-block">
	<?php
		foreach ($list as $value) {
			switch ($value['social']) {
				case 'facebook':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink()).'">
								<i class="fab fa-facebook-f"></i>
							</a></li>';
					break;

				case 'twitter':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://www.twitter.com/share?url='.get_the_permalink()).'">
								<i class="fa fa-twitter"></i>
							</a></li>';
					break;

				case 'google':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://plus.google.com/share?url='.get_the_permalink()).'">
								<i class="fa fa-google-plus"></i>
							</a></li>';
					break;

				case 'pinterest':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.wp_get_attachment_url(get_post_thumbnail_id())).'">
								<i class="fa fa-pinterest"></i>
							</a></li>';
					break;

				case 'envelope':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="mailto:?subject='.esc_attr__("I wanted you to see this site&amp;body=Check out this site","skincare").' '.get_the_permalink().'">
								<i class="fa fa-envelope"></i>
							</a></li>';
					break;

				case 'linkedin':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://www.linkedin.com/cws/share?url='.get_the_permalink()).'">
								<i class="fa fa-linkedin"></i>
							</a></li>';
					break;

				case 'tumblr':
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://www.tumblr.com/widgets/share/tool?canonicalUrl='.get_the_permalink().'&amp;title='.get_the_title()).'">
								<i class="fa fa-tumblr"></i>
							</a></li>';
					break;

				default:
				break;
			}
		}
	?>
	<!-- <li><a target="_blank" data-social="#" title="whatsapp" href="https://api.whatsapp.com/send?phone=+51933623903&text=<?php echo get_the_permalink()?>"><i class="fab fa-whatsapp"></i></a></li> -->
	</ul>
</div>
<?php endif;?>
