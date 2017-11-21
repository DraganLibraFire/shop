<?php
/**
 * The template for displaying search results pages.
 *
 * @package Starter
 */

get_header(); ?>
<div class="row">
	<?php get_sidebar(); ?>

	<section id="primary" class="content-area col-md-9">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'ZOEKRESULTATEN VOOR: %s', 'shop' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<ul class="products">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
//					get_template_part( 'template-parts/content', 'search' );
						get_template_part( 'woocommerce/content', 'product' );
						?>

					<?php endwhile; ?>
				</ul>

				<div class=" nav-pagination">
					<?php
					global $wp_query;

					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'prev_text'          => __('<i class="fa fa-angle-double-left" aria-hidden="true"></i>'),
							'next_text'          => __('<i class="fa fa-angle-double-right" aria-hidden="true"></i>')
					) );
					?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
</div>

<?php get_footer(); ?>
