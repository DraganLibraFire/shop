<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_theme_mod('favicon_image'); ?>"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shop' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-phone-account-details-top-main-header">
			<div class="container">
				<div class="header-small fullwidth clearfix">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="pull-left">
								<div class="content-left">

								<span id="header-phone">
									<a href="tel: <?php echo get_theme_mod('phone_number'); ?>"><i class="fa fa-phone" aria-hidden="true"></i> Bel ons <?php echo get_theme_mod('phone_number'); ?></a>
								</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="top-header-widgets">
								<?php dynamic_sidebar('top-bar-woo');?>
							</div>
						</div>
					</div>
					<div class="search-form-header-small">
						<?php echo do_shortcode('[wi_autosearch_suggest_form]'); ?>
					</div>
				</div>
				<div class="header-small-toggle-wrapper text-center">

					<span><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
				</div>
			</div>
		</div>
		<div class="logo-shop-details-wrapper">
			<div class="container">
				<div class="website-logo-main-wrapper clearfix">
					<aside class="main-logo-inner ">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
<!--							<img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/images/logo-white.png" alt="--><?php //echo( get_bloginfo( 'title' ) ); ?><!--" />-->
							<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
						</a>
					</aside>
					<?php dynamic_sidebar('top-bar-woo-2');?>
				</div> <!-- .website-logo-main-wrapper -->


			</div>
		</div>
		<div class="menu-wrapper">
			<div class="container">
				<nav id="site-navigation" class="lf-uber-menu-wrapper " role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
					<?php ubermenu( 'main' , array( 'menu' => 64 ) ); ?>
				</nav><!-- #site-navigation -->
				<aside class="main-logo-inner ">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<!--							<img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/images/logo-white.png" alt="--><?php //echo( get_bloginfo( 'title' ) ); ?><!--" />-->
						<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
					</a>
				</aside>

				<?php dynamic_sidebar('top-bar-woo-2');?>
<!--				display-table-cell alignvertical pull-none main-navigation clearfix-->

			</div>
		</div>
		<div class="mobile-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'clearfix pull-right' ) ); ?>
		</div>

	</header><!-- #masthead -->
	<?php
	if( have_rows('shop_features', 'option') ): ?>
	<div class="shop-features">
		<div class="container">
			<table >
				<?php
				// loop through the rows of data
				while ( have_rows('shop_features','option') ) : the_row();

					?>
					<td class="single-shop-feature"><?php the_sub_field('icon','option');?> <span><?php the_sub_field('text','option')?></span></td>
						<?php

				endwhile;
				?>
			</table>
		</div>
	</div>

	<?php endif;
	?>
	<?php if(!is_front_page() AND !is_archive('product') ): ?>
	<div class="container breadcrumbs-wrapper">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
		?>
	</div>
	<?php endif; ?>


	<div id="content" class="site-content">
		<div class="container">
