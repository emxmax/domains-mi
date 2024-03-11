<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package 7up-framework
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
if(!function_exists('s7upf_comments_list'))
{ 
    function s7upf_comments_list($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;
        /* override default avatar size */
        $args['avatar_size'] = 122;
        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) :
            ?>
            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
                <div class="comment-body">
                    <?php esc_html_e('Pingback:', 'skincare'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(esc_html__('Edit', 'skincare'), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>'); ?>
                </div>
        <?php else : ?>
            <li <?php comment_class(empty($args['has_children']) ? '' : 'parent' ); ?>>
                <div id="comment-<?php comment_ID(); ?>" class="item-comment table-custom">
					<div class="comment-thumb">
						<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
						</a>
					</div>
					<div class="comment-info">
						<?php printf(esc_html__('%s', 'skincare'), sprintf('<h3 class="title18 lora-font font-bold">%s</h3>', get_comment_author_link())); ?>
						<div class="comment-text"><?php comment_text();?></div>
						<?php if (comments_open()): ?>
							<div class="btn-reply flex-wrapper align_items-center">
                            <?php echo str_replace('comment-reply-link', 'reply-button comment-reply-link', get_comment_reply_link(array_merge( $args, array('reply_text' =>'<i class="la la-mail-reply-all title18 color"></i>','depth' => $depth, 'max_depth' => $args['max_depth'])))) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
        <?php
        endif;
    }
}
?>
<div id="comments" class="comments-area comments blog-comment-detail">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="title30 lora-font font-bold"><?php echo esc_html__('Comments','skincare');?></h2>
        <div class="comments">
        	<ol class="comment-list list-none">
	            <?php
	            wp_list_comments(array(
	                'style' 		=> '',
	                'short_ping' 	=> true,
	                'avatar_size' 	=> 70,
	                'max_depth' 	=> '5',
	                'callback' 		=> 's7upf_comments_list',
	            ));
	            ?>
	        </ol>
        </div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'skincare' ); ?></h2>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'skincare' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'skincare' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'skincare' ); ?></p>
	<?php endif; ?>

</div><!-- #comments -->

<div class="leave-comments reply-comment">
	<?php
	$comment_form = array(
        'title_reply' => esc_html__('Leave a comments', 'skincare'),
        'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' =>	'<p class="contact-name col-md-6 col-sm-6 col-xs-12">
                                <input class="border" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" placeholder="'.esc_attr__( 'Name*', 'skincare' ).'" />
                            </p>',
                'email' =>	'<p class="contact-email col-md-6 col-sm-6 col-xs-12">
                                <input class="border" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'.esc_attr__( 'Email*', 'skincare' ).'" />
                            </p>',
                'url' =>	'<p class="contact-site col-md-12">
                                <input class="border" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'.esc_attr__( 'Web Site', 'skincare' ).'" />
                            </p>',
            )
        ),
        'comment_field' =>  '<p class="contact-message col-md-12">
                                <textarea id="comment" class="border" rows="8" name="comment" aria-required="true" placeholder="'.esc_attr__( 'Your comment*', 'skincare' ).'"></textarea>
                            </p>',
        'must_log_in' => '<div class="must-log-in control-group"><p class="desc silver">' .sprintf(wp_kses_post(__( 'You must be <a href="%s">logged in</a> to post a comment.','skincare' )),wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )) . '</p></div >',
        'logged_in_as' => '<div class="logged-in-as control-group"><p class="desc silver">' .sprintf(wp_kses_post(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','skincare' )),admin_url( 'profile.php' ),$user_identity,wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )) . '</p></div>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'id_form'              => 'commentform',
		'class_form'           => 'comment-form contact-form row',
        'id_submit'            => 'submit',
        'title_reply'          => esc_html__( 'Leave Comments','skincare' ),
        'title_reply_to'       => esc_html__( 'Leave a Reply %s','skincare' ),
        'cancel_reply_link'    => esc_html__( 'Cancel reply','skincare' ),
        'label_submit'         => esc_html__( 'Submit comment','skincare' ),
        'class_submit'         => 'shop-button post-comment-button',
    );
	?>
	<?php comment_form($comment_form); ?>
</div>
<?php

class s7upf_custom_comment extends Walker_Comment {
     
    /** START_LVL 
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1;

           $output .= '<div class="children">';
        }
 
    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;
        $output .= '</div>';
    }
    function end_el( &$output, $object, $depth = 0, $args = array() ) {
    	$output .= '';
    }
}
?>

