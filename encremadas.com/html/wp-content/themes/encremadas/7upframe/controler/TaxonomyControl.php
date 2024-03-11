<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_TaxonomyController'))
{
    class S7upf_TaxonomyController{
		
		static function _init()
        {
            if(function_exists('stp_reg_post_type'))
            {
                add_action('init',array(__CLASS__,'_add_taxonomy'));
            }
        }
		
        static  function  _add_taxonomy (){
			$tax = s7upf_get_option('brand_taxonomy_product','off');
			if($tax=='on'){
				stp_reg_taxonomy(
					'tax_brand',
					'product',
					array(
						'label' => esc_html__( 'Brands', 'skincare' ),
						'rewrite' => array( 'slug' => 'brand'),
						'hierarchical' => true,
						'query_var'  => true
					)
				);
			}
        }
    }

    S7upf_TaxonomyController::_init();

}


