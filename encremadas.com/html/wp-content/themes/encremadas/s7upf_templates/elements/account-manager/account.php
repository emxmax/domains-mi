<div class="account-manager login-register <?php echo esc_attr($el_class)?>">
	<?php
	$head_html = $sub_html = $login_icon_html = $register_icon_html = $logout_icon_html = '';
	if(!empty($login_icon)) $login_icon_html = '<i class="'.esc_attr($login_icon).'"></i>';
	if(!empty($register_icon)) $register_icon_html = '<i class="'.esc_attr($register_icon).'"></i>';
	if(!empty($logout_icon)) $logout_icon_html = '<i class="'.esc_attr($logout_icon).'"></i>';
	$account_id = get_option('woocommerce_myaccount_page_id');
	if(empty($login_url)){
		if($account_id) $login_url = get_permalink( $account_id );
		else $login_url = wp_login_url();
	}
    if(empty($register_url)){
    	if($account_id) $register_url = get_permalink( $account_id );
		else $register_url = wp_registration_url();
    }
	if(is_user_logged_in()){
		$name = '';
		$current_user = wp_get_current_user();
		if(!empty($current_user)){
			$name = $current_user->data->display_name;
		}
		$head_html = '<a class="my-account-link font-bold lora-font black" href="'.esc_url($login_url).'">'.esc_html($name).'</a><span class="space">/</span><a href="'.esc_url(wp_logout_url(home_url('/'))).'" class="lora-font font-bold black">'.esc_html__("Logout","skincare").'</a>';
	}
	else{
		$head_html = '<a class="login-popup lora-font font-bold black" href="'.esc_url($login_url).'">'.esc_html__("Login","skincare").'</a><span class="space">/</span><a class="register-popup lora-font font-bold black" href="'.esc_url($register_url).'">'.esc_html__("Register","skincare").'</a>';
	}
    ?>
    <?php echo apply_filters('s7upf_output_content',$head_html);?>
</div>