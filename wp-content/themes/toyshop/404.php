<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Starter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404', 'starter' ); ?><span> Error</span></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Suspendisse elit felis, molestie vitae mi nec, ultrices ultricies tortor. Sed eu nisi arcu. Morbi sapien nibh, varius nec hendrerit a, fermentum quis nibh. Aenean luctus, enim eget ullamcorper ultrices, turpis nisi dignissim erat, sit amet fermentum felis nulla vitae.</p>

				</div><!-- .page-content -->
				<a class="button purple" href="<?php echo home_url()?>"> Back to home</a>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
