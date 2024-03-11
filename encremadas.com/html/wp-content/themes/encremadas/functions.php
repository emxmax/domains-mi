<?php
//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * skincare functions and definitions
 *
 * @version 1.0
 *
 * @date 12.08.2015
 */

load_theme_textdomain( 'skincare', get_template_directory() . '/languages' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

require_once( trailingslashit( get_template_directory() ). '/7upframe/function/function.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/config/config.php' );

// LOAD CLASS LIB

require_once( trailingslashit( get_template_directory() ). '/7upframe/class/asset.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/class/class-tgm-plugin-activation.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/class/importer.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/class/mega_menu.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/class/order-comment-field.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/class/require-plugin.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/class/template.php' );

// END LOAD

// LOAD CONTROLER LIB

require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/BaseControl.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Customize_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Metabox_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Option_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Visual_composer_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Walker_megamenu.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Woocommerce_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Woocommerce_Variable.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Multi_Language_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/PortfolioControl.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Header_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/Footer_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/MegaItem_Control.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/TaxonomyControl.php' );
require_once( trailingslashit( get_template_directory() ). '/7upframe/controler/TaxonomyImageControl.php' );


// END LOAD

require_once( trailingslashit( get_template_directory() ). '/7upframe/index.php' );

add_shortcode('mostrar_registro', 'mostrar_registro_user');
function mostrar_registro_user($atts, $content = null){

    if (is_user_logged_in()){
        return "";
    }else{
				return do_shortcode('[user_registration_form id="1444"]');
    }

}
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_shortcode('boton_user_login', 'enc_boton_user_login');
function enc_boton_user_login($atts, $content = null){

    if (is_user_logged_in()){
				$htmlcuenta = '<ul class="link-user7 title36 custom-link-icon list-none "><li><a class="default black transparent" href="'.get_home_url().'/mi-cuenta/"><i class="la la-user"></i></a></li></ul>';
        return $htmlcuenta;
    }else{
			  $htmlout = '<ul class="link-user7 title36 custom-link-icon list-none "><li><a class="xoo-el-action-sc xoo-el-login-tgr default black transparent" href="#"><i class="la la-user"></i></a></li></ul>';
				return $htmlout;
    }

}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_postcode']);
	return $fields;
}
