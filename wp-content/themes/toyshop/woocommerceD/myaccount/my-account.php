<div class="woo-account-header">
	<div class="woo-account-header-title">
		<h4><?php _e('My <span>Account</span>','shop') ?></h4>
	</div>
	<div class="woo-account-inner-header clearfix">
		<div class="woo-account-user-email">
			<span>
				<?php _e('Hello,', 'shop'); ?>
			</span>
			<span class="user-email">
				<?php echo $current_user->user_email ;?>
			</span>
		</div>
		<div class="customer-services-wrapper clearfix">
			<div class=" services-number">
				<span><?php the_field('service_number_text','option') ?></span>
				<span><a href="tel:<?php the_field('service_number','option') ?>"><?php the_field('service_number','option') ?></a></span>
			</div>
			<div class=" services-email">
				<span><?php the_field('service_email_text','option') ?></span>
				<span><a href="mailto:<?php the_field('service_email','option') ?>"><?php the_field('service_email','option') ?></a></span>
			</div>
		</div>
		<div class="woo-account-add-cart pull-right">
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span><?php echo esc_html__( 'View cart', 'woocommerce' ) ?></span></a>
		</div>
	</div>

</div>
<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
