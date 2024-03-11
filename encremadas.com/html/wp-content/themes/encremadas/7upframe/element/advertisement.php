<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_advertisement'))
{
    function s7upf_vc_advertisement($attr,$content = false)
    {
        $html = $css_class = $css_class2 = '';
        $data_array = array_merge(array(
            'style'         => '',
            'image'         => '',
            'image2'        => '',
            'link'          => '',
			'link2'         => '',
			'title'         => '',
			'date'          => '',
			'caption'       => 'style1',
            'animation'     => '',
            'el_class'      => '',
            'el_class2'     => '',
            'custom_css'    => '',
            'custom_css2'   => '',
            'size'          => '',
            'content'       => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        if(!empty($custom_css2)) $el_class2 .= ' '.vc_shortcode_custom_css_class( $custom_css2 );
        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'el_class2' => $el_class2,
            'size'      => $size,
            ));

        $html = s7upf_get_template_element('advertisement/advertisement',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_advertisement','s7upf_vc_advertisement');

vc_map( array(
    "name"          => esc_html__("Advertisement", 'skincare'),
    "base"          => "s7upf_advertisement",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'skincare'),
    "description"   => esc_html__( 'Display a advertisement', 'skincare' ),
    "params"        => array( 
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'skincare'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'skincare')   => '',
                esc_html__("Content Outer",'skincare')   => 'outer',
                esc_html__("Banner Video",'skincare')   => 'video',
                esc_html__("Title Vertical",'skincare')   => 'title',
                esc_html__("Banner Caption",'skincare')   => 'caption',
                esc_html__("Content Middle",'skincare')   => 'flex',
                esc_html__("Content Gradient",'skincare')   => 'gradient',
                esc_html__("Content Gradient 2",'skincare')   => 'gradient-style2',
                esc_html__("Content Gradient 3",'skincare')   => 'gradient-style3',
            ),
            "description"   => esc_html__( 'Choose menu style to display.', 'skincare' )
        ),
        array(
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Image",'skincare'),
            "param_name"    => "image",
            "description"   => esc_html__( 'Select image from media library.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'skincare'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'skincare' ),
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Animation",'skincare'),
            "param_name"    => "animation",
            "value"         => array(
                esc_html__("Default",'skincare')                    => '',
                esc_html__("Zoom",'skincare')                       => 'zoom-image',
                esc_html__("Zoom Overlay",'skincare')               => 'overlay-image zoom-image',
                esc_html__("Zoom in",'skincare')                    => 'zoom-in',
                esc_html__("Zoom in Overlay",'skincare')            => 'zoom-in overlay-image',
                esc_html__("Zoom out",'skincare')                   => 'zoom-out',
                esc_html__("Zoom out Overlay",'skincare')           => 'zoom-out overlay-image',
                esc_html__("Fade out-in",'skincare')                => 'fade-out-in',
                esc_html__("Zoom Fade out-in",'skincare')           => 'zoom-image fade-out-in',
                esc_html__("Fade in-out",'skincare')                => 'fade-in-out',
                esc_html__("Zoom rotate",'skincare')                => 'zoom-rotate',
                esc_html__("Zoom rotate Fade out-in",'skincare')    => 'zoom-rotate fade-out-in',
                esc_html__("Overlay",'skincare')                    => 'overlay-image',
                esc_html__("Zoom image line",'skincare')            => 'zoom-image line-scale',
                esc_html__("Zoom in line",'skincare')               => 'zoom-in line-scale',
                esc_html__("Gray image",'skincare')                 => 'gray-image',
                esc_html__("Gray image line",'skincare')            => 'gray-image line-scale',
                esc_html__("Pull curtain",'skincare')               => 'pull-curtain',
                esc_html__("Pull curtain gray image",'skincare')    => 'pull-curtain gray-image',
                esc_html__("Pull curtain zoom image",'skincare')    => 'pull-curtain zoom-image',
                esc_html__("Fly Cross",'skincare')                  => 'fly-cross',
                esc_html__("Fly Cross Zoom In",'skincare')          => 'fly-cross zoom-in',
            ),
            "description"   => esc_html__( 'Select type of animation for image.', 'skincare' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image fade",'skincare'),
            "param_name"    => "image2",
            "dependency"    => array(
                "element"       => "animation",
                "value"     => array("zoom-out","zoom-out overlay-image"),
            ),
            "description"   => esc_html__( 'Select image from media library.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link",'skincare'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Enter URL redirect when click to image.', 'skincare' )
        ),  
		array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link Video",'skincare'),
            "param_name"    => "link2",
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('video')
			),
            "description"   => esc_html__( 'Enter link(Youtube/Vimeo) of video', 'skincare' )
        ), 
		array(
            "type"          => "textfield",
            "heading"       => esc_html__("Title",'skincare'),
            "param_name"    => "title",
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('title','caption')
			),
        ), 
		array(
            "type"          => "textfield",
            "heading"       => esc_html__("Time Count Down",'skincare'),
            "param_name"    => "date",
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('countdown')
			),
			"description"   => esc_html__( 'Enter date/time countdown by format(m/d/y)', 'skincare' )
        ), 
        array(
            "type"          => "textarea_html",
            "holder"        => "div",
            "heading"       => esc_html__("Content Info",'skincare'),
            "param_name"    => "content",
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('','outer','title','gradient')
			),
            "description"   => esc_html__( 'Enter info content of element.', 'skincare' )
        ),
		array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Caption Style",'skincare'),
            "param_name"    => "caption",
            "value"         => array(
                esc_html__("Style 1",'skincare')               => 'style1',
                esc_html__("Style 2",'skincare')               => 'style2',
                esc_html__("Style 3",'skincare')               => 'style3',
            ),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('caption')
			),
            "description"   => esc_html__( 'Select type of animation for image.', 'skincare' )
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
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'skincare'),
            "param_name"    => "el_class2",
            'group'         => esc_html__('Design Info Box','skincare'),
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'skincare' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'skincare'),
            "param_name"    => "custom_css2",
            'group'         => esc_html__('Design Info Box','skincare')
        ),
    )
));