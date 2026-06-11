<?php
/**
 * Template part: CTA banner section.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="btd-cta" id="cta">
	<div class="btd-container">
		<div class="btd-cta__inner">
			<div class="btd-cta__glow" aria-hidden="true"></div>
			<h2 class="btd-cta__title"><?php esc_html_e( 'Ready to streamline your shipping?', 'banglatrack-theme' ); ?></h2>
			<p class="btd-cta__subtitle"><?php esc_html_e( 'Join hundreds of Bangladeshi merchants who trust Bangla Track for their WooCommerce shipping. Start free, upgrade when you grow.', 'banglatrack-theme' ); ?></p>
			<div class="btd-cta__actions">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btd-btn btd-btn--white btd-btn--lg">
						<?php esc_html_e( 'Get Started Free', 'banglatrack-theme' ); ?>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>" class="btd-btn btd-btn--white btd-btn--lg">
						<?php esc_html_e( 'Get Started Free', 'banglatrack-theme' ); ?>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
