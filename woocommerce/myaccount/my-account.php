<?php
/**
 * WooCommerce My Account template override.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * My Account page layout.
 *
 * @param WC_Order[] $order_count Number of orders.
 */
do_action( 'woocommerce_before_account_page' );
?>

<div class="btd-my-account-layout woocommerce-MyAccount-layout">
	<aside class="btd-my-account-sidebar">
		<?php do_action( 'woocommerce_account_navigation' ); ?>
	</aside>
	<div class="btd-my-account-content woocommerce-MyAccount-content">
		<?php do_action( 'woocommerce_account_content' ); ?>
	</div>
</div>

<?php
do_action( 'woocommerce_after_account_page' );
