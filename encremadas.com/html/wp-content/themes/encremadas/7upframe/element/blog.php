<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 29/02/16
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_blog')){
    function s7upf_vc_blog($attr){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => 'list',
            'column'        => '2',
            'number'        => '10',
            'exclude'       => '',
            'excerpt'       => '',
            'cats'          => '',
            'order'         => 'DESC',
            'order_by'      => '',
            'post_formats'  => '',
            'size'          => '',
            'size_list'     => '',
            'item_style'    => '',
            'item_style_list' => '',
            'grid_type'     => '',
            'blog_style'    => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
       
        $el_class .= ' blog-'.$style.'-view '.$grid_type.' '.$css_class;
        if(isset($_GET['type'])) $style = $_GET['type'];
        if(isset($_GET['number'])) $number = $_GET['number'];
        $size = s7upf_get_size_crop($size);
        $size_list = s7upf_get_size_crop($size_list);

        $attr = array_merge($attr,array(
            'style'     => $style,
            'size'      => $size,
            'size_list' => $size_list,
            'number'    => $number,
            ));

        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged,
        );        
        if($order_by == 'post_views'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = 'post_views';
        }
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query'][]=array(
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=> $custom_list
            );
        }
		if(!empty($exclude)){
            $args['post__not_in'] = explode(',', $exclude);
        }
        if(!empty($post_formats)) {
            $formats_list = explode(",",$post_formats);
            $args['tax_query']['relation'] = 'AND';
            $args['tax_query'][]=array(
                'taxonomy'  => 'post_format',
                'field'     => 'slug',
                'terms'     => $formats_list
            );
        }
        $query = new WP_Query($args);
        $count = 1;
        $count_query = $query->post_count;
        $max_page = $query->max_num_pages;
        $html .=    '<div class="js-content-wrap '.esc_attr($el_class).'" data-column="'.esc_attr($column).'">
                        <div class="js-content-main list-post-wrap row">';
        $slug = $item_style;
        if($style == 'list') $slug = $item_style_list;
        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();
                $html .=    s7upf_get_template_post($style.'/'.$style,$slug,$attr);
                $count++;
            }
        }
        $html .=        '</div>';
        if($blog_style == 'load-more' && $max_page > 1){
            $data_load = array(
                "args"        => $args,
                "attr"        => $attr,
                );
            $data_loadjs = json_encode($data_load);
            $html .=    '<div class="btn-loadmore">
                            <a href="javascript:void(0)" class="blog-loadmore shop-button large-button black" 
                                data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                                data-maxpage="'.esc_attr($max_page).'">
                                '.esc_html__("Load more...","skincare").'
                            </a>
                        </div>';
        }
        else $html .= s7upf_paging_nav($query,'',false);
        $html .=    '</div>';
        wp_reset_postdata();

        return $html;
    }
}

stp_reg_shortcode('s7upf_blog','s7upf_vc_blog');

