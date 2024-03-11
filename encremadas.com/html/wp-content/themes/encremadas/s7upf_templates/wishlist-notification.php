<?php
$show_wishlist = s7upf_get_option('show_wishlist_notification');
if(class_exists('YITH_WCWL_Init') && $show_wishlist == 'on'){
$url = YITH_WCWL()->get_wishlist_url();
?>
<div class="wishlist-mask">
    <div class="wishlist-popup">
        <span class="popup-icon"><i class="fa fa-bullhorn"></i></span>
        <p class="wishlist-alert"><b><span class="wishlist-title"></span></b> <?php esc_html_e("fue agregado a la lista de deseos","skincare")?></p>
        <div class="wishlist-button">
            <a href="javascript:void(0)" class="wishlist-close"><?php esc_html_e("Cerrar","skincare")?> (<span class="wishlist-countdown">3</span>)</a>
            <a href="<?php echo esc_url($url)?>"><?php esc_html_e("Ver página","skincare")?></a>
        </div>
    </div>
</div>
<?php
}
