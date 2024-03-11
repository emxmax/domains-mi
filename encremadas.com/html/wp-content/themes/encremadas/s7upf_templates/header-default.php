<?php
$page_id = apply_filters('s7upf_header_page_id',s7upf_get_value_by_id('s7upf_header_page'));
if(!empty($page_id)){?>
    <header id="header" class="header-page">
        <div class="container">
            <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
        </div>
    </header>
<?php
}
else{?>
    <header id="header" class="header">
		<div class="header-default">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<?php 
							$s7upf_logo=s7upf_get_option('logo');
							if($s7upf_logo!=''):
						?>
						<div class="logo">
							<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr__("logo","skincare");?>">
							   <img src="<?php echo esc_url($s7upf_logo)?>" alt="<?php echo esc_attr__("logo","skincare")?>">
							</a>
						</div>
						<?php else:?>
						<div class="logo logo-lancom">
							<div class="text-logo">
								<h1 class="color">
									<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr__("logo","skincare");?>">
										<span class="title36 font-bold lora-font black"><?php echo get_bloginfo('name', 'display');?></span>
									</a>
								</h1>
							</div>
						</div>
						<?php endif;?>
					</div>
					<div class="col-md-9 col-sm-12">
						<?php if ( has_nav_menu( 'primary' ) ) {?>
							<nav class="main-nav">
							<?php wp_nav_menu( array(
									'theme_location'    => 'primary',
									'container'         =>false,
									'walker'            =>new S7upf_Walker_Nav_Menu(),
								 )
							);?>
								<a href="javascript:void(0)" class="toggle-mobile-menu"><span></span></a>
							 </nav>
						<?php } ?>   
					</div>
				</div>
			</div>       
		</div>       
    </header>
<?php
}
?>
