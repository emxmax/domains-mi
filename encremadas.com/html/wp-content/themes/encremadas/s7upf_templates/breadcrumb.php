<?php
if(!isset($breadcrumb)) $breadcrumb = s7upf_get_value_by_id('s7upf_show_breadrumb');
if(!isset($el_class)) $el_class = '';
if($breadcrumb == 'on'):
    $b_class = s7upf_fill_css_background(s7upf_get_option('s7upf_bg_breadcrumb'));
	$step = '';
?>
<div class="wrap-bread-crumb <?php echo esc_attr($el_class)?>">
	<div class="container">
		<div class="bread-crumb ocultoico <?php echo esc_attr($b_class)?>">
			<?php
				// if(!s7upf_is_woocommerce_page()){
	      //           if(function_exists('bcn_display')) bcn_display();
	      //           else s7upf_breadcrumb($step);
	      //       }
	      //       else {
	      //       	if(function_exists('woocommerce_breadcrumb')){
		    //         	woocommerce_breadcrumb(array(
		    //         	'delimiter'		=> $step,
		    //         	'wrap_before'	=> '',
		    //         	'wrap_after'	=> '',
		    //         	'before'      	=> '<span>',
				// 		'after'       	=> '</span>',
		    //         	));
		    //         }
	      //       }
            ?>
		</div>
	</div>
</div>
<div class="encremadas-breadcrumb">
  <div class="container">
		<div class="bread-crumb <?php echo esc_attr($b_class)?>">
			<?php
				if(!s7upf_is_woocommerce_page()){
	            if(function_exists('bcn_display')) bcn_display();
	                else s7upf_breadcrumb($step);
	            }
	            else {
	            	if(function_exists('woocommerce_breadcrumb')){
		            	woocommerce_breadcrumb(array(
		            	'delimiter'		=> $step,
		            	'wrap_before'	=> '',
		            	'wrap_after'	=> '',
		            	'before'      	=> '<span>',
						      'after'       	=> '</span>',
		            	));
		            }
	            }
            ?>
		</div>
	</div>
</div>
<?php endif;?>
