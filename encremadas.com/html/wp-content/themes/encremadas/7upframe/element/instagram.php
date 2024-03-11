<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_instagram_box')){
    function s7upf_vc_instagram_box($attr){
        $html = '';
        $data_array = array_merge(array(
            'style'         => 'default',
            'source'        => '',
            'title'         => '',
            'des'           => '',
            'user'          => '',
            'photos'        => '6',
            'token'         => '',
            'list'          => '',
            'size'          => '',
            'size_index'    => '0',
            'itemres'       => '',
            'speed'         => '',
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
        $size = s7upf_get_size_crop($size,'full');
        $data = array();
        if($source == 'media'){
            $default_val = array(
                'icon'      => '',
                'link'      => '',
                'like'      => '',
                'comment'      => '',
            );
            $data_media = (array) vc_param_group_parse_atts( $list );
            if(is_array($data_media)){
                foreach ($data_media as $key => $value){
                    $value = array_merge($default_val,$value);
                    $data[] = array(
                        'image_url' => wp_get_attachment_image_src($value['image'],$size)[0],
                        'link'      => $value['link'],
                        'like'      => $value['like'],
                        'comment'      => $value['comment'],
                    );
                }
            }            
        }
        else{
            if(!empty($user) && function_exists('s7upf_scrape_instagram')){
                $media_array = s7upf_scrape_instagram($user, $photos, $token, $size_index);
                if(is_array($media_array)) if(isset($media_array['photos'])) $media_array = $media_array['photos'];
                if(!empty($media_array)){
                    foreach ($media_array as $item) {
                        if(isset($item['link']) && isset($item['thumbnail_src'])){
                            $data[] = array(
                                'image_url' => $item['thumbnail_src'],
                                'link'      => $item['link'],
                                'like'      => $item['like']['count'],
                                'comment'      => $item['comment']['count'],
                            );
                        }
                    }              
                }
            }
        }
        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            'data' => $data,
            ));

        // Call function get template
        $html = s7upf_get_template_element('instagram/instagram',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('sv_instagram_box','s7upf_vc_instagram_box');

vc_map( array(
    "name"          => esc_html__("Instagram", 'skincare'),
    "base"          => "sv_instagram_box",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'skincare'),
    "description"   => esc_html__( 'Display images from instagram', 'skincare' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'skincare'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'skincare')     => 'default',
                esc_html__("Slider",'skincare')      => 'slider',
                )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Source",'skincare'),
            "param_name"    => "source",
            "value"         => array(
                esc_html__("User name",'skincare')           => 'username',
                esc_html__("From your media",'skincare')     => 'media',
                )
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
            "heading"       => esc_html__("User",'skincare'),
            "param_name"    => "user",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            "description"   => esc_html__( 'Enter user name of Instagram.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Number",'skincare'),
            "param_name"    => "photos",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            "description"   => esc_html__( 'Enter number of photos to display. Default is 6.', 'skincare' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Token",'skincare'),
            "param_name"    => "token",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            "description"   => esc_html__("Enter token to view more 12 of photos. Create token your account at: https://outofthesandbox.com/pages/instagram-access-token",'skincare'),
        ),
        
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Image custom size",'skincare'),
            "param_name"    => "size_index",
            "value"         => array(
                esc_html__("Small",'skincare')          => '0',
                esc_html__("Medium",'skincare')         => '1',
                esc_html__("Large",'skincare')          => '2',
                esc_html__("General",'skincare')          => '3',
                ),
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('username'),
            ),
            'description'   => esc_html__( 'Choose instagram image size to display', 'skincare' ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'skincare'),
            "param_name"    => "size",
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('media'),
            ),
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'skincare' ),
        ),
        array(
            "type"          => "param_group",
            "heading"       => esc_html__("Add Image List",'skincare'),
            "param_name"    => "list",
            "params"        => array(
                array(
                    "type"          => "attach_image",
                    "heading"       => esc_html__("Image",'skincare'),
                    "param_name"    => "image",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Link",'skincare'),
                    "param_name"    => "link",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Like Number",'skincare'),
                    "param_name"    => "like",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Comment Number",'skincare'),
                    "param_name"    => "comment",
                ),
            ),
            'dependency'    => array(
                'element'       => 'source',
                'value'         => array('media'),
            ),
            'description'   => esc_html__( 'Add more image with link', 'skincare' ),
        ),
        array(
            'heading'       => esc_html__( 'Custom Item', 'skincare' ),
            'type'          => 'textfield',
            'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'skincare' ),
            'param_name'    => 'itemres',
            'group'         => esc_html__("Slider Settings",'skincare'),
            'dependency'    => array(
                'element'       => 'style',
                'value'         => array('slider'),
            )
        ),        
        array(
            'heading'       => esc_html__( 'Speed', 'skincare' ),
            'type'          => 'textfield',
            'group'         => esc_html__("Slider Settings",'skincare'),
            'description'   => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'skincare' ),
            'param_name'    => 'speed',
            'dependency'    => array(
                'element'       => 'style',
                'value'         => array('slider'),
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
));