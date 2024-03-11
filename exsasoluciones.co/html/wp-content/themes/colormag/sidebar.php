<?php

/**

 * The Sidebar containing the main widget areas.

 *

 * @package ThemeGrill

 * @subpackage ColorMag

 * @since ColorMag 1.0

 */

?>



<div id="secondary">

	<?php do_action( 'colormag_before_sidebar' ); ?>

		<?php

			if( is_page_template( 'page-templates/contact.php' ) ) {

				$sidebar = 'colormag_contact_page_sidebar';

			}

			else {

				$sidebar = 'colormag_right_sidebar';

			}

		?>



		<?php if ( ! dynamic_sidebar( $sidebar ) ) :

			if ( $sidebar == 'colormag_contact_page_sidebar' ) {

            $sidebar_display = __('Contact Page', 'colormag');

         } else {

            $sidebar_display = __('Right', 'colormag');

         }

         the_widget( 'WP_Widget_Text',

            array(

               'title'  => __( 'Example Widget', 'colormag' ),

               'text'   => sprintf( __( 'This is an example widget to show how the %s Sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin. If custom widgets is added than this will be replaced by those widgets.', 'colormag' ), $sidebar_display, current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),

               'filter' => true,

            ),

            array(

               'before_widget' => '<aside class="widget widget_text clearfix">',

               'after_widget'  => '</aside>',

               'before_title'  => '<h3 class="widget-title"><span>',

               'after_title'   => '</span></h3>'

            )

         );

      endif; ?>



	<?php do_action( 'colormag_after_sidebar' ); ?>

   <br/>
      <div class="fb-page" data-href="https://www.facebook.com/exsa.net"  data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/exsa.net"><a href="https://www.facebook.com/exsa.net">EXSA S.A.</a></blockquote></div></div>             
   <br/>
      <a class="twitter-timeline" href="https://twitter.com/exsasoluciones" data-widget-id="656584116872286208">Tweets por el @exsasoluciones.</a>
   <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<a href="https://twitter.com/KarlMaslo" target="_blanck"><img src="wp-content/uploads/2016/08/twitter-km.png" alt=""></a>                  


</div>