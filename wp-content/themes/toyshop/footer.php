<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starter
 */

?>
		</div><!-- .container -->	
	</div><!-- #content -->
<div class="call-tio-action-main-wrapper green-bg align-center">
	<div class="call-tio-action-inner-wrapper">
		<?php

			if(get_field('call_to_global')==1 || get_field('call_to_global')==''){

				$call_to_action_text = get_field('call_to_action_text','option');
				$call_to_action_button_text = get_field('cal_to_action_button_text','option');
				$call_to_action_button_url = get_field('call_to_action_button_url','option');
			}
			else {
				$call_to_action_text = get_field('call_to_action_text');
				$call_to_action_button_text = get_field('cal_to_action_button_text');
				$call_to_action_button_url = get_field('call_to_action_button_url');
			}
?>
		<div class="container">
			<div class="call-to-action-text ">
				<?php echo $call_to_action_text?>
			</div>
			<span class="call_to_button_wrapper">
				<a class="call-to-action button orange" href="<?php echo $call_to_action_button_url ?>"><?php echo $call_to_action_button_text?></a>
			</span>
		</div>
	</div> <!-- /.call-tio-action-inner-wrapper -->
</div> <!-- /.call-tio-action-main-wrapper green-bg align-center -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="widget-wrapper">
			<div class="container">
				<div class="row">
					<?php get_template_part('template-parts/footer', 'widgets');?>
				</div>
			</div>
		</div>
		<div class="payment-logos-wrapper align-center">
			<div class="container">
				<?php

				while ( have_rows('payment_logos', 'option') ) : the_row(); ?>

					<?php $payment_logos = get_sub_field('logo', 'option');?>
					<img src="<?php echo $payment_logos['url']?>" alt="<?php echo $payment_logos['alt']?>" title="<?php echo $payment_logos['title']?>">

				<?php endwhile;
				?>

			</div>
		</div>
		<div class="footer-menu">
			<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'clearfix align-center' ) ); ?>
			</div>
		</div>
		<?php if(get_theme_mod('footer_customizer_text') !=''):?>
		<div class="site-info">
			<div class="container">
				<div class="footer-copyright col-md-12 align-center"><?php echo get_theme_mod('footer_customizer_text');?></div>
			</div>
		</div><!-- .site-info -->
		<?php endif;?>
	</footer><!-- #colophon -->

</div><!-- #page -->
<?php echo get_theme_mod('google_analytics_code');?>
<?php wp_footer(); ?>

</body>
</html>
