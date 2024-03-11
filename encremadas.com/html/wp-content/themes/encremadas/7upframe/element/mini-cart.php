<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */
if(class_exists("woocommerce")){
    if(!function_exists('s7upf_vc_mini_cart'))
    {
        function s7upf_vc_mini_cart($attr)
        {
            $html = $css_class = '';
            $data_array = array_merge(array(
                'style'         => '',
                'type'          => 'dropdown-box',
                'icon'          => 'la la-shopping-cart',
                'el_class'      => '',
                'custom_css'    => '',
            ),s7upf_get_responsive_default_atts());
            $attr = shortcode_atts($data_array,$attr);
            extract($attr);
            $css_classes = vc_shortcode_custom_css_class( $custom_css );
            $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
            
            // Variable process vc_shortcodes_css_class
            if(!empty($css_class)) $el_class .= ' '.$css_class;
            
            $el_class .= ' '.$style.' '.$type; 
            $attr = array_merge($attr,array(
                'el_class' => $el_class,
                ));

            if(!is_admin()){
                $html = s7upf_get_template_element('mini-cart/mini-cart',$style,$attr);
            }
            return apply_filters('s7upf_tempalte_mini_cart',$html);
        }
    }

    stp_reg_shortcode('sv_mini_cart','s7upf_vc_mini_cart');
    add_action( 'vc_before_init_base','s7upf_minicart_admin',10,100 );
    if ( ! function_exists( 's7upf_minicart_admin' ) ) {
        function s7upf_minicart_admin(){
            vc_map( array(
                "name"          => esc_html__("Mini Cart", 'skincare'),
                "base"          => "sv_mini_cart",
                "icon"          => "icon-st",
                "category"      => esc_html__("7UP-Elements", 'skincare'),
                "description"   => esc_html__( 'Display mini cart', 'skincare' ),
                "params"    => array(
                    array(
                        'heading'       => esc_html__( 'Style', 'skincare' ),
                        "admin_label"   => true,
                        'type'          => 'dropdown',
                        'param_name'    => 'style',
                        'value'         => array(
                            esc_html__('Default','skincare') => '',
                            esc_html__('Total Price','skincare') => 'total',
                            ),
                        'description'   => esc_html__( 'Choose a style to display.', 'skincare' )
                    ),
                    array(
                        'heading'       => esc_html__( 'Type', 'skincare' ),
                        "admin_label"   => true,
                        'type'          => 'dropdown',
                        'param_name'    => 'type',
                        'value'         => array(
                            esc_html__('Default','skincare') => 'dropdown-box',
                            esc_html__('Side box','skincare') => 'aside-box',
                            ),
                        'description'   => esc_html__( 'Choose a style to display.', 'skincare' )
                    ),
                    array(
                        'type'          => 'iconpicker',
                        'heading'       => esc_html__( 'Cart icon', 'skincare' ),
                        'param_name'    => 'icon',
                        'value'         => '',
                        'settings'      => array(
                            'emptyIcon'     => true,
                            'type'          => s7upf_default_icon_lib(),
                            'iconsPerPage'  => 4000,
                        ),
                        'description'   => esc_html__( 'Select icon from library.', 'skincare' ),
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
            ));
        }
    }
}