<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 7up-framework
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MJC5SQJ');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJC5SQJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php s7upf_preload();?>
		<div id="login_enc">
			<div class="container">
				<div class="row">
					<?php
						if (is_user_logged_in()){
							global $current_user;
							global $wp;
							get_currentuserinfo();
							$current_url  = home_url( add_query_arg( array(), $wp->request ) );
							?>
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6 text-right">
								<h5>Bienvenido: <?php echo $current_user->user_login;?> | <a href="<?php echo wp_logout_url($current_url);?>" class="shop-button black">Salir</a></h5>
							</div>
							<?php
						}
					?>
				</div>
			</div>
		</div>
    <div class="wrap">
        <?php echo s7upf_get_template('header-default');
