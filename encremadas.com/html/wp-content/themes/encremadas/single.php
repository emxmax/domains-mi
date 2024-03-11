<?php
/**
 * The template for displaying all single posts.
 *
 * @package 7up-framework
 */
?>
<?php get_header();?>
<?php
	$check_small        = s7upf_get_value_by_id('post_single_small');
	if(empty($check_small)){
		$check_small = s7upf_get_option('post_single_small','off');
	}
	$single_class = '';
	if($check_small == 'on'){
		$single_class = 'single-small-content';
	}
?>
<?php do_action('s7upf_before_main_content')?>
<div id="main-content"  class="main-page-default <?php echo esc_attr($single_class);?>">
    <div class="container">
        <div class="row">
            <?php s7upf_output_sidebar('left')?>
            <div class="<?php echo esc_attr(s7upf_get_main_class()); ?>">
                <?php
                $size               = s7upf_get_option('post_single_size');
                $check_thumb        = s7upf_get_value_by_id('post_single_thumbnail');
               
				if(empty($check_meta)){
					$check_meta = s7upf_get_option('post_single_thumbnail','on');
				}
				
                $size = s7upf_get_size_crop($size);
                $data = array(
                    'size'              => $size,
                    'check_thumb'       => $check_thumb,
                    'check_meta'        => $check_meta,
                    );
                while ( have_posts() ) : the_post();

                    /*
                    * Include the post format-specific template for the content. If you want to
                    * use this in a child theme, then include a file called called content-___.php
                    * (where ___ is the post format) and that will be used instead.
                    */
                    s7upf_get_template_post( 'single-content/content',get_post_format(),$data,true );
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skincare' ),
                        'after'  => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                    s7upf_get_template_post( 'single-content/tags','',false,true );
                    s7upf_get_template_post( 'single-content/related','',false,true );
                    if ( comments_open() || get_comments_number() ) { comments_template(); }
                   
                endwhile; ?>
            </div>
            <?php s7upf_output_sidebar('right')?>
        </div>
    </div>
</div>
<?php do_action('s7upf_after_main_content')?>
<?php get_footer();?>