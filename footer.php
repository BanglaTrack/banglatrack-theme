<?php
/**
 * Theme footer template.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="btd-footer" role="contentinfo">
	<div class="btd-container">
		<div class="btd-footer__grid">
			<div class="btd-footer__col btd-footer__about">
				<div class="btd-footer__brand">
					<img class="btd-footer__logo-img" src="<?php echo esc_url( BTD_URI . '/assets/logo/banglaTrack.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="height: 28px; width: auto; vertical-align: middle; margin-right: 8px;">
					<span class="btd-footer__brand-name"><?php bloginfo( 'name' ); ?></span>
				</div>
				<p class="btd-footer__tagline"><?php esc_html_e( 'The #1 WooCommerce shipping plugin for Bangladesh. Seamless courier integration for your online store.', 'banglatrack-theme' ); ?></p>
			</div>

			<div class="btd-footer__col">
				<h4 class="btd-footer__heading"><?php esc_html_e( 'Product', 'banglatrack-theme' ); ?></h4>
				<ul class="btd-footer__links">
					<li><a href="<?php echo esc_url( home_url( '/#features' ) ); ?>"><?php esc_html_e( 'Features', 'banglatrack-theme' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>"><?php esc_html_e( 'Pricing', 'banglatrack-theme' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'banglatrack-theme' ); ?></a></li>
					<?php
					$ug_page = get_page_by_path( 'user-guide' );
					$ug_url  = $ug_page ? get_permalink( $ug_page->ID ) : home_url( '/user-guide/' );
					?>
					<li><a href="<?php echo esc_url( $ug_url ); ?>"><?php esc_html_e( 'User Guide', 'banglatrack-theme' ); ?></a></li>
				</ul>
			</div>

			<div class="btd-footer__col">
				<h4 class="btd-footer__heading"><?php esc_html_e( 'Support', 'banglatrack-theme' ); ?></h4>
				<ul class="btd-footer__links">
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard' ) ); ?>"><?php esc_html_e( 'My Account', 'banglatrack-theme' ); ?></a></li>
					<?php endif; ?>
					<li><a href="mailto:support@banglatrack.com"><?php esc_html_e( 'Contact Us', 'banglatrack-theme' ); ?></a></li>
				</ul>
			</div>

			<div class="btd-footer__col">
				<h4 class="btd-footer__heading"><?php esc_html_e( 'Legal', 'banglatrack-theme' ); ?></h4>
				<ul class="btd-footer__links">
					<?php
					$privacy_page = get_privacy_policy_url();
					if ( $privacy_page ) : ?>
						<li><a href="<?php echo esc_url( $privacy_page ); ?>"><?php esc_html_e( 'Privacy Policy', 'banglatrack-theme' ); ?></a></li>
					<?php endif; ?>
					<?php
					$terms_page = get_permalink( get_page_by_path( 'terms-and-conditions' ) );
					if ( $terms_page ) : ?>
						<li><a href="<?php echo esc_url( $terms_page ); ?>"><?php esc_html_e( 'Terms of Service', 'banglatrack-theme' ); ?></a></li>
					<?php endif; ?>
					<?php
					$refund_page = get_permalink( get_page_by_path( 'refund-policy' ) );
					if ( $refund_page ) : ?>
						<li><a href="<?php echo esc_url( $refund_page ); ?>"><?php esc_html_e( 'Refund Policy', 'banglatrack-theme' ); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>

		<div class="btd-footer__bottom">
			<p class="btd-footer__copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'banglatrack-theme' ); ?>
			</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
