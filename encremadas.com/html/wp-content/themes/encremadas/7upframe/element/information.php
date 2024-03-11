<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_information'))
{
    function s7upf_vc_information($attr,$content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'     	 => '',
            'image'     	 => '',
            'image2'     	 => '',
			'size'           => '', 
            'icon'      	 => '',
            'title'      	 => '',
            'sub_title'      => '',
            'desc'      	 => '',
			'list_icon'      => '',
			'list_video'     => '',
            'video'      	 => '',
            'src_video'      => '',
            'link'       	 => '',
            'button'    	 => '',
			'cats'      	 => '',
			'list_cats'      => '',
			'date'      	 => '',
			'radius'      	 => '',
			'percent'      	 => '',
			'color'      	 => '',
			'background'     => '',
			'st_color'      	 => '#000000',
			'st_background'     => '#e4e4e4',
			'st_height'     => '5px',
			'el_class'       => '',
			'custom_css'     => '',
			'animate'                 => '',
			'animate_effect'          => '',
			'animate_duration'        => '',
			'animate_delay'           => '',
			'animate_iteration'       => '',
			'animate_offset'          => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
		$el_class .= ' '.$animate.' '.$animate_effect.' '.$css_class;
		if(!empty($button)) $button = vc_build_link($button);
		if(!empty($size)) {
			$size = explode('x', $size);
		}else{ 
			$size = 'full';
		}	
		if(!empty($image)) $bg_image = S7upf_Assets::build_css('background-image:url('.wp_get_attachment_url($image).')');
		if(isset($list_category)) $data_category = (array) vc_param_group_parse_atts( $list_category );
		if(isset($list_icon)) $data_icon  = (array) vc_param_group_parse_atts( $list_icon );
		if(isset($list_link)) $data_link  = (array) vc_param_group_parse_atts( $list_link );
		ob_start();
        switch ($style) {
			case 'video-popup':
				if(!empty($video)):
				?>
				<div class="show-video-popup text-center <?php echo esc_attr($el_class);?>">
					<?php if(!empty($content)):?>
					<div class="intro-video-popup"><?php echo	wpb_js_remove_wpautop($content, true);?></div>
					<?php endif;?>
					<a href="<?php echo esc_url($video);?>" class="title60 bg-color btn-play-video fancybox fancybox-media"><i class="white la la-play"></i></a>
				</div>
				<?php endif;		
			break;
			case 'info-service':
				?>
				<div class="item-service text-center flex-wrapper flex_direction-column justify_content-center align_items-center <?php echo esc_attr($el_class);?>">
					<?php if(!empty($icon)):?>
					<i class="title60 <?php echo esc_attr($icon)?>"></i>
					<?php endif;?>
					<?php if(!empty($title)):?>
					<h3 class="title18 lora-font font-bold"><?php echo esc_html($title)?></h3>
					<?php endif;?>
					<?php if(!empty($desc)):?>
					<p class="desc"><?php echo esc_html($desc)?></p>
					<?php endif;?>
				</div>
				<?php 
			break;
			case 'info-service2':
				?>
				<div class="item-service2 flex-wrapper align_items-center <?php echo esc_attr($el_class);?>">
					<?php if(!empty($icon)):?>
					<div class="service-icon">
						<i class="title60 <?php echo esc_attr($icon)?>"></i>
					</div>	
					<?php endif;?>
					<div class="service-info">
						<?php if(!empty($title)):?>
						<h3 class="title18 lora-font font-bold"><?php echo esc_html($title)?></h3>
						<?php endif;?>
						<?php if(!empty($desc)):?>
						<p class="desc"><?php echo esc_html($desc)?></p>
						<?php endif;?>
					</div>
				</div>
				<?php 
			break;
			case 'info-service3':
				?>
				<div class="item-service3 flex-wrapper align_items-center <?php echo esc_attr($el_class);?>">
					<?php if(!empty($image)):?>
					<div class="service-thumb">
						<a href="<?php echo esc_url($link);?>">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>	
					<?php endif;?>
					<div class="service-info">
						<?php if(!empty($title)):?>
						<h3 class="title18 lora-font font-bold"><a class="black wobble-top" href="<?php echo esc_url($link);?>"><?php echo esc_html($title)?></a></h3>
						<?php endif;?>
						<?php if(!empty($desc)):?>
						<p class="desc"><?php echo esc_html($desc)?></p>
						<?php endif;?>
					</div>
				</div>
				<?php 
			break;
			case 'info-service4':
				?>
				<div class="item-service4 flex-wrapper <?php echo esc_attr($el_class);?>">
					<?php if(!empty($image)):?>
					<div class="service-thumb">
						<a href="<?php echo esc_url($link);?>">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>	
					<?php endif;?>
					<?php if(!empty($content)):?>
					<div class="service-info">
						<?php echo	wpb_js_remove_wpautop($content, true);?>
					</div>
					<?php endif;?>
				</div>
				<?php 
			break;
			case 'info-contact':
				?>
				<div class="item-contact-info text-center <?php echo esc_attr($el_class);?>">
					<?php if(!empty($icon)):?>
					<div class="contact-icon">
						<a class="black" href="<?php echo esc_url($link);?>"><i class="title60 <?php echo esc_attr($icon)?>"></i></a>
					</div>	
					<?php endif;?>
					<div class="contact-info">
						<?php if(!empty($title)):?>
						<h3 class="title18 lora-font font-bold"><a href="<?php echo esc_url($link);?>" class="black wobble-top"><?php echo esc_html($title)?></a></h3>
						<?php endif;?>
						<?php if(!empty($content)):?>
						<div class="info-contact-text">
						<?php echo	wpb_js_remove_wpautop($content, true);?>
						</div>
						<?php endif;?>
					</div>
				</div>
				<?php 
			break;
			case 'info-statics':
				if(!empty($percent)):
				?>
				<div class="item-statics <?php echo esc_attr($el_class);?>">
					<div class="flex-wrapper justify_content-space-between align_items-center">
						<h3 class="title18 lora-font font-bold"><?php echo esc_html($title);?></h3>
						<p class="desc"><?php echo esc_html($percent);?>%</p>
					</div>	
					<div class="statics-progress" <?php s7upf_add_html_attr('background-color:'.$st_background.';height:'.$st_height.'',true);?>>
						<div class="statics-percent wow slideInLeft" data-percent="<?php echo esc_html($percent);?>" <?php s7upf_add_html_attr('background-color:'.$st_color.';width:'.$percent.'%',true);?>></div>
					</div>
				</div>
				<?php endif;
			break;
			case 'banner-hot-deal':
				?>
				<div class="banner-hot-deal text-center <?php echo esc_attr($el_class);?>">
					<div class="base-thumb"><?php echo wp_get_attachment_image($image2,$size);?></div>
					<div class="layer-before absolute">
						<?php echo wp_get_attachment_image($image,$size);?>
						<div class="content-before flex-wrapper align_items-center justify_content-flex-end flex_direction-column absolute">
							<span class="white bg-color"><?php echo esc_html($sub_title);?></span>
							<h3 class="title18 lora-font font-bold text-uppercase"><?php echo esc_html($title);?></h3>
						</div>
					</div>
					<div class="layer-after flex-wrapper align_items-center justify_content-center flex_direction-column absolute">
						<h3 class="title18 lora-font font-bold text-uppercase white"><?php echo esc_html($title);?></h3>
						<p class="desc white"><?php echo esc_html($desc);?></p>
						<a href="<?php echo esc_url($link);?>" class="shop-button white"><?php echo esc_html__('Shop Now','skincare');?></a>
					</div>
				</div>
				<?php	
			break;;
			case 'cat-hot-deal':
				?>
				<div class="cat-hot-deal item-category text-center <?php echo esc_attr($el_class);?>">
					<div class="info-item-category">
						<div class="content-item-category flex-wrapper flex_direction-column align_items-center justify_content-center">
							<?php echo wp_get_attachment_image($image,'full');?>
							<span class="white bg-color"><?php echo esc_html($sub_title);?></span>
							<h3 class="title18 lora-font font-bold text-uppercase"><?php echo esc_html($title);?></h3>
						</div>
					</div>
					<div class="info-item-category under">
						<div class="content-item-category two flex-wrapper flex_direction-column align_items-center justify_content-center">
							<h3 class="title18 lora-font font-bold text-uppercase white"><?php echo esc_html($title);?></h3>
							<p class="desc white"><?php echo esc_html($desc);?></p>
							<a href="<?php echo esc_url($link);?>" class="shop-button white"><?php echo esc_html__('Shop Now','skincare');?></a>
						</div>
						<?php echo wp_get_attachment_image($image2,$size);?>
					</div>
				</div>
				<?php	
			break;
			case 'banner-category':
				if(!empty($cats)):
				$term = get_term_by('slug',$cats,'product_cat');
				if(!empty($title)){
					$cat_name = $title;
				}else{
					$cat_name = $term->name;
				}
				$cat_link = get_category_link($term);
				$count = $term->count;
				?>
				<div class="item-cat-adv text-center <?php echo esc_attr($el_class);?>">
					<div class="cat-thumb">
						<a href="<?php echo esc_url($cat_link);?>" class="adv-thumb-link push">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="cat-info flex-wrapper align_items-center justify_content-center flex_direction-column">
						<h3 class="title18 font-bold lora-font transition"><a class="black wobble-top" href="<?php echo esc_url($cat_link);?>"><?php echo esc_html($cat_name);?></a></h3>
						<?php if(!empty($desc)):?>
						<p class="desc transition"><?php echo esc_html($desc)?></p>
						<?php endif;?>
						<a href="<?php echo esc_url($cat_link);?>" class="btn-circle float-shadow"><i class="la la-angle-right"></i></a>
					</div>
				</div>
				<?php endif;		
			break;
			case 'banner-category2':
				if(!empty($cats)):
				$term = get_term_by('slug',$cats,'product_cat');
				if(!empty($title)){
					$cat_name = $title;
				}else{
					$cat_name = $term->name;
				}
				$cat_link = get_category_link($term);
				$count = $term->count;
				?>
				<div class="item-cat-adv2 text-center <?php echo esc_attr($el_class);?>">
					<div class="cat-thumb">
						<a href="<?php echo esc_url($cat_link);?>" class="adv-thumb-link push">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="cat-info">
						<h3 class="title18 font-bold lora-font transition"><a class="black wobble-top" href="<?php echo esc_url($cat_link);?>"><?php echo esc_html($cat_name);?></a></h3>
						<?php if(!empty($desc)):?>
						<p class="desc transition"><?php echo esc_html($desc)?></p>
						<?php endif;?>
					</div>
				</div>
				<?php endif;		
			break;

			case 'banner-category3':
				if(!empty($cats)):
				$term = get_term_by('slug',$cats,'product_cat');
				if(!empty($title)){
					$cat_name = $title;
				}else{
					$cat_name = $term->name;
				}
				$cat_link = get_category_link($term);
				$count = $term->count;
				?>
				<div class="item-cat-adv3 text-center <?php echo esc_attr($el_class);?>">
					<div class="cat-thumb">
						<a href="<?php echo esc_url($cat_link);?>" class="adv-thumb-link push">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="cat-info">
						<h3 class="title18 font-bold lora-font transition"><a class="black wobble-top" href="<?php echo esc_url($cat_link);?>"><?php echo esc_html($cat_name);?></a></h3>
						<?php if(!empty($desc)):?>
						<?php endif;?>
					</div>
				</div>
				<?php endif;		
			break;

			case 'info-category':
				if(!empty($cats)):
				$term = get_term_by('slug',$cats,'product_cat');
				if(!empty($title)){
					$cat_name = $title;
				}else{
					$cat_name = $term->name;
				}
				$cat_link = get_category_link($term);
				$count = $term->count;
				?>
				<div class="item-cat-info flex-wrapper <?php echo esc_attr($el_class);?>">
					<div class="cat-thumb">
						<a href="<?php echo esc_url($cat_link);?>" class="adv-thumb-link">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="cat-info">
						<h3 class="title30 font-bold lora-font transition"><a class="black" href="<?php echo esc_url($cat_link);?>"><?php echo esc_html($cat_name);?></a></h3>
						<?php if(!empty($desc)):?>
						<p class="desc transition"><?php echo esc_html($desc)?></p>
						<?php endif;?>
						<a class="black wobble-top text-uppercase font-bold" href="<?php echo esc_url($cat_link);?>"><?php echo esc_html__('Shop now','skincare');?></a>
					</div>
				</div>
				<?php endif;		
			break;
			case 'banner-collection':
				if(!empty($cats)):
				if(!empty($background)) $bg_mask = S7upf_Assets::build_css('background-color:'.$background);
				$term = get_term_by('slug',$cats,'product_cat');
				$cat_name = $term->name;
				$cat_link = get_category_link($term);
				$count = $term->count;
				?>
				<div class="item-cat-collect <?php echo esc_attr($el_class);?>">
					<div class="cat-thumb">
						<a href="<?php echo esc_url($cat_link);?>" class="adv-thumb-link">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="cat-info">
						<a href="<?php echo esc_url($cat_link);?>" class="text-uppercase color cat-title"><?php echo esc_html($cat_name);?></a>
						<?php if(!empty($title)):?>
						<h3 class="title30 font-bold lora-font"><?php echo esc_html($title);?></h3>
						<?php endif;?>
						<a href="<?php echo esc_url($cat_link);?>" class="shop-button black"><?php echo esc_html__('Shop Now','skincare');?></a>
					</div>
					<div class="layer-mask transition <?php echo esc_attr($bg_mask);?>"></div>
				</div>
				<?php endif;		
			break;
			case 'video-parallax':
				if(!empty($src_video)):
				?>
				<div class="banner-video-parallax block-video-custom banner-background <?php echo esc_attr($bg_image);?>">
					<?php if(!empty($src_video)):?>
					<video class="video-custom" loop="">
						<source src="<?php echo esc_attr($src_video);?>" type="video/mp4">
					</video>
					<?php endif;?>
					<div class="intro-video transition absolute flex-wrapper align_items-center justify_content-center flex_direction-column">
						<?php if(!empty($title)):?>
						<h2 class="title30 font-bold lora-font"><?php echo esc_html($title);?></h2>
						<?php endif;?>
						<a href="javascript:void(0)" class="video-button title60 bg-color btn-play-video"><i class="white la la-play"></i></a>
					</div>
				</div>
				<?php endif;		
			break;
			case 'client-review':
				if(!empty($image)):
				?>
				<div class="item-client-review text-center <?php echo esc_attr($el_class);?>">
					<div class="client-thumb banner-advs zoom-image overlay-image">
						<a href="<?php echo esc_url($link);?>" class="adv-thumb-link">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="client-info">
						<?php if(!empty($desc)):?>
						<p class="desc transition"><?php echo esc_html($desc)?></p>
						<?php endif;?>
						<?php if(!empty($title)):?>
						<a class="shop-button color" href="<?php echo esc_url($link);?>"><?php echo esc_html($title);?></a>
						<?php endif;?>
					</div>
				</div>
				<?php endif;		
			break;
			case 'cat-statistic':
				if(!empty($cats)):
				$term = get_term_by('slug',$cats,'product_cat');
				if(!empty($title)){
					$cat_name = $title;
				}else{
					$cat_name = $term->name;
				}
				$cat_link = get_category_link($term);
				$count = $term->count;
				?>
				<div class="item-cat-statistic text-center <?php echo esc_attr($el_class);?>">
					<div class="cat-thumb banner-advs zoom-image">
						<a href="<?php echo esc_url($cat_link);?>" class="adv-thumb-link">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="cat-info transition">
						<h3 class="title18 font-bold lora-font transition"><a class="black wobble-top" href="<?php echo esc_url($cat_link);?>"><?php echo esc_html($cat_name);?></a></h3>
						<span class="black transition">(<?php echo esc_html($count)?><?php echo esc_html__(' items','skincare');?>)</span>
					</div>
				</div>
				<?php endif;		
			break;
			case 'info-artist':
				?>
				<div class="item-artist text-center <?php echo esc_attr($el_class);?>">
					<div class="artist-thumb banner-advs zoom-image overlay-image">
						<a class="adv-thumb-link" href="<?php echo esc_url($link);?>">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="artist-info">
						<h3 class="title18 lora-font font-bold text-uppercase"><a href="<?php echo esc_url($link);?>" class="black wobble-horizontal"><?php echo esc_html($title);?></a></h3>
						<p class="desc"><?php echo esc_html($desc);?></p>
						<?php
							if(isset($list_video)): 
							$data_video = (array) vc_param_group_parse_atts( $list_video );
						?>
						<div class="list-artist-video">
							<ul class="list-none flex-wrapper align_items-center justify_content-center">
								<?php
								foreach ($data_video as $key => $value){
									if(!empty($value['link']) && !empty($value['image'])){
								?>		
								<li><a href="<?php echo esc_url($value['link']);?>" class="fancybox fancybox-media"><?php echo wp_get_attachment_image($value['image'],array(70,70));?></a></li>
								<?php		
									}
								}
								?>
							</ul>
						</div>
						<?php endif;?>
						<?php
							if(!empty($button)):
						?>
						<a class="shop-button black" href="<?php echo esc_url($button['url']);?>"><?php echo esc_html($button['title']);?></a>
						<?php endif;?>
					</div>
				</div>
				<?php
			break;
			case 'time-countdown':
				if(!empty($date)):
				?>
				<div class="final-countdown flex-wrapper <?php echo esc_attr($el_class);?>" data-countdown="<?php echo esc_attr($date);?>"></div>
				<?php  endif;
			break;
			case 'art-text':
				if(!empty($title)):
				?>
				<h2 class="title-art-text title60 lora-font font-bold <?php echo esc_attr($el_class);?>" id="<?php echo esc_attr(uniqid());?>" data-radius="<?php echo esc_attr($radius);?>"><?php echo esc_html($title);?></h2>
				<?php  endif;
			break;
            default:
				if(!empty($content)):
				?>
				<div class="custom-information <?php echo esc_attr($el_class);?>" data-wow-duration="<?php echo esc_attr($animate_duration);?>" data-wow-delay="<?php echo esc_attr($animate_delay);?>" data-wow-iteration="<?php echo esc_attr($animate_iteration);?>" data-wow-offset="<?php echo esc_attr($animate_offset);?>">
					<?php echo	wpb_js_remove_wpautop($content, true);?>
				</div>
				<?php endif;					
			break;
        }   
		$html = ob_get_clean();	
		return $html;
    }
}
stp_reg_shortcode('s7upf_information','s7upf_vc_information');
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_information',10,100 );
if ( ! function_exists( 's7upf_add_information' ) ) {
	function s7upf_add_information(){
		vc_map( array(
			"name"      => esc_html__("Information", 'skincare'),
			"base"      => "s7upf_information",
			"icon"      => "icon-st",
			"category"  => '7UP-Elements',
			"params"    => array(
				array(
					"type"          => "dropdown",
					"holder"        => "div",
					"heading"       => esc_html__("Style",'skincare'),
					"param_name"    => "style",
					"value"         => array(
						esc_html__("Default",'skincare')   => 'default',
						esc_html__("Timer Countdown",'skincare')   => 'time-countdown',
						esc_html__("Info Artist",'skincare')   => 'info-artist',
						esc_html__("Info category",'skincare')   => 'info-category',
						esc_html__("Info Service",'skincare')   => 'info-service',
						esc_html__("Info Service 2",'skincare')   => 'info-service2',
						esc_html__("Info Service 3",'skincare')   => 'info-service3',
						esc_html__("Info Service 4",'skincare')   => 'info-service4',
						esc_html__("Info Contact",'skincare')   => 'info-contact',
						esc_html__("Info Statics",'skincare')   => 'info-statics',
						esc_html__("Banner Category",'skincare')   => 'banner-category',
						esc_html__("Banner Category 2",'skincare')   => 'banner-category2',
						esc_html__("Banner Category 3",'skincare')   => 'banner-category3',
						esc_html__("Category Statistic",'skincare')   => 'cat-statistic',
						esc_html__("Video Popup",'skincare')   => 'video-popup',
						esc_html__("Video Banner",'skincare')   => 'video-parallax',
						esc_html__("Art Text",'skincare')   => 'art-text',
						esc_html__("Client Review",'skincare')   => 'client-review',
						esc_html__("Banner Collection",'skincare')   => 'banner-collection',
						esc_html__("Banner Hot Deal",'skincare')   => 'banner-hot-deal',
						esc_html__("Category Hot Deal",'skincare')   => 'cat-hot-deal',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link",'skincare'),
					"param_name" => "link",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-artist','info-service3','client-review','info-service4','info-contact','banner-hot-deal','cat-hot-deal'),
					)
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Image",'skincare'),
					"param_name" => "image",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-artist','banner-category','info-service3','cat-statistic','banner-category2','banner-category3','client-review','banner-collection','info-service4','info-category','banner-hot-deal','cat-hot-deal','video-parallax'),
					)
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Second Image",'skincare'),
					"param_name" => "image2",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('banner-hot-deal','cat-hot-deal'),
					)
				),
				array(
					"type"          => "textfield",
					"heading"       => esc_html__("Image Size",'skincare'),
					"param_name"    => "size",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-artist','banner-category','info-service3','cat-statistic','banner-category2','banner-category3','client-review','banner-collection','info-service4','info-category','banner-hot-deal','cat-hot-deal'),
					),
					'description'   => esc_html__( 'Enter site thumbnail to crop. [width]x[height]. Example is 300x300', 'skincare' ),
				),
				array(  
					'type' => 'iconpicker' ,
					'heading' => esc_html__('Icon', 'skincare'),
					'param_name' => 'icon',
					'value' => '',
					'settings'      => array(
						'emptyIcon'     => true,
						'type'          => s7upf_default_icon_lib(),
						'iconsPerPage'  => 4000,
					),
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-service','info-service2','info-contact'),
					),
					'description' =>  esc_html__( 'Select an icon from icons library.', 'skincare' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title",'skincare'),
					"param_name" => "title",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-artist','info-service','info-service2','info-service3','banner-category','banner-category2','banner-category3','art-text','cat-statistic','client-review','banner-collection','info-contact','info-statics','info-category','banner-hot-deal','cat-hot-deal','video-parallax'),
					)
				),
				array(
					'holder'     => 'div',
					'heading'     => esc_html__( 'Product Category', 'skincare' ),
					'type'        => 'autocomplete',
					'param_name'  => 'cats',
					'settings' => array(
						'values' => s7upf_get_list_taxonomy('product_cat'),
					),
					'save_always' => true,
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('banner-category','cat-statistic','banner-category2','banner-category3','banner-collection','info-category'),
					),
				),
				array(
					'holder'     => 'div',
					'heading'     => esc_html__( 'List Product Category', 'skincare' ),
					'type'        => 'autocomplete',
					'param_name'  => 'list_cats',
					'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'values'        => s7upf_get_list_taxonomy('product_cat'),
                    ),
					'save_always' => true,
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array(''),
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Sub Title",'skincare'),
					"param_name" => "sub_title",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('banner-hot-deal','cat-hot-deal'),
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Video",'skincare'),
					"param_name" => "video",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('video-popup'),
					),
					"description"   => esc_html__( 'Enter link(Youtube/Vimeo) of video', 'skincare' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Source Video",'skincare'),
					"param_name" => "src_video",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('video-parallax'),
					),
					'description' =>  esc_html__( 'Add Source video format *mp4', 'skincare' ),
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__("Description",'skincare'),
					"param_name" => "desc",
					"dependency"    => array(
						"element"   => "style",
						"value"   => array('info-artist','info-service','info-service2','info-service3','banner-category','banner-category2','client-review','info-category','banner-hot-deal','cat-hot-deal'),
					),
				),
				array(
					"type" => "param_group",
					"heading" => esc_html__("Add List Social Network",'skincare'),
					"param_name" => "list_icon",
					"params"    => array(
						array(  
							'type' => 'iconpicker' ,
							'heading' => esc_html__('Icon', 'skincare'),
							'param_name' => 'icon',
							'value' => '',
							'settings'      => array(
								'emptyIcon'     => true,
								'type'          => s7upf_default_icon_lib(),
								'iconsPerPage'  => 4000,
							),
							'description' =>  esc_html__( 'Select icon from Ion icon library.', 'skincare' ),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Link",'skincare'),
							"param_name" => "link",
						),
					),
					"dependency"    =>array(
						'element'   =>'style',
						'value'     =>array('team-member')
					),
				),
				array(
					"type" => "param_group",
					"heading" => esc_html__("Add List Video Popup",'skincare'),
					"param_name" => "list_video",
					"params"    => array(
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Image Video",'skincare'),
							"param_name" => "image",
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Link Video",'skincare'),
							"param_name" => "link",
							'description' =>  esc_html__( 'Add link video Youtube/Vimeo', 'skincare' ),
						),
					),
					"dependency"    =>array(
						'element'   =>'style',
						'value'     =>array('info-artist')
					),
				),
				array(
					"type"          => "vc_link",
					"heading"       => esc_html__("Button",'skincare'),
					"param_name"    => "button",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-artist'),
					)
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => esc_html__("Content",'skincare'),
					"param_name" => "content",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('default','video-popup','info-service4','info-contact'),
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Date",'skincare'),
					"param_name" => "date",
					"dependency"    => array(
						"element"   => "style",
						'value'   => array('time-countdown'),
					),
					'description'   => esc_html__( 'Enter date start count down.Format(m/d/y)', 'skincare' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Percent",'skincare'),
					"param_name" => "percent",
					"dependency"    => array(
						"element"   => "style",
						'value'   => array('info-statics'),
					),
					'description'   => esc_html__( 'Enter percent number value(0->100)', 'skincare' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Radius",'skincare'),
					"param_name" => "radius",
					"dependency"    => array(
						"element"   => "style",
						'value'   => array('art-text'),
					),
					'description'   => esc_html__( 'Enter circle radius(default:300)', 'skincare' ),
				),
				array(
					"type"          => "colorpicker",
					"heading"       => esc_html__("Color",'skincare'),
					"param_name"    => "color",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array(''),
					)
				),
				array(
					"type"          => "colorpicker",
					"heading"       => esc_html__("Background Color",'skincare'),
					"param_name"    => "background",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('banner-collection'),
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Progress Height",'skincare'),
					"param_name" => "st_height",
					"dependency"    => array(
						"element"   => "style",
						'value'   => array('info-statics'),
					),
					'description'   => esc_html__( 'Enter height for progress bar(Default:5px)', 'skincare' ),
				),
				array(
					"type"          => "colorpicker",
					"heading"       => esc_html__("Background Color",'skincare'),
					"param_name"    => "st_background",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-statics'),
					)
				),
				array(
					"type"          => "colorpicker",
					"heading"       => esc_html__("Color",'skincare'),
					"param_name"    => "st_color",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('info-statics'),
					)
				),
				array(
					"type"          => "dropdown",
					"holder"        => "div",
					"heading"       => esc_html__("Animation",'skincare'),
					"param_name"    => "animate",
					"value"         => array(
						esc_html__("No",'skincare')   => '',
						esc_html__("Yes",'skincare')   => 'wow',
					),
					"dependency"    => array(
						"element"   => "style",
						"value"   => array('default'),
					),
				),
				array(
					"type" => 'animation_style',
					"heading" => esc_html__("Animate Effect",'skincare'),
					"param_name" => "animate_effect",
					'value'         => '',
					'description' => esc_html__( 'Select effect for element', 'skincare' ),
					'group'       => esc_html__('Animate Option','skincare'), 
					'dependency'    => array(
						'element'   => 'animate',
						'value'     => array('wow'),
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Animate Duration', 'skincare' ),
					'param_name'  => 'animate_duration',
					'group'       => esc_html__('Animate Option','skincare'), 
					'description' => esc_html__( 'Enter time duration for animate:Ex(1s)', 'skincare' ),
					'dependency'    => array(
						'element'   => 'animate',
						'value'     => array('wow'),
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Animate Delay', 'skincare' ),
					'param_name'  => 'animate_delay',
					'group'       => esc_html__('Animate Option','skincare'), 
					'description' => esc_html__( 'Enter time delay for animate:Ex(1s)', 'skincare' ),
					'dependency'    => array(
						'element'   => 'animate',
						'value'     => array('wow'),
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Animate Iteration', 'skincare' ),
					'param_name'  => 'animate_iteration',
					'group'       => esc_html__('Animate Option','skincare'), 
					'description' => esc_html__( 'Enter times Iteration for animate:Value(number or infinite)', 'skincare' ),
					'dependency'    => array(
						'element'   => 'animate',
						'value'     => array('wow'),
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Animate Offset', 'skincare' ),
					'param_name'  => 'animate_offset',
					'group'       => esc_html__('Animate Option','skincare'), 
					'description' => esc_html__( 'Enter Space to footer for animate start on scroll:Ex(100px)', 'skincare' ),
					'dependency'    => array(
						'element'   => 'animate',
						'value'     => array('wow'),
					)
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