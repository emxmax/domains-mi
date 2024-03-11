<?php
/**
 * Plugin class
 **/
if ( ! class_exists( 'CT_TAX_META' ) ) {

class CT_TAX_META {

	  public function __construct() {
		//
	  }
	 
	 /*
	  * Initialize the class and start calling our hooks and filters
	  * @since 1.0.0
	 */
	 public function init() {
		 
	   add_action( 'tax_brand_add_form_fields', array ( $this, 'add_tax_brand_image' ), 10, 2 );
	   add_action( 'created_tax_brand', array ( $this, 'save_tax_brand_image' ), 10, 2 );
	   add_action( 'tax_brand_edit_form_fields', array ( $this, 'update_tax_brand_image' ), 10, 2 );
	   add_action( 'edited_tax_brand', array ( $this, 'updated_tax_brand_image' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   
	 }

	public function load_media() {
	 wp_enqueue_media();
	}
	 
	 /*
	  * Add a form field in the new tax_brand page
	  * @since 1.0.0
	 */
	 public function add_tax_brand_image ( $taxonomy ) { ?>
	   <div class="form-field term-group">
		 <label for="tax_brand-image-id"><?php esc_html_e('Image', 'skincare'); ?></label>
		 <p>
			<span class="live-previews"></span>
			<input type="hidden" name="tax_brand-image-id" class="sv-image-value" value="">
		   <input type="button" class="button sv-button-upload-id" name="ct_tax_media_button" value="<?php esc_html_e( 'Add Image', 'skincare' ); ?>" />
		   <input type="button" class="button sv-button-remove" name="ct_tax_media_remove" value="<?php esc_html_e( 'Remove Image', 'skincare' ); ?>" />
		</p>
	   </div>
	 <?php
	 }
	 
	 /*
	  * Save the form field
	  * @since 1.0.0
	 */
	 public function save_tax_brand_image ( $term_id, $tt_id ) {
	   if( isset( $_POST['tax_brand-image-id'] ) && '' !== $_POST['tax_brand-image-id'] ){
		 $image = $_POST['tax_brand-image-id'];
		 add_term_meta( $term_id, 'tax_brand-image-id', $image, true );
	   }
	 }
	 
	 /*
	  * Edit the form field
	  * @since 1.0.0
	 */
	 public function update_tax_brand_image ( $term, $taxonomy ) { ?>
	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="tax_brand-image-id"><?php esc_html_e( 'Image', 'skincare' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'tax_brand-image-id', true );?>
		   <p>
				<input type="hidden" class="sv-image-value" name="tax_brand-image-id" value="<?php echo esc_attr($image_id); ?>">
			   <span class="live-previews">
				 <?php if ( $image_id ) { ?>
				   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
				 <?php } ?>
			   </span>
			 <input type="button" class="button sv-button-upload-id" name="ct_tax_media_button" value="<?php echo esc_attr__( 'Add Image', 'skincare' ); ?>" />
			 <input type="button" class="button sv-button-remove" name="ct_tax_media_remove" value="<?php echo esc_attr__( 'Remove Image', 'skincare' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 <?php
	 }

	/*
	 * Update the form field value
	 * @since 1.0.0
	 */
	 public function updated_tax_brand_image ( $term_id, $tt_id ) {
	   if( isset( $_POST['tax_brand-image-id'] ) && '' !== $_POST['tax_brand-image-id'] ){
		 $image = $_POST['tax_brand-image-id'];
		 update_term_meta ( $term_id, 'tax_brand-image-id', $image );
	   } else {
		 update_term_meta ( $term_id, 'tax_brand-image-id', '' );
	   }
	 }


  }
 
$CT_TAX_META = new CT_TAX_META();
$CT_TAX_META -> init();
}