<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


<div class="row clearfix">
	<?php
	/**
	 * woocommerce_sidebar hook.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
//	do_action( 'woocommerce_sidebar' );

	?>
		<div class="col-md-10 pull-right">
			<?php
			remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
			?>

			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

			<?php endif; ?>

			<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
			?>
		<?php if ( have_posts() ) : ?>
			<div class="clearfix product-order-wrapper borders">
				<?php
					/**
					 * woocommerce_before_shop_loop hook.
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>
			</div>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>


			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
			<div class="clearfix product-order-wrapper top-border">
				<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				?>
			</div>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
		</div>
		</div>
		</div>
	<?php get_sidebar(); ?>

</div>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
</div>
<div class="home-over-ons-wrapper">
	<div class="container">
		<div class="col-md-3">
			<?php $the_ons_image = get_field('logo','option');?>
			<div class="display-table fullwidth"  data-equal="over-ons">
				<div class="display-table-cell alignvertical">
					<img src="<?php echo $the_ons_image['url']?>" alt="<?php $the_ons_image['alt']?>" title="<?php $the_ons_image['title']?>">
				</div>
			</div>
		</div>
		<div class="col-md-9 over-ons-section-text" data-equal="over-ons">
			<?php the_field('over_ons_text', 'option');?>
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
