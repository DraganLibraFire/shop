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

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">



<?php endif; ?>



<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	<h4 class="log-reg-title"><?php _e( 'Maak <span>Account</span>', 'woocommerce' ); ?></h4>

	<div class="row">
		<div class="register-custom-text-wrapper login-page-custom-text-wrapper col-md-6 clearfix">
			<?php the_field('register_page_text','option') ?>
		</div>

		<div class="u-column form-log-reg-wrapper col-md-12">


			<form method="post" class="register">

				<?php do_action( 'woocommerce_register_form_start' ); ?>
				<p class="form-row form-row-first">
					<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
					<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
				</p>
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<p class="woocommerce-form-row  form-row form-row-last">
						<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
					</p>


				<?php endif; ?>
				<p class="form-row form-row-last">
					<label for="reg_password2"><?php _e( 'Confirm Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
				</p>
				<p class="form-row form-row-first">
					<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
					<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
				</p>
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<p class="woocommerce-form-row form-row-last form-row ">
						<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
					</p>

				<?php endif; ?>

				<div class="form-row-wide">
					<p class="woocommerce-form-row  form-row form-row-first">
						<label for="reg_email"><?php _e( 'Email', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
					</p>
				</div>

				<?php do_action( 'woocommerce_register_form' ); ?>

				<p class="woocommerce-FormRow form-row form-row-wide">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
				</p>
				<?php do_action( 'woocommerce_login_form' ); ?>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>

		</div>
	</div>

</div>
<?php endif; ?>



