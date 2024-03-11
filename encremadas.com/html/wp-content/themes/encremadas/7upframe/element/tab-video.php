<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_tab_video'))
{
    function s7upf_vc_tab_video($attr,$content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
			'list_video'     => '',
			'el_class'       => '',
			'custom_css'     => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
		
		ob_start();
		$unit_id = uniqid();
        ?>
		<?php
			if(isset($list_video)):
			$data_video  = (array) vc_param_group_parse_atts( $list_video );
		?>
		<div class="tab-video-intro flex-wrapper align_items-center <?php echo esc_attr($el_class);?>">
			<div class="intro-video3">
				<ul class="list-none">
					<?php 
						foreach($data_video as $key => $value):
						$class_active = '';
						if($key == 0) $class_active = 'active';
					?>
					<li class="<?php echo esc_attr($class_active);?>">
						<?php if(!empty($value['title'])):?>
						<h2 class="title30 font-bold lora-font color"><a href="#<?php echo esc_attr($unit_id);?>-<?php echo esc_attr($key);?>" data-toggle="tab"><?php echo esc_html($value['title']);?></a></h2>
						<?php endif;?>
						<?php if(!empty($value['desc'])):?>
						<p class="desc"><?php echo esc_html($value['desc']);?></p>
						<?php endif;?>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="banner-video3">
				<div class="tab-content">
					<?php 
						foreach($data_video as $key => $value):
						$class_active = '';
						if($key == 0) $class_active = 'active';
						$bg_image = '';
						$image = $value['image'];
						$size = $value['size'];
						if(!empty($size)) {
							$size = explode('x', $size);
						}else{ 
							$size = 'full';
						}
						if(!empty($image)){
							$bg_image = S7upf_Assets::build_css('background-image:url('.wp_get_attachment_url($image).')');
						}
					?>
					<div id="<?php echo esc_attr($unit_id);?>-<?php echo esc_attr($key);?>" class="tab-pane <?php echo esc_attr($class_active);?>">
						<div class="block-video-custom banner-background <?php echo esc_attr($bg_image);?>">
							<?php if(!empty($value['link'])):?>
							<video class="video-custom" loop="">
								<source src="<?php echo esc_url($value['link']);?>" type="video/mp4">
							</video>
							<?php endif;?>
							<div class="absolute flex-wrapper align_items-center justify_content-center flex_direction-column">
								<a href="javascript:void(0)" class="video-button title60 bg-color btn-play-video"><i class="white la la-play"></i></a>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
			
		</div>	
		<?php endif;?>
		<?php
		$html = ob_get_clean();	
		return $html;
    }
}
stp_reg_shortcode('s7upf_tab_video','s7upf_vc_tab_video');
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_tab_video',10,100 );
if ( ! function_exists( 's7upf_add_tab_video' ) ) {
	function s7upf_add_tab_video(){
		vc_map( array(
			"name"      => esc_html__("Tab Video", 'skincare'),
			"base"      => "s7upf_tab_video",
			"icon"      => "icon-st",
			"category"  => '7UP-Elements',
			"params"    => array(
				array(
					"type" => "param_group",
					"heading" => esc_html__("Add List Video",'skincare'),
					"param_name" => "list_video",
					"params"    => array(
						array(
							"type" => "textfield",
							"heading" => esc_html__("Title",'skincare'),
							"param_name" => "title",
						),
						array(
							"type" => "textarea",
							"heading" => esc_html__("Description",'skincare'),
							"param_name" => "desc",
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Image Video",'skincare'),
							"param_name" => "image",
						),
						array(
							"type"          => "textfield",
							"heading"       => esc_html__("Image Size",'skincare'),
							"param_name"    => "size",
							'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'skincare' ),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Link Video",'skincare'),
							"param_name" => "link",
							'description' =>  esc_html__( 'Add link video format *mp4', 'skincare' ),
						),
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Class Extra', 'skincare' ),
					'param_name'  => 'el_class',
					'group'       => esc_html__('Design Option','skincare') 
				),
				array(
					"type"          => "css_editor",
					"heading"       => esc_html__("Custom Style",'skincare'),
					"param_name"    => "custom_css",
					'group'         => esc_html__('Design Option','skincare')
				),
			)
		));
    }
}