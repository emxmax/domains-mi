<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(350,350);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
?>
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-circle style2 text-center">
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
			<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			<?php s7upf_product_quickview('',esc_html__('Quick View','skincare'),'quickview-text',true);?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
		</div>
		<div class="product-info">
			<h3 class="title14 product-title lora-font">
				<a class="black wobble-top" href="<?php echo esc_url(get_the_permalink())?>"><?php the_title()?></a>
			</h3>
			<?php do_action( 'woocommerce_shop_loop_item_title' );?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
			<?php s7upf_get_rating_html(true,false)?>
			<?php s7upf_get_price_html()?>
			<div class="product-extra-link flex-wrapper align_items-center justify_content-center">
				<?php
					if ( is_user_logged_in() ){
			        echo s7upf_wishlist_url('<i class="la la-heart-o"></i>','','',esc_attr__('Wishlist','skincare'));
			    }
				?>
				<?php s7upf_addtocart_link(true,'','shop-button black');?>
				<?php echo s7upf_compare_url('<i class="la la-exchange"></i>',false,'','',esc_attr__('Compare','skincare'));?>
			</div>
		</div>
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
	</div>
</div>
