<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:20 AM
 */

if(!class_exists('s7upf_video_popup'))
{
	class s7upf_video_popup extends WP_Widget {


		protected $default=array();

		static function _init()
		{
			add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
		}

		static function _add_widget()
		{
			s7upf_reg_widget( 's7upf_video_popup' );
		}

		function __construct() {
			// Instantiate the parent object
			parent::__construct( false, esc_html__('7uptheme Video Popup','skincare'),
				array( 'description' => esc_html__( 'Create a video popup', 'skincare' ), ));

			$this->default=array(
				'title'            => '',
				'image'            => '',
				'size'             => '',
				'link'             => '',
			);
		}

		function widget( $args, $instance ) {
			// Widget output
			echo apply_filters('s7upf_output_content',$args['before_widget']);
			if ( ! empty( $instance['title'] ) ) {
			   echo apply_filters('s7upf_output_content',$args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			$instance = wp_parse_args($instance,$this->default);
			extract($instance);
			?>	
				<?php
					if(!empty($size)) {
						$size = explode('x', $size);
					}else{ 
						$size = 'full';
					}	
				?>
				<div class="wg-video-popup text-center">
					<?php echo wp_get_attachment_image($image,$size);?>
					<div class="absolute flex-wrapper align_items-center justify_content-center">
						<a href="<?php echo esc_url($link);?>" class="title30 bg-color wg-btn-video fancybox fancybox-media"><i class="white la la-play"></i></a>
					</div>
				</div>
			<?php
			echo apply_filters('s7upf_output_content',$args['after_widget']);
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
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'skincare'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<span class="live-previews"><img src="<?php echo esc_url(wp_get_attachment_url( $image ));?>" alt="<?php echo esc_attr($image);?>"></span>
				<input type ="hidden" class ="sv-image-value" value="<?php echo esc_attr($image);?>" name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>">
				<button class="sv-button-upload-id"><?php echo esc_html__("Upload Image", 'skincare');?></button>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Size(Ex:300x300)', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>" type="text" value="<?php echo esc_attr($size); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Link Video(Youtube/Vimeo)', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
			</p>
		<?php
		}
	}

	s7upf_video_popup::_init();

}
