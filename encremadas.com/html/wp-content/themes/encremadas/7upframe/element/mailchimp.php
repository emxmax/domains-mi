<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/12/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_mailchimp') && class_exists('MC4WP_MailChimp')){
    function s7upf_vc_mailchimp($attr){
        $html = '';
        $data_array = array_merge(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
            'image'         => '',
            'placeholder'   => '',
            'submit'        => '',
            'form_id'       => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;        

        // Variable process
        $el_class .= ' '.$style;
        $form_html = apply_filters('s7upf_mailchimp_form',do_shortcode('[mc4wp_form id="'.$form_id.'"]'));

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'form_html' => $form_html,
            ));

        // Call function get template
        $html = s7upf_get_template_element('mailchimp/mailchimp',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_mailchimp','s7upf_vc_mailchimp');

vc_map( array(
    "name"          => esc_html__("MailChimp", 'skincare'),
    "base"          => "s7upf_mailchimp",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'skincare'),
    "description"   => esc_html__( 'Display mailchimp form', 'skincare' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'skincare'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'skincare')         => '',
                esc_html__("Popup",'skincare')         => 'popup',
            ),
            "description"   => esc_html__( 'Choose a style to display.', 'skincare' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image",'skincare'),
            "param_name"    => "image",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "popup",
            ),
            "description"   => esc_html__( 'Choose a image from media.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Form ID",'skincare'),
            "param_name"    => "form_id",
            "description"   => esc_html__( 'Enter mailchimp form ID.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'skincare'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter title of element.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Description",'skincare'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter description of element.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Placeholder Input",'skincare'),
            "param_name"    => "placeholder",
            "description"   => esc_html__( 'Enter placeholder of input email. Default is value of mailchimp form.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Submit Label",'skincare'),
            "param_name"    => "submit",
            "description"   => esc_html__( 'Enter label for submit button. Default is value of mailchimp form.', 'skincare' )
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