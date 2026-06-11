<?php
/**
 * Template part: Features grid.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$features = array(
	array(
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
		'title' => __( 'One-Click Booking', 'banglatrack-theme' ),
		'desc'  => __( 'Book parcels directly from WooCommerce order pages. Single or bulk booking with Action Scheduler for reliable background processing.', 'banglatrack-theme' ),
	),
	array(
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
		'title' => __( 'Live Tracking', 'banglatrack-theme' ),
		'desc'  => __( 'Beautiful animated timeline for customers and vendors. Real-time status updates via webhook integration with courier APIs.', 'banglatrack-theme' ),
	),
	array(
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
		'title' => __( 'Invoice & Labels', 'banglatrack-theme' ),
		'desc'  => __( 'Professional print-ready invoices and shipping labels. Automatically includes consignment ID and COD amount.', 'banglatrack-theme' ),
	),
	array(
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
		'title' => __( 'COD Management', 'banglatrack-theme' ),
		'desc'  => __( 'Smart Cash on Delivery handling. Auto-pulls order total as default COD with manual override before booking.', 'banglatrack-theme' ),
	),
	array(
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
		'title' => __( 'Auto Status Sync', 'banglatrack-theme' ),
		'desc'  => __( 'Automatically syncs order status with courier updates. COD orders auto-transition from pending to processing.', 'banglatrack-theme' ),
	),
	array(
		'icon'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
		'title' => __( 'Multi-Provider', 'banglatrack-theme' ),
		'desc'  => __( 'Use Steadfast, Pathao, and RedX simultaneously. Switch providers per-order or set defaults. Available in Starter & Pro plans.', 'banglatrack-theme' ),
	),
);
?>

<section class="btd-features" id="features">
	<div class="btd-container">
		<div class="btd-section-header">
			<span class="btd-section-badge"><?php esc_html_e( 'Features', 'banglatrack-theme' ); ?></span>
			<h2 class="btd-section-title"><?php esc_html_e( 'Everything you need to ship with confidence', 'banglatrack-theme' ); ?></h2>
			<p class="btd-section-subtitle"><?php esc_html_e( 'Bangla Track gives you complete control over your shipping workflow — from booking to delivery.', 'banglatrack-theme' ); ?></p>
		</div>
		<div class="btd-features__grid">
			<?php foreach ( $features as $feature ) : ?>
				<article class="btd-feature-card">
					<div class="btd-feature-card__icon">
						<?php echo $feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup ?>
					</div>
					<h3 class="btd-feature-card__title"><?php echo esc_html( $feature['title'] ); ?></h3>
					<p class="btd-feature-card__desc"><?php echo esc_html( $feature['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
