<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(300,300);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-quickview text-center">
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
			<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
			<div class="product-info">
				<?php s7upf_product_quickview('',esc_html__('Quick View','skincare'),'shop-button white',true);?>
			</div>
		</div>
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
	</div>
</div>