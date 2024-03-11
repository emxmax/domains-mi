<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 24/12/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_Brand_Fillter') && class_exists("woocommerce"))
{
    class S7upf_Brand_Fillter extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            s7upf_reg_widget( 'S7upf_Brand_Fillter' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('7uptheme Brand Filter','skincare'),
                array( 'description' => esc_html__( 'Filter Brand shop page', 'skincare' ), ));

            $this->default=array(
                'title' => '',
                'brand' => array(),
            );
        }



        function widget( $args, $instance ) {
            // Widget output
            global $post;
            $check_shop = false;
            if(isset($post->post_content)){
                if(strpos($post->post_content, '[s7upf_shop')){
                    $check_shop = true;
                } 
            }
            if ( ! is_shop() && ! is_product_taxonomy() ) {
                if(!$check_shop) return;
            }
            if(!is_single()){
                echo apply_filters('s7upf_output_content',$args['before_widget']);
                if ( ! empty( $instance['title'] ) ) {
                   echo apply_filters('s7upf_output_content',$args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                }

                $instance=wp_parse_args($instance,$this->default);
                extract($instance);
                if(is_object($brand)) $brand = json_decode(json_encode($brand), true);
                if(is_array($brand) && !empty($brand)){
                    echo        '<ul class="list-attr-filter">';                
                        $brand_current = '';
                        if(isset($_GET['tax_brand'])) $brand_current = $_GET['tax_brand'];
                        if($brand_current != '') $brand_current = explode(',', $brand_current);
                        else $brand_current = array();
                        foreach ($brand as $brand_slug) {
                            $br = get_term_by('slug',$brand_slug,'tax_brand');
							$image_id = get_term_meta ( $br->term_id, 'tax_brand-image-id', true );
                            if(is_object($br)){
                                if(in_array($br->slug, $brand_current)) $active = 'active';
                                else $active = '';
                                echo        '<li><a data-brand='.esc_attr($br->slug).' href="'.esc_url(s7upf_get_filter_url('tax_brand',$br->slug)).'" class="load-shop-ajax '.$active.'">'.wp_get_attachment_image ( $image_id, "full" ).'</a></li>';
                            }
                        }
                    echo      '</ul>';
                }      
                echo apply_filters('s7upf_output_content',$args['after_widget']);
            }
        }

        function update( $new_instance, $old_instance ) {

            // Save widget options
            $instance=array();
            $instance=wp_parse_args($instance,$this->default);
            $new_instance=wp_parse_args($new_instance,$instance);

            return $new_instance;
        }

        function form( $instance ) {
            // Output admin widget options form

            $instance=wp_parse_args($instance,$this->default);
            extract($instance);
            if(is_object($brand)) $brand = json_decode(json_encode($brand), true);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'skincare'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label><?php esc_html_e( 'Brands:' ,'skincare'); ?></label></br>
                <?php 
                $brands = get_terms('tax_brand');
                if(is_array($brands) && !empty($brands)){
                    foreach ($brands as $bra) {
                        if(in_array($bra->slug, $brand)) $checked = 'checked="checked"';
                        else $checked = '';
                        echo '<input '.$checked.' id="'.esc_attr($this->get_field_id( 'brand' )).'" type="checkbox" name="'.esc_attr($this->get_field_name( 'brand' )).'[]" value="'.esc_attr($bra->slug).'"><span>'.$bra->name.'</span>';
                    }
                }
                else echo esc_html__("No any brand.","skincare");
                ?>
            </p>            
        <?php
        }
    }

    S7upf_Brand_Fillter::_init();

}
