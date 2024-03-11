<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_map')){
    function s7upf_vc_map($attr){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => 'default',
            'market'        => '',
            'zoom'          => '16',
            'location'      => '',
            'control'       => 'yes',
            'scrollwheel'   => 'yes',
            'disable_ui'    => 'no',
            'draggable'     => 'yes',
            'width'         => '100%',
            'height'        => '500px',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );

        $el_class .= ' '.$style.' '.$css_class;
        parse_str( urldecode( $location ), $locations);
        $location_text = '';
        foreach ($locations as $values) {
            $location_text .= '|';
            foreach ($values as $value) {
                $location_text .= $value.',';
            }
        }
        $img = '';
        if($market != '') $img = wp_get_attachment_image_url($market,"full");
        $id = 'sv-map-'.uniqid();
        $map_css = 'width:'.$width.';height:'.$height.';max-width-100%;';
        $html .=    '<div class="clearfix"></div>
                    <div id="'.esc_attr($id).'" 
                        class="sv-ggmaps '.esc_attr($el_class).' '.esc_attr(S7upf_Assets::build_css($map_css)).'" 
                        data-location="'.esc_attr($location_text).'" 
                        data-market="'.esc_attr($img).'" 
                        data-zoom="'.esc_attr($zoom).'" 
                        data-style="'.esc_attr($style).'" 
                        data-control="'.esc_attr($control).'" 
                        data-scrollwheel="'.esc_attr($scrollwheel).'" 
                        data-disable_ui="'.esc_attr($disable_ui).'" 
                        data-draggable="'.esc_attr($draggable).'">
                    </div>';
        return $html;
    }
}

stp_reg_shortcode('sv_map','s7upf_vc_map');

vc_map( array(
    "name"          => esc_html__("Google Map", 'skincare'),
    "base"          => "sv_map",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'skincare'),
    "description"   => esc_html__( 'Create your map with one or more location ', 'skincare' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Map Style",'skincare'),
            "param_name"    => "style",
            'value' => array(
                esc_html__('Default','skincare') => 'default',
                esc_html__('Grayscale','skincare') => 'grayscale',
                esc_html__('Blue','skincare') => 'blue',
                esc_html__('Dark','skincare') => 'dark',
                esc_html__('Pink','skincare') => 'pink',
                esc_html__('Light','skincare') => 'light',
                esc_html__('Blueessence','skincare') => 'blueessence',
                esc_html__('Bentley','skincare') => 'bentley',
                esc_html__('Retro','skincare') => 'retro',
                esc_html__('Cobalt','skincare') => 'cobalt',
                esc_html__('Brownie','skincare') => 'brownie'
            ),
        ),
        array(
            "type"          => "add_location_map",
            "heading"       => esc_html__( "Add Map Location", 'skincare' ),
            "param_name"    => "location",
            "description"   => esc_html__( "Click Add more button to add location.", 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__( "Map Zoom", 'skincare' ),
            "param_name"    => "zoom",
            "description"   => esc_html__( "Enter zoom for map. Default is 16", 'skincare' ),
        ),
        array(
            'type'          => 'attach_image',
            "admin_label"   => true,
            'heading'       => esc_html__( 'Marker Image', 'skincare' ),
            'param_name'    => 'market',
            "description"   => esc_html__( 'Select image from media library.', 'skincare' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Map Width', 'skincare' ),
            'param_name'    => 'width',
            "description"   => esc_html__( "This is value to set width for map. Unit % or px. Example: 100%,500px. Default is 100%", 'skincare' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Map Height', 'skincare' ),
            'param_name'    => 'height',
            "description"   => esc_html__( "This is value to set height for map. Unit % or px. Example: 100%,500px. Default is 500px", 'skincare' )
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("MapTypeControl",'skincare'),
            "param_name"    => "control",
            'value'         => array(
                esc_html__('Yes','skincare') => 'yes',
                esc_html__('No','skincare') => 'no',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Scrollwheel",'skincare'),
            "param_name"    => "scrollwheel",
            'value'         => array(
                esc_html__('Yes','skincare') => 'yes',
                esc_html__('No','skincare') => 'no',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("DisableDefaultUI",'skincare'),
            "param_name"    => "disable_ui",
            'value'         => array(
                esc_html__('No','skincare') => 'no',
                esc_html__('Yes','skincare') => 'yes',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column'
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Draggable",'skincare'),
            "param_name"    => "draggable",
            'value'         => array(
                esc_html__('Yes','skincare') => 'yes',
                esc_html__('No','skincare') => 'no',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column'
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