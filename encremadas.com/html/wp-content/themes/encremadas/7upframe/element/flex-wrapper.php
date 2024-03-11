<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 31/08/15
 * Time: 10:00 AM
**/
if(!function_exists('s7upf_vc_flex_wrapper'))
{
    function s7upf_vc_flex_wrapper($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'flex_direction'    => '',
            'flex_wrap'    => '',
            'justify_content'    => '',
            'align_items'      => '',
            'custom_css'    => '',
            'el_class'      => '',
            'content'       => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
		if(!empty($flex_direction)) $flex_direction = 'flex_direction-'.$flex_direction;
		if(!empty($flex_wrap)) $flex_wrap = 'flex_wrap-'.$flex_wrap;
		if(!empty($justify_content)) $justify_content = 'justify_content-'.$justify_content;
		if(!empty($align_items)) $align_items = 'align_items-'.$align_items;
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .=  ' '.$css_class.' '.$flex_wrap.' '.$justify_content.' '.$align_items.' '.$flex_direction;
        $html .=   '<div class="flex-wrapper '.$el_class.'">
						'.wpb_js_remove_wpautop($content, false).'
					</div>';
        return $html;
    }
}
stp_reg_shortcode('flex_wrapper','s7upf_vc_flex_wrapper');
vc_map(
    array(
        'name'          => esc_html__( 'Flex Wrapper', 'skincare' ),
        'base'          => 'flex_wrapper',
        "category"      => esc_html__("7UP-Elements", 'skincare'),
        "description"   => esc_html__( 'Display Flex Box', 'skincare' ),
        'icon'          => 'icon-st',
		'is_container' => true,
        'js_view'       => 'VcColumnView',
        'params'        => array(       
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Flex Direction', 'skincare' ),
                'param_name'  => 'flex_direction',
                'value'       => array(
                    esc_html__( 'Default', 'skincare' )                  => '',
                    esc_html__( 'Row', 'skincare' )                     => 'row',
                    esc_html__( 'Column', 'skincare' )                  => 'column',
                ),
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Flex Wrap', 'skincare' ),
                'param_name'  => 'flex_wrap',
                'value'       => array(
                    esc_html__( 'Default', 'skincare' )                  => '',
                    esc_html__( 'Wrap', 'skincare' )                     => 'wrap',
                    esc_html__( 'No Wrap', 'skincare' )                  => 'nowrap',
                ),
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Justify Content', 'skincare' ),
                'param_name'  => 'justify_content',
                'value'       => array(
                    esc_html__( 'Default', 'skincare' )                  => '',
                    esc_html__( 'Flex Start', 'skincare' )               => 'flex-start',
                    esc_html__( 'Flex End', 'skincare' )                 => 'flex-end',
                    esc_html__( 'Center', 'skincare' )                   => 'center',
                    esc_html__( 'Space Between', 'skincare' )            => 'space-between',
                    esc_html__( 'Space Around', 'skincare' )             => 'space-around',
                ),
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Align Items', 'skincare' ),
                'param_name'  => 'align_items',
                'value'       => array(
                    esc_html__( 'Default', 'skincare' )                  => '',
                    esc_html__( 'Flex Start', 'skincare' )               => 'flex-start',
                    esc_html__( 'Flex End', 'skincare' )                 => 'flex-end',
                    esc_html__( 'Center', 'skincare' )                   => 'center',
                    esc_html__( 'Baseline', 'skincare' )                 => 'baseline',
                    esc_html__( 'Stretch', 'skincare' )                  => 'stretch',
                ),
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

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Flex_Wrapper extends WPBakeryShortCodesContainer {}
}