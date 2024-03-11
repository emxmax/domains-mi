<?php

/**

 * Theme Footer Section for our theme.

 *

 * Displays all of the footer section and closing of the #main div.

 *

 * @package ThemeGrill

 * @subpackage ColorMag

 * @since ColorMag 1.0

 */

?>



		</div><!-- .inner-wrap -->

	</div><!-- #main -->

   <?php if ( is_active_sidebar('colormag_advertisement_above_the_footer_sidebar') ) { ?>

      <div class="advertisement_above_footer">

         <div class="inner-wrap">

            <?php dynamic_sidebar('colormag_advertisement_above_the_footer_sidebar'); ?>

         </div>

      </div>

   <?php } ?>

	<?php do_action( 'colormag_before_footer' ); ?>

		<footer id="colophon" class="clearfix">

			<?php get_sidebar( 'footer' ); ?>

			<div class="footer-socket-wrapper clearfix">

				<div class="inner-wrap">

					<div class="footer-socket-area">

                  <div class="footer-socket-right-section">

				

			<?php echo( '<h8 style="color:white;">EXSA todos los derechos reservados. <br></h8>' ); ?>

<?php //echo( '<h8 style="color:white;">Desarrollado por <a class="a-impact" href="http://www.mediaimpact.pe/" target="_blank">Media Impact.</a> </h8>

//' ); ?>				

<style>

.a-impact{

color:white;

text-decoration:none;

transition-duration:0.5s;

}



.a-impact:hover{

color:#289DCC;

transition-duration:0.5s;

}

</style>	









   						<?php if( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) { colormag_social_links(); } ?>

                  </div>

                  <div class="footer-socket-left-sectoin">

   						



		<?php echo( '<h7 style="color:white;">Teléfono: (01) 315-7000 <br></h7>' ); ?>	

				<?php echo( '<h7 style="color:white;">Fax: (01) 315-7015 <br></h7>' ); ?>

				<?php echo( '<h7 style="color:white;">Email: info@exsa.net <br></h7>' ); ?>

				<?php echo( '<h7 style="color:white;">Oficina administrativa: Calle Las Begonias N° 415 - Piso 12 San Isidro - Lima 27 - Perú<br></h7>' ); ?>

				<?php echo( '<h8><a href="http://exsa.net/" target="_blank"><br>www.exsa.net</a></h8>' ); ?>




                  </div>

					</div>

				</div>

			</div>

		</footer>

		<a href="#masthead" id="scroll-up"><i class="fa fa-chevron-up"></i></a>

	</div><!-- #page -->

	<?php wp_footer(); ?>



<p style="text-align:center;font-size:14px;padding:8px 0px 2px 0px">2016 Copyright <a href="http://www.mediaimpact.pe/" target="_blank">MediaImpact.</a> Todos los derechos reservados.</p>

</body>

</html>