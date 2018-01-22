<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
?>
<div class="images">
	<?php
		if ( has_post_thumbnail() ) {
			$attachment_count = count( $product->get_gallery_attachment_ids() );
			$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
			$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
			?>
				
				<div class="thumbnails columns-1">
					<div>
						<a href="<?php echo get_the_post_thumbnail_url() ?>">
							<img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php echo get_the_title()?>" title="<?php echo get_the_title()?>">
						</a>
					</div>
					<?php
					add_filter( 'single_product_small_thumbnail_size', function(){
						return 'full';
					} );
					add_filter( 'woocommerce_product_thumbnails_columns', function(){
						return 1;
					}  );

					do_action( 'woocommerce_product_thumbnails' ); ?>
				</div>

			<?php


			add_filter( 'single_product_small_thumbnail_size', function(){
				return 'shop_thumbnail';
			} );
			add_filter( 'woocommerce_product_thumbnails_columns', function(){
				return 3;
			}  );

		} else {
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
		}
		?>
	<div class="thumbnails columns-3">
		<div class="woocommerce-product-gallery__image">
			<a href="<?php echo get_the_post_thumbnail_url() ?>">
				<img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php echo get_the_title()?>" title="<?php echo get_the_title()?>">
			</a>
		</div>
		<?php do_action( 'woocommerce_product_thumbnails' ); ?>

	</div>

		<?php
	?>
</div>
