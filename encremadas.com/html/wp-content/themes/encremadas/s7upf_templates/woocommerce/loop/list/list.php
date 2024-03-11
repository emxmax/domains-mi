<?php
global $post;
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size_list)) $size_list = array(370,370);
$col_class = 'col-md-12 col-sm-12 col-xs-12';
?>
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-list">
		<div class="row">
			<?php do_action( 'woocommerce_before_shop_loop_item' );?>
			<div class="col-md-5 col-sm-6 col-xs-12">
				<div class="product-thumb">
					<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
					<?php s7upf_woocommerce_thumbnail_loop($size_list,$animation);?>
					<?php s7upf_product_quickview()?>
					<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
				</div>
			</div>
			<div class="col-md-7 col-sm-6 col-xs-12">
				<div class="product-info">
					<h3 class="title24 product-title lora-font">
						<a class="black wobble-top" href="<?php echo esc_url(get_the_permalink())?>"><?php the_title()?></a>
					</h3>
					<?php do_action( 'woocommerce_shop_loop_item_title' );?>
					<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
					<?php s7upf_get_rating_html(true,false)?>
					<?php s7upf_get_price_html()?> 
					<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
					<div class="product-extra-link flex-wrapper align_items-center">
						<?php s7upf_addtocart_link(true,'','shop-button black');?>
						<?php echo s7upf_wishlist_url('<i class="la la-heart-o"></i>','','',esc_attr__('Wishlist','skincare'));?>
						<?php echo s7upf_compare_url('<i class="la la-exchange"></i>',false,'','',esc_attr__('Compare','skincare'));?>
					</div>
				</div>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' );?>
		</div>
	</div>
</div>