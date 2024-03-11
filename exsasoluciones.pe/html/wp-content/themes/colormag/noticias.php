<?php
/**
 * Template Name: noticias
 * Visita: www.davidsanchezplaza.com
 */

get_header(); ?>

	<?php query_posts('category_name=noticias&post_status=publish,future');?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php the_excerpt();//the_post() si quieres mostrar todo el post ?>
    <?php endwhile; else: endif; ?> 
    <?php wp_reset_query();?>

	</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>