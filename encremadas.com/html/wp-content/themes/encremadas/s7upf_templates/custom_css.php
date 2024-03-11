<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 13/08/15
 * Time: 10:20 AM
 */
if(!isset($main_color)) $main_color = s7upf_get_value_by_id('main_color');
if(!isset($main_color2)) $main_color2 = s7upf_get_value_by_id('main_color2');
$body_bg = s7upf_get_value_by_id('body_bg');
$container_width = s7upf_get_value_by_id('container_width');
$preload_bg = s7upf_get_option('preload_bg');
$important = '';
?>
<?php
$style = '';

if(!empty($body_bg)){
    $style .= 'body
    {background-color:'.$body_bg.$important.'}'."\n";
}
if(!empty($preload_bg)){
    $style .= '.preload #loading
    {background-color:'.$preload_bg.$important.'}'."\n";
}

if(!empty($container_width)) {
    $style .= '.container,.page-content-box .wrap{max-width: '.$container_width.'px !important;}';
}

/*****BEGIN MAIN COLOR*****/

if(!empty($main_color)){
	$style .= 'a:hover,
	a:focus,
	a:active,
	.color ,
	.desc.color,
	.product-title a:hover ,
	.popup-icon,
	.view-type a.active,
	.list-number-show li a.active,
	.wishlist-popup .popup-icon,
	.main-nav > ul > li:hover > a ,
	.list-attr-filter li a.active,
	.main-nav .sub-menu li.current-menu-item > a,
	.cart-subtotal .amount,
	.order-total .amount,
	.product-thumb > .quickview-link,
	.tab-style1 .title-tab li a:hover,
	.product-extra-link a:not(.addcart-link):hover,
	.item-product .product-thumb > .quickview-text:hover,
	.item-client-review .client-thumb::before,
	.detail-info .yith-wcwl-add-to-wishlist .add_to_wishlist:hover,
	.detail-info .compare:hover,
	.single-list-social ul li a:hover,
	.item-comment .comment-info h3 a:hover,
	.current-cat > a,
	.wrap-button-lightbox > a:hover,
	.detail-tab-accordion .item-toggle-tab.active .toggle-tab-title,
	.info-404 h2,
	.intro-video3 li.active h2 a,
	.block-tab-product3 .title-tab li.active a,
	.main-nav > ul > li.current-menu-ancestor > a,
	.main-nav > ul > li.current-menu-item > a,
	.banner-hot-deal .layer-after .shop-button:hover,
	.content-item-category .shop-button:hover,
	.item-post-category .cat-parent:hover,
	.item-post-inner .post-info .shop-button:hover, 
	.item-portfolio .post-info .icon, 
	.wrap-service11 .title60
    {color:'.$main_color.$important.'}'."\n";
    
    $style .= '.bg-color, .top-header9,
	.dropdown-list li a:hover,
	body .scroll-top:hover,
	.preload #loading,
	.shop-button:hover,
	.dropdown-list li a.active,
	.woocommerce-MyAccount-navigation ul li.is-active a,
	.woocommerce-MyAccount-navigation ul li:hover a,
	.wishlist-button a:hover,
	.main-nav .toggle-mobile-menu span,
	.main-nav .toggle-mobile-menu::before,
	.main-nav .toggle-mobile-menu::after,
	.form-newsletter input[type="submit"]:hover,
	.product-thumb > .quickview-link:hover,
	.wrap-item.owl-carousel .owl-nav  button:hover,
	.woocommerce #respond input#submit:hover,
	a.added_to_cart:hover,
	.woocommerce a.added_to_cart:hover,
	.woocommerce a.button.addcart-link:hover,
	.woocommerce.widget .woocommerce-widget-layered-nav-dropdown__submit:hover,
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover,
	.button:hover,
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover
	.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover,
	.wrap-service1::before,
	.post-meta-data > li::after,
	.btn-circle:hover,
	.owl-theme .owl-dots .owl-dot.active span,
	.owl-theme .owl-dots .owl-dot:hover span,
	.custom-scroll ::-webkit-scrollbar-thumb,
	.owl-theme.pagi-nav-number .owl-dots .owl-dot.active,
	.dropdown-list li.active a,
	.intro-ads4 h2::after,
	.banner-ads-caption .title-vertical::before,
	.wg-info-author .author-info h3::after,
	blockquote::before,
	.woocommerce div.product form.cart .button.single_add_to_cart_button,
	.detail-gallery .gallery-control > a:hover,
	.list-tag-detail li.active a::after,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
	.post-password-form input[type=submit]:hover,
	.mini-cart-box.aside-box .mini-cart-button a:first-child:hover,
	.mini-cart7 .mini-cart-number,
	.item-product-circle .product-extra-link-circle a:hover,
	.pagi-nav .current, .skin-title .sub-title:before, 
	.item-portfolio .post-thumb .adv-thumb-link::after, 
	.main-nav10, .item-video .video-info .title60, 
	.skin-title2 .sub-title a:before,
	.h11-banner-item .banner-info::before,
	.h12-banner:nth-child(3n) .banner-info .banner-button i:hover,
	.h12-banner-02 .banner-info .banner-button i:hover,
	.h12-banner .banner-info .shop-button:hover,
	.h11-banner .shop-button:hover
    {background-color:'.$main_color.$important.'}'."\n";

    $style .= '.list-tags li a:hover,
	.shop-button:hover,
	.form-newsletter input[type="submit"]:hover,
	.woocommerce #respond input#submit:hover,
	a.added_to_cart:hover,
	.woocommerce-MyAccount-navigation ul li.is-active a,
	.woocommerce-MyAccount-navigation ul li:hover a,
	.woocommerce a.added_to_cart:hover,
	.woocommerce a.button.addcart-link:hover,
	.woocommerce.widget .woocommerce-widget-layered-nav-dropdown__submit:hover,
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover,
	.button:hover,
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover
	.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover,
	.detail-gallery .carousel li a.active img,
	.item-cat-info .cat-thumb .adv-thumb-link,
	.post-password-form input[type=submit]:hover,
	.wp-block-pullquote,
	.logo-lancom .text-logo a::before,
	.custom-information.intro-lancom-tv hr,
	.logo10 .text-logo:before, 
	.logo9 .text-logo:before,
	.shop-button.bg-color,
	.h12-banner .banner-info .shop-button:hover,
	.h11-banner .shop-button:hover
    {border-color: '.$main_color.$important.'}'."\n";
	
	$style .= '.logo-skincare .text-logo span::before,
	.main-nav > ul > li.current-menu-item > a::before,
	.main-nav > ul > li.current-menu-ancestor > a::before,
	.tab-style1 .title-tab li.active a::before
    {border-top-color: '.$main_color.$important.'}'."\n";

	$style .= '.logo-skincare .text-logo span::before,
	.main-nav > ul > li.current-menu-item > a::before,
	.main-nav > ul > li.current-menu-ancestor > a::before,
	.tab-style1 .title-tab li.active a::before
    {border-bottom-color: '.$main_color.$important.'}'."\n";

    list($r, $g, $b) = sscanf($main_color, "#%02x%02x%02x");
    $style .= '.about-skincare1::before
    {background-color: rgba('.$r.','.$g.','.$b.', 0.1)'.$important.'}'."\n";
    $style .= '.item-cat-statistic:hover .cat-info, 
	.item-advs3 .adv-thumb-link::after,
	.item-product-quickview:hover .product-thumb-link::after
    {background-color: rgba('.$r.','.$g.','.$b.', 0.5)'.$important.'}'."\n";
    $style .= '.item-post-inner .overlay-image .adv-thumb-link::after
    {background-color: rgba('.$r.','.$g.','.$b.', 0.7)'.$important.'}'."\n";
    $style .= '.banner-hot-deal .layer-after,.content-item-category.two
    {background-color: rgba('.$r.','.$g.','.$b.', 0.9)'.$important.'}'."\n";
}

