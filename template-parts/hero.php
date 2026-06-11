<?php
/**
 * Template part: Hero section.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="btd-hero" id="hero">
	<div class="btd-hero__bg-pattern" aria-hidden="true"></div>
	<div class="btd-container btd-hero__inner">
		<div class="btd-hero__content">
			<div class="btd-hero__badge">
				<span class="btd-hero__badge-dot"></span>
				<?php esc_html_e( 'Built for Bangladesh', 'banglatrack-theme' ); ?>
			</div>
			<h1 class="btd-hero__title">
				<?php esc_html_e( 'Ship Smarter with', 'banglatrack-theme' ); ?>
				<span class="btd-hero__title-accent"><?php esc_html_e( 'Bangla Track', 'banglatrack-theme' ); ?></span>
			</h1>
			<p class="btd-hero__subtitle">
				<?php esc_html_e( 'The #1 WooCommerce shipping plugin for Bangladesh. Book parcels, track shipments, and sync order statuses with Steadfast, Pathao, and RedX — all from your WordPress dashboard.', 'banglatrack-theme' ); ?>
			</p>
			<div class="btd-hero__actions">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btd-btn btd-btn--primary btd-btn--lg">
						<?php esc_html_e( 'Get Started Free', 'banglatrack-theme' ); ?>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>" class="btd-btn btd-btn--primary btd-btn--lg">
						<?php esc_html_e( 'Get Started Free', 'banglatrack-theme' ); ?>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				<?php endif; ?>
				<a href="#pricing" class="btd-btn btd-btn--ghost btd-btn--lg">
					<?php esc_html_e( 'View Pricing', 'banglatrack-theme' ); ?>
				</a>
			</div>
			<div class="btd-hero__stats">
				<div class="btd-hero__stat">
					<span class="btd-hero__stat-number">3</span>
					<span class="btd-hero__stat-label"><?php esc_html_e( 'Courier Partners', 'banglatrack-theme' ); ?></span>
				</div>
				<div class="btd-hero__stat-divider"></div>
				<div class="btd-hero__stat">
					<span class="btd-hero__stat-number">100+</span>
					<span class="btd-hero__stat-label"><?php esc_html_e( 'Free Bookings/mo', 'banglatrack-theme' ); ?></span>
				</div>
				<div class="btd-hero__stat-divider"></div>
				<div class="btd-hero__stat">
					<span class="btd-hero__stat-number">5min</span>
					<span class="btd-hero__stat-label"><?php esc_html_e( 'Setup Time', 'banglatrack-theme' ); ?></span>
				</div>
			</div>
		</div>
		<div class="btd-hero__visual">
			<div class="btd-hero__card btd-hero__card--dashboard">
				<div class="btd-hero__card-header">
					<div class="btd-hero__card-dots">
						<span></span><span></span><span></span>
					</div>
					<span class="btd-hero__card-title"><?php esc_html_e( 'Order Dashboard', 'banglatrack-theme' ); ?></span>
				</div>
				<div class="btd-hero__card-body">
					<div class="btd-hero__mock-row btd-hero__mock-row--header">
						<span><?php esc_html_e( 'Order', 'banglatrack-theme' ); ?></span>
						<span><?php esc_html_e( 'Status', 'banglatrack-theme' ); ?></span>
						<span><?php esc_html_e( 'Courier', 'banglatrack-theme' ); ?></span>
					</div>
					<div class="btd-hero__mock-row">
						<span>#1042</span>
						<span class="btd-mock-badge btd-mock-badge--green"><?php esc_html_e( 'Delivered', 'banglatrack-theme' ); ?></span>
						<span>Steadfast</span>
					</div>
					<div class="btd-hero__mock-row">
						<span>#1041</span>
						<span class="btd-mock-badge btd-mock-badge--blue"><?php esc_html_e( 'In Transit', 'banglatrack-theme' ); ?></span>
						<span>Pathao</span>
					</div>
					<div class="btd-hero__mock-row">
						<span>#1040</span>
						<span class="btd-mock-badge btd-mock-badge--yellow"><?php esc_html_e( 'Processing', 'banglatrack-theme' ); ?></span>
						<span>RedX</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
