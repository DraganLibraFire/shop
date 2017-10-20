<?php
/**
 * Template name: Filter page
 */
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


<div class="row">
	<?php
	/**
	 * woocommerce_sidebar hook.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	//	do_action( 'woocommerce_sidebar' );

	?>


	<div class="col-md-10 pull-right">
		<div class="sort-filter-wrapper-lf product-order-wrapper borders">

		</div>
		<?php echo do_shortcode('[searchandfilter id="1772" show="results"]'); ?>
	</div>
	<div class="col-md-2 widget widget_search_filter_register_widget">
		<h4 class="more-filters"><?php _e('Show Filters', 'shop') ?>    <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h4>
		<?php echo do_shortcode('[searchandfilter id="1772"]'); ?>
	</div>

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
