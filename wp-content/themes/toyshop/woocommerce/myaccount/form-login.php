<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
<?php if(isset($_GET['action'])!='register'): ?>
	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	<div class="u-columns" id="customer_login">



	<?php endif; ?>

		<div class="row">
			<div class="login-form-wrapper form-log-reg-wrapper col-sm-6">
				<h4 class="log-reg-title"><?php _e( 'Terugkerende <span>Klant</span>', 'woocommerce' ); ?></h4>

				<form class="woocommerce-form woocommerce-form-login login" method="post">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
					</p>
					<p class="form-row submit-wrapper-wc">
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
						<!--<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php /*_e( 'Remember me', 'woocommerce' ); */?></span>
						</label>-->
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
					</p>


					<?php do_action( 'woocommerce_login_form' ); ?>

					<?php do_action( 'woocommerce_login_form_end' ); ?>
				</form>
			</div>
			<div class="login-page-custom-text-wrapper col-sm-6">
				<div class="login-page-custom-text-wrapper">
					<?php the_field('login_text','option'); ?>
					<div class="link-on-login-page">
						<a class="button purple" href="<?php echo get_permalink(woocommerce_get_page_id('myaccount')) ?>?action=register">Verder...</a>
					</div>
				</div>
			</div>
		</div>

	<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<?php endif; ?>
