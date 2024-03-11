<?php
$content_class = 'dropdown-list text-left';
?>
<div class="mini-cart-box custom-scroll <?php echo esc_attr($el_class)?>">
    <?php 
    switch ($style) {
        case 'total':
            ?>
            <a class="mini-cart-link flex-wrapper align_items-center" href="<?php echo esc_url(wc_get_cart_url())?>">
                <span class="mini-cart-icon title36 color"><i class="<?php echo esc_attr($icon)?>"></i></span>
				<span class="mini-cart-total-price set-cart-price title18 font-bold black"><?php echo WC()->cart->get_cart_total()?></span>
				<span class="mini-cart-number set-cart-number black">0</span>
            </a>
            <?php
            break;
        
        default:
            ?>
            <a class="mini-cart-link inline-block" href="<?php echo esc_url(wc_get_cart_url())?>">
                <span class="mini-cart-icon title36 color"><i class="<?php echo esc_attr($icon)?>"></i></span>
				<span class="mini-cart-number set-cart-number black">0</span>
            </a>
            <?php
            break;
    }
    ?>    
    <div class="mini-cart-content <?php echo esc_attr($content_class)?>">
        <h2 class="title18 font-bold"><span class="set-cart-number">0</span> <?php echo esc_html_e("items","skincare")?></h2>
        <div class="mini-cart-main-content"><?php echo s7upf_get_template_woocommerce('cart/mini-cart')?></div>
        <div class="total-default hidden"><?php echo wc_price(0)?></div>
        <span class="close-minicart"><i class="la la-times"></i></span>
    </div>
</div>