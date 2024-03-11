<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 31/08/15
 * Time: 10:00 AM
 */
/************************************Main Carousel*************************************/
if(!function_exists('s7upf_vc_slide_carousel'))
{
    function s7upf_vc_slide_carousel($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'item'          => '1',
            'speed'         => '',
            'itemres'       => '',
            'navigation'    => '',
            'pagination'    => '',
            'nav_next'      => '',
            'nav_prev'      => '',
			'animation_in'     => '',
            'animation_out'    => '',
            'margin'        => '',
            'stage_padding' => '',
            'start_position'=> '',
            'center'        => '',
            'autowidth'     => '',
            'loop'          => '',
            'mousewheel'    => '',
            'custom_css'    => '',
            'el_class'      => '',
            'content'       => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        $el_class .= ' '.$css_class;
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));
        $html = s7upf_get_template_element('slide-carousel/carousel','',$attr);
        return $html;
    }
}
stp_reg_shortcode('slide_carousel','s7upf_vc_slide_carousel');
vc_map(
    array(
        'name'          => esc_html__( 'Carousel Slider', 'skincare' ),
        'base'          => 'slide_carousel',
        "category"      => esc_html__("7UP-Elements", 'skincare'),
        "description"   => esc_html__( 'Display banner slider', 'skincare' ),
        'icon'          => 'icon-st',
        'as_parent'     => array( 'only' => 's7upf_advertisement,s7upf_information,sv_custom_link,vc_row,flex_wrapper,slide_testimonial_item,s7upf_banner_video' ),
        'content_element' => true,
		'is_container'            => true,
        'js_view'       => 'VcColumnView',
        'params'        => array(                       
            array(
                'heading'     => esc_html__( 'Item slider display', 'skincare' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter number of item. Default is 1.', 'skincare' ),
                'param_name'  => 'item',
            ),
            array(
                'heading'     => esc_html__( 'Custom Item', 'skincare' ),
                'type'        => 'textfield',
                'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'skincare' ),
                'param_name'  => 'itemres',
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
                    esc_html__( 'Transparent Navigation', 'skincare' )      => 'round-navi',
                    esc_html__( 'Group Navigation', 'skincare' )      => 'group-navi',
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
                    esc_html__( 'Pagination Style2', 'skincare' )      => 'pagi-nav-style2',
                ),
            ),
			array(
                "type"          => "textfield",
                "heading"       => esc_html__("Margin",'skincare'),
                "param_name"    => "margin",
                'group'         => esc_html__('Advanced','skincare'),
                'description'   => esc_html__( 'Enter number margin-right(px) on item.', 'skincare' )
                ),
			array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Slider Animation', 'skincare' ),
                'param_name'    => 'animation_in',
                'admin_label'   => true,
                'value'         => '',
				'group'         => esc_html__('Advanced','skincare'),
                'description' => esc_html__( 'Select type of animation for element to be animated when change slider show.', 'skincare' ),
            ),
			array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Slider Animation Out', 'skincare' ),
                'param_name'    => 'animation_out', 
                'admin_label'   => true,
                'value'         => '',
				'group'         => esc_html__('Advanced','skincare'),
                'description' => esc_html__( 'Select type of animation for element to be animated when changed slider.', 'skincare' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Stage Padding",'skincare'),
                "param_name"    => "stage_padding",
                'group'         => esc_html__('Advanced','skincare'),
                'description'   => esc_html__( 'Padding left and right on stage (can see neighbours).', 'skincare' )
                ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Start Position",'skincare'),
                "param_name"    => "start_position",
                'group'         => esc_html__('Advanced','skincare'),
                'description'   => esc_html__( 'Enter number of start position. Default is 0', 'skincare' )
                ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Auto Width",'skincare'),
                'group'         => esc_html__('Advanced','skincare'),
                "param_name"    => "autowidth",
                'value'       => array(
                    esc_html__( 'Off', 'skincare' )         => '',
                    esc_html__( 'On', 'skincare' )          => 'true',
                ),
                'description'   => esc_html__( 'Set non grid content. Try using width style on divs.', 'skincare' ),
                'edit_field_class'=>'vc_col-sm-6 vc_column',
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Center",'skincare'),
                'group'         => esc_html__('Advanced','skincare'),
                "param_name"    => "center",
                'value'       => array(
                    esc_html__( 'Off', 'skincare' )         => '',
                    esc_html__( 'On', 'skincare' )          => 'true',
                ),
                'description'   => esc_html__( 'Center item. Works well with even an odd number of items.', 'skincare' ),
                'edit_field_class'=>'vc_col-sm-6 vc_column',
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Loop",'skincare'),
                "param_name"    => "loop",
                'value'       => array(
                    esc_html__( 'Off', 'skincare' )         => '',
                    esc_html__( 'On', 'skincare' )          => 'true',
                ),
                'group'         => esc_html__('Advanced','skincare'),
                'description'   => esc_html__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'skincare' )
                ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Mousewheel",'skincare'),
                "param_name"    => "mousewheel",
                'value'       => array(
                    esc_html__( 'Off', 'skincare' )         => '',
                    esc_html__( 'On', 'skincare' )          => 'true',
                ),
                'group'         => esc_html__('Advanced','skincare'),
                'description'   => esc_html__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'skincare' )
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


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Slide_Carousel extends WPBakeryShortCodesContainer {}
}
