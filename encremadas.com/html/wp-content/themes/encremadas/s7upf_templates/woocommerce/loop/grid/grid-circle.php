<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(350,350);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-circle text-center">
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
			<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			<div class="product-extra-link-circle absolute">
				<?php echo s7upf_wishlist_url('<i class="la la-heart-o"></i>','','','');?>
				<?php s7upf_addtocart_link(true,'cart-icon','');?>
				<?php echo s7upf_compare_url('<i class="la la-exchange"></i>',false,'','','');?>
				<?php s7upf_product_quickview()?>
			</div>
		</div>
		<div class="product-info">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
			<h3 class="title14 product-title lora-font">
				<a class="black wobble-top" href="<?php echo esc_url(get_the_permalink())?>"><?php the_title()?></a>
			</h3>
			<?php do_action( 'woocommerce_shop_loop_item_title' );?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
			<?php s7upf_get_rating_html(true,false)?>
			<?php s7upf_get_price_html()?>
		</div>		
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
	</div>
</div>