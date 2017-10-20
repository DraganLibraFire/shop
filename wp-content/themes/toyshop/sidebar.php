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

<div id="secondary" class="widget-area col-md-2" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
</div><!-- #secondary -->
