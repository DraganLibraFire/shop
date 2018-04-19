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
					<?php the_field('404_title', 'option')?>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php the_field('404_content', 'option')?>
				</div><!-- .page-content -->
				<a class="button purple" href="<?php echo home_url()?>"> <?php _e('Naar de homepagina', 'shop'); ?></a>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
