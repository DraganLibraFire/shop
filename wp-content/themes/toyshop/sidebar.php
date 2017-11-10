<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Starter
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-3" role="complementary">
	<div class="widget widget_search_filter_register_widget">
		<h4 class="more-filters ">Show More Category    <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h4>
	</div>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
</div><!-- #secondary -->
