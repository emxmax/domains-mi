<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:20 AM
 */

if(!class_exists('s7upf_info_author'))
{
	class s7upf_info_author extends WP_Widget {


		protected $default=array();

		static function _init()
		{
			add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
		}

		static function _add_widget()
		{
			s7upf_reg_widget( 's7upf_info_author' );
		}

		function __construct() {
			// Instantiate the parent object
			parent::__construct( false, esc_html__('7uptheme Author Information','skincare'),
				array( 'description' => esc_html__( 'Create a block introduce about author', 'skincare' ), ));

			$this->default=array(
				'title'            => '',
				'image'            => '',
				'size'             => '',
				'name'             => '',
				'url'              => '',
				'desc'             => '',
				'pinterest'        => '',
				'google'           => '',
				'twitter'          => '',
				'vimeo'            => '',
				'youtube'          => '',
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
				<div class="wg-info-author text-center">
					<div class="author-avatar banner-advs zoom-image overlay-image">
						<a href="<?php echo esc_url($url);?>" class="adv-thumb-link">
							<?php echo wp_get_attachment_image($image,$size);?>
						</a>
					</div>
					<div class="author-info">
						<?php if(!empty($name)):?>
						<h3 class="title18 font-bold lora-font"><a href="<?php echo esc_url($url);?>" class="black wobble-top"><?php echo esc_html($name);?></a></h3>
						<?php endif;?>
						<?php if(!empty($desc)):?>
						<p class="desc"><?php echo esc_html($desc);?></p>
						<?php endif;?>
						<ul class="list-inline-block wg-link-social">
							<?php if(!empty($pinterest)):?>
							<li><a href="<?php echo esc_url($pinterest);?>" class="float black title24"><i class="la la-pinterest"></i></a></li>
							<?php endif;?>
							<?php if(!empty($google)):?>
							<li><a href="<?php echo esc_url($google);?>" class="float black title24"><i class="la la-google-plus"></i></a></li>
							<?php endif;?>
							<?php if(!empty($twitter)):?>
							<li><a href="<?php echo esc_url($twitter);?>" class="float black title24"><i class="la la-twitter"></i></a></li>
							<?php endif;?>
							<?php if(!empty($vimeo)):?>
							<li><a href="<?php echo esc_url($vimeo);?>" class="float black title24"><i class="la la-vimeo"></i></a></li>
							<?php endif;?>
							<?php if(!empty($youtube)):?>
							<li><a href="<?php echo esc_url($youtube);?>" class="float black title24"><i class="la la-youtube"></i></a></li>
							<?php endif;?>
						</ul>
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
				<button class="sv-button-upload-id"><?php echo esc_html__("Upload Author Image", 'skincare');?></button>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Crop Image Size(Ex:300x300)', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>" type="text" value="<?php echo esc_attr($size); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('name')); ?>"><?php esc_html_e('Author Name', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr($name); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php esc_html_e('Author Description', 'skincare'); ?>: </label>
				<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>"  rows="4" cols="50"><?php echo esc_attr($desc); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Author Url', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Author Pinterest', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php esc_html_e('Author Google Plus', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" type="text" value="<?php echo esc_attr($google); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Author Twitter', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php esc_html_e('Author Vimeo', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Author Youtube', 'skincare'); ?>: </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
			</p>
		<?php
		}
	}

	s7upf_info_author::_init();

}
