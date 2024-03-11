<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 31/08/15
 * Time: 10:00 AM
 */
/************************************Main Carousel*************************************/
if(!function_exists('s7upf_vc_banner_slider'))
{
    function s7upf_vc_banner_slider($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'speed'         => '',
            'navigation'    => '',
            'pagination'    => '',
            'nav_next'      => '',
            'nav_prev'      => '',
            'banner_bg'     => '',
            'animation_in'     => '',
            'animation_out'    => '',
            'custom_css'    => '',
            'el_class'      => '',
            'content'       => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        $el_class .= ' '.$banner_bg.' '.$css_class;
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));
        $html = s7upf_get_template_element('banner-slider/banner','',$attr);
        return $html;
    }
}
stp_reg_shortcode('banner_slider','s7upf_vc_banner_slider');
vc_map(
    array(
        'name'          => esc_html__( 'Banner Slider', 'skincare' ),
        'base'          => 'banner_slider',
        "category"      => esc_html__("7UP-Elements", 'skincare'),
        "description"   => esc_html__( 'Display banner slider', 'skincare' ),
        'icon'          => 'icon-st',
        'as_parent'     => array( 'only' => 'banner_slider_item,vc_row,s7upf_information,s7upf_advertisement' ),
        'content_element' => true,
        'js_view'       => 'VcColumnView',
        'params'        => array(       
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Banner Style', 'skincare' ),
                'param_name'  => 'banner_bg',
                'value'       => array(
                    esc_html__( 'Default', 'skincare' )                 => '',
                    esc_html__( 'Background', 'skincare' )              => 'bg-slider',
                    esc_html__( 'Circle Image', 'skincare' )            => 'circle-slider',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Speed', 'skincare' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'skincare' ),
                'param_name'  => 'speed',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'skincare' ),
                'param_name'  => 'navigation',
                'value'       => array(
                    esc_html__( 'Hidden', 'skincare' )                  => '',
                    esc_html__( 'Default Navigation', 'skincare' )      => 'navi-nav-style',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Text prev', 'skincare' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter text/html previous button slider', 'skincare' ),
                'param_name'  => 'nav_prev',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                    )
            ),
            array(
                'heading'     => esc_html__( 'Text next', 'skincare' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter text/html next button slider', 'skincare' ),
                'param_name'  => 'nav_next',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                    )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'skincare' ),
                'param_name'  => 'pagination',
                'value'       => array(
                    esc_html__( 'Hidden', 'skincare' )                  => '',
                    esc_html__( 'Default Pagination', 'skincare' )      => 'pagi-nav-style',
                    esc_html__( 'Number Pagination', 'skincare' )      => 'pagi-nav-number',
                ),
            ),
           
			array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Slider Animation In', 'skincare' ),
                'param_name'    => 'animation_in',
                'admin_label'   => true,
                'value'         => '',
                'description' => esc_html__( 'Select type of animation for element to be animated when changed slider.', 'skincare' ),
            ),
			array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Slider Animation Out', 'skincare' ),
                'param_name'    => 'animation_out',
                'admin_label'   => true,
                'value'         => '',
                'description' => esc_html__( 'Select type of animation for element to be animated when changed slider.', 'skincare' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Extra class name",'skincare'),
                "param_name"    => "el_class",
                'group'         => esc_html__('Design Options','skincare'),
                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'skincare' )
                ),
            array(
                "type"          => "css_editor",
                "heading"       => esc_html__("CSS box",'skincare'),
                "param_name"    => "custom_css",
                'group'         => esc_html__('Design Options','skincare')
                ),
        )
    )
);

/*******************************************END MAIN*****************************************/


/**************************************BEGIN ITEM************************************/
//Banner item Frontend
if(!function_exists('s7upf_vc_banner_slider_item'))
{
    function s7upf_vc_banner_slider_item($attr, $content = false)
    {
        $html = $ads_class = $css_class = '';
        $attr = shortcode_atts(array(
            'image'             => '',
            'link'              => '',
            'info_style'        => '',
            'item_style'        => '',
            'info_align'        => '',
            'info_transform'    => '',
            'custom_css'        => '',
            'el_class'          => '',
            'content'           => $content,
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$css_class;
		if(!empty($item_style)) $el_class .= ' item-style-'.$item_style;
        $info_class = $info_style.' '.$info_align.' '.$info_transform;
        if(!empty($info_animation)) $info_class .= ' animated';
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'info_class'    => $info_class,
            ));
        if(!empty($image)){
            $html = s7upf_get_template_element('banner-slider/item','',$attr);
        }
        return $html;
    }
}
stp_reg_shortcode('banner_slider_item','s7upf_vc_banner_slider_item');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'Banner Item', 'skincare' ),
        'base'     => 'banner_slider_item',
        'icon'     => 'icon-st',
        'content_element' => true,
        'as_child' => array('only' => 'banner_slider'),
        'params'   => array(     
			array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Banner Item Style', 'skincare' ),
                'param_name'    => 'item_style',
                'value'         => array(
                    esc_html__( 'Default', 'skincare' )        => '',
                    )
            ),
            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( 'Image Banner', 'skincare' ),
                'param_name'    => 'image',
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Link Banner', 'skincare' ),
                'param_name'    => 'link',
            ),        
            array(
                "type"          => "textarea_html",
                "holder"        => "div",
                "heading"       => esc_html__("Content",'skincare'),
                "param_name"    => "content",
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Style', 'skincare' ),
                'param_name'    => 'info_style',
				'group'         => esc_html__('Info Banner','skincare'),
                'value'         => array(
                    esc_html__( 'None', 'skincare' )     => '',
                    esc_html__( 'Black', 'skincare' )    => 'black',
                    esc_html__( 'White', 'skincare' )    => 'white',
				)
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Align', 'skincare' ),
                'param_name'    => 'info_align',
				'group'         => esc_html__('Info Banner','skincare'),
                'value'         => array(
                    esc_html__( 'Default', 'skincare' )    => '',
                    esc_html__( 'Left', 'skincare' )       => 'text-left',
                    esc_html__( 'Right', 'skincare' )      => 'text-right',
                    esc_html__( 'Center', 'skincare' )     => 'text-center',
                    )
			),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Transform', 'skincare' ),
                'param_name'    => 'info_transform',
				'group'         => esc_html__('Info Banner','skincare'),
                'value'         => array(
                    esc_html__( 'Default', 'skincare' )     => '',
                    esc_html__( 'Uppercase', 'skincare' )   => 'text-uppercase',
                    )
			),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Extra class name",'skincare'),
                "param_name"    => "el_class",
                'group'         => esc_html__('Design Options','skincare'),
                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'skincare' )
            ),
            array(
                "type"          => "css_editor",
                "heading"       => esc_html__("CSS box",'skincare'),
                "param_name"    => "custom_css",
                'group'         => esc_html__('Design Options','skincare')
            ),
        )
    )
);

/**************************************END ITEM************************************/

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Banner_Slider extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Banner_Slider_Item extends WPBakeryShortCode {}    
}