vc_map( array(
    "name"          => esc_html__("Blog", 'skincare'),
    "base"          => "s7upf_blog",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'skincare'),
    "description"   => esc_html__( 'Display blog page', 'skincare' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Default Display",'skincare'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("List",'skincare')   => 'list',
                esc_html__("Grid",'skincare')   => 'grid',
                ),
            ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Number post",'skincare'),
            "param_name"    => "number",
            'description'   => esc_html__( 'Number of post display in this element. Default is 10.', 'skincare' ),
            ),
		array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Exclude', 'skincare' ),
				'param_name'  => 'exclude',
				'description' => esc_html__( 'Enter list ID. Separate values by ",". Example is 12,15,20', 'skincare' ),
			),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Size Thumbnail(List)",'skincare'),
            "param_name"    => "size_list",
            'group'         => esc_html__('List Settings','skincare'),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('list')
			),
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height), for multi size: 200x100|200x200 separate by "|" or ",").', 'skincare' ),
            ),
        array(
            'heading'       => esc_html__( 'List item style', 'skincare' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'skincare' ),
            'param_name'    => 'item_style_list',
            'value'         => s7upf_get_post_list_style(),
            'group'         => esc_html__('List Settings','skincare'),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('list')
			),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Blog Display",'skincare'),
            "param_name"    => "blog_style",
            "value"         => array(
                esc_html__("Default",'skincare')             => '',
                esc_html__("Load more button",'skincare')    => 'load-more',
                ),
            ),        
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Grid Display",'skincare'),
            "param_name"    => "grid_type",
            "value"         => array(
                esc_html__("Default",'skincare')   => '',
                esc_html__("Masonry",'skincare')   => 'list-masonry',
                ),
            'group'         => esc_html__('Grid Settings','skincare'),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('grid')
			),
            ),        
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Grid Sub string excerpt",'skincare'),
            "param_name"    => "excerpt",
            'group'         => esc_html__('Grid Settings','skincare'),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('grid')
			),
            'description'   => esc_html__( 'Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.', 'skincare' ),
            ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Size Thumbnail(Grid)",'skincare'),
            "param_name"    => "size",
            'group'         => esc_html__('Grid Settings','skincare'),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('grid')
			),
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height), for multi size: 200x100|200x200 separate by "|" or ",").', 'skincare' ),
            ),
        array(
            'heading'       => esc_html__( 'Grid item style', 'skincare' ),
            'type'          => 'dropdown',
            'description'   => esc_html__( 'Choose style to display.', 'skincare' ),
            'param_name'    => 'item_style',
            'value'         => s7upf_get_post_style(),    
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('grid')
			),			
            'group'         => esc_html__('Grid Settings','skincare'),
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Column",'skincare'),
            "param_name"    => "column",
            "value"         => array(
                esc_html__("2 Column","skincare")    => '2',
                esc_html__("3 Column","skincare")    => '3',
                esc_html__("4 Column","skincare")    => '4',
                esc_html__("5 Column","skincare")    => '5',
                esc_html__("6 Column","skincare")    => '6',
            ),
            'group'         => esc_html__('Grid Settings','skincare'),
			"dependency"    =>array(
				'element'   =>'style',
				'value'     =>array('grid')
			),
            ),
        array(
            'heading'       => esc_html__( 'Categories', 'skincare' ),
            'type'          => 'checkbox',
            'param_name'    => 'cats',
            'value'         => s7upf_list_taxonomy('category',false)
            ),
        array(
            "type"          => "checkbox",
            "heading"       => esc_html__("Post Format",'skincare'),
            "param_name"    => "post_formats",
            "value"         => array(
                esc_html__("Image","skincare")          => 'post-format-image',
                esc_html__("Video","skincare")          => 'post-format-video',
                esc_html__("Gallery","skincare")        => 'post-format-gallery',
                esc_html__("Audio","skincare")          => 'post-format-audio',
                esc_html__("Quote","skincare")          => 'post-format-quote',
                ),
            'description'   => esc_html__( 'Choose post format to display. If empty is show all post.', 'skincare' )
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order",'skincare'),
            "param_name"    => "order",
            "value"         => array(
                esc_html__('Desc','skincare') => 'DESC',
                esc_html__('Asc','skincare')  => 'ASC',
                ),
            'edit_field_class'=>'vc_col-sm-6 vc_column'
            ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order By",'skincare'),
            "param_name"    => "order_by",
            "value"         => s7upf_get_order_list(),
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
//Load more blog
add_action( 'wp_ajax_load_more_post', 's7upf_load_more_post' );
add_action( 'wp_ajax_nopriv_load_more_post', 's7upf_load_more_post' );
if(!function_exists('s7upf_load_more_post')){
    function s7upf_load_more_post() {
        $paged = $_POST['paged'];
        $load_data = $_POST['load_data'];
        $load_data = str_replace('\"', '"', $load_data);
        $load_data = str_replace('\/', '/', $load_data);
        $load_data = json_decode($load_data,true);
        extract($load_data);
        extract($attr);
        $args['posts_per_page'] = $number;
        $args['paged'] = $paged + 1;
        $query = new WP_Query($args);
        $count = 1;
        $count_query = $query->post_count;
        $slug = $item_style;
        if($style == 'list') $slug = $item_style_list;
        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();
                s7upf_get_template_post($style.'/'.$style,$slug,$attr,true);
                $count++;
            }
        }
        wp_reset_postdata();
        die();
    }
}