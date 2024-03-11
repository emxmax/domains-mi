<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_search_form')){
    function s7upf_vc_search_form($attr){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => '',
            'placeholder'   => esc_html__("Buscar","skincare"),
            'live_search'   => 'on',
            'search_in'     => '',
            'show_cat'      => 'on',
            'cats_product'  => '',
            'cats_post'     => '',
            'title'         => '',
            'custom_css'    => '',
            'el_class'      => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );

        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;

        $cats = '';
        if(!empty($cats_product) && $search_in == 'product') $cats = $cats_product;
        if(!empty($cats_post) && $search_in == 'post') $cats = $cats_post;
        $el_class .= ' '.$style;
        $search_val = get_search_query();
        if(empty($search_val)) $search_val = $placeholder.'...';
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'search_val'    => $search_val,
            'cats'          => $cats,
            ));
        $html = s7upf_get_template_element('search/search',$style,$attr);
        return $html;
    }
}

stp_reg_shortcode('s7upf_search_form','s7upf_vc_search_form');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_admin_search',10,100 );
if ( ! function_exists( 's7upf_add_admin_search' ) ) {
    function s7upf_add_admin_search(){
        vc_map( array(
            "name"          => esc_html__("Search Form", 'skincare'),
            "base"          => "s7upf_search_form",
            "icon"          => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'skincare'),
            "description"   => esc_html__('Display search form', 'skincare' ),
            "params"        => array(
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Style",'skincare'),
                    "param_name"    => "style",
                    "value"         => array(
                        esc_html__("Default",'skincare')   => '',
						esc_html__("Popup",'skincare')   => 'popup',
                        )
                ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Live Search",'skincare'),
                    "param_name"    => "live_search",
                    "value"         => array(
                        esc_html__("On",'skincare')    => 'on',
                        esc_html__("Off",'skincare')   => 'off',
                        )
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Title",'skincare'),
                    "param_name"    => "title",
                ),
                array(
                    "type"          => "textfield",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Place holder input",'skincare'),
                    "param_name"    => "placeholder",
                ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Search in post type",'skincare'),
                    "param_name"    => "search_in",
                    "value"         => array(
                        esc_html__("All",'skincare')       => '',
                        esc_html__("Post",'skincare')      => 'post',
                        esc_html__("Product",'skincare')   => 'product',
                        )
                ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Show categories dropdown",'skincare'),
                    "param_name"    => "show_cat",
                    "value"         => array(
                        esc_html__("On",'skincare')    => 'on',
                        esc_html__("Off",'skincare')   => 'off',
                        ),
                    'dependency'    => array(
                        'element'   => 'search_in',
                        'not_empty' => true,
                        )
                ),
                array(
                    'heading'       => esc_html__( 'Post Categories', 'skincare' ),
                    'type'          => 'autocomplete',
                    'param_name'    => 'cats_post',
                    'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'values'        => s7upf_get_list_taxonomy('category'),
                    ),
                    'save_always'   => true,
                    'description'   => esc_html__( 'List of post categories', 'skincare' ),
                    'dependency'    => array(
                        'element'   => 'search_in',
                        'value'     => 'post',
                        )
                ),
                array(
                    'heading'       => esc_html__( 'Product Categories', 'skincare' ),
                    'type'          => 'autocomplete',
                    'param_name'    => 'cats_product',
                    'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'values'        => s7upf_get_list_taxonomy(),
                    ),
                    'save_always'   => true,
                    'description'   => esc_html__( 'List of product categories', 'skincare' ),
                    'dependency'    => array(
                        'element'   => 'search_in',
                        'value'     => 'product',
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
    }
}
add_action( 'wp_ajax_live_search', 's7upf_live_search' );
add_action( 'wp_ajax_nopriv_live_search', 's7upf_live_search' );
if(!function_exists('s7upf_live_search')){
    function s7upf_live_search() {
        $cat = $taxonomy = '';
        $key = $_POST['key'];
        if(isset($_POST['cat'])) $cat = $_POST['cat'];
        $post_type = $_POST['post_type'];
        if(isset($_POST['taxonomy'])) $taxonomy = $_POST['taxonomy'];
        $trim_key = trim($key);
        $args = array(
            'post_type' => $post_type,
            's'         => $key,
            'post_status' => 'publish'
            );
        if($taxonomy == 'category_name') $taxonomy = 'category';
        if(!empty($cat)) {
            $taxonomy = str_replace('_name', '', $taxonomy);
            if(!empty($cat)) {
                $args['tax_query'][]=array(
                    'taxonomy'  =>  $taxonomy,
                    'field'     =>  'slug',
                    'terms'     =>  $cat
                );
            }
        }
        $query = new WP_Query( $args );
        if( $query->have_posts() && !empty($key) && !empty($trim_key)){
            while ( $query->have_posts() ) : $query->the_post();
                echo    '<div class="item-search-pro">
                            <div class="search-ajax-thumb product-thumb">
                                <a href="'.esc_url(get_the_permalink()).'" class="product-thumb-link">
                                    '.get_the_post_thumbnail(get_the_ID(),array(50,50)).'
                                </a>
                            </div>
                            <div class="search-ajax-title"><h3 class="title14"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h3></div>';
                if($post_type == 'product') echo '<div class="search-ajax-price">'.s7upf_get_price_html(false).'</div>';
                echo    '</div>';
            endwhile;
        }
        else{
            echo '<p class="text-center">'.esc_html__("No hay ningún resultado con esta palabra.","skincare").'</p>';
        }
        wp_reset_postdata();
    }
}