if(!empty($main_color2)){
    $style .= '.color2
    {color:'.$main_color2.$important.'}'."\n";
    
    $style .= '.bg-color2
    {background-color:'.$main_color2.$important.'}'."\n";

    $style .= '.main-border2
    {border: 1px solid '.$main_color2.$important.'}'."\n";
}

/*****END MAIN COLOR*****/

/*****BEGIN CUSTOM CSS*****/
$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}

/*****END CUSTOM CSS*****/

/*****BEGIN BREADCRUMB COLOR*****/
$bread_color = s7upf_get_option('breadcrumb_text');
$bread_color_hover = s7upf_get_option('breadcrumb_text_hover');
if(is_array($bread_color) && !empty($bread_color)){
    $style .= '.bread-crumb a,.bread-crumb span{';
    $style .= s7upf_fill_css_typography($bread_color);
    $style .= '}'."\n";
}
if(is_array($bread_color_hover) && !empty($bread_color_hover)){
    $style .= '.bread-crumb a:hover{';
    $style .= s7upf_fill_css_typography($bread_color_hover);
    $style .= '}'."\n";
}
/*****END CUSTOM CSS*****/

/*****BEGIN MENU COLOR*****/
$menu_color = s7upf_get_option('sv_menu_color');
$menu_hover = s7upf_get_option('sv_menu_color_hover');
$menu_active = s7upf_get_option('sv_menu_color_active');
$menu_color2 = s7upf_get_option('sv_menu_color2');
$menu_hover2 = s7upf_get_option('sv_menu_color_hover2');
$menu_active2 = s7upf_get_option('sv_menu_color_active2');
if(is_array($menu_color) && !empty($menu_color)){
    $style .= '.main-nav>ul>li>a{';
    $style .= s7upf_fill_css_typography($menu_color);
    $style .= '}'."\n";
}
if(!empty($menu_hover)){
    $style .= 'nav.main-nav > ul>li:hover>a,
    nav.main-nav>ul>li>a:focus,
    nav.main-nav>ul>li.current-menu-item>a,
    nav.main-nav>ul>li.current-menu-ancestor>a
    {color:'.$menu_hover.'}'."\n";
}
if(!empty($menu_active)){
    $style .= 'nav.main-nav>ul>li.current-menu-item>a,
    nav.main-nav>ul>li.current-menu-ancestor>a,
    nav.main-nav>ul>li:hover>a
    {background-color:'.$menu_active.'}'."\n";
}
// Sub menu
if(is_array($menu_color2) && !empty($menu_color2)){
    $style .= 'nav .sub-menu>li>a{';
    $style .= s7upf_fill_css_typography($menu_color2);
    $style .= '}'."\n";
}
if(!empty($menu_hover2)){
    $style .= 'nav.main-nav li:not(.has-mega-menu) .sub-menu li:hover >a,
    nav.main-nav li:not(.has-mega-menu) .sub-menu li>a:focus,
    nav.main-nav .sub-menu li.current-menu-item >a,
    nav.main-nav .sub-menu li.current-menu-ancestor >a
    {color:'.$menu_hover2.'}'."\n";
}
if(!empty($menu_active2)){
    $style .= 'nav.main-nav li:not(.has-mega-menu) .sub-menu li:hover,
    nav.main-nav .sub-menu li.current-menu-item,
    nav.main-nav .sub-menu li.current-menu-ancestor
    {background-color:'.$menu_active2.'}'."\n";
}
/*****END MENU COLOR*****/

/*****BEGIN TYPOGRAPHY*****/
$typo_data = s7upf_get_option('s7upf_custom_typography');
if(is_array($typo_data) && !empty($typo_data)){
    foreach ($typo_data as $value) {
        switch ($value['typo_area']) {
             case 'body':
                $style_class = 'body';
                break;

            case 'header':
                $style_class = '#header';
                break;

            case 'footer':
                $style_class = '#footer';
                break;

            case 'widget':
                $style_class = '#main-content .widget';
                break;
            
            default:
                $style_class = '#main-content';
                break;
        }
        $class_array = explode(',', $style_class);
        $new_class = '';
        if(is_array($class_array)){
            foreach ($class_array as $prefix) {
                $new_class .= $prefix.' '.$value['typo_heading'].',';
            }
        }
        if(!empty($new_class)) $style .= $new_class.' .nocss{';
        $style .= s7upf_fill_css_typography($value['typography_style']);        
        $style .= '}';
        $style .= "\n";
    }
}

/*****END TYPOGRAPHY*****/

$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}
if(!empty($style)) echo apply_filters('s7upf_output_content',$style);
?>