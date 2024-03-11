<?php
/**
 * User: vinh
 * Date: 2018
 */

if(!function_exists('s7upf_vc_banner_video'))
{
    function s7upf_vc_banner_video($attr , $content = false)
    {
        $html = $settings = $css_class = '';
        extract(shortcode_atts(array(
            'style'         => '',
            'poster'        => '',
            'size'          => '',
            'video_link'    => '',
            'loop'          => 'loop',
            'audio'         => 'muted',
            'autoplay'      => 'autoplay',
            'link'          => '',
            'info_align'        => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),$attr));
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' '.$style;

        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        if(!empty($poster)) $settings .= 'poster="'.wp_get_attachment_image_url($poster,$size).'"';
        if($loop != 'no') $settings .= ' '.$loop;
        if($audio != 'no') $settings .= ' '.$audio;
        if($autoplay != 'no') $settings .= ' '.$autoplay;


        switch ($style) {
            case 'style-content':
                $html .=    '<div class="banner-video '.esc_attr($el_class).'">';
                if(!empty($link)) $html .=    '<a href="'.esc_url($link).'">';
                $html .=        '<div class="video-wrap  '.$autoplay.'">
                                    <video '.$settings.' class="video-play" oncontextmenu="return false;" >
                                        <source src="'.esc_url($video_link).'" type="video/mp4">
                                    </video>
                                    <a class="video-btn" href="#" title="'.esc_attr__('Play', 'mmasport' ).'">
                                        <span class="icon-play color"><i class="la la-play"></i></span>
                                    </a>
                                    <a class="mute-video '.$audio.'" href="#"><i class="la la la-volume-up"></i></a>
                                    <div class="video-overlay"></div>
                                </div>';
                if(!empty($link)) $html .=    '</a>';
                if(!empty($content)){
                    $html .=    '<div class="video-info">
                                    <div class="slider-content-text '.esc_attr($info_align).'">
                                        '.wpb_js_remove_wpautop($content, true).'
                                    </div>
                                </div>';
                }
                $html .=    '</div>';

            break;

            default:      
                $html .=    '<div class="banner-video '.esc_attr($el_class).'">
                                <a class="mute-video" href="#"><i class="la la la-volume-up"></i></a>
                                <a class="video-btn" href="#" title="'.esc_attr__('Play', 'mmasport' ).'">
                                    <span class="icon-play color"><i class="la la-play"></i></span>
                                </a>
                                <video '.$settings.' oncontextmenu="return false;" class="video-play">
                                    <source src="'.esc_url($video_link).'" type="video/mp4">
                                </video>
                            </div>';

            break;
        }        
        return $html;
    }
}

stp_reg_shortcode('s7upf_banner_video','s7upf_vc_banner_video');

vc_map( array(
    "name"      => esc_html__("Banner Video", 'skincare'),
    "base"      => "s7upf_banner_video",
    "icon"      => "icon-st",
    "description"   => esc_html__( 'Display video background', 'skincare' ),
    "category"  => esc_html__("7UP-Elements", 'skincare'),
    "params"    => array(
         array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Style', 'skincare' ),
            'param_name'  => 'style',
            'value'       => array(
                esc_html__( 'Default', 'skincare' )      => '',
                esc_html__( 'Content', 'skincare' )      => 'style-content',
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image video preview",'skincare'),
            "param_name" => "poster",
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image video preview custom size",'skincare'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'skincare' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video source",'skincare'),
            "param_name" => "video_link",
            "description" => esc_html__( "Enter video source.", 'skincare' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Redirect Link",'skincare'),
            "param_name" => "link",
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Loop', 'skincare' ),
            'param_name'  => 'loop',
            'value'       => array(
                esc_html__( 'Yes', 'skincare' )                  => 'loop',
                esc_html__( 'No', 'skincare' )                  => 'no',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Audio', 'skincare' ),
            'param_name'  => 'audio',
            'value'       => array(
                esc_html__( 'No', 'skincare' )                  => 'muted',
                esc_html__( 'Yes', 'skincare' )                  => 'no',
            ),
            'std' => 'muted',
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Autoplay', 'skincare' ),
            'param_name'  => 'autoplay',
            'value'       => array(
                esc_html__( 'Yes', 'skincare' )                  => 'autoplay',
                esc_html__( 'No', 'skincare' )                  => 'no',
            ),
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Content",'skincare'),
            "param_name" => "content",
            "dependency"    => array(
                "element"       => "style",
                "value"     => array("style-content"),
            ),
        ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Align', 'skincare' ),
                'param_name'    => 'info_align',
                'value'         => array(
                    esc_html__( 'Default', 'skincare' )    => '',
                    esc_html__( 'Left', 'skincare' )       => 'text-left',
                    esc_html__( 'Right', 'skincare' )      => 'text-right',
                    esc_html__( 'Center', 'skincare' )     => 'text-center',
                    ),
                "dependency"    => array(
                        "element"       => "style",
                        "value"     => array("style-content"),
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
));

