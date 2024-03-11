<?php
$page_id = apply_filters('s7upf_footer_page_id',s7upf_get_value_by_id('s7upf_footer_page'));
if(!empty($page_id)) {?>
	<footer id="footer" class="footer-page">
        <div class="container">
            <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
        </div>
    </footer>
<?php
}
else{
?>
	<footer id="footer" class="footer-default">
		<div class="container">
			<p class="copyright desc white"><?php esc_html_e("Copyright by ","skincare")?><a href="http://7uptheme.com" class="white">7uptheme</a><?php ?><?php esc_html_e(" .All Rights Reserved.","skincare")?></p>
		</div>
	</footer>
<?php
}