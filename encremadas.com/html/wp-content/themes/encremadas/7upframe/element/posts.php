<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 05/09/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_posts')){
    function s7upf_vc_posts($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'display'       => 'grid',
            'style'         => 'default',
            'title'         => '',
            'des'           => '',
            'number'        => '8',
            'cats'          => '',
            'order_by'      => 'date',
            'order'         => 'DESC',
            'column'        => '1',
            'row_number'    => '1',
            'pagination'    => '',
            'grid_type'     => '',
            'item_style'    => '',
            'item'          => '',
            'item_res'      => '',
            'speed'         => '',
            'slider_navi'   => '',
            'slider_pagi'   => '',
            'size'          => '',
            'el_class'      => '',
            'custom_css'    => '',
            'excerpt'       => '',
            'custom_ids'    => '',
            'exclude'       => '',
            'post_type' => 'post'
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' blog-'.$display.'-view '.$grid_type.' '.$style;
        $paged = (get_query_var('paged') && $display != 'slider') ? get_query_var('paged') : 1;
        $args = array(
            'post_type'         => $post_type,
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged,
            );            
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query'][]=array(
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=> $custom_list
            );
        }
        if(!empty($custom_ids)){
            $args['post__in'] = explode(',', $custom_ids);
        }
        if(!empty($exclude)){
            $args['post__not_in'] = explode(',', $exclude);
        }
        $post_query = new WP_Query($args);
        $count = 1;
        $count_query = $post_query->post_count;
        $max_page = $post_query->max_num_pages;
        $size = s7upf_get_size_crop($size);
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'post_query'    => $post_query,
            'count'         => $count,
            'count_query'   => $count_query,
            'max_page'      => $max_page,
            'args'          => $args,
            'size'          => $size,
        ));
        $html = s7upf_get_template_element('posts/'.$display,$style,$attr);
        wp_reset_postdata();
        return $html;
    }
}
stp_reg_shortcode('s7upf_posts','s7upf_vc_posts');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_post',10,100 );
if ( ! function_exists( 's7upf_add_list_post' ) ) {
    function s7upf_add_list_post(){
        vc_map( array(
            "name"      => esc_html__("Posts", 'skincare'),
            "base"      => "s7upf_posts",
            "icon"      => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'skincare'),
            "description"   => esc_html__( 'Display list of post', 'skincare' ),
            "params"    => array(                
                array(
                    'type'        => 'textfield',
                    "admin_label"   => true,
                    'heading'     => esc_html__( 'Title', 'skincare' ),
                    'param_name'  => 'title',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Description', 'skincare' ),
                    'param_name'  => 'des',
                ),
                array(
                    'heading'     => esc_html__( 'Style', 'skincare' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose style to display.', 'skincare' ),
                    'param_name'  => 'style',
                    'value'       => array(                        
                        esc_html__('Default','skincare')     => 'default',
                        ),
                    'edit_field_class'=>'vc_col-sm-4 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Post type', 'skincare' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose post type to display.', 'skincare' ),
                    'param_name'  => 'post_type',
                    'value'       => array(                        
                        esc_html__('Post','skincare')           => 'post',
                        esc_html__('Portfolio','skincare')     => 'portfolio',
                        ),
                    'edit_field_class'=>'vc_col-sm-4 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Display', 'skincare' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose style to display.', 'skincare' ),
                    'param_name'  => 'display',
                    'value'       => array(                        
                        esc_html__('Grid','skincare')      => 'grid',
                        esc_html__('Slider','skincare')    => 'slider',
                        ),
                    'edit_field_class'=>'vc_col-sm-4 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Number', 'skincare' ),
                    'type'        => 'textfield',
                    'description' => esc_html__( 'Enter number of product. Default is 8.', 'skincare' ),
                    'param_name'  => 'number',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Custom IDs', 'skincare' ),
                    'param_name'  => 'custom_ids',
                    'description' => esc_html__( 'Enter list ID. Separate values by ",". Example is 12,15,20', 'skincare' ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Post Exclude', 'skincare' ),
                    'param_name'  => 'exclude',
                    'description' => esc_html__( 'Enter list ID. Separate values by ",". Example is 12,15,20', 'skincare' ),
                ),
                array(
                    'heading'     => esc_html__( 'Post Categories', 'skincare' ),
                    'type'        => 'autocomplete',
                    'param_name'  => 'cats',
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'values' => s7upf_get_list_taxonomy('category'),
                    ),
                    'save_always' => true,
                    'description' => esc_html__( 'List of post categories', 'skincare' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order By', 'skincare' ),
                    'value' => s7upf_get_order_list(),
                    'param_name' => 'orderby',
                    'description' => esc_html__( 'Select Orderby Type ', 'skincare' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Order', 'skincare' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'order',
                    'value' => array(                   
                        esc_html__('Desc','skincare')  => 'DESC',
                        esc_html__('Asc','skincare')  => 'ASC',
                    ),
                    'description' => esc_html__( 'Select Order Type ', 'skincare' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Grid Sub string excerpt",'skincare'),
                    "param_name"    => "excerpt",
                    'description'   => esc_html__( 'Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.', 'skincare' ),
                ),
                array(
                    'heading'       => esc_html__( 'Post style', 'skincare' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'skincare' ),
                    'param_name'    => 'item_style',
                    'value'         => s7upf_get_post_style(),
                ),             
                array(
                    'heading'     => esc_html__( 'Grid style', 'skincare' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'grid_type',
                    'value' => array(                   
                        esc_html__('Default','skincare')  => '',
                        esc_html__('Masonry','skincare')  => 'list-masonry',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'skincare' ),
                    "group"         => esc_html__("Grid Settings",'skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),  
                array(
                    'heading'     => esc_html__( 'Column', 'skincare' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'column',
                    'value' => array(                   
                        esc_html__('1 columns','skincare')  => '1',
                        esc_html__('2 columns','skincare')  => '2',
                        esc_html__('3 columns','skincare')  => '3',
                        esc_html__('4 columns','skincare')  => '4',
                        esc_html__('5 columns','skincare')  => '5',
                        esc_html__('6 columns','skincare')  => '6',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'skincare' ),
                    "group"         => esc_html__("Grid Settings",'skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),                
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Pagination",'skincare'),
                    "param_name"    => "pagination",
                    "value"         => array(
                        esc_html__("None",'skincare')                => '',
                        esc_html__("Pagination",'skincare')          => 'pagination',
                        esc_html__("Load more button",'skincare')    => 'load-more',
                        ),
                    'group'         => esc_html__('Grid Settings','skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),              
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Size Thumbnail",'skincare'),
                    "param_name"    => "size",
                    'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height), for multi size: 200x100|200x200 separate by "|" or ",").', 'skincare' ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item",'skincare'),
                    "param_name"    => "item",
                    "group"         => esc_html__("Slider Settings",'skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item Responsive",'skincare'),
                    "param_name"    => "item_res",
                    "group"         => esc_html__("Slider Settings",'skincare'),
                    'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'skincare' ),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Speed",'skincare'),
                    "param_name"    => "speed",
                    "group"         => esc_html__("Slider Settings",'skincare'), 
                    'description'   => esc_html__( 'Enter number speed to auto slider (ms). Example is 5000. Default auto is disable.', 'skincare' ),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),                   
                ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Row / item slider",'skincare'),
                    "param_name"    => "row_number",
                    'value' => array(                   
                        esc_html__('1 row','skincare')  => '1',
                        esc_html__('2 rows','skincare')  => '2',
                        esc_html__('3 rows','skincare')  => '3',
                        esc_html__('4 rows','skincare')  => '4',
                        esc_html__('5 rows','skincare')  => '5',
                        esc_html__('6 rows','skincare')  => '6',
                        esc_html__('7 rows','skincare')  => '7',
                        esc_html__('8 rows','skincare')  => '8',
                        esc_html__('9 rows','skincare')  => '9',
                        esc_html__('10 rows','skincare')  => '10',
                    ),
                    'description'   => esc_html__( 'Choose number row to display', 'skincare' ),
                    "group"         => esc_html__("Slider Settings",'skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),  
                ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'skincare' ),
                'param_name'  => 'slider_navi',
                'value'       => array(
                    esc_html__( 'Hidden', 'skincare' )                  => '',
                    esc_html__( 'Default Navigation', 'skincare' )      => 'navi-nav-style',
                    esc_html__( 'Group Navigation', 'skincare' )        => 'group-navi',
                ),
                "group"         => esc_html__("Slider Settings",'skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ), 
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'skincare' ),
                'param_name'  => 'slider_pagi',
                'value'       => array(
                    esc_html__( 'Hidden', 'skincare' )                  => '',
                    esc_html__( 'Default Pagination', 'skincare' )      => 'pagi-nav-style',
                ),
                "group"         => esc_html__("Slider Settings",'skincare'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
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
    }
}
