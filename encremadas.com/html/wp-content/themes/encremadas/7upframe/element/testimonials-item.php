<?php 
//Banner item Frontend
if(!function_exists('s7upf_vc_slide_testimonial_item'))
{
    function s7upf_vc_slide_testimonial_item($attr, $content = false)
    {
        $html = '';
        $data_array = array_merge(array(
            'style'         => '',
            'image'         => '',
            'name'          => '',
            'des'           => '',
            'link'          => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $html .=    '<div class="item-testimo '.esc_attr($style).'">
                        <div class="testimo-thumb">
                            <a href="'.esc_url($link).'">'.wp_get_attachment_image($image,array(100,100),0,array("class"=>"round")).'</a>
                        </div>
                        <div class="testimo-info text-center">
                            <p class="desc gray">'.esc_html($des).'</p>
                            <a href="'.esc_url($link).'" class="title14 font-bold color">'.esc_html($name).'</a>
                        </div>
                    </div>';
        return $html;
    }
}
stp_reg_shortcode('slide_testimonial_item','s7upf_vc_slide_testimonial_item');

if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_testimonial_item',10,100 );
if ( ! function_exists( 's7upf_testimonial_item' ) ) {
    function s7upf_testimonial_item(){
        vc_map(
            array(
                'name'     => esc_html__( 'Testimonial Item', 'skincare' ),
                'base'     => 'slide_testimonial_item',
                'icon'     => 'icon-st',
                'as_child' => array('only' => 'slide_carousel'),
                'params'   => array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Style', 'skincare' ),
                        'param_name'  => 'style',
                        'value'       => array(
                            esc_html__( 'Default', 'skincare' ) => '',
                        )
                    ),            
                    array(
                        'type'        => 'attach_image',
                        'heading'     => esc_html__( 'Image', 'skincare' ),
                        'param_name'  => 'image',
                    ),
                    array(
                        'type'        => 'textfield',
                        "holder"        => "h3",
                        'heading'     => esc_html__( 'Name', 'skincare' ),
                        'param_name'  => 'name',
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Link', 'skincare' ),
                        'param_name'  => 'link',
                    ),  
                    array(
                        "type"          => "textarea",
                        "heading"       => esc_html__("Description",'skincare'),
                        "param_name"    => "des",
                    ),
                )
            )
        );
    }
}
