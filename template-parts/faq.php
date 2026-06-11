<?php
/**
 * Template part: FAQ section.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = array(
	array(
		'q' => __( 'What courier services does Bangla Track support?', 'banglatrack-theme' ),
		'a' => __( 'Bangla Track integrates with Steadfast Courier, Pathao, and RedX — the three most popular courier services in Bangladesh. All integrations are API-based for real-time booking and tracking.', 'banglatrack-theme' ),
	),
	array(
		'q' => __( 'Is there a free version of Bangla Track?', 'banglatrack-theme' ),
		'a' => __( 'Yes! The free version includes 100 bookings per month with one courier provider. It includes order tracking, invoice printing, COD management, and all core features. No credit card required.', 'banglatrack-theme' ),
	),
	array(
		'q' => __( 'How do I install Bangla Track?', 'banglatrack-theme' ),
		'a' => __( 'Download the plugin from your account dashboard, upload it to your WordPress site via Plugins → Add New → Upload, and activate it. The setup wizard will guide you through connecting your courier API keys.', 'banglatrack-theme' ),
	),
	array(
		'q' => __( 'Can I switch courier providers after setup?', 'banglatrack-theme' ),
		'a' => __( 'In the free version, the provider is locked after initial setup to keep things simple. Upgrade to Starter or Pro to use multiple providers simultaneously and switch between them per-order.', 'banglatrack-theme' ),
	),
	array(
		'q' => __( 'Does Bangla Track support bulk booking?', 'banglatrack-theme' ),
		'a' => __( 'Yes. Bangla Track supports bulk parcel booking using WordPress Action Scheduler for reliable background processing. You can book hundreds of orders in a single batch.', 'banglatrack-theme' ),
	),
	array(
		'q' => __( 'What happens when my subscription expires?', 'banglatrack-theme' ),
		'a' => __( 'Your existing bookings and tracking data remain intact. The plugin gracefully falls back to free-tier limits (100 bookings/month, single provider). You can renew anytime to restore full access.', 'banglatrack-theme' ),
	),
);
?>

<section class="btd-faq" id="faq">
	<div class="btd-container btd-container--narrow">
		<div class="btd-section-header">
			<span class="btd-section-badge"><?php esc_html_e( 'FAQ', 'banglatrack-theme' ); ?></span>
			<h2 class="btd-section-title"><?php esc_html_e( 'Frequently asked questions', 'banglatrack-theme' ); ?></h2>
			<p class="btd-section-subtitle"><?php esc_html_e( 'Got questions? We\'ve got answers.', 'banglatrack-theme' ); ?></p>
		</div>
		<div class="btd-faq__list">
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<details class="btd-faq__item" id="faq-item-<?php echo esc_attr( $index ); ?>">
					<summary class="btd-faq__question">
						<span><?php echo esc_html( $faq['q'] ); ?></span>
						<svg class="btd-faq__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
					</summary>
					<div class="btd-faq__answer">
						<p><?php echo esc_html( $faq['a'] ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
