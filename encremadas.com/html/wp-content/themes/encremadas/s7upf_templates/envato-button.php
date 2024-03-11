<?php
$show_envato = s7upf_get_option('show_envato');
$link_envato = s7upf_get_option('link_envato');
if($show_envato == 'on'):?>
<a href="<?php echo esc_url($link_envato);?>" class="btn-envato"><img class="absolute" src="<?php echo get_template_directory_uri();?>/assets/image/envato.png" alt="<?php echo esc_attr__('Image','skincare');?>" /></a>
<?php endif;